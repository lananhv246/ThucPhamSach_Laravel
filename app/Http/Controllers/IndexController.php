<?php

namespace App\Http\Controllers;

use App\LoaiSanPham;
use Illuminate\Http\Request;
use App\SanPham;
use App\PhieuNhapChiTiet;
use App\DanhMucLoai;
use App\PhieuNhap;
use App\User;
use App\SanPhamChiTiet;
use Cart;
use Auth;
use App\DiaChiKH;

class IndexController extends Controller
{
    public function index(){
        $danhmuc = DanhMucLoai::orderBy('id','ASC')->with('loaisanpham');
        $dm = DanhMucLoai::pluck('ten_danhmuc','id');
        $sanphamnew = SanPham::orderBy('id','DESC')->paginate(12);
        $search = SanPham::all();
        $sanpham = DanhMucLoai::find(1);
        $sanpham2 = DanhMucLoai::find(2);
        return view('layouts.fontend-layouts.index', compact('sanphamnew','danhmuc','topnew','topsale','dm', 'sanpham', 'sanpham2','search'));
    }
    public function product_full(){
        $product_full = SanPham::all();
        return view('layouts.fontend-layouts.product-full', compact('product_full'));
    }
    public function product_detail($id){
        $danhmuc = DanhMucLoai::all();
        $data = SanPham::find($id);
        return view('layouts.fontend-layouts.detail',compact('data','danhmuc'));
      
    }
    public function danhmucsanpham($id){
        $data = DanhMucLoai::find($id);
        return view('layouts.fontend-layouts.category-full',compact('data'));
    }
    public function loaisanpham($id)
    {
        $danhmuc = DanhMucLoai::all();
        $loaisanpham = LoaiSanPham::find($id);
        return view('layouts.fontend-layouts.category',compact('loaisanpham','danhmuc'));
    }
    public function choose_danhmuc(Request $request){
        if($request->ajax()){
            $data = LoaiSanPham::where('id_danhmuc',$request->id_danhmuc)->get();
            return response()->json($data);
        }
    }
    public function search(Request $request)
    {
        $search = SanPham::search($request->search)->get();
        return view('layouts.fontend-layouts.timsanpham', compact('search'));
    }
    public function getsearch(Request $request)
    {
        $search = SanPham::search($request->search)->get();
        return view('layouts.fontend-layouts.timsanpham', compact('search'));
    }
    public function checkout1(){
        $cart = Cart::content();
        $data = Auth::user();
        $thongtin = DiaChiKH::where('id_khachhang',$data->id)->first();
         return view('layouts.fontend-layouts.checkout1',compact('data','cart','thongtin'));
    }
    public function checkout2(){
        $cart = Cart::content();
        $data = Auth::user();
        $thongtin = DiaChiKH::where('id_khachhang',$data->id)->first();
         return view('layouts.fontend-layouts.checkout4',compact('data','cart','thongtin'));
    }

    public function gioithieu()
    {
        return view('layouts.fontend-layouts.info');
    }
    public function tintuc()
    {
        return view('layouts.fontend-layouts.blog');
    }
    public function lienhe()
    {
        return view('layouts.fontend-layouts.contact');
    }

}
