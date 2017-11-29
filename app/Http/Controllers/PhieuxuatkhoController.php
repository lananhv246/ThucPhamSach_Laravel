<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;
use App\PhieuXuatKho;
use App\PhieuXuatKhoChiTiet;
use Auth;
use Session;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Cart;
use App\DonHangNo;
use App\TonKho;

class PhieuxuatkhoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin', ['except' => 'logout']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PhieuXuatKho::orderBy('id','ASC')->paginate(10);
        return view('admin.manager.phieuxuatkho.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admin = Admin::pluck('name','id');
        $khachhang = User::pluck('name','id');
        return view('admin.manager.phieuxuatkho.create',compact('admin','khachhang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            // 'id_admin' => 'required',
            'id_khachhang' => 'required',
            // 'ten_phieuxuatkho' => 'required|max:190',
            'tongso_sanpham' => 'required|numeric|digits_between:1,11',
            'tonggia' => 'required|numeric|digits_between:1,11',
        ),
            array(
                // 'id_admin.required' => 'bạn chưa nhập Admin',
                'id_khachhang.required' => 'bạn chưa nhập Khách hàng',
                // 'ten_phieuxuatkho.required' => 'bạn chưa nhập tên phiếu xuất kho',
                // 'ten_phieuxuatkho.max' => 'tên phiếu xuất kho quá ký tự qui định',
                'tongso_sanpham.required' => 'bạn chưa nhập số lượng',
                'tongso_sanpham.numeric' => 'số lượng phải là số',
                'tongso_sanpham.digits_between' => 'số lượng sai cấu trúc',
                // 'tongsoluong.regex' => 'số lượng phải lớn hơn 0',
                'tonggia.required' => 'bạn chưa nhập tổng tiền',
                'tonggia.numeric' => 'tổng giá phải là số',
                'tonggia.digits_between' => 'tổng giá sai cấu trúc',
            )
        );
        $datetime = Carbon::now();
        $khach = User::where('id',$request->id_khachhang)->first();
        $data = new PhieuXuatKho($request->input());
        $data->id_admin = Auth::guard('admin')->user()->id;
        $data->ten_phieuxuatkho = 'Phiếu xuất hàng cho ' . $khach->name . ' ngày ' . $datetime;
        $data->save();
        $request->session()->flash('success', 'Thành công');
        return redirect()->back();
        
    }
    public function createnewoldorder($id){
        $data = PhieuXuatKho::findOrFail($id);
        return view('admin.manager.phieuxuatkho.createnewoldorder',compact('data'));
    }
    public function storenewoldorder(Request $request, $id){
        $phieuxuatkho = PhieuXuatKho::findOrFail($id);
        foreach($phieuxuatkho->phieuxuatkhochitiet as $pxkchitiet){
            if(isset($pxkchitiet->donhangno)){
                Cart::add(array('id' => $pxkchitiet->id, 'name' => $pxkchitiet->tonkho->sanpham->ten_sanpham, 'qty' => $pxkchitiet->donhangno->soluong_no, 'price' => $pxkchitiet->dongia,'options' => array('img' => $pxkchitiet->tonkho->sanpham->image, 'donvitinh'=> $pxkchitiet->tonkho->sanpham->donvitinh)));
            }
            else{
            }
        }
        $cart = Cart::content();
        $total = Cart::total();
        $datetime = Carbon::now();
        $data = new PhieuXuatKho($request->input());
        $data->id_admin = Auth::guard('admin')->user()->id;
        $data->id_khachhang = $phieuxuatkho->khachhang->id;
        $data->ten_phieuxuatkho = 'Phiếu xuất hàng còn nợ của đơn hàng '.$phieuxuatkho->id.' cho ' . $phieuxuatkho->khachhang->name . ' ngày ' . $datetime;
        $data->tonggia = intval(str_replace(',', '', $total));
        $data->tongso_sanpham = count($cart);
        $data->save();
        $id_phieuxuatkho = $data->id;
        foreach($cart as $cartss){
            Cart::remove($cartss->rowId);
        }
        foreach($phieuxuatkho->phieuxuatkhochitiet as $v ){
            if(count($v->donhangno) > 0){
            $no = DonHangNo::where('id_phieu_xuat_kho_chi_tiet',$v->id)->first();
            $tonkho1 = TonKho::findOrFail($v->tonkho->id);
                
                if($no->phieuxuatkhochitiet->tonkho->soluong >= $no->soluong_no){
                    $pxkctts = array(
                        'id_phieuxuatkho' => $id_phieuxuatkho,
                        'id_tonkho' => $v->tonkho->id,
                        'soluong' => $no->soluong_no,
                        'dongia' => $v->dongia,
                        'thue' => $v->thue,
                    );
                    $tonkho = array(
                       'soluong' => $no->phieuxuatkhochitiet->tonkho->soluong - $no->soluong_no,
                    );
                DonHangNo::find($no->id)->delete();
                }
                elseif($no->phieuxuatkhochitiet->tonkho->soluong > 0){
                    $pxkctts = array(
                        'id_phieuxuatkho' => $id_phieuxuatkho,
                        'id_tonkho' => $v->tonkho->id,
                        'soluong' => $no->phieuxuatkhochitiet->tonkho->soluong,
                        'dongia' => $v->dongia,
                        'thue' => $v->thue,
                    );
                    $tonkho = array(
                        'soluong' => 0,
                    );
                    $donno = array(
                        'soluong_no' => $no->soluong_no - $no->phieuxuatkhochitiet->tonkho->soluong,
                   );
                    $no->update($donno);
                }
                $no->phieuxuatkhochitiet->tonkho->update($tonkho);
                PhieuXuatKhoChiTiet::create($pxkctts);
            }
            
        }
        $request->session()->flash('success', 'Thành công');
        return redirect()->route('phieuxuatkho.show',$id);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = PhieuXuatKho::findOrFail($id);
        return view('admin.manager.phieuxuatkho.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::pluck('name','id');
        $khachhang = User::pluck('name','id');
        $data = PhieuXuatKho::findOrFail($id);
        return view('admin.manager.phieuxuatkho.edit', compact('admin','khachhang','data'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            // 'id_admin' => 'required',
            // 'id_khachhang' => 'required',
            // 'ten_phieuxuatkho' => 'required|max:190',
            // 'tongso_sanpham' => 'required|numeric|digits_between:1,11',
            // 'tonggia' => 'required|numeric|digits_between:1,11',
            'soluong.*' => 'required|numeric|digits_between:1,11',
        ),
            array(
                // 'id_admin.required' => 'bạn chưa nhập Admin',
                // 'id_khachhang.required' => 'bạn chưa nhập Khách hàng',
                // 'ten_phieuxuatkho.required' => 'bạn chưa nhập tên phiếu xuất kho',
                // 'ten_phieuxuatkho.max' => 'tên phiếu xuất kho quá ký tự qui định',
                // 'tongso_sanpham.required' => 'bạn chưa nhập số lượng',
                // 'tongso_sanpham.numeric' => 'số lượng phải là số',
                // 'tongso_sanpham.digits_between' => 'số lượng  cấu trúc',
                // 'tongsoluong.regex' => 'số lượng phải lớn hơn 0',
                // 'tonggia.required' => 'bạn chưa nhập tổng tiền',
                // 'tonggia.numeric' => 'tổng giá phải là số',
                // 'tonggia.digits_between' => 'tổng giá sai cấu trúc',
                'soluong.*.required' => 'bạn chưa nhập số lượng',
                'soluong.*.numeric' => 'số lượng phải là số',
                'soluong.*.digits_between' => 'số lượng sai cấu trúc',
            )
        );
        $datetime = Carbon::now();
        $data = PhieuXuatKho::findOrFail($id);
        $khach = User::where('id',$data->id_khachhang)->first();
        $data->id_admin = Auth::guard('admin')->user()->id;
        // $data->id_khachhang = $khach->id;
        $data->ten_phieuxuatkho = 'Phiếu xuất hàng cho ' . $khach->name . ' ngày ' . $datetime;
        // $id_phieuxuat = $data->id;
        // if($id_phieuxuat !=0){
            // if($data->phieunhapchitiet->count() > 0){
                $count = 0;
                foreach($data->phieuxuatkhochitiet as $key => $v){
                    $pxkcttt = array(
                        'soluong' => $request->soluong[$key],
                    );
                    $pxkct = array(
                        'soluong' => $v->soluong,
                    );
                    $pxkct1 = PhieuXuatKhoChiTiet::find($v->id);
                    $ton = TonKho::where('id',$v->id_tonkho)->first();
                    //so luong nhap < so luong them
                    if(count($pxkct1->donhangno) >0){
                        $dhn1 = DonHangNo::where('id',$v->donhangno->id)->first();
                        if($pxkcttt['soluong'] < $pxkct['soluong']){
                            $nolai = array(
                                // 'id_phieu_xuat_kho_chi_tiet' =>$v->id,
                                'soluong_no' =>$dhn1->soluong_no + ($v->soluong - $request->soluong[$key]),
                            );
                            $capnhatton = array(
                                'soluong' => $ton->soluong + ($v->soluong - $request->soluong[$key]),
                            );
                            $dhn1->update($nolai);
                            $ton->update($capnhatton);

                            PhieuXuatKhoChiTiet::find($v->id)->update($pxkcttt);
                        }
                        //so luong nhap == so luong them
                        else if($pxkcttt['soluong'] == $pxkct['soluong']){
                            PhieuXuatKhoChiTiet::find($v->id)->update($pxkcttt);
                        }
                        //so luong nhap > so luong them
                        else{
                            if($ton->soluong >= ($pxkcttt['soluong'] - $pxkct['soluong'])){
                                $capnhatton2 = array(
                                    'soluong' => $ton->soluong - ($request->soluong[$key] - $v->soluong),
                                );
                                $ton->update($capnhatton2);
                                PhieuXuatKhoChiTiet::find($v->id)->update($pxkcttt);
                            }
                            else {
                                $capnhatton3 = array(
                                    'soluong' => 0,
                                );
                                $pxkcttt1 = array(
                                    'soluong' => $v->soluong + $ton->soluong,
                                );
                                $nolai1 = array(
                                    // 'id_phieu_xuat_kho_chi_tiet' =>$v->id,
                                    'soluong_no' =>$dhn1->soluong_no + ($request->soluong[$key] - ($ton->soluong + $v->soluong)),
                                );
                                PhieuXuatKhoChiTiet::find($v->id)->update($pxkcttt1);
                                $dhn1->update($nolai1);
                                $ton->update($capnhatton3);
                            }
                        }
                    }
                    //khong co don hang no
                    else{
                        if($pxkcttt['soluong'] < $pxkct['soluong']){
                            $nolai2 = array(
                                'id_phieu_xuat_kho_chi_tiet' =>$v->id,
                                'soluong_no' =>$v->soluong - $request->soluong[$key],
                            );
                            $capnhatton = array(
                                'soluong' => $ton->soluong + ($v->soluong - $request->soluong[$key]),
                            );
                            DonHangNo::create($nolai2);
                            $ton->update($capnhatton);
                            PhieuXuatKhoChiTiet::find($v->id)->update($pxkcttt);
                        }
                        //so luong nhap == so luong them
                        else if($pxkcttt['soluong'] == $pxkct['soluong']){
                            PhieuXuatKhoChiTiet::find($v->id)->update($pxkcttt);
                        }
                        //so luong nhap > so luong them
                        else{
                            if($ton->soluong >= ($pxkcttt['soluong'] - $pxkct['soluong'])){
                                $capnhatton2 = array(
                                    'soluong' => $ton->soluong - ($request->soluong[$key] - $v->soluong),
                                );
                                $ton->update($capnhatton2);
                                PhieuXuatKhoChiTiet::find($v->id)->update($pxkcttt);
                            }
                            else {
                                $capnhatton3 = array(
                                    'soluong' => 0,
                                );
                                $pxkcttt1 = array(
                                    'soluong' => $v->soluong + $ton->soluong,
                                );
                                $nolai1 = array(
                                    'id_phieu_xuat_kho_chi_tiet' =>$v->id,
                                    'soluong_no' =>$request->soluong[$key] - ($ton->soluong + $v->soluong),
                                );
                                PhieuXuatKhoChiTiet::find($v->id)->update($pxkcttt1);
                                DonHangNo::create($nolai1);
                                $ton->update($capnhatton3);
                            }
                        }
                    }
                    $count += $v->dongia * $v->soluong + $v->thue;
                }
        $data->tonggia = $count;
        $data->update();
            // }
        // }
        $request->session()->flash('success', 'thành công');
        return redirect()->route('phieuxuatkho.show',$id);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PhieuXuatKho::findOrFail($id)->delete();
        Session::flash('success','Thành Công');
        return redirect()->back();
    }
    public function print($id){
        $data = PhieuXuatKho::findOrFail($id);
        return view('admin.manager.phieuxuatkho.print',compact('data'));
    }
}
