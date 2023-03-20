<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Airlines;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        $flights = DB::table('flights')->paginate(10);
        return view('index', compact('flights'));
    }

    public function signin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
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

    public function signout()
    {
        Auth::logout();
        return redirect('/')->with('notify', '2');
    }
}
