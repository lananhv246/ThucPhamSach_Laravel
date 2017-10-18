<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;
use App\HoaDon;
use App\TrangThaiDonHang;
use Session;

class HoadonController extends Controller
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
        $data = HoaDon::orderBy('id','ASC')->paginate(10);
        return view('admin.manager.hoadon.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $khachhang = User::pluck('name','id');
        return view('admin.manager.hoadon.create', compact('khachhang'));
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
            'id_khachhang' => 'required',
            'ten_hoadon' => 'required|max:190',
        ),
            array(
                'id_khachhang.required' => 'bạn chưa nhập Khách hàng',
                'ten_hoadon.required' => 'bạn chưa nhập Hóa Đơn',
                'ten_hoadon.max' => 'hóa đơn quá ký tự qui định',
            ));
        HoaDon::create($request->all());
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
        $data = HoaDon::findOrFail($id);
        return view('admin.manager.hoadon.show', compact('data'));
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
        $data = HoaDon::findOrFail($id);
        return view('admin.manager.hoadon.edit', compact('khachhang','data'));
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
            'id_khachhang' => 'required',
            'ten_hoadon' => 'required|max:190',
        ),
            array(
                'id_khachhang.required' => 'bạn chưa nhập Khách hàng',
                'ten_hoadon.required' => 'bạn chưa nhập Hóa Đơn',
                'ten_hoadon.max' => 'hóa đơn quá ký tự qui định',
            ));
        HoaDon::findOrFail($id)->update($request->all());
        Session::flash('success','Thành Công');
        return redirect()->route('hoadon.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HoaDon::findOrFail($id)->delete();
        Session::flash('success','Thành Công');
        return redirect()->back();
    }
}