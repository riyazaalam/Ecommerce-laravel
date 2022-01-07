<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table  ='admins';
    protected $fillable=['fname','lname','email','password','mobile','address','user_id','status','profile_photo'];

    public function Role()
    {
        return $this->belongsTo('App\Models\Role','user_id','id');
    }

    static function get_user()
    {
        $users=Admin::all();
        return $users;
    }

   
}
