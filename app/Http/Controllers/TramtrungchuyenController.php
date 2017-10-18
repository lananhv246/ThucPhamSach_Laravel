<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TramTrungChuyen;
use Session;
class TramtrungchuyenController extends Controller
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
        $data = TramTrungChuyen::orderBy('id','ASC')->paginate(10);
        return view('admin.manager.tramtrungchuyen.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manager.tramtrungchuyen.create');
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
            'ten_tram' => 'required|unique:tram_trung_chuyens,ten_tram',
            'diachi' => 'required',
            'dienthoai' => array('required', 'regex:/^(01[2689]|09)[0-9]{8}$/'),
            'email' => array('required', 'max:255', 'email', 'unique:tram_trung_chuyens,email'),

        ),
            array(
                'ten_tram.required' => 'bạn chưa nhập trạm trung chuyển',
                'ten_tram.unique' => 'trạm trung chuyển Đả Tồn Tại',
                'diachi.required' => 'bạn chưa nhập địa chỉ',
                'dienthoai.required' => 'bạn chưa nhập điện thoại',
                'dienthoai.regex' => 'Số Điện Thoại chưa chính xác hoặt chưa hổ trợ',
                'email.required' => 'bạn chưa nhập email',
                'email.unique' => 'email Đả Tồn Tại',
                'email.email' => 'email chưa đúng định dạng',
            ));
        TramTrungChuyen::create($request->all());
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
        $data = TramTrungChuyen::findOrFail($id);
        return view('admin.manager.tramtrungchuyen.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = TramTrungChuyen::findOrFail($id);
        return view('admin.manager.tramtrungchuyen.edit', compact('data'));
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
            'ten_tram' => 'required',
            'diachi' => 'required',
            'dienthoai' => array('required', 'regex:/^(01[2689]|09)[0-9]{8}$/'),
            'email' => array('required', 'max:255', 'email'),

        ),
            array(
                'ten_tram.required' => 'bạn chưa nhập trạm trung chuyển',
                'diachi.required' => 'bạn chưa nhập địa chỉ',
                'dienthoai.required' => 'bạn chưa nhập điện thoại',
                'dienthoai.regex' => 'Số Điện Thoại chưa chính xác hoặt chưa hổ trợ',
                'email.required' => 'bạn chưa nhập email',
                'email.email' => 'email chưa đúng định dạng',
            ));
        TramTrungChuyen::findOrFail($id)->update($request->all());
        Session::flash('success','Thành Công');
        return redirect()->route('tramtrungchuyen.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TramTrungChuyen::findOrFail($id)->delete();
        Session::flash('success','Thành Công');
        return redirect()->back();
    }
}