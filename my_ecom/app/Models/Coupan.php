<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB; 

class Coupan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table  ='coupans';
    protected $fillable=['title','code','value','user_id'];

    static function get_coupandata()
    {
        $id = Session::get('ADMIN_ID');
        $data=Coupan::all()->where('user_id',$id);
        return $data;
    }

    public function data_deletecoupan($id)
    {
       $model=Coupan::find($id);
       return $model->delete();
    }

    static function get_coupan_trash_data()
    {
        $id = Session::get('ADMIN_ID');
        $data=Coupan::onlyTrashed()->where('user_id',$id)->get();
    //    $data=DB::table('coupans')
    //    ->join('categories','coupans.user_id',"=",'categories.user_id')
    //    ->where('user_id',$id)
    //    ->get();
        return $data;
    }
}

