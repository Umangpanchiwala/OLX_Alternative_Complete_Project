<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    // public function index(request $request)
    // {
    //     $result['data'] = Product::all();
    //     // return view('admin/product', );

    //     return view('user/index',$result);

    // }
    public function login(request $request)
    {
        return view('user/login');
    }


    public function layout(request $request)
    {
        return view('user/layout');
    }
    // public function userprofile(request $request)
    // {
    //     return view('user/userprofile');
    // }
    public function dashboardmyads($id ='')
    {
        //   dd($product);
        $product = Product::with('cate', 'subcate')->where('username', $id)->get();
        return view('user/dashboardmyads', compact('product'));
    }
    public function dashboardpendingads(request $request)
    {
        return view('user/dashboardpendingads');
    }
    public function aboutus(request $request)
    {
        return view('user/aboutus');
    }
    public function contactus(request $request)
    {
        $category = Category::get();

        return view('user/contactus', compact('category'));
    }
    public function category(request $request)
    {
        return view('user/category');
    }
    public function adlistview(request $request)
    {
        return view('user/adlistview');
    }
    public function p404(request $request)
    {
        return view('user/404');
    }
    public function view_product(request $request, $id = '')
    {
        $result['arr'] = Product::find($id);
        if ($id > 0) {
            $arr = product::where(['id' => $id])->get();

            $result['title'] = $arr['0']->title;
            $result['status'] = $arr['0']->status;
            $result['created_at'] = $arr['0']->created_at;
            $result['username'] = $arr['0']->username;
            $result['price'] = $arr['0']->price;
            $result['category_id'] = $arr['0']->category_id;
            $result['sub_category_id'] = $arr['0']->sub_category_id;
            $result['phone'] = $arr['0']->phone;
            $result['id'] = $arr['0']->id;
            $result['img'] = $arr['0']->img;
        } else {
            $result['title'] = '';
            $result['status'] = '';
            $result['created_at'] = '';
            $result['username'] = '';
            $result['price'] = '';
            $result['category_id'] = '';
            $result['sub_category_id'] = '';
            $result['phone'] = '';
            $result['status'] = '';
            $result['id'] = '';
            $result['img'] = '';
        }
        return view('admin/view_product', $result);
    }
    public function single(request $request, $id)
    {
        $result['arr'] = Product::find($id);
        if ($id > 0) {
            $arr = Product::where(['id' => $id])->get();

            $result['title'] = $arr['0']->title;
            $result['status'] = $arr['0']->status;
            $result['created_at'] = $arr['0']->created_at;
            $result['username'] = $arr['0']->username;
            $result['Description'] = $arr['0']->Description;
            $result['price'] = $arr['0']->price;
            $result['category_id'] = $arr['0']->category_id;
            $result['sub_category_id'] = $arr['0']->sub_category_id;
            $result['phone'] = $arr['0']->phone;
            $result['id'] = $arr['0']->id;
            $result['img'] = $arr['0']->img;
        } else {
            $result['title'] = '';
            $result['status'] = '';
            $result['created_at'] = '';
            $result['username'] = '';
            $result['Description'] = '';
            $result['price'] = '';
            $result['category_id'] = '';
            $result['sub_category_id'] = '';
            $result['phone'] = '';
            $result['status'] = '';
            $result['id'] = '';
            $result['img'] = '';
        }
        return view('user/single', $result);
    }

    public function  order_now($pid){

        return view('user/orderpage',compact('pid'));

    }

    public function order_create(Request $request){

        
        $address = array(

            'user_id'=>$request->user_id,
            'product_id'=>$request->product_id,
            'country'=>$request->country,
            'state' =>$request->state,
            'city' =>$request->city,
            'pincode' =>$request->pincode,
            'full_address' => $request->full_address,

        );
        
        $address_id = Address::create($address)->id;
        
        $order = array(
            'user_id'=>$request->user_id,
            'product_id'=>$request->product_id,
            'address_id'=>$address_id,
            'order_date'=>Date('Y-m-d')
        );
        
        Order::create($order);
        
        return redirect()->route('order_list',$request->user_id);

    }
    public function get_order_list($uid){

        $product = Order::with(['user','product','address'])->where('user_id',$uid)->get();
        
        // dd($product);
    


         return view('user/myorder',compact('product'));

    }
    public function userprofile(request $request, $id = '')
    {
        if (session()->has('FRONT_USER_LOGIN') != null) {
            $result = User::find($id);
            if ($id > 0) {
                $arr = User::where(['id' => $id])->first();

                // dd($result);
                $result['name'] = $arr->name;
                $result['email'] = $arr->email;
                $result['id'] = $arr->id;
            } else {
                $result['name'] = '';
                $result['email'] = '';
                $result['id'] = '';
            }
            return view('user/userprofile', $result);
        }
    }

    public function feedback()
    {
        return view("user/feedback");
    }

    public function submit_contact(Request $request)
    {

        Contact::create($request->all());

        return back()->with('status', 'Request sended successfully');
    }
}
