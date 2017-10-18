<?php

namespace App\Http\Controllers\Admin;
use Auth;
use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class AdminsController extends Controller
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
        $data = Admin::orderBy('id','ASC')->paginate(10);

        return view('admin.index',compact('data'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = Admin::findOrFail($id);
        return view('admin.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::guard('admin')->user()->id != 1 && Auth::guard('admin')->user()->id != $id){
            Session::flash('error','Bạn không có quyền này');
            return redirect()->back();
        }
        else{
            $data = Admin::findOrFail($id);
            return view('admin.edit', compact('data'));
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
            'password' => 'required',
        ),
            array(
                'password.required' => 'bạn chưa nhập Password',
            ));
        Admin::findOrFail($id)->update($request->all());
        Session::flash('success','Thành Công');
        return redirect()->route('admin.show',$id);
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
            return redirect()->back();
        }
        else{
            Admin::findOrFail($id)->delete();
            Session::flash('success','Thành Công');
            return redirect()->back();
        }
    }
}
