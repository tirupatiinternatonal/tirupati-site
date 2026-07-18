<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Libinfosystem extends Model
{
    //    use SoftDeletes;
//	protected $table = "medicine"; //table name
	protected $connection = 'mysql2';

    public function getUsers()
    {
        $users = DB::connection('mysql2')->table('libinfosystems')->get();

        return $users;
}
}