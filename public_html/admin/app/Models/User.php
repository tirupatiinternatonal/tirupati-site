<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Kyslik\ColumnSortable\Sortable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, Sortable;
    protected $guard_name = 'admin-web';
    
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userName',
        'parent_id',
        'name',
        'first_name',
        'last_name',
        'email',
        'mobile',
        'role_id',
        'profile',
        'photo',
        'status',
        'doc_status',
        'password',
        'remember_token',
        'dob',
        'address',
        'show_password',
        'is_admin',
        'email_verified_at',
      /* 'user_id',*/
       /*'branch_id',*/
    ];

/**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public  static function  countRm(){
        $data = User::where('role_id',2)->count();
        return $data;
    }
  
}
