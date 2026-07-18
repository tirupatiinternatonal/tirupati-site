<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SoftwareUpdateController extends Controller
{
    public function index()
    {
        $updates = DB::table('software_updates')
            ->where('status',1)
            ->orderBy('id','desc')
            ->get();

        return view('software_updates.index', compact('updates'));
    }
}