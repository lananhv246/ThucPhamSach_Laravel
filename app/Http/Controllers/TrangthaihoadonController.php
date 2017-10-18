<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrangThaiDonHang;
use Session;

class TrangthaihoadonController extends Controller
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
        $data = TrangThaiDonHang::orderBy('id','ASC')->paginate(10);
        return view('admin.manager.trangthaihoadon.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manager.trangthaihoadon.create');
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
            'ten_trangthai' => 'required|unique:trang_thai_don_hangs,ten_trangthai',
        ),
            array(
                'ten_trangthai.required' => 'bạn chưa nhập Tên trạng thái',
                'ten_trangthai.unique' => 'Tên trạng thái Đả Tồn Tại',
            ));
        TrangThaiDonHang::create($request->all());
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
        $data = TrangThaiDonHang::findOrFail($id);
        return view('admin.manager.trangthaihoadon.show', compact('data'));
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = TrangThaiDonHang::findOrFail($id);
        return view('admin.manager.trangthaihoadon.edit', compact('data'));
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
            'ten_trangthai' => 'required|unique:trang_thai_don_hangs,ten_trangthai',
        ),
            array(
                'ten_trangthai.required' => 'bạn chưa nhập Tên trạng thái',
                'ten_trangthai.unique' => 'Tên trạng thái Đả Tồn Tại',
            ));
        TrangThaiDonHang::findOrFail($id)->update($request->all());
        Session::flash('success','Thành Công');
        return redirect()->route('trangthaihoadon.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TrangThaiDonHang::findOrFail($id)->delete();
        Session::flash('success','Thành Công');
        return redirect()->back();
    }
}