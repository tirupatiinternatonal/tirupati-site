<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventExpoController extends Controller
{
    public function eventsExpo(Request $request)
    {
        // 1. Sidebar ke liye saare active events
        $events = DB::table('events')
                    ->where('status', 1)
                    ->orderBy('event_date', 'desc')
                    ->get();

        // 2. Agar URL mein ?id= aaya hai toh wo event dikhao, nahi toh sabse pehla dikhao
        $eventId = $request->query('id');

        if ($eventId) {
            $event = DB::table('events')
                        ->where('status', 1)
                        ->where('id', $eventId)
                        ->first();
        } else {
            $event = DB::table('events')
                        ->where('status', 1)
                        ->orderBy('event_date', 'desc')
                        ->first();
        }

        $gallery = [];

        if ($event) {
            $gallery = DB::table('event_gallery')
                        ->where('event_id', $event->id)
                        ->get();
        }

        return view('events_expo', compact('events', 'event', 'gallery'));
    }
}