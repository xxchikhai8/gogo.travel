<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Flights;
use Illuminate\Http\Request;
class TicketController extends Controller
{
    public function index(Request $request, $id)
    {
        $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $char1 = 'ABCDEFGHIJK';
        $ticketID = '';
        for ($i = 0; $i < 4; $i++) {
            $ticketID .= $char[rand(0, strlen($char) - 1)];
        }
        for ($i = 0; $i < 8; $i++) {
            $ticketID .= rand(0, 9);
        }
        $luggage = $char1[rand(0, strlen($char1) - 1)] . ' - ' . '0' . rand(1, 9);
        $gate = $char1[rand(0, strlen($char1) - 1)] . ' - ' . '0' . rand(1, 9);
        $flight = DB::table('flights')->where('flightID', $id)->first();
        $depart = DB::table('airport')->where('airportCode', $flight->departure)->value('airportName');
        $departlocation = DB::table('airport')->where('airportCode', $flight->departure)->value('location');
        $airlineCode = DB::table('plane')->where('planeID', $flight->planeID)->value('airlineCode');
        $carrier= DB::table('airlines')->where('airlineCode', $airlineCode)->value('airlineName');
        $departCode = $flight->departure;
        $flight->departure = $depart;
        $desti = DB::table('airport')->where('airportCode', $flight->destination)->value('airportName');
        $destilocation = DB::table('airport')->where('airportCode', $flight->destination)->value('location');
        $destiCode = $flight->destination;
        $flight->destination = $desti;
        return view('ticket.booking-ticket', compact('flight', 'ticketID', 'carrier', 'luggage', 'gate', 'departlocation', 'destilocation', 'departCode', 'destiCode'));
    }

    public function booking(Request $request)
    {

        $saveTicket = new Tickets;
        $saveTicket->ticketID = $request->input('ticketID');
        $saveTicket->flightID = $request->input('flightID');
        $saveTicket->username = Auth::user()->username;
        $saveTicket->passengerName = $request->input('passengerName');
        $saveTicket->luggage = $request->input('luggage');
        $saveTicket->gate = $request->input('gate');
        $saveTicket->seetClass = $request->input('seetClass');
        if ($request->input('seetClass')=='Bussiness') {
            $char = 'ABCD';
            $seet = $char[rand(0, strlen($char) - 1)]. ' - ' . '0' . rand(1, 4);

        }
        else {
            $char = 'ABCDEG';
            $seet = $char[rand(0, strlen($char) - 1)];
            for ($i = 0; $i < 8; $i++) {
                $seet .= rand(1, 4);
            }
        }
        $saveTicket->seet = $seet;
        $saveTicket->ticketPrice = $request->input('ticketPrice');
        $saveTicket->bookingDay = '06-01-2001';
        $state = DB::table('flights')->where('state', $request->input('flightID'))->value('state');
        $saveTicket->state = $state;
        $saveTicket->save();
    }
}
