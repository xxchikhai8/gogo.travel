<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Flights;
use App\Models\Plane;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EnterpriseController extends Controller
{
    public function index()
    {
        $usernames = Auth::user()->username;
        $airline = DB::table('airlines')->where('username', $usernames)->value('airlineCode');
        $flights = DB::table('flights')->where('planeID', 'LIKE', "%{$airline}%")->orderByDesc('id')->paginate(10);
        foreach ($flights as $flight) {
            $depart = DB::table('airport')->where('airportCode', $flight->departure)->value('airportName');
            $flight->departure = $depart;
            $desti = DB::table('airport')->where('airportCode', $flight->destination)->value('airportName');
            $flight->destination = $desti;
        }
        return view('enterprise.index', compact('flights'));
    }

    public function planelist()
    {
        $usernames = Auth::user()->username;
        $airline = DB::table('airlines')->where('username', $usernames)->value('airlineCode');
        $planes = DB::table('plane')->where('airlineCode', $airline)->paginate(10);
        return view('enterprise.plane', compact('planes'));
    }

    public function ticketlist()
    {
        $usernames = Auth::user()->username;
        $airline = DB::table('airlines')->where('username', $usernames)->value('airlineCode');
        $tickets = DB::table('tickets')->join('flights', 'flights.flightID', '=', 'tickets.flightID')
        ->where('planeID', 'LIKE', "%{$airline}%")->orderByDesc('tickets.id')->paginate(10);
        return view('enterprise.ticket', compact('tickets'));
    }

    public function newflight()
    {
        $usernames = Auth::user()->username;
        $airline = DB::table('airlines')->where('username', $usernames)->value('airlineCode');
        $planes = DB::table('plane')->where('airlineCode', $airline)->get();
        $airports = DB::table('airport')->orderByRaw("LOWER(SUBSTRING_INDEX(location, ', ', -1)) asc")->get();
        return view('enterprise.new-flight', compact('planes', 'airports'));
    }

    public function newplane(Request $request)
    {
        return view('enterprise.new-plane');
    }

    public function GetUpdateFlight(Request $request, $id)
    {
        $flight = DB::table('flights')->where('flightID', $id)->first();
        $usernames = Auth::user()->username;
        $airline = DB::table('airlines')->where('username', $usernames)->value('airlineCode');
        $planes = DB::table('plane')->where('airlineCode', $airline)->get();
        $airports = DB::table('airport')->orderByRaw("LOWER(SUBSTRING_INDEX(location, ', ', -1)) asc")->get();
        return view('enterprise.update-flight', compact('flight', 'planes', 'airports'));
    }

    public function GetUpdatePlane(Request $request, $id)
    {
        $plane = DB::table('plane')->where('planeID', $id)->first();
        return view('enterprise.update-plane', compact('plane'));
    }

    public function saveflight(Request $request)
    {
        $this->validate($request, [
            'flightID'=>'required',
            'planeID'=>'required',
            'departure'=>'required',
            'destination'=>'required',
            'departDay'=>'required',
            'boardingTime'=>'required',
            'flightTime'=>'required',
            'returnDay'=>'required',
            'ticketPrice'=>'required',
        ],[
            'flightID.required' => 'Please Enter Flight No',
            'planeID.required' => 'Please Choose Plane No',
            'departure.required' => 'Please Choose Departure',
            'destination.required' => 'Please Choose Destination',
            'departDay.required' => 'Please Enter Departure Date',
            'boardingTime.required' => 'Please Enter Boarding Time',
            'flightTime.required' => 'Please Enter Flight Time',
            'returnDay.required' => 'Please Enter Return Date',
            'ticketPrice.required' => 'Please Enter Price of Ticker',
        ]);
        if (DB::table('flights')->where('flightID', $request->input('flightID'))->exists())
        {
            return redirect('/flight/new')->with('notify', 'exits');
        }
        else {
            $saveflight = new Flights;
            $saveflight->flightID = $request->input('flightID');
            $saveflight->planeID = $request->input('planeID');
            $saveflight->departure = $request->input('departure');
            $saveflight->destination = $request->input('destination');
            $saveflight->departDay = $request->input('departDay');
            $saveflight->boardingTime = $request->input('boardingTime');
            $saveflight->flightTime = $request->input('flightTime');
            $saveflight->returnDay = $request->input('returnDay');
            $saveflight->priceTicket = $request->input('ticketPrice');
            $saveflight->state = "Excepted";
            $saveflight->save();
            return redirect('/flight')->with('notify', 'newSuccess');
        }
    }

    public function saveplane(Request $request)
    {
        $this->validate($request, [
            'planeID'=>'required',
            'planeType'=>'required',
        ],[
            'planeID.required' => 'Please Enter Plane No',
            'planeType.required' => 'Please Choose Plane Type',
        ]);
        $username = Auth::user()->username;
        $airlineCode = DB::table('airlines')->where('username', $username)->value('airlineCode');
        if (DB::table('plane')->where('planeID', $request->input('planeID'))->where('airlineCode', $airlineCode)->exists()) {
            return redirect('/planes/new')->with('notify', 'exits');
        } else {
            $saveplane = new Plane;
            $saveplane->airlineCode = $airlineCode;
            $saveplane->planeID = $request->input('planeID');
            $saveplane->planeType = $request->input('planeType');
            $saveplane->save();
            return redirect('/planes')->with('notify', 'newSuccess');
        }
        ;
    }

    public function PostUpdateFlight(Request $request, $id)
    {
        $this->validate($request, [
            'flightID'=>'required',
            'planeID'=>'required',
            'departure'=>'required',
            'destination'=>'required',
            'departDay'=>'required',
            'boardingTime'=>'required',
            'flightTime'=>'required',
            'returnDay'=>'required',
            'ticketPrice'=>'required',
        ],[
            'flightID.required' => 'Please Enter Flight No',
            'planeID.required' => 'Please Choose Plane No',
            'departure.required' => 'Please Choose Departure',
            'destination.required' => 'Please Choose Destination',
            'departDay.required' => 'Please Enter Departure Date',
            'boardingTime.required' => 'Please Enter Boarding Time',
            'flightTime.required' => 'Please Enter Flight Time',
            'returnDay.required' => 'Please Enter Return Date',
            'ticketPrice.required' => 'Please Enter Price of Ticker',
        ]);
        $old = DB::table('flights')->where('flightID', $id)->value('flightID');
        if (DB::table('flights')->where('flightID', $request->input('flightID'))->exists() && $old != $request->input('flightID')) {
            return redirect($request->input('current_page'))->with('notify', 'editFail');
        }
        else {
            $saveflight = Flights::where('flightID', $id)->first();
            $saveflight->flightID = $request->input('flightID');
            $saveflight->planeID = $request->input('planeID');
            $saveflight->departure = $request->input('departure');
            $saveflight->destination = $request->input('destination');
            $saveflight->departDay = $request->input('departDay');
            $saveflight->boardingTime = $request->input('boardingTime');
            $saveflight->flightTime = $request->input('flightTime');
            $saveflight->returnDay = $request->input('returnDay');
            $saveflight->priceTicket = $request->input('ticketPrice');
            $saveflight->state = $request->input('state');
            $saveflight->update();
            return redirect('/flight')->with('notify', 'editSuccess');
        }
    }

    public function PostUpdatePlane(Request $request, $id)
    {
        $this->validate($request, [
            'planeID'=>'required',
            'planeType'=>'required',
        ],[
            'planeID.required' => 'Please Enter Plane No',
            'planeType.required' => 'Please Choose Plane Type',
        ]);
        $username = Auth::user()->username;
        $airlineCode = DB::table('airlines')->where('username', $username)->value('airlineCode');
        $old = DB::table('plane')->where('planeID', $id)->where('airlineCode', $airlineCode)->value('PlaneID');
        if (DB::table('plane')->where('planeID', $request->input('planeID'))->where('airlineCode', $airlineCode)->exists() && $old != $request->input('planeID') ) {
            return redirect($request->input('current_page'))->with('notify', 'editFail');
        }
        else {
            $saveplane = Plane::where('planeID', $id)->first();
            $saveplane->planeID = $request->input('planeID');
            $saveplane->planeType = $request->input('planeType');
            $saveplane->update();
            return redirect('/planes')->with('notify', 'updateSuccess');
        }
    }

    public function dashboard(Request $request)
    {
        $currentYear = date('Y');
        $airlineCode = DB::table('airlines')->where('username', Auth::user()->username)->value('airlineCode');
        $revenue1 = DB::table('tickets')->join('flights', 'flights.flightID', '=', 'tickets.flightID')
        ->where('planeID', 'LIKE', "%{$airlineCode}%")
        ->whereYear('bookingDay', '=', $request->input('year'))
        ->whereMonth('bookingDay', '=', 1)->sum('ticketPrice');
        $revenue2 = DB::table('tickets')->join('flights', 'flights.flightID', '=', 'tickets.flightID')
        ->where('planeID', 'LIKE', "%{$airlineCode}%")
        ->whereYear('bookingDay', '=', $request->input('year'))
        ->whereMonth('bookingDay', '=', 2)->sum('ticketPrice');
        $revenue3 = DB::table('tickets')->join('flights', 'flights.flightID', '=', 'tickets.flightID')
        ->where('planeID', 'LIKE', "%{$airlineCode}%")
        ->whereYear('bookingDay', '=', $request->input('year'))
        ->whereMonth('bookingDay', '=', 3)->sum('ticketPrice');
        $revenue4 = DB::table('tickets')->join('flights', 'flights.flightID', '=', 'tickets.flightID')
        ->where('planeID', 'LIKE', "%{$airlineCode}%")
        ->whereYear('bookingDay', '=', $request->input('year'))
        ->whereMonth('bookingDay', '=', 4)->sum('ticketPrice');
        $revenue5 = DB::table('tickets')->join('flights', 'flights.flightID', '=', 'tickets.flightID')
        ->where('planeID', 'LIKE', "%{$airlineCode}%")
        ->whereYear('bookingDay', '=', $request->input('year'))
        ->whereMonth('bookingDay', '=', 5)->sum('ticketPrice');
        $revenue6 = DB::table('tickets')->join('flights', 'flights.flightID', '=', 'tickets.flightID')
        ->where('planeID', 'LIKE', "%{$airlineCode}%")
        ->whereYear('bookingDay', '=', $request->input('year'))
        ->whereMonth('bookingDay', '=', 6)->sum('ticketPrice');
        $revenue7 = DB::table('tickets')->join('flights', 'flights.flightID', '=', 'tickets.flightID')
        ->where('planeID', 'LIKE', "%{$airlineCode}%")
        ->whereYear('bookingDay', '=', $request->input('year'))
        ->whereMonth('bookingDay', '=', 7)->sum('ticketPrice');
        $revenue8 = DB::table('tickets')->join('flights', 'flights.flightID', '=', 'tickets.flightID')
        ->where('planeID', 'LIKE', "%{$airlineCode}%")
        ->whereYear('bookingDay', '=', $request->input('year'))
        ->whereMonth('bookingDay', '=', 8)->sum('ticketPrice');
        $revenue9 = DB::table('tickets')->join('flights', 'flights.flightID', '=', 'tickets.flightID')
        ->where('planeID', 'LIKE', "%{$airlineCode}%")
        ->whereYear('bookingDay', '=', $request->input('year'))
        ->whereMonth('bookingDay', '=', 9)->sum('ticketPrice');
        $revenue10 = DB::table('tickets')->join('flights', 'flights.flightID', '=', 'tickets.flightID')
        ->where('planeID', 'LIKE', "%{$airlineCode}%")
        ->whereYear('bookingDay', '=', $request->input('year'))
        ->whereMonth('bookingDay', '=', 10)->sum('ticketPrice');
        $revenue11 = DB::table('tickets')->join('flights', 'flights.flightID', '=', 'tickets.flightID')
        ->where('planeID', 'LIKE', "%{$airlineCode}%")
        ->whereYear('bookingDay', '=', $request->input('year'))
        ->whereMonth('bookingDay', '=', 11)->sum('ticketPrice');
        $revenue12 = DB::table('tickets')->join('flights', 'flights.flightID', '=', 'tickets.flightID')
        ->where('planeID', 'LIKE', "%{$airlineCode}%")
        ->whereYear('bookingDay', '=', $request->input('year'))
        ->whereMonth('bookingDay', '=', 12)->sum('ticketPrice');
        $select = $request->input('year');
        return view('enterprise.dashboard', compact('revenue1', 'revenue2', 'revenue3', 'revenue4', 'revenue5', 'revenue6', 'revenue7', 'revenue8', 'revenue9', 'revenue10', 'revenue11', 'revenue12', 'select', 'currentYear'));
    }
}
