<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SoftwareUpdate;

class SoftwareUpdatesController extends Controller
{

    public function index()
    {
        $data = SoftwareUpdate::all();
        return view('admin.software_updates.index',compact('data'));
    }

    public function create()
    {
        return view('admin.software_updates.create');
    }

    public function store(Request $request)
    {
        SoftwareUpdate::create([
            'version'=>$request->version,
            'release_date'=>$request->release_date,
            'release_type'=>$request->release_type,
            'new_features'=>$request->new_features,
            'improvements'=>$request->improvements,
            'bug_fixes'=>$request->bug_fixes,
            'security_updates'=>$request->security_updates,
            'status'=>$request->status ?? 0
        ]);

        return redirect('admin/software_updates');
    }

    public function edit($id)
    {
        $data = SoftwareUpdate::find($id);
        return view('admin.software_updates.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = SoftwareUpdate::find($id);

        $data->update([
            'version'=>$request->version,
            'release_date'=>$request->release_date,
            'release_type'=>$request->release_type,
            'new_features'=>$request->new_features,
            'improvements'=>$request->improvements,
            'bug_fixes'=>$request->bug_fixes,
            'security_updates'=>$request->security_updates,
            'status'=>$request->status ?? 0
        ]);

        return redirect('admin/software_updates');
    }

    public function destroy($id)
    {
        SoftwareUpdate::find($id)->delete();
        return redirect('admin/software_updates');
    }


    public function status($id)
    {
        $update = SoftwareUpdate::find($id);

        if ($update->status == 1) {
            $update->status = 0;
        } else {
            $update->status = 1;
        }

        $update->save();

        return redirect()->back()->with('success','Status Updated Successfully');
    }

}