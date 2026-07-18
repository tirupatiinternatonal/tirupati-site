<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
	protected $table = 'settings';
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'logo', 
        'email',
        'email_second',
        'phone_second',
        'phone',
        'about_us',
        'privacy_policy',
        'refund_policy',
        'shipping_policy',
        'overview',
        'terms_and_conditions',
        'refer_earn',
        'name', 
        'pincode',
        'address',
        'department_office',
        'marketing_office',
        'tin_no',
        'service',
        'contact_us',
        'facebook_link',
        'youtube_link',
        'twitter_link',
        'instagram_link',
        'whatsapp_link',
        'linkedin_link',
        'threads_link',
        'google_link',
        'indiamart_link',
        'client_view_user',
        'client_view_password',
    ];
}
