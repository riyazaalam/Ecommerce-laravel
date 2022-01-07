<?php

namespace App\Http\Controllers;

use App\Models\Coupan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class CoupanController extends Controller
{
    public  function __construct()
    {
    $coupan=new Coupan();
    $this->coupan=$coupan;
    }

    public function index(Coupan $coupan)
    {
        $result['data']=$this->coupan->get_coupandata();
        return view('admin.Coupan',$result)->with('no', 1);
    }

    public function manage_coupan(Request $request,$id='')
    {
        if($id>0)
        {
            $arr=Coupan::where(['id'=>$id])->get();

            $result['title']=$arr['0']->title;
            $result['code']=$arr['0']->code;
            $result['value']=$arr['0']->value;
            $result['id']=$arr['0']->id;

        }
        else{
              $result['title']='';
              $result['code']='';
              $result['value']='';
              $result['id']=0;
        }
        // echo '<pre>';
        // print_r($result);
        // die;
        return view('admin.manage_coupan',$result);
    }


     
    public function manage_coupan_process(Request $request)
    {
         $request->validate([
             'title'=>'required',
             'code'=>'required|unique:coupans,code,'.$request->post('id'),
             'value'=>'required',
         ]);
        
            if($request->post('id')>0)
            {
               $model =Coupan::find($request->post('id'));
         
                 $msg="Coupan updated Successfuly!";
             
            }else{
                $model=new Coupan();
                $msg="Coupan Inserted Successfuly!";
               
            }
            $id = Session::get('ADMIN_ID');
            $model->title=$request->post('title');
            $model->code=$request->post('code');
            $model->value=$request->post('value');
            $model->status=0;
            $model->user_id=$id; 
            $model->save();
         
            $request->session()->flash('success',$msg);
            return redirect('admin/coupan');
        

        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupan  $coupan
     * @return \Illuminate\Http\Response
     */
    public function show(Coupan $coupan)
    {
        //
    }

    public function status(Request $request,$status,$id)
    {
       $model=Coupan::find($id);
       $model->status=$status;

       $model->save();
       $request->session()->flash('message','Coupan Status Updated');
       return redirect('admin/coupan');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupan  $coupan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupan $coupan)
    {
        //
    }

    public function deletecoupan(Request $request,$id)
    {
       $delete= $this->coupan->data_deletecoupan($id);
        
       if($delete)
       {
        $request->session()->flash('message','coupan Deleted successfully');
        return redirect('admin/coupan');
       }
       else{
       // $request->session()->flash('error','Not Delete successfully');
        return redirect('admin/coupan/delete');
       }
    }

    public function manage_coupan_trash()
    {

         $result['data']=$this->coupan->get_coupan_trash_data();
         
        return view('admin.Trashdata',$result)->with('no',1);
    }

    public function Restore_data($id)
    {
            $coupan=Coupan::withTrashed()->find($id);

            if(!is_null($coupan))
            {
                $coupan->restore();
            }
            return redirect('admin/coupan/trash');
    }
}
