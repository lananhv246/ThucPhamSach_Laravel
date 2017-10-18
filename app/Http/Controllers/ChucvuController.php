<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChucVu;
use App\Admin;
use Session;
use Auth;

class ChucvuController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin',['except' => 'logout']);
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
}
    public function index()
    {
        $data = ChucVu::orderBy('id','ASC')->paginate(10);
        return view('admin.manager.chucvu.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admin = Admin::pluck('name','id');
        if(Auth::guard('admin')->user()->id != 1){
            Session::flash('error','Bạn không Quyền này');
            return redirect()->route('chucvu.index');
        }
        else {
            return view('admin.manager.chucvu.create', compact('admin'));
        }
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
            'id_admin' => 'required|unique:chuc_vus,id_admin',
            'ten_chucvu' => 'required|unique:chuc_vus,ten_chucvu',
            'quyen' => 'required',
            'lever'=>'required',
        ),
            array(
                'id_admin.required' => 'bạn chưa nhập Admin',
                'id_admin.unique' => 'Admin Đả Tồn Tại',
                'ten_chucvu.required' => 'bạn chưa nhập Chức Vụ',
                'ten_chucvu.unique' => 'Chức vụ Đả Tồn Tại',
                'quyen.required' => 'bạn chưa nhập Quyền',
                'lever.required' => 'bạn chưa nhập Lever'
            ));
        ChucVu::create($request->all());
        Session::flash('success','Thành Công');
        return redirect()->route('chucvu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ChucVu::findOrFail($id);
        return view('admin.manager.chucvu.show',compact( 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::pluck('name','id');
        $data = ChucVu::findOrFail($id);
//        print Auth::guard('admin')->user()->id;
        if(Auth::guard('admin')->user()->id != 1){
            Session::flash('error','Bạn không được sữa Chức vụ này');
            return redirect()->route('chucvu.show',$id);
        }
        else{
            return view('admin.manager.chucvu.edit', compact('admin','data'));
        }
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
            'id_admin' => 'required',
            'ten_chucvu' => 'required|unique:chuc_vus,ten_chucvu',
            'quyen' => 'required',
            'lever'=>'required',
        ),
            array(
                'id_admin.required' => 'bạn chưa nhập Admin',
                'id_admin.unique' => 'Admin Đả Tồn Tại',
                'ten_chucvu.required' => 'bạn chưa nhập Chức Vụ',
                'ten_chucvu.unique' => 'Chức vụ Đả Tồn Tại',
                'quyen.required' => 'bạn chưa nhập Quyền',
                'lever.required' => 'bạn chưa nhập Lever'
            ));
        ChucVu::findOrFail($id)->update($request->all());
        Session::flash('success','Thành Công');
        return redirect()->route('chucvu.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::guard('admin')->user()->id != 1){
            Session::flash('error','Bạn không có quyền này');
            return redirect()->route('chucvu.index');
        }
        else{
            ChucVu::findOrFail($id)->delete();
            Session::flash('success','Thành Công');
            return redirect()->back();
        }
    }
}
