<?php    
namespace App\Http\Controllers\Admin;    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Document;
use DB;
use Hash;
use Illuminate\Support\Arr;
use File;
use App\Http\Requests\StoreCoupon;
use Image;
class DocumentController extends Controller

{
    public function index()
    {
         $data = Document::all();
       
         return view('admin.document.index',compact('data'));
    }
    
    public function create()
    {
        return view('admin.document.create');
    }
    
     public function show(Request $request,$id){
        
        $data = Document::find($id);
        
        return view('admin.document.show',compact('data'));
    }    
  
    
    
    
    public function store(Request $request)
{
    $this->validate($request, [
        'label_name' => 'required',
        'photo' => 'required|mimes:jpg,jpeg,png,pdf|max:5000',
    ]);

    $photo = "";

    if($request->hasFile('photo'))
    {
        $file = $request->file('photo');
        $photo = time().uniqid().'.'.$file->getClientOriginalExtension();
        $file->move(env('IMAGE_UPLOAD_PATH').'document', $photo);
    }

    $data = [
        'label_name' => $request->label_name,
        'status'     => 1,
        'photo'      => $photo
    ];

    Document::create($data);

    return redirect()->route('admin.document.index')
            ->with('success','Document created successfully');
}

    
public function destroy(Request $request)
    {
    
        Document::find($request->user_id)->delete();
        return redirect()->route('admin.document.index')
                        ->with('success','Document deleted successfully');
    }
    
    
    	public function edit(Request $request,$id){
          $data = Document::find($id);
        return view('admin.document.edit',compact('data'));
			
    }
    
        
    public function update(Request $request, $id)
{
    $this->validate($request, [
        'photo' => 'nullable|mimes:jpg,jpeg,png,pdf|max:5000',
    ]);

    $user = Document::findOrFail($id);

    $input = $request->except('photo','scrimage');

    $input['status'] = $request->status;

    $photo = $user->photo;

    if($request->hasFile('photo'))
    {
        $file = $request->file('photo');
        $photo = time().uniqid().'.'.$file->getClientOriginalExtension();
        $file->move(env('IMAGE_UPLOAD_PATH').'document', $photo);
    }

    $input['photo'] = $photo;

    $user->update($input);

    return redirect()->route('admin.document.index')
        ->with('success','Document updated successfully');
}


    
    public function change_status(Request $request){
        if($request->status_name == 'Active'){
            $FetchData = Document::find($request->event_id);
            $FetchData->update(['status'=>0]);
            return redirect('admin/document')->with('success','Document Active successfully');
        }else{
             $FetchData = Document::find($request->event_id);
            $FetchData->update(['status'=>1]);
            return redirect('admin/document')->with('success','Document Inactive successfully');
        }
        
    }
}

