<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $result['data'] = Product::all();
        return view('admin/product', $result);
    }
    public function inquiry(){
        $result['data'] = Contact::all();
        return view('admin/inquiry', $result);

    }
    public function pro_status($id){
        $data = Product::find($id);
        if($data['status'] == 1){
            $data['status'] = 0;
        }else{
            $data['status'] = 1;

        }

        $data->save();
        return back();
    }

    public function findCityWithState($cid)
    {
        $sub = SubCategory::where('category_id', $cid)->get();
        if (isset($sub)) {
            return response()->json([
                $data = $sub,
            ]);
        } else {
            return response()->json([
                $data = 'no found'
            ]);
        }
    }
    public function getSubCategories($id)
    {
        $subcategories = DB::table("sub_categories")->orwhere("category_id", $id)->pluck("category_name", "id");
        return json_encode($subcategories);
        return view('admin/manage_product');
    }
    public function manage_product()
    {
        $result = DB::table('categories')->where(['status' => 1])->get();
        $sresult = DB::table('sub_categories')->where(['status' => 1])->get();
        $data = DB::table('sub_categories')->get('category_id');
        return view('admin/manage_product', compact('result', 'sresult', 'data'));
    }
    public function manage_product_save(request $request)
    {
        $model = new Product();
        $msg = 'Product Inserted';
        $model->category_id = $request->post('category_id');
        $model->sub_category_id = $request->post('sub_category_id');
        $model->status = 1;
        $model->status = $request->post('status');
        $request->session()->flash('message', $msg);
        if ($img = $request->file('img')) {
            $imageDestinationPath = 'image/';
            $postImage = date('YmdHis') . "." . $img->getClientOriginalExtension();
            $img->move($imageDestinationPath, $postImage);
            $input = $postImage;
        }
        $model->img = $input;
        $model->save();
        return redirect('admin/product');
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

    public function manage_product_process(request $request)
    {

        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:products,slug,' . $request->post('id'),
        ]);

        if ($request->post('id') > 0) {
            $model = Product::find($request->post('id'));
            $msg = 'Product Updated';
        } else {
            $model = new Product();
            $msg = 'Product Inserted';
        }
        $model->name = $request->post('title');
        $model->views = $request->post('views');
        $model->created_at = $request->post('created_at');
        $model->expire_date = $request->post('expire_date');
        $model->username = $request->post('username');
        $model->price = $request->post('price');
        $model->category_id = $request->post('category_id');
        $model->sub_category_id = $request->post('sub_category_id');
        $model->phone = $request->post('phone');
        $model->Description = $request->post('Description');
        $model->hide_phone = $request->post('hide_phone');
        $model->status = 1;
        $model->status = $request->post('status');

        if ($img = $request->file('img')) {
            $imageDestinationPath = 'image/';
            $postImage = date('YmdHis') . "." . $img->getClientOriginalExtension();
            $img->move($imageDestinationPath, $postImage);
            $input = $postImage;
        }
        $model->img = $input;
        $model->save();
        $request->session()->flash('message', $msg);
        return redirect('admin/product');
    }

    public function delete(request $request, $id)
    {
        $del = Product::find($id)->delete();
        $request->session()->flash('delete', 'Product Deleted');
        return redirect('admin/product');
    }

    public function edit(request $request, $id)
    {
        $result = DB::table('categories')->where(['status' => 1])->get();
        $sresult = DB::table('sub_categories')->where(['status' => 1])->get();
        return view('admin.product_edit', compact('result','sresult'))->with('data', product::find($id));
    }

    public function changeStatus(request $request)
    {
        $user = product::find($request->id)->update(['status' => $request->status]);

        return response()->json(['success' => 'Status Changed Successfully.']);
    }


    public function update(Request $request, $id)
    {
        $model = product::find($id);
        $model->title = $request->title;
        $model->cate->category_id = $request->category_id;
        $model->subcate->sub_category_id = $request->sub_category_id;
        $model->status = $request->status;
        $model->Description = $request->Description;
        $model->save();
        $request->session()->flash('message', 'Data updated');
        return redirect('admin/product');
    }

    public function viewcategory($slug)
    {
        if (Category::where('category_slug', $slug)->exists()) {
            $category = Category::where('slug', $slug)->first();
            $products = Product::where('cateId', $category->id)->where('status', '1')->get();
            return view('admin.products.display', compact('category', 'products'));
        } else {
            return redirect('/dashboard')->with('status', "Slug does not exist");
        }
    }


    public function myformAjax(Request $request)
    {
        $data = SubCategory::where('category_id', $request->cat_id)->get();
        return response()->json(['data' => $data]);
    }
    public function reg(Request $request)
    {
        return view('user/Registration');
    }
}
