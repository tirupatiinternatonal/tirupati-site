<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SoftwareUpdate extends Authenticatable
{
    use HasFactory;

    protected $table = "software_updates";
}