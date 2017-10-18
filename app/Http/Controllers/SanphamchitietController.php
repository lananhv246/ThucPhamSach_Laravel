<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\SanPhamChiTiet;
use Session;

class SanphamchitietController extends Controller
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
        $sanpham = SanPham::all();
        $data = SanPhamChiTiet::orderBy('id','ASC')->paginate(10);
        return view('admin.manager.sanphamchitiet.index', compact('sanpham','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sanpham = SanPham::pluck('ten_sanpham','id');
        return view('admin.manager.sanphamchitiet.create', compact('sanpham'));
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
            'id_sanpham' => 'required|unique:san_pham_chi_tiets,id_sanpham',
            'mieuta' => 'required',
            'danhgia' => 'required',
            'chebien' => 'required',
            'thanhphan' => 'required',
        ),
            array(
                'id_sanpham.required' => 'bạn chưa nhập sản phẩm',
                'id_sanpham.unique' =>'Sản phẩm đả tồn tại',
                'mieuta.required' => 'bạn chưa nhập miêu tả',
                'danhgia.required' => 'bạn chưa nhập đánh giá',
                'chebien.required' => 'bạn chưa nhập chế biến',
                'thanhphan.required' => 'bạn chưa nhập thành phần',
            ));

        SanPhamChiTiet::create($request->all());
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
        $data = SanPhamChiTiet::findOrFail($id);
        return view('admin.manager.sanphamchitiet.show', compact('data'));
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
        $data = SanPhamChiTiet::findOrFail($id);
        return view('admin.manager.sanphamchitiet.edit', compact('sanpham','data'));
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
            'id_sanpham' => 'required|unique:san_pham_chi_tiets,id_sanpham',
            'mieuta' => 'required',
            'danhgia' => 'required',
            'chebien' => 'required',
            'thanhphan' => 'required',
        ),
            array(
                'id_sanpham.required' => 'bạn chưa nhập sản phẩm',
                'mieuta.required' => 'bạn chưa nhập miêu tả',
                'danhgia.required' => 'bạn chưa nhập đánh giá',
                'chebien.required' => 'bạn chưa nhập chế biến',
                'thanhphan.required' => 'bạn chưa nhập thành phần',
            ));
        SanPhamChiTiet::findOrFail($id)->update($request->all());
        Session::flash('success','Thành Công');
        return redirect()->route('sanphamchitiet.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SanPhamChiTiet::findOrFail($id)->delete();
        Session::flash('success','Thành Công');
        return redirect()->back();
    }
}