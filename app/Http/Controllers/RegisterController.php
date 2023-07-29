<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Crypt as FacadesCrypt;

class RegisterController extends Controller
{
    protected function register()
    {
        return view("user/register");
    }
    public function registration(Request $request)
    {
        if($request->session()->has('FRONT_USER_LOGIN')!=null){
            return redirect('/');
        }

        $result=[];
        return view('front.registration',$result);
    }

    public function registration_process(Request $request)
    {
        $valid = Validator::make($request->all(), [
            "name" => 'required',
            "email" => 'required|email|unique:users,email',
            "password" => 'required',

        ]);

        if (!$valid->passes()) {
            // return response()->json(['status'=>'error','error'=>$valid->errors()->toArray()]);
            return redirect('user/register')->with('fail', 'Account is already exists !');
        } else {
            $arr = [
                "name" => $request->name,
                "email" => $request->email,
                "password" => crypt::encrypt($request->password),
                "status" => 1
            ];
            $query = DB::table('users')->insert($arr);

            if ($query) {
                // return response()->json(['status'=>'success','msg'=>"Registration successfully"]);
                return redirect('user/login')->with('success', 'Registration successully!');
            }
        }
    }


    // protected function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);

    //     $credentials = $request->only('email', 'password');
    //     if (Auth::attempt($credentials)) {
    //         return redirect()->intended('user/index')
    //             ->withSuccess('Signed in');
    //     }

    //     return redirect("user/login")->with('fail','Login details are not valid');
    // }
    public function login_process(Request $request)
    {

        $result=DB::table('users')
            ->where(['email'=>$request->str_login_email])
            ->first();
            // dd($result);

        if(isset($result)){
            $db_pwd = Crypt::decrypt($result->password);

            // dd($db_pwd   
            if($db_pwd == $request->str_login_password){

                // if($request->rememberme===null){
                //     setcookie('login_email',$request->str_login_email,100);
                //     setcookie('login_pwd',$request->str_login_password,100);
                // }else{
                //    setcookie('login_email',$request->str_login_email,time()+60*60*24*100);
                //    setcookie('login_pwd',$request->str_login_password,time()+60*60*24*100);
                // }

                $request->session()->put('FRONT_USER_LOGIN',true);
                $request->session()->put('FRONT_USER_ID',$result->id);
                $request->session()->put('FRONT_USER_NAME',$result->name);
                // dd($request);
                $status="success";
                $msg="";
                return redirect('user/index');

            }else{
                $status="error";
                $msg="Please enter valid password";
            }
        }else{
            $status="error";
            $msg="Please enter valid email id";
        }
       return back()->with('status',$msg);
    //    $request->password
    }

    // public function profile2(Request $request, $id)
    // {
    //     $model = User::find($id);
    //     $model->email = $request->email;
    //     $model->name = $request->name;
    //     $model->save();
    //     $request->session()->flash('message', 'Data updated');
    //     return redirect('admin/product');
    // }
    // public function profile(request $request, $id)
    // {
    //     $result = DB::table('users')->where(['status' => 1])->get();
    //     $data = DB::table('users')->get()->all();

    //     return view('user.userprofile', compact('result'))->with('data', User::find($id));
    // }


    public function change_password(Request $request){

        $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        $user_id = session()->get('FRONT_USER_ID');
        // dd($user_id);
        $pass=Crypt::encrypt($request->password);

        User::where('id',$user_id)->update(['password'=>$pass]);

        return back();
    }
}
