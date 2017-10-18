<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhoHang;
use Session;

class KhoHangController extends Controller
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
        $data = KhoHang::orderBy('id','ASC')->paginate(10);
        return view('admin.manager.khohang.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manager.khohang.create');
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
            'ten_kho' => 'required|unique:danh_muc_loais,ten_danhmuc',
        ),
            array(
                'ten_kho.required' => 'bạn chưa nhập Tên Kho',
                'ten_kho.unique' => 'Tên Kho Đả Tồn Tại',
            ));
        KhoHang::create($request->all());
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
        $data = KhoHang::findOrFail($id);
        return view('admin.manager.khohang.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = KhoHang::findOrFail($id);
        return view('admin.manager.khohang.edit', compact('data'));
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
            'ten_kho' => 'required|unique:danh_muc_loais,ten_danhmuc',
        ),
            array(
                'ten_kho.required' => 'bạn chưa nhập Tên Kho',
                'ten_kho.unique' => 'Tên Kho Đả Tồn Tại',
            ));
        KhoHang::findOrFail($id)->update($request->all());
        Session::flash('success','Thành Công');
        return redirect()->route('khohang.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KhoHang::findOrFail($id)->delete();
        Session::flash('success','Thành Công');
        return redirect()->back();
    }
}