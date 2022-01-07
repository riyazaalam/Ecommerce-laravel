<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{

    
    public  function __construct()
    {
       $categorie=new Category();
       $this->categorie=$categorie;

     
    }
    public function index(Category $categorie)
    {
        $result['data']=$this->categorie->get_data();
        
       return view('admin.Category',$result)->with('no',1);
    }

   
    public function manage_category(Request $request,$id='')
    {
        if($id>0)
        {
            $arr=Category::where(['id'=>$id])->get();

            $result['category_name']=$arr['0']->category_name;
            $result['category_slug']=$arr['0']->category_slug;
            $result['id']=$arr['0']->id;

        }
        else{
              $result['category_name']='';
              $result['category_slug']='';
              $result['id']=0;
        }
        // echo '<pre>';
        // print_r($result);
        // die;
        return view('admin.manage_category',$result);
    }

    
    public function manage_category_process(Request $request)
    {
         $request->validate([
             'category_name'=>'required',
             'category_slug'=>'required|unique:categories,category_slug,'.$request->post('id'),
         ]);
        
            if($request->post('id')>0)
            {
               $model =Category::find($request->post('id'));
            //    $categorie=$this->categorie->update($request,$model);
                 $msg="Category updated Successfuly!";
             
            }else{
                $model=new Category();
                $msg="Catrgory Inserted Successfuly!";
               
            }
            $id = Session::get('ADMIN_ID');
            $model->category_name=$request->post('category_name');
            $model->category_slug=$request->post('category_slug');
            $model->status=1;
            $model->user_id=$id; 
            $model->save();
         
        //    // $categorie=$this->categorie->add_category($request);
        //  if(isset($categorie))
        //  {
            $request->session()->flash('success',$msg);
            return redirect('admin/category');
        //  }else{
             
            // // $request->session()->flash('error','Category Inserted Failed');
            //  return redirect('admin/manage_category');
     //    }

         

        
    }

    public function delete(Request $request,$id)
    {
       $delete= $this->categorie->data_delete($id);
        
       if($delete)
       {
        $request->session()->flash('message','Category Deleted successfully');
        return redirect('admin/category');
       }
       else{
       // $request->session()->flash('error','Not Delete successfully');
        return redirect('admin/category/delete');
       }
    }

   
    public function status(Request $request,$status,$id)
    {
       $model=Category::find($id);
       $model->status=$status;

       $model->save();
       $request->session()->flash('message','Category Status Updated');
       return redirect('admin/category');
    //    $delete= $this->categorie->data_delete($id);
        
    //    if($delete)
    //    {
    //     $request->session()->flash('message','Category Deleted successfully');
    //     return redirect('admin/category');
    //    }
    //    else{
    //    // $request->session()->flash('error','Not Delete successfully');
    //     return redirect('admin/category/delete');
    //    }
  
}

// public function manage_category_trash()
// {

//      $resultcat['datacategory']=$this->coupan->get_category_trash_data();
     
//     return view('admin.Trashdata',$resultcat)->with('no',1);
// }
   
}
