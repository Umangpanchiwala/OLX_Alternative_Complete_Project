<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
            return redirect('admin/dashboard');
        }else{
            return view('admin/login');
        }
        return view('admin/login');
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
    public function auth(Request $request)
    {
        $email = $request->post('email');
        $password = $request->post('password');

        // $result=Admin::where(['email'=>$email,'password'=>$password])->get();
        $result = Admin::find(1);

        if ($result) {
            if (Hash::check($request->post('password'), $result->password)) {

                $request->session()->put('ADMIN_LOGIN', true);
                $request->session()->put('ADMIN_ID', $result->id);
                return redirect('admin/dashboard');
            } else {
                $request->session()->flash('error', 'Please Enter Correct Password');
                return redirect('admin');
            }
        }else {
            $request->session()->flash('error', 'Please Enter Valid Login Details');
            return redirect('admin');
        }
    }

    public function dashboard()
    {
        return view('admin/dashboard');
    }
    public function admin(){
        $result['adminArr']=admin::all();
        return view('admin/administrators',$result);
    }
    public function users(){
        $user['userArr']=User::all();
        return view('admin/user',$user);
    }

    function pwd(){

        dd(Hash::make(123456));
    }
}
