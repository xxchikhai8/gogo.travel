<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Flights;
use App\Models\Plane;
use Illuminate\Support\Facades\DB;

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
        return view('enterprise.ticket');
    }

    public function newflight()
    {
        $usernames = Auth::user()->username;
        $airline = DB::table('airlines')->where('username', $usernames)->value('airlineCode');
        $planes = DB::table('plane')->where('airlineCode', $airline)->get();
        $airports = DB::table('airport')->get();
        return view('enterprise.new-flight', compact('planes', 'airports'));
    }

    public function newplane(Request $request)
    {
        return view('enterprise.new-plane');
    }

    public function GetUpdateFlight(Request $request, $id)
    {
        //$flight = Flights::findOrFail($id);
        $flight = DB::table('flights')->where('flightID', $id)->first();
        $usernames = Auth::user()->username;
        $airline = DB::table('airlines')->where('username', $usernames)->value('airlineCode');
        $planes = DB::table('plane')->where('airlineCode', $airline)->get();
        $airports = DB::table('airport')->get();
        return view('enterprise.update-flight', compact('flight', 'planes', 'airports'));
    }

    public function GetUpdatePlane(Request $request, $id)
    {
        $plane = DB::table('plane')->where('planeID', $id)->first();
        return view('enterprise.update-plane', compact('plane'));
    }

    public function saveflight(Request $request)
    {
        //Check Error
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

    public function saveplane(Request $request)
    {
        $username = Auth::user()->username;
        $airlineCode = DB::table('airlines')->where('username', $username)->value('airlineCode');
        if (DB::table('plane')->where('planeID', $request->input('planeID'))->where('airlineCode', $airlineCode)->exists()) {
            return redirect('/new-plane')->with('notify', 'duplicate');
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
        $saveflight = Flights::findOrFail($id);
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
        return redirect('/flight')->with('notify', 'updateSuccess');
    }

    public function PostUpdatePlane(Request $request, $id)
    {
        $saveplane = Plane::findOrFail($id);
        return view('/plane')->with('notify', 'updateSuccess');
    }

    public function dashboard()
    {
        return view('enterprise.dashboard');
    }
}
