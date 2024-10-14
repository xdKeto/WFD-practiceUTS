<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'movie_id' => 'required|integer|exists:movies,id',
            'customer_name' => 'required|string|max:100',
            'seat_number' => 'required|string|max:5',
        ]);

        //  dd($data);
        if (!$data) {
            // send error to previous page
            return redirect()->route('movies/view');
        }

        Ticket::create([
            'movie_id' => $request->movie_id,
            'customer_name' => $data['customer_name'],
            'seat_number' => $data['seat_number'],
        ]);

        return redirect()->route('movies/view', ['id' => $request->movie_id])
                     ->with('success', 'Ticket deleted successfully');
    }

    public function update($id)
    {
     
        $ticket = Ticket::findOrFail($id);


        $ticket->update([
            'is_checked_in' => 1,
            'check_in_time' => now(),
        ]);

        return redirect()
            ->route('movies/view', ['id' => $ticket->movie_id])
            ->with('success', 'Ticket updated successfully');
    }

    public function destroy($id)
    {
        // Ticket::query()->where('id', $id)->delete();
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();
        return redirect()
            ->route('movies/view', ['id' => $ticket->movie_id])
            ->with('success', 'Ticket deleted successfully');
    }
}