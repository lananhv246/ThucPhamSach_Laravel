<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DiaChiKH;
use Session;

class DiachikhachhangController extends Controller
{
//    public function __construct() {
//        $this->middleware('auth:admin',['except' => 'logout']);
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $khachhang = User::all();
        $data = DiaChiKH::orderBy('id','ASC')->paginate(10);
        return view('admin.manager.diachikhachhang.index',compact('khachhang','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $khachhang = User::pluck('name','id');
        return view('admin.manager.diachikhachhang.create',compact('khachhang'));
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
            'id_khachhang' => 'required|unique:diachi_khachhang,id_khachhang',
            'diachi' => 'required',
            'dienthoai' => array('required', 'regex:/^(01[2689]|09)[0-9]{8}$/')
        ),
            array(
                'id_khachhang.required' => 'bạn chưa nhập Khách Hàng',
                'id_khachhang.unique' => 'Khách Hàng Đả Tồn Tại',
                'diachi.required' => 'bạn chưa nhập Địa Chỉ',
                'dienthoai.required' => 'bạn chưa nhập Số Điện Thoại',
                'dienthoai.regex' => 'Số Điện Thoại chưa chính xác hoặt chưa hổ trợ',
            ));
        DiaChiKH::create($request->all());
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
        $khachhang = User::all();
        $data = DiaChiKH::findOrFail($id);
        return view('admin.manager.diachikhachhang.show',compact('khachhang','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $khachhang = User::pluck('name','id');
        $data = DiaChiKH::findOrFail($id);
        return view('admin.manager.diachikhachhang.edit',compact('khachhang','data'));
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
            'diachi' => 'required',
            'dienthoai' => array('required', 'regex:/^(01[2689]|09)[0-9]{8}$/')
        ),
            array(
                'diachi.required' => 'bạn chưa nhập Địa Chỉ',
                'dienthoai.required' => 'bạn chưa nhập Số Điện Thoại',
                'dienthoai.regex' => 'Số Điện Thoại chưa chính xác hoặt chưa hổ trợ',
            ));
        DiaChiKH::findOrFail($id)->update($request->all());
        Session::flash('success','Thành Công');
        return redirect()->route('diachikh.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DiaChiKH::findOrFail($id)->delete();
        Session::flash('success','Thành Công');
        return redirect()->back();
    }
}
