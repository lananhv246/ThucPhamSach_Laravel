<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\HoaDon;
use App\HoaDonChiTiet;
use Session;

class HoadonchitietController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = HoaDonChiTiet::orderBy('id','ASC')->paginate(10);
        return view('admin.manager.hoadonchitiet.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sanpham = SanPham::pluck('ten_sanpham','id');
        $hoadon = HoaDon::pluck('ten_hoadon','id');
        return view('admin.manager.hoadonchitiet.create', compact('sanpham','hoadon'));
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
            'id_hoadon' => 'required',
            'id_sanpham' => 'required',
            'soluong' => 'required|numeric|digits_between:1,11',
            'dongia' => 'required|numeric|digits_between:1,11',
            'donvitien'=>'required',
            'donvitinh'=>'required',
        ),
            array(
                'id_hoadon.required' => 'bạn chưa nhập hóa đơn',
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
        HoaDonChiTiet::create($request->all());
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
        $hoadon = HoaDon::all();
        $data = HoaDonChiTiet::findOrFail($id);
        return view('admin.manager.hoadonchitiet.show', compact('sanpham','hoadon','data'));
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
        $hoadon = HoaDon::pluck('ten_hoadon','id');
        $data = HoaDonChiTiet::findOrFail($id);
        return view('admin.manager.hoadonchitiet.edit', compact('sanpham','hoadon','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {//validate
        $this->validate($request, array(
            //chua nhap|doc nhat
            'id_hoadon' => 'required',
            'id_sanpham' => 'required',
            'soluong' => 'required|numeric|max:11',
            'dongia' => 'required|numeric|max:11',
        ),
            array(
                'id_hoadon.required' => 'bạn chưa nhập Hóa Đơn',
                'id_sanpham.required' => 'bạn chưa nhập Sản Phẩm',
                'soluong.required' => 'bạn chưa nhập số lượng',
                'soluong.numeric' => 'Số lượng phải là số',
                'soluong.max' => 'quá ký tự qui định',
                'dongia.required' => 'bạn chưa nhập đơn giá',
                'dongia.numeric' => 'đơn giá phải là số',
                'dongia.max' => 'quá ký tự qui định',
            ));
        HoaDonChiTiet::findOrFail($id)->update($request->all());
        Session::flash('success','Thành Công');
        return redirect()->route('hoadonchitiet.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HoaDonChiTiet::findOrFail($id)->delete();
        Session::flash('success','Thành Công');
        return redirect()->back();
    }
}
