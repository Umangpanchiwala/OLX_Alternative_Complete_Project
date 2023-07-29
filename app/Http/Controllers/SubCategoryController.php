<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function index()
    {
        $result['data']=SubCategory::with('category')->get();
        return view('admin/subcategory',$result);
    }
    public function sub_status($id){
        $data = SubCategory::find($id);
        if($data['status'] == 1){
            $data['status'] = 0;
        }else{
            $data['status'] = 1;

        }

        $data->save();
        return back();
    }
    public function manage_subcategory(request $request, $id='')
    {
        $result=DB::table('categories')->where(['status'=>1])->get();

         if($id>0){
            $arr=SubCategory::where(['id'=>$id])->get();
            $result['category_name']=$arr['0']->category_name;
            $result['category_id']=$arr['0']->category_id;
            $result['status']=$arr['0']->status;
            $result['id']=$arr['0']->id;
        }
        return view('admin/manage_subcategory',compact('result'));
    }
    public function manage_subcategory_process(request $request)
    {
        if($request->post('id')>0){
            $model=SubCategory::find($request->post('id'));
            $msg='Subcategory Updated';
        }else{
            $model=new SubCategory();
            $msg='Subcategory Inserted';
        }
        $model->subcategory_name=$request->post('subcategory_name');
        $model->category_id=$request->post('category_id');
        $model->status=$request->post('status');
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/subcategory');
    }

    public function delete($id)
    {
        $del = SubCategory::find($id)->delete();
        return redirect('admin/subcategory');
    }
    public function edit(request $request,$id)
    {
        $result=DB::table('categories')->where(['status'=>1])->get();
        return view('admin.subcategory_edit',compact('result'))->with('data',subcategory::find($id));
    }
    public function changeStatus(request $request)
    {
        $user = subcategory::find($request->id)->update(['status' => $request->status]);
        return response()->json(['success'=>'Status Changed Successfully.']);
    }
    public function update(Request $request,$id)
    {
        $model=subcategory::find($id);
        $model->subcategory_name = $request->category_name;
        $model->category_id = $request->main_category;
        $model->status = $request->status;
        $model->save();
        $request->session()->flash('message','Data updated');
        return redirect('admin/subcategory');
    }
}
