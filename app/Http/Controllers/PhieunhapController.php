<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TonKho;
use App\TramTrungChuyen;
use App\Admin;
use App\PhieuNhap;
use Session;
use Auth;
use App\SanPham;
use App\PhieuNhapChiTiet;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class PhieunhapController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin',['except' => 'logout']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PhieuNhap::orderBy('id','ASC')->paginate(10);
        return view('admin.manager.phieunhap.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tramtc = TramTrungChuyen::pluck('ten_tram','id');
        $sanpham = SanPham::pluck('ten_sanpham','id');
        return view('admin.manager.phieunhap.create', compact('sanpham','tramtc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $this->validate($request, array(
            //chua nhap|doc nhat
            //phieu nhap
            'id_tram' => 'required',
            // 'id_admin' => 'required',
            // 'ten_phieunhap' => 'required|max:190',
            //phieu nhap chi tiet
            'id_phieunhap.*' => 'required',
            'id_sanpham.*' => 'required',
            'soluong.*' => 'required|numeric|digits_between:1,11',
            'dongia.*' => 'required|numeric|digits_between:1,11',
            'donvitien.*'=>'required',
            'donvitinh.*'=>'required',
        ),
            array(
                //pn
                'id_tram.required' => 'bạn chưa nhập Trạm',
                // 'id_admin.required' => 'bạn chưa nhập Admin',
                // 'ten_phieunhap.required' => 'bạn chưa nhập Hóa Đơn',
                'ten_phieunhap.max' => 'phiếu nhập quá ký tự qui định',
                //pnct
                'id_phieunhap.required' => 'bạn chưa nhập phiếu nhập',
                'id_sanpham.required' => 'bạn chưa nhập Sản Phẩm',
                'soluong.required' => 'bạn chưa nhập số lượng',
                'soluong.numeric' => 'Số lượng phải là số',
                'soluong.digits_between' => 'số lượng quá ký tự qui định',
                'dongia.required' => 'bạn chưa nhập đơn giá',
                'dongia.numeric' => 'đơn giá phải là số',
                'dongia.digits_between' => 'đơn giá quá ký tự qui định',
                'donvitien.required' => 'bạn chưa nhập đơn vị tiền',
                'donvitinh.required' => 'bạn chưa nhập đơn vị tính',
            ));
        $tram = TramTrungChuyen::find($request->id_tram);
        $datetime = Carbon::now();
        $data = new PhieuNhap($request->input());
        $data->id_admin = Auth::guard('admin')->user()->id;
        $data->ten_phieunhap = 'Phiếu Nhập từ' . $tram->ten_tram .' ngày '. $datetime;
        $data->save();
        $id_phieunhap = $data->id;
        // echo $id_phieunhap;
        if($id_phieunhap != 0){
            foreach($request->id_sanpham as $key => $value){
                // $sanpham = SanPham::where('id',$value)->first();
                $pnct = array(
                    'id_phieunhap' => $id_phieunhap,
                    'id_sanpham' => $value,
                    'soluong' => $request->soluong[$key],
                    'dongia' => $request->dongia[$key],
                    'donvitien' => $request->donvitien[$key],
                    'donvitinh' => $request->donvitinh[$key],
                    // 'created_at' => $datetime,
                    // 'updated_at' => $datetime,  
                );
                PhieuNhapChiTiet::create($pnct);
                $sanpham = SanPham::find($value);
                $sanpham->giacu = $request->dongia[$key];
                $sanpham->dongia = $request->dongia[$key] - $sanpham->giamgia;
                $sanpham->donvitien = $request->donvitien[$key];
                $sanpham->donvitinh = $request->donvitinh[$key];
                $sanpham->save();
                $tonkho = array(
                    'soluong' => $sanpham->tonkho->soluong + $request->soluong[$key],
                );
                $sanpham->tonkho->update($tonkho);
            }
        }
        Session::flash('success','Thành Công');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tramtc = TramTrungChuyen::all();
        $admin = Admin::all();
        $data = PhieuNhap::findOrFail($id);
        return view('admin.manager.phieunhap.show', compact('tramtc', 'admin', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sanpham = SanPham::pluck('ten_sanpham','id');
        $tramtc = TramTrungChuyen::pluck('ten_tram','id');
        $data = PhieuNhap::findOrFail($id);
        return view('admin.manager.phieunhap.edit', compact('sanpham','tramtc','data'));
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
        //validate
        $this->validate($request, array(
            //chua nhap|doc nhat
            //phieu nhap
            'id_tram' => 'required',
            // 'id_admin' => 'required',
            // 'ten_phieunhap' => 'required|max:190',
            //phieu nhap chi tiet
            'id_phieunhap.*' => 'required',
            'id_sanpham.*' => 'required',
            'soluong.*' => 'required|numeric|digits_between:1,11',
            'dongia.*' => 'required|numeric|digits_between:1,11',
            'donvitien.*'=>'required',
            'donvitinh.*'=>'required',
        ),
            array(
                //pn
                'id_tram.required' => 'bạn chưa nhập Trạm',
                // 'id_admin.required' => 'bạn chưa nhập Admin',
                // 'ten_phieunhap.required' => 'bạn chưa nhập Hóa Đơn',
                'ten_phieunhap.max' => 'phiếu nhập quá ký tự qui định',
                //pnct
                'id_phieunhap.required' => 'bạn chưa nhập phiếu nhập',
                'id_sanpham.required' => 'bạn chưa nhập Sản Phẩm',
                'soluong.required' => 'bạn chưa nhập số lượng',
                'soluong.numeric' => 'Số lượng phải là số',
                'soluong.digits_between' => 'số lượng quá ký tự qui định',
                'dongia.required' => 'bạn chưa nhập đơn giá',
                'dongia.numeric' => 'đơn giá phải là số',
                'dongia.digits_between' => 'đơn giá quá ký tự qui định',
                'donvitien.required' => 'bạn chưa nhập đơn vị tiền',
                'donvitinh.required' => 'bạn chưa nhập đơn vị tính',
            ));
        $data = PhieuNhap::findOrFail($id);
        $tram = TramTrungChuyen::find($request->id_tram);
        $datetime = Carbon::now();
        $data->id_admin = Auth::guard('admin')->user()->id;
        $data->ten_phieunhap = 'Phiếu Nhập từ' . $tram->ten_tram .' ngày '. $datetime;
        $data->update(Input::except('id_admin','ten_phieunhap'));
        $id_phieunhap = $data->id;
    if($id_phieunhap != 0){

        if($data->phieunhapchitiet->count() > 0){
            if(isset($request->id_sanphammoi)){
                foreach($data->phieunhapchitiet as $key => $v){
                    $pnct = array(
                        'id_phieunhap' => $id_phieunhap,
                        'id_sanpham' => $request->id_sanpham[$key],
                        'soluong' => $request->soluong[$key],
                        'dongia' => $request->dongia[$key],
                        'donvitien' => $request->donvitien[$key],
                        'donvitinh' => $request->donvitinh[$key],
                        // 'created_at' => $datetime,
                        // 'updated_at' => $datetime,  
                    );
                    $sanpham = SanPham::find($request->id_sanpham[$key]);
                    $sanpham->giacu = $request->dongia[$key];
                    $sanpham->dongia = $request->dongia[$key] - $sanpham->giamgia;
                    $sanpham->donvitien = $request->donvitien[$key];
                    $sanpham->donvitinh = $request->donvitinh[$key];
                    $sanpham->save();
                    $phieunhapchitiet = PhieuNhapChiTiet::find($v->id);
                    $tonkho = array(
                        'soluong' => $sanpham->tonkho->soluong + $request->soluong[$key] - $phieunhapchitiet->soluong,
                    );
                    $sanpham->tonkho->update($tonkho);
                    PhieuNhapChiTiet::find($v->id)->update($pnct);

                }
                //co the su dung ajax
                //them moi 
                foreach($request->id_sanphammoi as $key => $value){
                    // $sanpham = SanPham::where('id',$value)->first();
                    $pnctmoi = array(
                        'id_phieunhap' => $id_phieunhap,
                        'id_sanpham' => $value,
                        'soluong' => $request->soluongmoi[$key],
                        'dongia' => $request->dongiamoi[$key],
                        'donvitien' => $request->donvitienmoi[$key],
                        'donvitinh' => $request->donvitinhmoi[$key],
                        // 'created_at' => $datetime,
                        // 'updated_at' => $datetime,  
                    );
                    PhieuNhapChiTiet::create($pnctmoi);
                    $sanphammoi = SanPham::find($value);
                    $sanphammoi->giacu = $request->dongiamoi[$key];
                    $sanphammoi->dongia = $request->dongiamoi[$key] - $sanphammoi->giamgia;
                    $sanphammoi->donvitien = $request->donvitienmoi[$key];
                    $sanphammoi->donvitinh = $request->donvitinhmoi[$key];
                    $sanphammoi->save();
                    $tonkhomoi = array(
                            'soluong' => $sanphammoi->tonkho->soluong + $request->soluongmoi[$key],
                        );
                        $sanphammoi->tonkho->update($tonkhomoi);
                    // echo $pnctmoi;
            }
        }
                 else{
                    foreach($data->phieunhapchitiet as $key => $v){
                        // $sanpham = SanPham::where('id',$value)->first();
                        $pnct = array(
                            'id_phieunhap' => $id_phieunhap,
                            'id_sanpham' => $request->id_sanpham[$key],
                            'soluong' => $request->soluong[$key],
                            'dongia' => $request->dongia[$key],
                            'donvitien' => $request->donvitien[$key],
                            'donvitinh' => $request->donvitinh[$key],
                            // 'created_at' => $datetime,
                            // 'updated_at' => $datetime,  
                        );
                        $sanpham = SanPham::find($request->id_sanpham[$key]);
                        $sanpham->giacu = $request->dongia[$key];
                        $sanpham->dongia = $request->dongia[$key] - $sanpham->giamgia;
                        $sanpham->donvitien = $request->donvitien[$key];
                        $sanpham->donvitinh = $request->donvitinh[$key];
                        $sanpham->save();
                        $phieunhapchitiet = PhieuNhapChiTiet::find($v->id);
                        $tonkho = array(
                            'soluong' => $sanpham->tonkho->soluong + $request->soluong[$key] - $phieunhapchitiet->soluong,
                        );
                        $sanpham->tonkho->update($tonkho);
                        PhieuNhapChiTiet::find($v->id)->update($pnct);
                    }
                };
            }
        else{
            //them moi 
                    foreach($request->id_sanphammoi as $key => $value){
                        // $sanpham = SanPham::where('id',$value)->first();
                        $pnctmoi = array(
                            'id_phieunhap' => $id_phieunhap,
                            'id_sanpham' => $value,
                            'soluong' => $request->soluongmoi[$key],
                            'dongia' => $request->dongiamoi[$key],
                            'donvitien' => $request->donvitienmoi[$key],
                            'donvitinh' => $request->donvitinhmoi[$key],
                            // 'created_at' => $datetime,
                            // 'updated_at' => $datetime,  
                        );
                        PhieuNhapChiTiet::create($pnctmoi);
                        $sanphammoi = SanPham::find($value);
                        $sanphammoi->giacu = $request->dongiamoi[$key];
                        $sanphammoi->dongia = $request->dongiamoi[$key] - $sanphammoi->giamgia;
                        $sanphammoi->donvitien = $request->donvitienmoi[$key];
                        $sanphammoi->donvitinh = $request->donvitinhmoi[$key];
                        $sanphammoi->save();
                        $tonkhomoi = array(
                                'soluong' => $sanphammoi->tonkho->soluong + $request->soluongmoi[$key],
                            );
                            $sanphammoi->tonkho->update($tonkhomoi);
                        // echo $pnctmoi;
                    }
            };
        }
        
        Session::flash('success','Thành Công');
        return redirect()->route('phieunhap.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PhieuNhap::findOrFail($id)->delete();
        Session::flash('success','Thành Công');
        return redirect()->back();
    }
}