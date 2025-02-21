<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Comment;
use App\Models\Reservation;
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

    public function AddReservation(Request $request)
    {
        $event_id = $request->input('event_id');
        $event = Event::findOrFail($event_id);
        
        
        if ($event->max_participants) {
            $current_reservations = $event->reservations()->where('status', 'confirmé')->count();
            if ($current_reservations >= $event->max_participants) {
                return redirect()->back()->with('error', 'Désolé, cet événement est complet.');
            }
        }
        
        
        $existing_reservation = Reservation::where('user_id', auth()->id())
            ->where('event_id', $event_id)
            ->first();
            
        if ($existing_reservation) {
            return redirect()->back()->with('error', 'Vous avez déjà réservé pour cet événement.');
        }
      
        Reservation::create([
            'user_id' => auth()->id(),
            'event_id' => $event_id,
            'status' => 'confirmé'
        ]);
        
        return redirect()->back()->with('success', 'Votre réservation a été enregistrée avec succès !');
    }

    public function showReservations()
    {
        $reservations = Reservation::where('user_id', auth()->id())
            ->with('event')  // Eager load les relations
            ->orderBy('created_at', 'desc')
            ->get();

        return view('Reservation', ['reservations' => $reservations]);
    }

    public function cancelReservation(Reservation $reservation)
    {
        if ($reservation->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Non autorisé');
        }

        $reservation->delete();
        return redirect()->back()->with('success', 'Réservation Supprimée avec succès');
    }
} 