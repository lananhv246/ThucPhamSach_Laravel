<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiSanPham;
use App\SanPham;
use Intervention\Image\ImageManagerStatic as Image;
use File;
use Illuminate\Support\Facades\Input;
use Session;
use App\PhieuNhapChiTiet;

class SanphamController extends Controller
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
        $loai = LoaiSanPham::all();
        $data = SanPham::orderBy('id','ASC')->paginate(10);
        return view('admin.manager.sanpham.index', compact('loai','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loai = LoaiSanPham::pluck('ten_loai','id');
        return view('admin.manager.sanpham.create', compact('loai'));
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
            'id_loai' => 'required',
            'ten_sanpham' => 'required',
            'giacu' => 'required',
            'donvitien' => 'required',
            'donvitinh' => 'required',
            'giamgia' => 'required|max:190',
            'giacu' => 'required|max:190',
            'image' => 'required',
        ),
            array(
                'id_loai.required' => 'bạn chưa nhập loại sản phẩm',
                'ten_sanpham.required' => 'bạn chưa nhập sản phẩm',
                'donvitien.required' => 'bạn chưa nhập đơn vị tiền',
                'giacu.required' => 'bạn chưa nhập đơn giá',
                'donvitinh.required' => 'bạn chưa nhập đơn vị tính',
                'giamgia.required' => 'bạn chưa nhập giảm giá',
                'giamgia.max' => 'giảm giá quá ký tự',
                'giacu.required' => 'bạn chưa nhập giá củ',
                'giacu.max' => 'giá củ quá ký tự',
                'image.required' => 'bạn chưa nhập image',
            ));
        $file = $request->file('image');
        $filename = uniqid().$file->getClientOriginalName();
        $file_image = Image::make($request->file('image'));
        $path = public_path().'/images/upload/';
        $file_image->resize(300, 200);
        $file_image->save($path.$filename);
        $data = new SanPham($request->input());
        $data->dongia = $request->giacu * ( 1 - $request->giamgia);
        $data->image = $filename;
        $data->save();
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

        $loai = LoaiSanPham::all();
        $data = SanPham::findOrFail($id);
        return view('admin.manager.sanpham.show', compact('loai','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loai = LoaiSanPham::pluck('ten_loai','id');
        $data = SanPham::findOrFail($id);
        $dongia = PhieuNhapChiTiet::where('id_sanpham',$id)->first();
        return view('admin.manager.sanpham.edit', compact('loai','data','dongia'));
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
            'id_loai' => 'required',
            'ten_sanpham' => 'required',
            'giacu' => 'required',
            'donvitien' => 'required',
            'donvitinh' => 'required',
            'giamgia' => 'required|max:190',
            'giacu' => 'required|max:190',
            'image' => 'required',
        ),
            array(
                'id_loai.required' => 'bạn chưa nhập loại sản phẩm',
                'ten_sanpham.required' => 'bạn chưa nhập sản phẩm',
                'donvitien.required' => 'bạn chưa nhập đơn vị tiền',
                'giacu.required' => 'bạn chưa nhập đơn giá',
                'donvitinh.required' => 'bạn chưa nhập đơn vị tính',
                'giamgia.required' => 'bạn chưa nhập giảm giá',
                'giamgia.max' => 'giảm giá quá ký tự',
                'giacu.required' => 'bạn chưa nhập giá củ',
                'giacu.max' => 'giá củ quá ký tự',
                'image.required' => 'bạn chưa nhập image',
            ));
        $data = SanPham::findOrFail($id);

        $oldImage = 'images/upload/'.$request->input('oldImage');
        if(!empty($request->file('image'))){
            $file = $request->file('image');
            $filename = uniqid().$file->getClientOriginalName();
            $file_image = Image::make($request->file('image'));
            $path = public_path().'/images/upload/';
            $file_image->resize(300, 200);
            $file_image->save($path.$filename);
            $data->image=$filename;
            if($request->hasFile('image')){
                File::delete($oldImage);
            }
        }
        else{
            echo "Không có file";
        }
        $data->dongia = $request->giacu * ( 1 - $request->giamgia);
        $data->update(Input::except('image','dongia'));
        Session::flash('success','Thành Công');
        return redirect()->route('sanpham.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sanpham = SanPham::findOrFail($id);
        SanPham::findOrFail($id)->delete();
        File::delete('images/upload/'.$sanpham["image"]);
        Session::flash('success','Thành Công');
        return redirect()->back();
    }
}