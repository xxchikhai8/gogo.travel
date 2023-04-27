<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Flights;
use Carbon\Carbon;
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
        $this->validate($request, [
            'passengerName'=>'required',
            'citizenID' => 'required'
        ],[
            'passengerName.required' => 'Please Enter Name of Passenger ',
            'citizenID.required' => 'Please Enter Citizen Number'
        ]);
        $saveTicket = new Tickets;
        $url = '/ticket/booking' . '/' . $request->input('flightID');
        $saveTicket->ticketID = $request->input('ticketID');
        $saveTicket->flightID = $request->input('flightID');
        $saveTicket->username = Auth::user()->username;
        $saveTicket->passengerName = $request->input('passengerName');
        $saveTicket->citizenID = $request->input('citizenID');
        $saveTicket->luggage = $request->input('luggage');
        $saveTicket->gate = $request->input('gate');
        $saveTicket->seatClass = $request->input('seatClass');
        if ($request->input('seetClass')=='Bussiness') {
            $char = 'ABCD';
            $seat = $char[rand(0, strlen($char) - 1)]. ' - ' . '0' . rand(1, 4);
        }
        else {
            $char = 'ABCDEG';
            $seat = $char[rand(0, strlen($char) - 1)] . ' - ';
            for ($i = 0; $i < 2; $i++) {
                $seat .= rand(1, 4);
            }
        }
        $saveTicket->seat = $seat;

        if (isset($request->returnOrNot)) {
            $saveTicket->ticketType = 'Two-Way Ticket';
            $saveTicket->ticketPrice = $request->input('ticketPrice')*1.8;
        }
        else {
            $saveTicket->ticketType = 'One-Way Ticket';
            $saveTicket->ticketPrice = $request->input('ticketPrice');
        }
        $currenDay = Carbon::now();
        $saveTicket->bookingDay = $currenDay;
        $state = DB::table('flights')->where('flightID', $request->input('flightID'))->value('state');
        $saveTicket->state = $state;
        $saveTicket->save();
        return redirect($url)->with('notify', 'bookSuccess');
    }

    public function ticketList() {
        $ticketLst = DB::table('tickets')->join('flights', 'flights.flightID', '=', 'tickets.flightID')
        ->join('plane', 'plane.planeID', '=', 'flights.planeID')
        ->join('airlines', 'airlines.airlineCode', '=' , 'plane.airlineCode')
        ->join('airport', 'airportCode', '=', 'flights.departure')
        ->where('tickets.username', Auth::user()->username)->orderByDesc('tickets.id')->get();
        foreach ($ticketLst as $ticketItem) {
            $depart = DB::table('airport')->where('airportCode', $ticketItem->departure)->value('airportName');
            $ticketItem->departure = $depart;
            $desti = DB::table('airport')->where('airportCode', $ticketItem->destination)->value('airportName');
            $ticketItem->destination = $desti;
        }
        $airport = DB::table('airport')->get();
        return view('ticket.ticket-booked', compact('ticketLst', 'airport'));
    }

    public function ticketDetail(Request $request, $id) {
        $ticket = DB::table('tickets')->where('ticketID', $id)->first();
        $flight = DB::table('flights')->where('flightID', $ticket->flightID)->first();
        $airlineCode = DB::table('plane')->where('planeID', $flight->planeID)->value('airlineCode');
        $carrier = DB::table('airlines')->where('airlineCode', $airlineCode)->value('airlineName');
        $depart = DB::table('airport')->where('airportCode', $flight->departure)->first();
        $departCode = $flight->departure;
        $departLocation = $depart->location;
        $flight->departure = $depart->airportName;
        $desti = DB::table('airport')->where('airportCode', $flight->destination)->first();
        $destiCode = $flight->destination;
        $flight->destination = $desti->airportName;
        $destiLocation = $desti->location;
        return view('ticket.ticket-detail', compact('ticket', 'departCode', 'destiCode', 'carrier', 'flight', 'departLocation', 'destiLocation'));
    }
}
