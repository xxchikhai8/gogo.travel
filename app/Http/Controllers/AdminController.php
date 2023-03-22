<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Airports;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index() {
        $users = DB::table('users')->paginate(10);
        return view('admin.index', compact('users'));
    }

    public function airport() {
        $airports = DB::table('airport')->paginate(10);
        return view('admin.airport', compact('airports'));
    }

    public function callNewAirportIndex() {
        return view('admin.new-airport');
    }

    public function newAirport(Request $request) {
        $saveAirport = new Airports;
        $saveAirport->airportCode = $request->input('airportCode');
        $saveAirport->airportName = $request->input('airportName');
        $saveAirport->location = $request->input('location');
        $saveAirport->save();
        return redirect('/airport')->with('notify', 'newSuccess');
    }

    public function reset($id) {
        $newPass = 'a123456';
        $hashPass = Hash::make($newPass);
        $username = DB::table('users')->where('username', $id)->first();
        $updateUsername = User::findOrFail($username->id);
        $updateUsername->password = $hashPass;
        $updateUsername->update();
        return redirect('/user')->with('notify', 'resetSuccess');
    }
}
