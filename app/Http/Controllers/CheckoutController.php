<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\User;
use App\HoaDon;
use App\HoaDonChiTiet;
use App\PhieuXuatKho;
use App\PhieuXuatKhoChiTiet;
use Session;
use Auth;
use App\DiaChiKH;
use App\SanPham;
use App\TonKho;
use Carbon\Carbon;
use App\DonHangNo;
// use App\Notifications\Thongbaodonhang;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::content();
        $khachhang = Auth::user()->id;
        $thongtin = DiaChiKH::where('id_khachhang',$khachhang)->first();
         return view('layouts.main.checkout.index',compact('cart','thongtin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = Cart::content();
        $total = Cart::total();
        $datetime = Carbon::now();
        $hoadon = new HoaDon();
        $hoadon->ten_hoadon = 'hóa đơn của '.Auth::user()->name .' ngày '.$datetime;
        $hoadon->id_khachhang = Auth::user()->id;
        $hoadon->tonggia = intval(str_replace(',', '', $total));
        $hoadon->tongso_sanpham = count($cart);
        $hoadon->save();

        foreach($cart as $item){
            $chitiethd = new HoaDonChiTiet();
            $chitiethd->id_hoadon = $hoadon->id;
            $chitiethd->id_sanPham = $item->id;
            $chitiethd->soluong = $item->qty;
            $chitiethd->dongia = $item->price;
            $chitiethd->thue = $item->tax * $item->qty;
            $chitiethd->save();
            $tonkho = TonKho::where('id_sanpham',$item->id)->first();
        //    echo $tonkho;

            Cart::remove($item->rowId);
            $product = SanPham::where('id', $item->id)->first();
            // echo $product;
            if($item->qty > $tonkho->soluong){
                Cart::add(array('id' => $product->id, 'name' => $product->ten_sanpham, 'qty' => $tonkho->soluong, 'price' => $product->dongia,'options' => array('img' => $product->image, 'donvitinh'=>$product->donvitinh)));
            }
            // else if($tonkho->soluong == 0){
            //     Cart::add(array('id' => $product->id, 'name' => $product->ten_sanpham, 'qty' => 1, 'price' => $product->dongia,'options' => array('img' => $product->image, 'donvitinh'=>$product->donvitinh)));
            // }
            else{
                Cart::add(array('id' => $product->id, 'name' => $product->ten_sanpham, 'qty' => $item->qty, 'price' => $product->dongia,'options' => array('img' => $product->image, 'donvitinh'=>$product->donvitinh)));
            }

            if($item->qty > $tonkho->soluong){
                $tonkho->soluong = 0;
                $tonkho->save();
            }
            else{
                $tonkho->soluong = $tonkho->soluong - $item->qty;
                $tonkho->save();
            }
        }

        //phieu xuatkho
        $xuatkhochitiet = Cart::content();
        $totals = Cart::total();
        $phieuxuatkho = new PhieuXuatKho();
        $phieuxuatkho->ten_phieuxuatkho = 'phiếu xuất hàng cho '.Auth::user()->name;
        $phieuxuatkho->id_khachhang = Auth::user()->id;
        $phieuxuatkho->tongso_sanpham = count($xuatkhochitiet);
        $phieuxuatkho->tonggia = intval(str_replace(',', '', $totals));
        $phieuxuatkho->save();
        // $phieuxuatkho->notify(new Thongbaodonhang($phieuxuatkho));
        foreach($xuatkhochitiet as $itemxuatkho){

            $hangtonkho = TonKho::where('id_sanpham',$itemxuatkho->id)->first();
            //phieu xuat chi tiet
            $chitietpx = new PhieuXuatKhoChiTiet();
            $chitietpx->id_phieuxuatkho = $phieuxuatkho->id;
            $chitietpx->id_tonkho = $hangtonkho->id;
            $chitietpx->dongia = $itemxuatkho->price;
            $chitietpx->soluong = $itemxuatkho->qty;
            $chitietpx->thue = $itemxuatkho->tax * $itemxuatkho->qty;
            $chitietpx->save();
            Cart::remove($itemxuatkho->rowId);
            $hdcts = HoaDonChiTiet::where('id_sanpham',$itemxuatkho->id)->where( 'id_hoadon',$hoadon->id)->first();
            if($hdcts->soluong > $chitietpx->soluong){
                $donno = new DonHangNo();
                $donno->id_phieu_xuat_kho_chi_tiet = $chitietpx->id;
                // $donno->ten_donhangno = 'Đơn hàng nợ của '. $chitietpx->phieuxuatkho->ten_phieuxuatkho;
                $donno->soluong_no = $hdcts->soluong - $chitietpx->soluong;
                $donno->save();
            }
            // echo $hdcts;
            // echo $itemxuatkho->qty;
        }
        $request->session()->flash('success', 'Bạn đả hoàn tất việc mua sản phẩm');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
