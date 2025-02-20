<?php

namespace App\Http\Controllers;

use App\Models\Event;
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
        if ($event->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à supprimer cet événement.');
        }

        $event->delete();
        return redirect()->route('events.myevents')->with('success', 'Événement supprimé avec succès');
    }

    public function update(Request $request, Event $event)
    {
        if ($event->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à modifier cet événement.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'lieu' => 'required|string|max:255',
            'date' => 'required|date',
            'max_participants' => 'nullable|integer|min:1',
        ]);

        // Update status based on date
        if ($validated['date'] < now()) {
            $validated['status'] = 'Passé';
        }

        $event->update($validated);

        return redirect()->route('events.myevents')
            ->with('success', 'Événement mis à jour avec succès');
    }

    public function dashboard()
    {
        $events = Event::where('user_id', auth()->id())
            ->orderBy('date', 'asc')
            ->get();

        return view('dashboard', [
            'events' => $events
        ]);
    }
} 