<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;
use Session;
use File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;
use App\SanPham;
use App\PhieuNhapChiTiet;
use App\TonKho;

class CartController extends Controller
{
    public function cart($id) {
       $product = SanPham::where('id', $id)->first();
        Cart::add(array('id' => $product->id, 'name' => $product->ten_sanpham, 'qty' => 1, 'price' => $product->dongia,'options' => array('img' => $product->image, 'donvitinh'=>$product->donvitinh)));
        Session::flash('success','Sản Phẩm Đả Thêm Vào Giỏ Hàng');
        return redirect('/');
    }
    public function addcart(Request $request, $id){
        $idpro = $request->idpro;
        $product = SanPham::find($idpro);
        if($request->ajax()){
            Cart::add(array('id' => $product->id, 'name' => $product->ten_sanpham, 'qty' => 1, 'price' => $product->dongia,'options' => array('img' => $product->image, 'donvitinh'=>$product->donvitinh)));
            return back();
        }
    }
    public function updateQtyPlus(Request $request,$id)
    {
        //validate
        $this->validate($request, array(
            
            'qty' => 'required|numeric|digits_between:1,11',
        ),
            array(
                'qty.required' => 'bạn chưa nhập số lượng',
                'qty.numeric' => 'Số lượng phải là số',
                'qty.digits_between' => 'số lượng sai cấu trúc',
            ));
        $rowid = $request->rowid;
        $proid = $request->proid;
        $qty = $request->qty;
        $item = Cart::get($rowid);
        $cart = Cart::content();
//        Cart::update($rowid, $qty );
//        $cart = Cart::content();

        if($request->ajax()){
            Cart::update($rowid, $qty );
            return view('layouts.fontend-layouts.update-cart',compact('cart'));
        }
        // if ($item->qty > 8){
        //     if(Auth::check()){
        //         if ($item->qty > 13){
        //         Session::flash('error','Bạn đang mua số lượng sản phẩm lớn. Vui lòng liên hệ với chúng tôi để được ưu đải!');
        //         return view('layouts.main.Cart.updatecart',compact('cart'));
        //         }
        //         else{
        //             if($request->ajax()){
        //                 Cart::update($rowid, $qty );
        //                 return view('layouts.main.Cart.updatecart',compact('cart'));
        //             }
        //         }
        //     }
        //     Session::flash('error','Xin vui lòng đăng nhập');
        //     return view('layouts.main.Cart.updatecart',compact('cart'));
        // }
        // else{
        //     if($request->ajax()){
        //         Cart::update($rowid, $qty );
        //         return view('layouts.main.Cart.updatecart',compact('cart'));
        //     }
        // }


//        $item = Cart::get($rowid);
//        if ($item->qty > 10){
//            if(Auth::check()){
//                Cart::update($rowid, $item->qty + $request->quantity );
//                if ($item->qty > 100){
//                    Session::flash('error','Bạn đang mua số lượng sản phẩm lớn. Vui lòng liên hệ với chúng tôi để được ưu đải!');
//                }
//            }
//            else{
//                Session::flash('error','Xin vui lòng đăng nhập');
//                return view('auth.login');
//            }
//        }
//        else{
//            Cart::update($rowid, $item->qty + 1);
//        }
//        return redirect()->route('shopping');
    }
    // public function updateQtyMinus($id)
    // {
    //     $rowid = $id;
    //     $item = Cart::get($rowid);
    //     if ($item->qty < 1){
    //         Cart::remove($id);
    //     }
    //     else{
    //         Cart::update($rowid, $item->qty - 1);
    //     }
    //     return redirect()->route('shopping');
    // }
    public function deletecart($id) {
        Cart::remove($id);
        Session::flash('success','Thành Công');
        return redirect()->back();
    }
    public function delete_cart(Request $request, $id) {
        $rowid = $request->rowid;
        $cart = Cart::content();
        if($request->ajax()){
            Cart::remove($rowid);
            if(isset($cart)){
                return view('layouts.fontend-layouts.update-cart',compact('cart'));
            }
            else{
                return redirect('/');
            }
        }
    }
    public function shopping() {
        $cart = Cart::content();
        return view('layouts.fontend-layouts.shopping',compact('cart'));
    }
}
