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
        $thongtin = DiaChiKH::select('*')->where('id_khachhang',$khachhang)->first();
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
        $hoadon = new HoaDon();
        $hoadon->ten_hoadon = 'hóa đơn của '.Auth::user()->name;
        $hoadon->id_khachhang = Auth::user()->id;
        $hoadon->tonggia = Cart::total();
        $hoadon->tongsoluong = Cart::count();
        $hoadon->donvitien = 'VND';
        $hoadon->save();

        $cart = Cart::content();
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
                Cart::add(array('id' => $product->id, 'name' => $product->ten_sanpham, 'qty' => $tonkho->soluong, 'price' => $product->dongia,'options' => array('img' => $product->image, 'donvitien'=>$product->donvitien, 'donvitinh'=>$product->donvitinh)));
            }
            else{
                Cart::add(array('id' => $product->id, 'name' => $product->ten_sanpham, 'qty' => $item->qty, 'price' => $product->dongia,'options' => array('img' => $product->image, 'donvitien'=>$product->donvitien, 'donvitinh'=>$product->donvitinh)));
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
        $phieuxuatkho = new PhieuXuatKho();
        $phieuxuatkho->ten_phieuxuatkho = 'phiếu xuất kho cho '.Auth::user()->name;
        $phieuxuatkho->id_khachhang = Auth::user()->id;
        $phieuxuatkho->tongsoluong = Cart::count();
        $phieuxuatkho->tonggia = Cart::total();
        $phieuxuatkho->donvitien = 'VND';
        $phieuxuatkho->save();

        $xuatkhochitiet = Cart::content();
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
            // echo $itemxuatkho->qty;
        }
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
