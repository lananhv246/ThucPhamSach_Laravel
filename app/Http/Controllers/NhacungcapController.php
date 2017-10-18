<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhaCungCap;
use Session;

class NhacungcapController extends Controller
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
        $data = NhaCungCap::orderBy('id','ASC')->paginate(10);
        return view('admin.manager.nhacungcap.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manager.nhacungcap.create');
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
            'ten_ncc' => 'required|unique:nha_cung_caps,ten_ncc',
            'diachi' => 'required',
            'dienthoai' => array('required', 'regex:/^(01[2689]|09|0[2-9])[0-9]{8}$/'),
            'email' => array('required', 'max:255', 'email', 'unique:nha_cung_caps,email'),
            'maso_thue' => 'required|regex:/^[1-9][0-9]{9}$/',
            'ghichu' => 'required',
        ),
            array(
                'ten_ncc.required' => 'bạn chưa nhập nhà cung cấp',
                'ten_ncc.unique' => 'nhà cung cấp Đả Tồn Tại',
                'email.required' => 'bạn chưa nhập email',
                'email.unique' => 'email Đả Tồn Tại',
                'email.email' => 'email chưa đúng định dạng',
                'dienthoai.regex' => 'Điện thoại chưa chính xác hoặt chưa hổ trợ',
                'maso_thue.required' => 'bạn chưa nhập mã số thuế',
                'maso_thue.regex' => 'mã số thuế chưa chính xác hoặt chưa hổ trợ',
                'ghichu.required' => 'bạn chưa nhập ghi chú',
                'ghichu.max' => 'ghi chú quá ký tự qui định',
            ));
        NhaCungCap::create($request->all());
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
        $data = NhaCungCap::findOrFail($id);
        return view('admin.manager.nhacungcap.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = NhaCungCap::findOrFail($id);
        return view('admin.manager.nhacungcap.edit', compact('data'));
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
        ///validate
        $this->validate($request, array(
            //chua nhap|doc nhat
            'ten_ncc' => 'required',
            'diachi' => 'required',
            'dienthoai' => array('required', 'regex:/^(01[2689]|09)[0-9]{8}$/'),
            'email' => array('required', 'max:255', 'email'),
            'maso_thue' => 'required|regex:/^[1-9][0-9]{8}$/',
            'ghichu' => 'required|max:190',
        ),
            array(
                'ten_ncc.required' => 'bạn chưa nhập nhà cung cấp',
                'email.required' => 'bạn chưa nhập email',
                'email.email' => 'email chưa đúng định dạng',
                'maso_thue.required' => 'bạn chưa nhập mã số thuế',
                'maso_thue.regex' => 'mã số thuế chưa chính xác hoặt chưa hổ trợ',
                'ghichu.required' => 'bạn chưa nhập ghi chú',
                'ghichu.max' => 'ghi chú quá ký tự qui định',
            ));
        NhaCungCap::findOrFail($id)->update($request->all());
        Session::flash('success','Thành Công');
        return redirect()->route('nhacungcap.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        NhaCungCap::findOrFail($id)->delete();
        Session::flash('success','Thành Công');
        return redirect()->back();
//        return redirect()->route('nhacungcap.index');
    }
}
