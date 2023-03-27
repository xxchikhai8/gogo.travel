<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Airlines;
use App\Models\Customers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        $flights = DB::table('flights')->paginate(10);
        $airports = DB::table('airport')->get();
        foreach ($flights as $flight) {
            $depart = DB::table('airport')->where('airportCode', $flight->departure)->value('airportName');
            $flight->departure = $depart;
            $desti = DB::table('airport')->where('airportCode', $flight->destination)->value('airportName');
            $flight->destination = $desti;
        }
        return view('index', compact('flights', 'airports'));
    }

    public function signin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Plese Enter Username',
            'password.requires' => 'Plase Enter Password'
        ]);
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            if (Auth::user()->role == 'user') {
                if (Auth::user()->state == 'not active') {
                    return redirect('/')->with('notify', 'active');
                } else {
                    return redirect('/')->with('notify', '0');
                }
            } else if (Auth::user()->role == 'enterprise') {
                return redirect('/flight')->with('notify', '0');
            } else if (Auth::user()->role == 'admin') {
                return redirect('/user')->with('notify', 'admin');
            }
        } else {
            return redirect('/')->with('notify', '1');
        }
    }

    public function signup(Request $request)
    {
        if ($request->input('password') == $request->input('confpassword')) {
            if (DB::table('users')->where('username', $request->input('username'))->exists()) {
                return redirect('/')->with('notify', 'exists');
            } else if ($request->input('role') == 'user') {
                $users = new User;
                $users->username = $request->input('username');
                $password = $request->input('password');
                $hash = Hash::make($password);
                $users->password = $hash;
                $users->role = $request->input('role');
                $users->state = 'active';
                $users->save();
                $customer = new Customers;
                $customer->username = $request->input('username');
                $customer->save();
                return redirect('/')->with('notify', 'signupSuccess');
            } else {
                $users = new User;
                $users->username = $request->input('username');
                $password = $request->input('password');
                $hash = Hash::make($password);
                $users->password = $hash;
                $users->role = $request->input('role');
                $users->state = 'active';
                $airline = new Airlines;
                $airline->username = $request->input('username');
                $airline->airlineName = $request->input('airlineName');
                $airline->airlineCode = $request->input('airlineCode');
                $airline->enterpriseNum = $request->input('enterpriseNum');
                $airline->Nation = $request->input('nation');
                $users->save();
                $airline->save();
                return redirect('/')->with('notify', 'signupSuccess');
            }
        } else {
            return redirect('/')->with('notify', 'confPass');
        }
    }

    public function searchflights(Request $request)
    {
        if ($request->input('departDay')!=null)
        {
            $flights = DB::table('flights')->where('departure', $request->input('departure'))->where('destination', $request->input('destination'))->paginate(10);
        }
        else {
            $flights = DB::table('flights')->where('departure', $request->input('departure'))->where('destination', $request->input('destination'))->where('departDay', $request->input('departDay'))->paginate(10);
        }
        $airports = DB::table('airport')->get();
        dd($airports);
        return view('index', compact('flights', 'airports'));
    }

    public function signout()
    {
        Auth::logout();
        return redirect('/')->with('notify', '2');
    }
}
