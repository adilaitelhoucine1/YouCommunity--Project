<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Comment;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function AddEvent(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'lieu' => 'required|string|max:255',
            'max_participants' => 'nullable|integer|min:1',
        ]);

        $event = Event::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'date' => $validated['date'],
            'location' => $validated['location'],
            'lieu' => $validated['lieu'],
            'max_participants' => $validated['max_participants'],
            'user_id' => auth()->id(),
            'status' => 'A venir'
        ]);

        return redirect()->back();
    }

    public function ShowMyEventsView()
    {
        $events = Event::where('user_id', auth()->id())
            ->orderBy('date', 'asc')
            ->get();

        return view('Myevents', [
            'events' => $events
        ]);
    }

    public function destroy(Event $event)
    {
      

        $event->delete();
        return redirect()->route('events.myevents');
    }

    public function update(Request $request, Event $event)
    {
       

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'lieu' => 'required|string|max:255',
            'date' => 'required|date',
            'max_participants' => 'nullable|integer|min:1',
        ]);

        $event->update($validated);

        return redirect()->route('events.myevents');
    }

    public function dashboard()
    {
        $events = Event::select('*')
            ->orderBy('date', 'asc')
            ->get();

        return view('dashboard', [
            'events' => $events
        ]);
    }

    public function changeStatus($id)
    {
        $event = Event::find($id);
        
        if($event->status === 'A venir') {
            $event->status = 'Passé';
        } else {
            $event->status = 'A venir';
        }
        
        $event->save();
        return redirect()->route('events.myevents');
    }

    public function ShowDetailsView($id){
        $event=Event::find($id);

       return  view('EventDetails',["event"=>$event]);
    }

    public function showDetails($id)
    {
        $event = Event::with(['comments.user'])->find($id);
        
        return view('EventDetails', [
            'event' => $event,
            'comments' => $event->comments()->get()
        ]);
    }
     
    public function AddComment(Request $request)
    {
        $validated = $request->validate([
            'comment' => 'required|string',
            'event_id' => 'required|exists:events,id'
        ]);

        Comment::create([
            'contenu' => $validated['comment'],
            'event_id' => $validated['event_id'],
            'user_id' => auth()->id()
        ]);

        return redirect()->back();
    }

    public function deleteComment(Comment $comment)
    {
       // dd($comment);
        $comment->delete();
        return redirect()->back();
    }
} 