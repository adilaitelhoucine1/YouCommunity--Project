<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $events = Event::where('user_id', Auth::id())
                      ->orderBy('date', 'desc')  
                      ->get();

      
        $stats = [
            'total_events' => Event::where('user_id', Auth::id())->count(),
            'upcoming_events' => Event::where('user_id', Auth::id())
                                    ->where('date', '>', now())
                                    ->count(),
            'past_events' => Event::where('user_id', Auth::id())
                                 ->where('date', '<', now())
                                 ->count()
        ];

        return view('dashboard', compact('events', 'stats'));
    }
} 