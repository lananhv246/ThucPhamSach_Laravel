<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;
use App\PhieuXuatKho;
use Auth;
use Session;
use Illuminate\Support\Facades\Input;

class PhieuxuatkhoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin', ['except' => 'logout']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PhieuXuatKho::orderBy('id','ASC')->paginate(10);
        return view('admin.manager.phieuxuatkho.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admin = Admin::pluck('name','id');
        $khachhang = User::pluck('name','id');
        return view('admin.manager.phieuxuatkho.create',compact('admin','khachhang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'id_admin' => 'required',
            'id_khachhang' => 'required',
            'ten_phieuxuatkho' => 'required|max:190',
            'tongsoluong' => 'required',
            'tonggia' => 'required',
            'donvitien' => 'required',
        ),
            array(
                'id_admin.required' => 'bạn chưa nhập Admin',
                'id_khachhang.required' => 'bạn chưa nhập Khách hàng',
                'ten_phieuxuatkho.required' => 'bạn chưa nhập tên phiếu xuất kho',
                'ten_phieuxuatkho.max' => 'tên phiếu xuất kho quá ký tự qui định',
                'tongsoluong.required' => 'bạn chưa nhập tổng số lượng',
                'tonggia.required' => 'bạn chưa nhập tổng tiền',
                'donvitien.required' => 'bạn chưa nhập đơn vi tiền',
            )
        );
        PhieuXuatKho::create($request->all());
        
        $request->session()->flash('success', 'Thành công');
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
        $data = PhieuXuatKho::findOrFail($id);
        return view('admin.manager.phieuxuatkho.show',compact('data'));
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
        $khachhang = User::pluck('name','id');
        $data = PhieuXuatKho::findOrFail($id);
        return view('admin.manager.phieuxuatkho.edit', compact('admin','khachhang','data'));
        
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
        $this->validate($request, array(
            'id_admin' => 'required',
            'id_khachhang' => 'required',
            'ten_phieuxuatkho' => 'required|max:190',
            'tongsoluong' => 'required',
            'tonggia' => 'required',
            'donvitien' => 'required',
        ),
            array(
                'id_admin.required' => 'bạn chưa nhập Admin',
                'id_khachhang.required' => 'bạn chưa nhập Khách hàng',
                'ten_phieuxuatkho.required' => 'bạn chưa nhập tên phiếu xuất kho',
                'ten_phieuxuatkho.max' => 'tên phiếu xuất kho quá ký tự qui định',
                'tongsoluong.required' => 'bạn chưa nhập tổng số lượng',
                'tonggia.required' => 'bạn chưa nhập tổng tiền',
                'donvitien.required' => 'bạn chưa nhập đơn vi tiền',
            )
        );
        PhieuXuatKho::findOrFail($id)->update($request->all());
        
        $request->session()->flash('success', 'thành công');;
        return redirect()->route('phieuxuatkho.show',$id);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PhieuXuatKho::findOrFail($id)->delete();
        Session::flash('success','Thành Công');
        return redirect()->back();
    }
}
