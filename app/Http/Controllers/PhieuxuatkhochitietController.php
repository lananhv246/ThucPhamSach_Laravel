<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TonKho;
use App\PhieuXuatKho;
use App\PhieuXuatKhoChiTiet;
use Session;

class PhieuxuatkhochitietController extends Controller
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
        $data = PhieuXuatKhoChiTiet::orderBy('id','ASC')->paginate(10);
        return view('admin.manager.phieuxuatkhochitiet.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tonkho = TonKho::pluck('id_sanpham','id');
        $phieuxuatkho = PhieuXuatKho::pluck('ten_phieuxuatkho','id');
        return view('admin.manager.phieuxuatkhochitiet.create',compact('tonkho','phieuxuatkho'));
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
            'id_tonkho' => 'required',
            'id_phieuxuatkho' => 'required',
            'soluong' => 'required|numeric|digits_between:1,11',
            'dongia' => 'required|numeric|digits_between:1,11',
            'thue'=>'required|numeric|digits_between:1,11',
        ),
            array(
                'id_tonkho.required' => 'bạn chưa nhập hóa đơn',
                'id_phieuxuatkho.required' => 'bạn chưa nhập Sản Phẩm',
                'soluong.required' => 'bạn chưa nhập số lượng',
                'soluong.numeric' => 'Số lượng phải là số',
                'soluong.digits_between' => 'số lượng quá ký tự qui định',
                'dongia.required' => 'bạn chưa nhập đơn giá',
                'dongia.numeric' => 'đơn giá phải là số',
                'dongia.digits_between' => 'đơn giá quá ký tự qui định',
                'thue.required' => 'bạn chưa nhập thuế',
                'thue.numeric' => 'thuế phải là số',
                'thue.digits_between' => 'thuế quá ký tự qui định',
            ));
        PhieuXuatKhoChiTiet::create($request->all());
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
        $tonkho = TonKho::all();
        $phieuxuatkho = PhieuXuatKho::all();
        $data = PhieuXuatKhoChiTiet::findOrFail($id);
        return view('admin.manager.phieuxuatkhochitiet.show', compact('tonkho','phieuxuatkho','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tonkho = TonKho::pluck('id_sanpham','id');
        $phieuxuatkho = PhieuXuatKho::pluck('ten_phieuxuatkho','id');
        $data = PhieuXuatKhoChiTiet::findOrFail($id);
        return view('admin.manager.phieuxuatkhochitiet.edit', compact('tonkho','phieuxuatkho','data'));
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
            'id_tonkho' => 'required',
            'id_phieuxuatkho' => 'required',
            'soluong' => 'required|numeric|digits_between:1,11',
            'dongia' => 'required|numeric|digits_between:1,11',
            'thue'=>'required|numeric|digits_between:1,11',
        ),
            array(
                'id_tonkho.required' => 'bạn chưa nhập hóa đơn',
                'id_phieuxuatkho.required' => 'bạn chưa nhập Sản Phẩm',
                'soluong.required' => 'bạn chưa nhập số lượng',
                'soluong.numeric' => 'Số lượng phải là số',
                'soluong.digits_between' => 'số lượng quá ký tự qui định',
                'dongia.required' => 'bạn chưa nhập đơn giá',
                'dongia.numeric' => 'đơn giá phải là số',
                'dongia.digits_between' => 'đơn giá quá ký tự qui định',
                'thue.required' => 'bạn chưa nhập thuế',
                'thue.numeric' => 'thuế phải là số',
                'thue.digits_between' => 'thuế quá ký tự qui định',
            ));
        PhieuXuatKhoChiTiet::findOrFail($id)->update($request->all());
        Session::flash('success','Thành Công');
        return redirect()->route('phieuxuatkhochitiet.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PhieuXuatKhoChiTiet::findOrFail($id)->delete();
        Session::flash('success','Thành Công');
        return redirect()->back();
    }
}
