<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use  Illuminate\Support\Facades\Input;
use Session;
use App\DiaChiKH;
use Illuminate\Support\MessageBag;
class UsersController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $data = User::find($id);
        if( Auth::user()->id == $id){
            return view('auth.show', compact('data'));
        }
        else{
            return view('errors.503');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        if( Auth::user()->id == $id){
            return view('auth.edit', compact('data'));
        }
        else{
            return view('errors.503');
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
        // $this->validate($request, array(
        //     'password' => 'required',
        // ),
        //     array(
        //         'password.required' => 'bạn chưa nhập Password',
        //     ));
        //validate
        $this->validate($request, array(
            //chua nhap|doc nhat
            'diachi' => 'required',
            'dienthoai' => array('required', 'regex:/^(01[2689]|09)[0-9]{8}$/')
        ),
            array(
                'diachi.required' => 'bạn chưa nhập Địa Chỉ',
                'dienthoai.required' => 'bạn chưa nhập Số Điện Thoại',
                'dienthoai.regex' => 'Số Điện Thoại chưa chính xác hoặt chưa hổ trợ',
            ));
        $data = User::find($id);
        $password = $request->input('password');
        
        // if( Auth::attempt(['password' =>$password], $request->has('remember'))) {
            if($request->password_confirmation != $password)
            {
                $errors = new MessageBag(['errorlogin' => 'xác nhận mật khẩu không đúng']);
                return redirect()->back()->withInput()->withErrors($errors);
                
            }
            else{
                // $data->password = bcrypt($request->password);
                $data->update(Input::except('password'));
                if(isset($request->diachi)){
                    if(isset($data->diachikh)){
                    $diachi = DiaChiKH::find($data->diachikh->id);
                    $diachi->id_khachhang = Auth::user()->id;
                    $diachi->update(Input::except('id_khachhang'));
                    }
                    else{
                        $dckh = new DiaChiKH($request->input());
                        $dckh->id_khachhang = Auth::user()->id;
                        $dckh->save();
                    }
                }
                else{
                    // $data->update(Input::except('password'));
                
                }
            }
        // }
        // else {
        //     $errors = new MessageBag(['errorlogin' => 'mật khẩu không đúng']);
        //         return redirect()->back()->withInput()->withErrors($errors);
        //     }
        
        Session::flash('success','Thành Công');
        return redirect()->route('users.show',$id);
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
