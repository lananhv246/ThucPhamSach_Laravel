<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DanhMucLoai;
use App\LoaiSanPham;
use Session;

class LoaisanphamController extends Controller
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
        $data = LoaiSanPham::orderBy('id','ASC')->paginate(10);
        return view('admin.manager.loaisanpham.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $danhmuc = DanhMucLoai::pluck('ten_danhmuc','id');
        return view('admin.manager.loaisanpham.create', compact('danhmuc'));
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
            'id_danhmuc' => 'required',
            'ten_loai' => 'required|unique:loai_san_phams,ten_loai',
        ),
            array(
                'id_danhmuc.required' => 'bạn chưa nhập danh mục',
                'ten_loai.required' => 'bạn chưa nhập Tên Loại',
                'ten_loai.unique' => 'Tên Loại Đả Tồn Tại',
            ));
        LoaiSanPham::create($request->all());
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
        $danhmuc = DanhMucLoai::all();
        $data = LoaiSanPham::findOrFail($id);
        return view('admin.manager.loaisanpham.show', compact('danhmuc','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $danhmuc = DanhMucLoai::pluck('ten_danhmuc','id');
        $data = LoaiSanPham::findOrFail($id);
        return view('admin.manager.loaisanpham.edit', compact('danhmuc','data'));
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
            'id_danhmuc' => 'required',
            'ten_loai' => 'required|unique:loai_san_phams,ten_loai',
        ),
            array(
                'id_danhmuc.required' => 'bạn chưa nhập danh mục',
                'ten_loai.required' => 'bạn chưa nhập Tên Loại',
                'ten_loai.unique' => 'Tên Loại Đả Tồn Tại',
            ));
        LoaiSanPham::findOrFail($id)->update($request->all());
        Session::flash('success','Thành Công');
        return redirect()->route('loaisanpham.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LoaiSanPham::findOrFail($id)->delete();
        Session::flash('success','Thành Công');
        return redirect()->back();
    }
}