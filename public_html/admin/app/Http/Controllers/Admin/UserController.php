<?php
    
namespace App\Http\Controllers\Admin;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Models\User;
use App\Models\Branch;
use App\Models\PermissionManagement;
use App\Models\UserDocument;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Helper;
use Auth;
use Illuminate\Support\Arr;
    
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
      public function index(Request $request)
    {
        
		$query = User::where('id', '!=',1);
/*
        if($request->name!=""){		
           $query->where('name', 'like', '%'.$request->name.'%');
        }
        if($request->email!=""){     
           $query->Where('email', 'like', '%'.$request->email.'%');
        }   		
		*/
   		$data = $query->orderBy('id','DESC')->get();
        return view('admin.users.index',compact('data'))
            ;
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('name', '!=','Admin')->pluck('name','name')->all();
        $getBranch =  Branch::pluck('name','id')->all();
        return view('admin.users.create',compact('roles','getBranch'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role_id' => 'required',
            'mobile' => 'required|min:10|numeric'
        ]);

        if(!empty($request->sidebar_id)){
             $sidebar_id = implode(',', $request->sidebar_id);
        }
        if(!empty($request->sub_menu_id)){
             $sub_menu_id = implode(',', $request->sub_menu_id);
        }
        if($request->file('profile')){
                 $image = $request->file('profile');
                $path = $image->getRealPath();      
                $imageName =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'profile';
                $image->move($destinationPath, $imageName);     
             }else{
			$imageName = '';
		}
		
		
	
        $input = $request->all();
        $status = isset($request->status) ? 1 : 0;
        $input['profile'] = $imageName;
        $input['userName'] = $request->email;
        $input['password'] = Hash::make($input['password']);
        $input['show_password'] = $request->password;
        $input['status'] = $status;
        $user = User::create($input);
        $user_id = $user->id;
        
        
        $permis = new PermissionManagement;
        $permis->user_id = Auth::user()->id;
        $permis->branch_id = 1;
        $permis->reg_user_id = $user_id;
        if(!empty($request->sidebar_id)){
            $permis->sidebar_id =$sidebar_id;
        }
        if(!empty($request->sub_menu_id)){
            $permis->sub_menu_id =$sub_menu_id;
        }
		$permis->save();         
        if(!empty($request->email)){
         $emaildata = ['email'=>$request->email, 'mobile'=>$request->mobile, 'name'=>$request->name,'subject'=>'Registration Successful !'];
        sendMail('admin.emails.user',$emaildata);
        }
        return redirect()->route('admin.users.index')
                        ->with('success','User created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $permission = PermissionManagement::where('reg_user_id',$id)->get()->first();
      
        return view('admin.users.edit',compact('user','permission'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $user = User::find($id);
        
            $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role_id' => 'required',
            'mobile' => 'required|min:10|numeric'
        ]);
        

        if(!empty($request->sidebar_id)){
             $sidebar_id = implode(',', $request->sidebar_id);
        }
        if(!empty($request->sub_menu_id)){
             $sub_menu_id = implode(',', $request->sub_menu_id);
        }
        if($request->file('profile')){
                 $image = $request->file('profile');
                $path = $image->getRealPath();      
                $imageName =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'profile';
                $image->move($destinationPath, $imageName);     
             }else{
			$imageName = '';
		}
	
		
        $input = $request->all();
        $status = isset($request->status) ? 0 : 1;
        $input['profile'] = $imageName;
        $input['userName'] = $request->email;
        $input['password'] = Hash::make($input['password']);
        $input['show_password'] = $request->password;
        $input['status'] = $status;
        $user->update($input);
        $user_id = $user->id;
        
      
		
        $permis = new PermissionManagement;
        $permis->user_id = Auth::user()->id;
        $permis->branch_id = 1;
        $permis->reg_user_id = $user_id;
        if(!empty($request->sidebar_id)){
            $permis->sidebar_id =$sidebar_id;
        }
        if(!empty($request->sub_menu_id)){
            $permis->sub_menu_id =$sub_menu_id;
        }
		$permis->save(); 
    
        return redirect()->route('admin.users.index')
                        ->with('success','User updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
		
       
        $delete = User::where('id', $request->user_id)->delete();
        return redirect()->route('admin.users.index')
                        ->with('success','User deleted successfully');
    }
		public function change_password(Request $request){
			
			$id = Auth::id();			
			$user = User::find($id);			 
			if(!empty( $request->except('_token') ) ){			
				
				$this->validate($request, [			
				'new_password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
				'password_confirmation' => 'min:6'
				]);

				
				$user = User::find($id);
				$request->merge(["password"=>bcrypt($request->new_password)]);
				$user->update($request->all());
				
				return redirect()->route('admin.users.change_password')->with('success','Change password successfully');
				}else{		
				return view('admin.users.change_password',compact('user'));
			}
		}
		
		public function change_status(Request $request){
		          $FetchData = User::find($request->user_id);
		          $FetchData = User::where('id',$request->user_id)->update(['status'=>$request->status_name]);
       
            return redirect('admin/users')->with('success','Users status changed successfully');
        
		
        return view('admin.users.show');
			
    }
    
    public function profileUpdate(Request $request,$id){
        // return $request->all();
        $photo = "";
        if($request->file('inputPhoto')){
            
                $image = $request->file('inputPhoto');
                $path = $image->getRealPath();      
                $photo =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'profile';
                $image->move($destinationPath, $photo);
             }
             
             
        $request->all();
        $user=User::findOrFail($id);
        $data=$request->all();
        $status=$user->fill($data)->save();
        $attach = User::find($id);
		$attach->update(['photo' => $photo]);
        if($status){
            request()->session()->flash('success','Successfully updated your profile');
        }
        else{
            request()->session()->flash('error','Please try again!');
        }
        return redirect()->back();
        }   
        
     public function profile(){
        $profile=Auth()->user();
        // return $profile;
        return view('admin.users.profile')->with('profile',$profile);
    }
}