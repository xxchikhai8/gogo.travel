<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Flights;
use Illuminate\Support\Facades\DB;

class EnterpriseController extends Controller
{
    public function index()
    {
        $usernames = Auth::user()->username;
        $airline = DB::table('airlines')->where('username', $usernames)->value('airlineCode');
        $flights = DB::table('flights')->where('planeID', 'LIKE', "%{$airline}%")->paginate(10);
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
        return view('enterprise.new-flight', compact('planes'));
    }

    public function editflight(Request $request, $id)
    {
        //$flight = Flights::findOrFail($id);
        $flight = DB::table('flights')->where('flightID', $id)->first();
        $usernames = Auth::user()->username;
        $airline = DB::table('airlines')->where('username', $usernames)->value('airlineCode');
        $planes = DB::table('plane')->where('airlineCode', $airline)->get();
        return view('enterprise.update-flight', compact('flight', 'planes'));
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
        $saveflight->flightTime = $request->input('flightTime');
        $saveflight->returnDay = $request->input('returnDay');
        $saveflight->priceTicket = $request->input('ticketPrice');
        $saveflight->state = "Excepted";
        $saveflight->save();
        return redirect('/flight')->with('notify', 'newSuccess');
    }

    public function updateflight(Request $request, $id)
    {
        $saveflight = Flights::findOrFail($id);
        $saveflight->flightID = $request->input('flightID');
        $saveflight->planeID = $request->input('planeID');
        $saveflight->departure = $request->input('departure');
        $saveflight->destination = $request->input('destination');
        $saveflight->departDay = $request->input('departDay');
        $saveflight->flightTime = $request->input('flightTime');
        $saveflight->returnDay = $request->input('returnDay');
        $saveflight->priceTicket = $request->input('ticketPrice');
        $saveflight->state = $request->input('state');
        $saveflight->update();
        return redirect('/flight')->with('notify', 'updateSuccess');
    }

    public function dashboard()
    {
        return view('enterprise.statistics');
    }
}
