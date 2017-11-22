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
        $date_phieunhap = PhieuNhap::whereMonth('created_at', '=', $carbon)->get();
        $date_phieunhap1 = PhieuNhap::select('id')->whereMonth('created_at', '=', $carbon)->get();
        $date_hoadon = HoaDon::whereMonth('created_at', '=', $carbon)->get();
        $date_phieuxuatkho = PhieuXuatKho::whereMonth('created_at', '=', $carbon)->where('id_admin', '!=', null)->get();
        $date_phieuxuatkho1 = PhieuXuatKho::select('tonggia', 'id_admin')->whereMonth('created_at', '=', $carbon)->where('id_admin', '!=', null)->get();
        $date_khachhang = User::whereMonth('created_at', '=', $carbon)->get();
        return view('admin.home', compact('hoadon','phieuxuatkho','khachhang','date_hoadon','date_phieuxuatkho1','date_phieuxuatkho','date_phieunhap','date_phieunhap1','date_khachhang'));
    }
}
