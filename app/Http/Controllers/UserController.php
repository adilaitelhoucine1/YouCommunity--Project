<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function AddEvent(Request $request)
    {
        //var_dump($request);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        $event = Event::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'date' => $validated['date'],
            'location' => $validated['location'],
            'user_id' => auth()->id(),
        ]);

        return redirect()->back();
    }

    public function ShowMyEventsView(){

        $events = Event::where('user_id', auth()->id())
        ->orderBy('date', 'asc')
        ->get();

        return view('Myevents', [
        'events' => $events
        ]);
       
    }



    public function destroy(Event $event)
    {
        if ($event->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à supprimer cet événement.');
        }

   
            $event->delete();
            
            return redirect()->route('events.my');

    }







} 