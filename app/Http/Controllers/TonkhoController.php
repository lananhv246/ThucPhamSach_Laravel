<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\TonKho;
use Session;
use Illuminate\Support\Facades\Input;

class TonkhoController extends Controller
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
        $data = TonKho::orderBy('id','ASC')->paginate(12);
        return view('admin.manager.tonkho.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sanpham = SanPham::pluck('ten_sanpham','id');
        return view('admin.manager.tonkho.create', compact('sanpham'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'id_sanpham' => 'required|unique:tonkhos,id_sanpham',
            'soluong' => 'required|numeric|digits_between:1,11',
        ),
        array(
            'id_sanpham.required' => 'bạn chưa nhập Sản Phẩm',
            'id_sanpham.unique' => 'Sản Phẩm đả tồn tại',
            'soluong.required' => 'bạn chưa nhập số lượng',
            'soluong.numeric' => 'Số lượng phải là số',
            'soluong.digits_between' => 'số lượng quá ký tự qui định',
            
        ));
        TonKho::create($request->all());
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
        $data = TonKho::findOrFail($id);
        return view('admin.manager.tonkho.show',compact('sanpham','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $sanpham = SanPham::pluck('ten_sanpham','id');
        $data = TonKho::findOrFail($id);
        return view('admin.manager.tonkho.edit', compact('sanpham','data'));
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
        $this->validate($request, array(
            'id_sanpham' => 'required',
            'soluong' => 'required|numeric|digits_between:1,11',
        ),
        array(
            'id_sanpham.required' => 'bạn chưa nhập Sản Phẩm',
            'soluong.required' => 'bạn chưa nhập số lượng',
            'soluong.numeric' => 'Số lượng phải là số',
            'soluong.digits_between' => 'số lượng quá ký tự qui định',
            
        ));
        TonKho::findOrFail($id)->update($request->all());
        Session::flash('success','Thành Công');
        return redirect()->route('tonkho.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TonKho::findOrFail($id)->delete();
        Session::flash('success','Thành Công');
        return redirect()->back();
    }
}
