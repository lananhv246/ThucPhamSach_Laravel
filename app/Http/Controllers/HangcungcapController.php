<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TramTrungChuyen;
use App\NhaCungCap;
use App\HangCungCap;
use Session;

class HangcungcapController extends Controller
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
        $data = HangCungCap::orderBy('id','ASC')->paginate(10);
        return view('admin.manager.hangcungcap.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ncc = NhaCungCap::pluck('ten_ncc','id');
        $tramtc = TramTrungChuyen::pluck('ten_tram','id');
        return view('admin.manager.hangcungcap.create', compact('ncc','tramtc'));
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
            'id_ncc' => 'required',
            'id_tram' => 'required',
            'giatri' => 'required|max:190',
        ),
            array(
                'id_ncc.required' => 'bạn chưa nhập Nhà Cung Cấp',
                'id_tram.required' => 'bạn chưa nhập Trạm Trung Chuyển',
                'giatri.required' => 'bạn chưa nhập Giá trị',
                'giatri.max' => 'Giá trị quá ký tự qui định',
            ));
        HangCungCap::create($request->all());
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
        $nhacc = NhaCungCap::all();
        $tramtc = TramTrungChuyen::all();
        $data = HangCungCap::findOrFail($id);
        return view('admin.manager.hangcungcap.show', compact('nhacc','tramtc','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ncc = NhaCungCap::pluck('ten_ncc','id');
        $tramtc = TramTrungChuyen::pluck('ten_tram','id');
        $data = HangCungCap::findOrFail($id);
        return view('admin.manager.hangcungcap.edit', compact('ncc','tramtc','data'));
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
            'id_ncc' => 'required',
            'id_tram' => 'required',
            'giatri' => 'required|max:190',
        ),
            array(
                'id_ncc.required' => 'bạn chưa nhập Nhà Cung Cấp',
                'id_tram.required' => 'bạn chưa nhập Trạm Trung Chuyển',
                'giatri.required' => 'bạn chưa nhập Giá trị',
                'giatri.max' => 'Giá trị quá ký tự qui định',
            ));
        HangCungCap::findOrFail($id)->update($request->all());
        Session::flash('success','Thành Công');
        return redirect()->route('hangcungcap.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HangCungCap::findOrFail($id)->delete();
        Session::flash('success','Thành Công');
        return redirect()->back();
    }
}
