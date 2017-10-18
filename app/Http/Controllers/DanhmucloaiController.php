<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DanhMucLoai;
use Session;

class DanhmucloaiController extends Controller
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
        $data = DanhMucLoai::orderBy('id','ASC')->paginate(10);
        return view('admin.manager.danhmucloai.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manager.danhmucloai.create');
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
            'ten_danhmuc' => 'required|unique:danh_muc_loais,ten_danhmuc',
        ),
            array(
                'ten_danhmuc.required' => 'bạn chưa nhập Tên Danh Mục',
                'ten_danhmuc.unique' => 'Tên Danh Mục Đả Tồn Tại',
            ));
        DanhMucLoai::create($request->all());
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
        $data = DanhMucLoai::findOrFail($id);
        return view('admin.manager.danhmucloai.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DanhMucLoai::findOrFail($id);
        return view('admin.manager.danhmucloai.edit',compact('data'));
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
            'ten_danhmuc' => 'required|unique:danh_muc_loais,ten_danhmuc',
        ),
            array(
                'ten_danhmuc.required' => 'bạn chưa nhập Tên Danh Mục',
                'ten_danhmuc.unique' => 'Tên Danh Mục Đả Tồn Tại',
            ));
        DanhMucLoai::findOrFail($id)->update($request->all());
        Session::flash('success','Thành Công');
        return redirect()->route('danhmucloai.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DanhMucLoai::findOrFail($id)->delete();
        Session::flash('success','Thành Công');
        return redirect()->back();
    }
}
