<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
   protected $table  ='categories';
    protected $fillable=['category_name','category_slug','user_id','status'];

   
    public function Roles()
    {
        return $this->belongsTo('App\Models\Category','user_id','id');
    }
    
    static function get_data()
    {
        $id = Session::get('ADMIN_ID');
        $data=Category::all()->where('user_id',$id);
        return $data;
    }
    
    // public function add_category($data)
    // {
    //     $id = Session::get('ADMIN_ID');
       
      
    //     $categorie=new Category();
    //     $categorie->category_name=$data->category_name;
    //     $categorie->category_slug=$data->category_slug;
        
    //     $categorie->user_id=$id;
    //     $categorie->save();
    //     return $categorie;

    // }
    public function data_delete($id)
    {
       $model=Category::find($id);
       return $model->delete();
    }
    // public function update($datas,$id)
    // {
    //     $categorie=new Category();
    //     $categorie->category_name=$datas->category_name;
    //     $categorie->category_slug=$datas->category_slug;
    //     $categorie->save();
    //     return $categorie;
    // }

    // static function get_category_trash_data()
    // {
    //     $id = Session::get('ADMIN_ID');
    //     $data=Category::onlyTrashed()->where('user_id',$id)->get();
    //     return $data;
    // }
    
}
 


