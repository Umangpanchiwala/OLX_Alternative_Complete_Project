<?php

namespace App\Http\Controllers;

use App\Models\Adlisting;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SubCategory;
use App\Models\User;

class AdlistingController extends Controller
{
    public function ad()
    {
        $result = DB::table('categories')->where(['status' => 1])->get();
        $sresult = DB::table('sub_categories')->where(['status' => 1])->get();
        $data = DB::table('sub_categories')->get('category_id');
        return view('user/Ad-listing', compact('result', 'sresult', 'data'));
    }

    public function delete_p($id){
        Product::find($id)->delete();
        return back();
    }
    public function SubCategories($id)
    {
        $subcategories = DB::table("sub_categories")->orwhere("category_id", $id)->pluck("category_name", "id");
        return json_encode($subcategories);
        return view('user/Ad-listing');
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
    public function user_product_save(request $request)
    {

        // dd($request->all());
        $input = '';
        $model = new Product();
        $msg = 'Product Inserted';
        $model->title = $request->post('title');
        $model->username =  $request->post('username');
        $model->price = $request->post('price');
        $model->phone = $request->post('phone');
        $model->description = $request->post('description');
        $model->category_id = $request->post('category_id');
        $model->sub_category_id = $request->post('sub_category_id');
        $model->status = 1;
        $request->session()->flash('message', $msg);
        if ($img = $request->file('img')) {
            $imageDestinationPath = 'image/ads/';
            $postImage = date('YmdHis') . "." . $img->getClientOriginalExtension();
            $img->move($imageDestinationPath, $postImage);
            $input = $postImage;
        }
        $model->img = $input;
        $model->save();
        return redirect('user/dashboard');
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show(Adlisting $adlisting)
    {
        //
    }
    public function edit(Adlisting $adlisting)
    {
        //
    }
    public function update(Request $request, Adlisting $adlisting)
    {
        //
    }
    public function destroy(Adlisting $adlisting)
    {
        //
    }
    public function manage_product()
    {
    }
    public function mycate(Request $request)
    {
        $data = SubCategory::where('category_id', $request->cat_id)->get();
        return response()->json(['data' => $data]);
    }
}
