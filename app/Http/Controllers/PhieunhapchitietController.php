<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhieuNhap;
use App\SanPham;
use App\PhieuNhapChiTiet;
use App\TonKho;
use Session;

class PhieunhapchitietController extends Controller
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
        $data = PhieuNhapChiTiet::orderBy('id','ASC')->paginate(10);
        return view('admin.manager.phieunhapchitiet.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sanpham = SanPham::pluck('ten_sanpham','id');
        $phieunhap = PhieuNhap::pluck('ten_phieunhap','id');
        return view('admin.manager.phieunhapchitiet.create', compact('sanpham','phieunhap'));
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
            'id_phieunhap' => 'required',
            'id_sanpham' => 'required',
            'soluong' => 'required|numeric|digits_between:1,11',
            'dongia' => 'required|numeric|digits_between:1,11',
            'donvitien'=>'required',
            'donvitinh'=>'required',
        ),
            array(
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
        PhieuNhapChiTiet::create($request->all());
        if(TonKho::where('id_sanpham',$request->id_sanpham)->exists()){
            $tonkho = TonKho::where('id_sanpham',$request->id_sanpham)->first();
            $tonkho->id_sanpham = $request->id_sanpham;
            $tonkho->soluong = $tonkho->soluong + $request->soluong;
            $tonkho->save();
        }
        else{
            TonKho::create($request->all());
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
        $sanpham = SanPham::all();
        $phieunhap = PhieuNhap::all();
        $data = PhieuNhapChiTiet::findOrFail($id);
        return view('admin.manager.phieunhapchitiet.show', compact('sanpham','phieunhap','data'));
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
        $phieunhap = PhieuNhap::pluck('ten_phieunhap','id');
        $data = PhieuNhapChiTiet::findOrFail($id);
        return view('admin.manager.phieunhapchitiet.edit', compact('sanpham','phieunhap','data'));
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
            'id_phieunhap' => 'required',
            'id_sanpham' => 'required',
            'soluong' => 'required|numeric|digits_between:1,11',
            'dongia' => 'required|numeric|digits_between:1,11',
            'donvitien'=>'required',
            'donvitinh'=>'required',
        ),
            array(
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
        PhieuNhapChiTiet::findOrFail($id)->update($request->all());
        Session::flash('success','Thành Công');
        return redirect()->route('phieunhapchitiet.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PhieuNhapChiTiet::findOrFail($id)->delete();
        Session::flash('success','Thành Công');
        return redirect()->back();
    }
}