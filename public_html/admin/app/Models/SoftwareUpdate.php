<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoftwareUpdate extends Model
{
    use HasFactory;

    protected $table = "software_updates";

    protected $fillable = [
        'version',
        'release_date',
        'release_type',
        'new_features',
        'improvements',
        'bug_fixes',
        'security_updates',
        'status'
    ];
}