<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index()
    {
        $result['data']=Category::all();
        return view('admin/category',$result);
    }

    public function cat_status($id){
        $data = Category::find($id);
        if($data['status'] == 1){
            $data['status'] = 0;
        }else{
            $data['status'] = 1;

        }

        $data->save();
        return back();
    }
    public function manage_category(request $request, $id='')
    {
        if($id>0){
            $arr=category::where(['id'=>$id])->get();

            $result['category_name']=$arr['0']->category_name;
            $result['category_slug']=$arr['0']->category_slug;
            $result['id']=$arr['0']->id;
        }else{
            $result['category_name']='';
            $result['category_slug']='';
            $result['id']='';
        }
        return view('admin/manage_category');
    }

    public function manage_category_process(request $request)
    {

        $request->validate([
            'category_name'=>'required',
            'category_slug'=>'required|unique:categories,category_slug,'.$request->post('id'),
        ]);

        if($request->post('id')>0){
            $model=Category::find($request->post('id'));
            $msg='Category Updated';
        }else{
            $model=new Category();
            $msg='Category Inserted';
        }
        $model->category_name=$request->post('category_name');
        $model->category_slug=$request->post('category_slug');
        $model->status=1;
        $model->status=$request->post('status');

        if ($img = $request->file('img')) {
            $imageDestinationPath = 'image/';
            $postImage = date('YmdHis') . "." . $img->getClientOriginalExtension();
            $img->move($imageDestinationPath, $postImage);
            $input= $postImage;
        }
        $model->img=$input;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/category');
    }

    public function delete(request $request, $id)
    {
        $del = Category::find($id)->delete();
        $request->session()->flash('delete','Category Deleted');
        return redirect('admin/category');
    }
    public function edit(request $request,$id)
    {
        return view('admin.category_edit')->with('data',category::find($id));
    }

    public function changeStatus(request $request)
    {
        $user = category::find($request->id)->update(['status' => $request->status]);

        return response()->json(['success'=>'Status Changed Successfully.']);
    }

    public function update(Request $request,$id)
    {
        $model=category::find($id);
        $model->category_name = $request->category_name;
        $model->category_slug = $request->category_slug;
        $model->status = $request->status;
        $img = $request->image;
        if ($img = $request->file('img')) {
            $imageDestinationPath = 'image/';
            $postImage = date('YmdHis') . "." . $img->getClientOriginalExtension();
            $img->move($imageDestinationPath, $postImage);
            $input= $postImage;
        }else{
            $input = $request->hide;
        }
        $model->img = $input;
        $model->save();
        $request->session()->flash('message','Data updated');
        return redirect('admin/category');
    }

    public function view_product(request $request, $id = '')

    {
        $result['arr'] = Product::find($id);
        if ($id > 0) {
            $arr = product::where(['id' => $id])->get();

            $result['title'] = $arr['0']->title;
            $result['status'] = $arr['0']->status;
            $result['created_at'] = $arr['0']->created_at;
            $result['usesname'] = $arr['0']->usesname;
            $result['price'] = $arr['0']->price;
            $result['category_id'] = $arr['0']->category_id;
            $result['sub_category_id'] = $arr['0']->sub_category_id;
            $result['phone'] = $arr['0']->phone;
            $result['id'] = $arr['0']->id;
        } else {
            $result['title'] = '';
            $result['status'] = '';
            $result['created_at'] = '';
            $result['usesname'] = '';
            $result['price'] = '';
            $result['category_id'] = '';
            $result['sub_category_id'] = '';
            $result['phone'] = '';
            $result['status'] = '';
            $result['id'] = '';
        }

        return view('user/index', $result);
    }

}
