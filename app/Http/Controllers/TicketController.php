<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        // Validate the data
        $data = $request->validate([
            'movie_id' => 'required|integer|exists:movies,id',
            'customer_name' => 'required|string|max:100',
            'seat_number' => 'required|string|max:5',
        ]);

        try {
            // Create the ticket
            Ticket::create([
                'movie_id' => $request->movie_id,
                'customer_name' => $data['customer_name'],
                'seat_number' => $data['seat_number'],
            ]);

            // Flash success message
            return redirect()
                ->route('movies/view', ['id' => $request->movie_id])
                ->with('success', 'Ticket booked successfully.');
        } catch (\Exception $e) {
            // Flash error message
            return back()->withErrors(['error' => 'An error occurred while booking the ticket. Please try again.']);
        }
    }

    public function update($id)
    {
        $ticket = Ticket::findOrFail($id);

        try {
            $ticket->update([
                'is_checked_in' => 1,
                'check_in_time' => now(),
            ]);

            return redirect()
                ->route('movies/view', ['id' => $ticket->movie_id])
                ->with('success', 'Ticket checked in successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while updating the ticket.']);
        }
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);

        try {
            $ticket->delete();

            return redirect()
                ->route('movies/view', ['id' => $ticket->movie_id])
                ->with('success', 'Ticket deleted successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while deleting the ticket.']);
        }
    }
}