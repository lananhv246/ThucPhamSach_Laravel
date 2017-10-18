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

class IndexController extends Controller
{
    public function index(){
        $topnew = SanPham::orderBy('id','DESC')->take(10)->get();
        $topsave = SanPham::where('giamgia','>',0)->take(10)->get();
        $danhmuc = DanhMucLoai::orderBy('id','ASC')->with('loaisanpham');
        $dm = DanhMucLoai::pluck('ten_danhmuc','id');
        $data = SanPham::orderBy('id','DESC')->with('phieunhapchitiet')->paginate(12);
        $search = SanPham::all();
        $sanpham = DanhMucLoai::find(1);
        $sanpham2 = DanhMucLoai::find(2);
        return view('layouts.main.index', compact('data','danhmuc','topnew','topsave','dm', 'sanpham', 'sanpham2','search'));
    }
    public function product_detail($id){
        $data = SanPhamChiTiet::where('id_sanpham',$id)->first();
        return view('layouts.main.sanpham.sanphamchitiet',compact('data'));
      
    }
    public function loc_sanpham($id){
        $data = DanhMucLoai::find($id);
        return view('layouts.main.sanpham.loc_sanpham',compact('data'));
    }
    public function loc_loaisp($id)
    {
        $data = LoaiSanPham::find($id);
        return view('layouts.main.sanpham.loc_loaisp',compact('data'));
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
        return view('layouts.main.search.search', compact('search'));
    }

}
