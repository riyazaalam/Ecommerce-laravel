<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\user;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    
     public  function __construct()
     {
        $admin=new Admin();
        $this->admin=$admin;
        $user = new user();
        $this->user = $user;
       // $this->middleware('auth');

     }
   
    

    public function index(Request $request)
    {
        if( $request->session()->has('ADMIN_LOGIN'))
        {
            $request->session()->flash('error','Access Denied!');
            return redirect('admin/dashboard');
          
        }else{
            return view('admin.login');
        }
       return view('admin.login');
    }

    
    public function create()
    {
        
    }

    
    public function auth(Request $request)
    {
        $email= $request->post('email');
       $password= $request->post('password');
       //dd($request->all());
      $result = Admin::where(['email'=>$email,'password'=>$password])->get();
             
             //$result = Admin::where(['email'=>$email])->get();
             //dd($result);
               if($result)
               {
                //   if(Hash::check($request->post('password'),$result[0]->password))
                //     {
                    
                  
                    $request->session()->put('ADMIN_LOGIN',true);
                    $request->session()->put('ADMIN_ID',$result['0']->id);
                    //$id = $request->Admin()->id;
                  // $id = $request->user();
                  // dd($id);
                    return redirect('admin/dashboard');
                   // $id=Admin::select('id')->where('')
                   
                //    }else
                //    {
                //     $request->session()->flash('error','please Enter correct  password!');
                //     return redirect('admin');
                //    }
              
                }
               else{
                $request->session()->flash('error','invali login id and password!');
                return redirect('admin');
              }

    //    if(isset($result['0']->id))
    //    {
    //         $request->session()->put('ADMIN_LOGIN',true);
    //         $request->session()->put('ADMIN_ID',$result['0']->id);
    //         return redirect('admin/dashboard');
    //    }else{
    //        $request->session()->flash('error','invali login id and password!');
    //        return redirect('admin');
    //    }
    }
    public function dashboard()
    {
       return view('admin.dashboard');
    }

   
    public function show(Admin $admin)
    {
         $result=$this->admin->get_user();
         foreach($result as $val):
            dd($val->Role);
         endforeach;
    }

    
    public function user()
    {
        return view('admin.register');
    }

   
    public function user_add(Request $request)
    {
      $request->validate([
        'fname' => 'required',
        'lname' => 'required',
        'email' => 'required|email|unique:admins',
        'password' => 'required|confirmed|min:6',
        'mob' => 'required',
        'address' => 'required',
        ]);
        DB::beginTransaction();
   try{ 
         $user =new user();
         $user->mobile=$request->mob;
        $user->name=$request->fname;
        $user->email=$request->email;
         $user->password=$request->password;
        
         $user->save();
         $user_id =$user->id;
    // $usermobile= $this->user->StoreData($request->mob);
   // $mob=$request->mob;
    // $user = user::where('mobile_number', $mob)->value('id');
    //

    //$posts = new user();
   //$users = user::select('id')->where('mobile_number'=>$mob);
        $reg = new Admin();
        $reg->fname = $request->fname;
        $reg->lname = $request->lname;
        $reg->email = $request->email;
        $reg->password = $request->password;
        $reg->mobile = $request->mob;
        $reg->address=$request->address;
       $reg->user_id=$user_id;
        //$posts->name = $request->fname;
        //$posts->email = $request->email;
       
        $reg->save();
        DB::commit();
      
       return redirect()->back()->with('insert','data inserted successfully');
        
}catch(Exception $e)
{
return redirect()->back()->with('error','data inserted fail');

}

    }

    
    public function destroy(Admin $admin)
    {
        //
    }
     public function updatepassword()
     {
       $r=admin::find(2); 
       $r->password=Hash::make('123123');
       $r->save();
    }

    public function regupdate($id)
    {
      $id = Session::get('ADMIN_ID');
      $admin=Admin::find($id);
     // dd($admin);

      return view('admin.regupdate', compact('admin'));
    }

    public function updateuser(Request $request,$id,User $user)
    {
     $request->validate([
        'fname' => 'required',
        'lname' => 'required',
        'email' => 'required|unique:admins,email,'.$id,
        // 'password' => 'required|confirmed|min:6',
        'mobile' => 'required',
        'address' => 'required',
        ]);
        DB::beginTransaction();

        try{ 
      //     $user = user::find($id);
      //     $user->mobile=$request->mob;
      //    $user->name=$request->fname;
      //    $user->email=$request->email;
      //    // $user->password=$request->password;
         
      //     $user->update();
      //   //  $user_id =$user->id;


          $reg = Admin::find($id);
          $reg->fname = $request->fname;
          $reg->lname = $request->lname;
          $reg->email = $request->email;
        //  // $reg->password = $request->password;
          $reg->mobile = $request->mobile;
          $reg->address=$request->address;
       //  $reg->user_id=$user_id;
          $reg->save();
     //$user_id= Admin::where('id',$id)->first('user_id');
     $user_details = $this->user->GetUserByUserID($reg->user_id);
     $update_user = $this->user->UpdateUserDetails($user_details, $request);
    
//dd($user_id);
    //  Admin::where('id',$id)->update($data);
    //  user::where('id',$user_id)->update(array('fname'=>$data,'email'=>$data));

    //user::where('id',$user_id)->first()->update($data);

  //  $user = user::find($id)->where(['id'=>$user_id]);
   // $user = user::where('id',$user_id)->first();
   // $user->fname = $request->input('fname');
      //  $user->mobile=$request->mobile;
      //  $user->fname=$request->fname;
      //  $user->email=$request->email;
      //    $user = user::find($user_id);
      //     $user->mobile=$request->mobile;
      //    $user->fname=$request->fname;
      //    $user->email=$request->email;
      //  //  DB::table('users')->find($user_id)->update(array($user));  
      // //   DB::table('user')->where('email', $userEmail)->update(array('member_type' => $plan));  
        // $user->updateOrCreate();


       
          DB::commit();
        
         return redirect('admin/dashboard');
          
  }catch(Exception $e)
  {
  return redirect()->back()->with('error','data inserted fail');
  
    }
  }
}
