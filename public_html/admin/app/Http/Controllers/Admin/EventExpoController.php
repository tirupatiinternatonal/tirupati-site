<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EventExpoController extends Controller
{
    public function index()
    {
        $data = DB::table('events')
                    ->orderBy('id', 'DESC')
                    ->get();

        return view('admin.events.index', compact('data'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

   public function store(Request $request)
    {
    
        $this->validate($request, [
    
            'title'              => 'required',
            'description'        => 'required',
            'event_date'         => 'required',
            'event_time'         => 'required',
            'location'           => 'required',
    
            'banner_image'       => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'gallery_images.*'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    
        ]);
    
        $banner = "";

        if ($request->hasFile('banner_image')) {
        
            $image = $request->file('banner_image');
        
            $banner = time().'_'.uniqid().'.'.$image->getClientOriginalExtension();
        
            $destinationPath = rtrim(env('IMAGE_UPLOAD_PATH'), '/').'/event';
        
            if (!is_dir($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
        
            $image->move($destinationPath, $banner);
        }
    
        $eventId = DB::table('events')->insertGetId([
    
            'title'        => $request->title,
            'slug'         => !empty($request->slug)
                                ? $request->slug
                                : Str::slug($request->title),
            'description'  => $request->description,
            'event_date'   => $request->event_date,
            'event_time'   => $request->event_time,
            'location'     => $request->location,
            'banner_image' => $banner,
            'status'       => 1,
            'created_at'   => now(),
            'updated_at'   => now(),
    
        ]);
    
        if ($request->hasFile('gallery_images')) {

            foreach ($request->file('gallery_images') as $gallery) {
        
                $galleryName = time().'_'.uniqid().'.'.$gallery->getClientOriginalExtension();
        
                $galleryPath = rtrim(env('IMAGE_UPLOAD_PATH'), '/').'/event/gallery';
        
                if (!is_dir($galleryPath)) {
                    mkdir($galleryPath, 0777, true);
                }
        
                $gallery->move($galleryPath, $galleryName);
        
                DB::table('event_gallery')->insert([
                    'event_id'   => $eventId,
                    'type'       => 1,
                    'img'        => $galleryName,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    
        return redirect()->route('admin.eventExpo')
                 ->with('success','Event Created Successfully.');
    }

    public function edit($id)
    {
        $data = DB::table('events')
                ->where('id', $id)
                ->first();
    
        $galleryImages = DB::table('event_gallery')
                            ->where('event_id', $id)
                            ->get();
    
        return view(
            'admin.events.edit',
            compact('data','galleryImages')
        );
    }

    public function update(Request $request, $id)
    {
    
        $this->validate($request, [

            'title'              => 'required',
            'description'        => 'required',
            'event_date'         => 'required',
            'event_time'         => 'required',
            'location'           => 'required',
        
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'gallery_images.*'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        
        ]);
    
        $event = DB::table('events')->where('id', $id)->first();
    
        $banner = $event->banner_image;
    
        if($request->file('banner_image')){
    
            if(!empty($banner) && file_exists(env('IMAGE_UPLOAD_PATH').'event/'.$banner)){
    
                unlink(env('IMAGE_UPLOAD_PATH').'event/'.$banner);
    
            }
    
            $image = $request->file('banner_image');
    
            $banner = time().'_'.uniqid().'.'.$image->getClientOriginalExtension();
    
            $destinationPath = env('IMAGE_UPLOAD_PATH').'event';

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            
            $image->move($destinationPath, $banner);
    
        }
    
        DB::table('events')
            ->where('id', $id)
            ->update([
    
                'title'         => $request->title,
                'slug' => !empty($request->slug)
                          ? $request->slug
                          : Str::slug($request->title),
                'description'   => $request->description,
                'event_date'    => $request->event_date,
                'event_time'    => $request->event_time,
                'location'      => $request->location,
                'banner_image'  => $banner,
                'updated_at'    => now(),
    
            ]);
    
    
    
        if($request->hasFile('gallery_images')){
    
            foreach($request->file('gallery_images') as $gallery){
    
                $galleryName = time().'_'.uniqid().'.'.$gallery->getClientOriginalExtension();
    
                $galleryPath = env('IMAGE_UPLOAD_PATH').'event/gallery';

                if (!file_exists($galleryPath)) {
                    mkdir($galleryPath, 0777, true);
                }
                
                $gallery->move($galleryPath, $galleryName);
    
                DB::table('event_gallery')->insert([
    
                    'event_id'      => $id,
                    'type'          => 1,
                    'img'           => $galleryName,
                    'created_at'    => now(),
                    'updated_at'    => now(),
    
                ]);
    
            }
    
        }
    
       return redirect()->route('admin.eventExpo')
                 ->with('success','Event Updated Successfully.');
    
    }

    public function destroy(Request $request)
    {
    
        $event = DB::table('events')
                    ->where('id', $request->id)
                    ->first();
    
        if($event){
    
            // Delete Banner
    
            if(!empty($event->banner_image) &&
                file_exists(env('IMAGE_UPLOAD_PATH').'event/'.$event->banner_image)){
    
                unlink(env('IMAGE_UPLOAD_PATH').'event/'.$event->banner_image);
    
            }
    
            // Delete Gallery Images
    
            $gallery = DB::table('event_gallery')
                        ->where('event_id',$request->id)
                        ->get();
    
            foreach($gallery as $img){
    
                if(!empty($img->img) &&
                    file_exists(env('IMAGE_UPLOAD_PATH').'event/gallery/'.$img->img)){
    
                    unlink(env('IMAGE_UPLOAD_PATH').'event/gallery/'.$img->img);
    
                }
    
            }
    
            DB::table('event_gallery')
                ->where('event_id',$request->id)
                ->delete();
    
            DB::table('events')
                ->where('id',$request->id)
                ->delete();
    
        }
    
        return response()->json([
            'status' => true
        ]);
    
    }

    public function status($id)
    {
    
        $event = DB::table('events')
                    ->where('id', $id)
                    ->first();
    
        if ($event) {
    
            $status = ($event->status == 1) ? 0 : 1;
    
            DB::table('events')
                ->where('id', $id)
                ->update([
    
                    'status' => $status
    
                ]);
    
        }
    
        return redirect()
                ->back()
                ->with('success', 'Status Updated Successfully.');
    
    }

}