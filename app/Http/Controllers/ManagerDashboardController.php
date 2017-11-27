<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Admin;
use App\HoaDon;
use App\PhieuXuatKho;
use App\PhieuXuatKhoChiTiet;
use App\User;
use Carbon\Carbon;
use App\PhieuNhap;
use App\TonKho;
use App\SanPham;

class ManagerDashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin',['except' => 'logout']);
    }
    public function index(){
        $hoadon = HoaDon::all();
        $phieuxuatkho = PhieuXuatKho::all()->where('id_admin', '!=', null);
        $phieuxuatkhochitiet = PhieuXuatKhoChiTiet::all();
        $khachhang = User::all();
        $carbon = Carbon::now()->format('m');
        $date_phieunhap = PhieuNhap::whereMonth('updated_at', '=', $carbon)->get();
        $date_phieunhap1 = PhieuNhap::select('id')->whereMonth('updated_at', '=', $carbon)->get();
        $sanpham = SanPham::all();
        $date_sanpham1 = SanPham::select('id')->whereMonth('updated_at', '=', $carbon)->get();
        $date_hoadon = HoaDon::whereMonth('updated_at', '=', $carbon)->get();
        $date_phieuxuatkho = PhieuXuatKho::whereMonth('updated_at', '=', $carbon)->where('id_admin', '!=', null)->get();
        $date_phieuxuatkho1 = PhieuXuatKho::select('tonggia', 'id_admin')->whereMonth('updated_at', '=', $carbon)->where('id_admin', '!=', null)->get();
        $date_khachhang = User::whereMonth('updated_at', '=', $carbon)->get();
        return view('admin.home', compact('hoadon','phieuxuatkho','khachhang','date_hoadon','sanpham','date_sanpham1','date_phieuxuatkho1','date_phieuxuatkho','date_phieunhap','date_phieunhap1','date_khachhang'));
    }
}
