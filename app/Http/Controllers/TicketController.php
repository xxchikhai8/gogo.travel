<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Flights;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(Request $request, $id)
    {
        $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $ticketID = '';
        for ($i = 0; $i < 4; $i++) {
            $ticketID .= $char[rand(0, strlen($char) - 1)];
        }
        for ($i = 0; $i < 8; $i++) {
            $ticketID .= rand(0, 9);
        }
        $flight = DB::table('flights')->where('flightID', $id)->first();
        //$flight = Flights::findOrFail($flightID);
        return view('ticket.booking-ticket', compact('flight', 'ticketID'));
    }

    public function booking()
    {
        if (Auth::check()) {
            return redirect('/');
        } else {
            return redirect('/booking-ticket/#sign-in-modal');
        }
    }
}
