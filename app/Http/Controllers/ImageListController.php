<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPhamChiTiet;
use App\ImagesList;
use Intervention\Image\ImageManagerStatic as Image;
use File;
use Illuminate\Support\Facades\Input;
use Session;

class ImageListController extends Controller
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
        $data = SanPhamChiTiet::orderBy('id','ASC')->paginate(10);
        return view('admin.manager.imagelist.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $spct = SanPhamChiTiet::all();
        return view('admin.manager.imagelist.create', compact('spct'));
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
            'id_sanphamchitiet' => 'required',
//            'ten_image' => 'required|unique:images_lists,ten_image',
        ),
            array(
                'id_sanphamchitiet.required' => 'bạn chưa nhập Sản phẩm chi tiết',
//                'ten_image.required' => 'bạn chưa nhập Image',
//                'ten_image.unique' => 'Image đả tồn tại',
            ));
        $file = $request->file('file');

        $filename = uniqid().$file->getClientOriginalName();
//        $file->move('images/upload/imagelist',$filename);
        $file_image = Image::make($request->file('file'));
        $path = public_path().'/images/upload/imagelist/';
        $file_image->resize(300, 200);
        $file_image->save($path.$filename);
        $images = new ImagesList();
        $images->id_sanphamchitiet = $request->id_sanphamchitiet;
        $images->ten_image = $filename;
        $images->duongdan = 'images/upload/imagelist/'.$filename;
        $images->save();
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
//        $spct = SanPhamChiTiet::all();
        $data = SanPhamChiTiet::findOrFail($id);
        return view('admin.manager.imagelist.show', compact('spct','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $spct = SanPhamChiTiet::pluck('id_sanpham','id');
        $data = ImagesList::findOrFail($id);
        return view('admin.manager.imagelist.edit', compact('spct','data'));
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
        $data = ImagesList::findOrFail($id);

        $oldImage = 'images/upload/imagelist/'.$request->input('oldImage');
        if(!empty($request->file('ten_image'))){
            $file = $request->file('ten_image');
            $file_image = Image::make($request->file('ten_image'));
            $path = public_path().'/images/upload/imagelist/';
            $file_image->resize(300, 200);
            $file_image->save($path.$file->getClientOriginalName());
            $data->image=$file->getClientOriginalName();
            if($request->hasFile('ten_image')){
                File::delete($oldImage);
            }
        }
        else{
            echo "Không có file";
        }
        $data->update(Input::except('ten_image'));
        Session::flash('success','Thành Công');
        return redirect()->route('imagelist.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image =ImagesList::findOrFail($id);
        File::delete($image->duongdan);
        ImagesList::findOrFail($id)->delete();
        Session::flash('success','Thành Công');
        return redirect()->back();
    }
    public function destroyall($id)
    {
        $spct = SanPhamChiTiet::findOrFail($id);
        foreach ($spct->imagelist as $image){
            File::delete($image->duongdan);
            $image->delete();
        }
        Session::flash('success','Thành Công');
        return redirect()->back();
    }
}