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
        $airports = DB::table('airport')->orderByDesc('id')->paginate(10);
        return view('admin.airport', compact('airports'));
    }

    public function newAirport() {
        return view('admin.new-airport');
    }

    public function saveNewAirport(Request $request) {
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
        if ($username->role=='admin') {
            return redirect('/user')->with('notify', 'resetFail');
        }
        else {
            $updateUsername = User::findOrFail($username->id);
            $updateUsername->password = $hashPass;
            $updateUsername->update();
            return redirect('/user')->with('notify', 'resetSuccess');
        }
    }

    public function getUpdateAirport(Request $request, $id) {
        $airport = DB::table('airport')->where('airportCode', $id)->first();
        return view('admin.update-airport', compact('airport'));
    }

    public function postUpdateAirport(Request $request, $id) {
        $airport = Airports::where('airportCode', $id)->first();
        $airport->airportCode = $request->input('airportCode');
        $airport->airportName = $request->input('airportName');
        $airport->location = $request->input('location');
        $airport->update();
        return redirect('/airport')->with('notify', 'updateSuccess');
    }
}
