<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTimeImmutable;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function accountUser() {
        $username = Auth::user()->username;
        $customer = DB::table('customers')->where('username', $username)->first();
        if ($customer->gender=='') {
            $customer->gender = 2;
        }
        $date = new DateTimeImmutable($customer->DoB);
        $customer->DoB = date_format($date, 'd-m-Y');
        return view('accounts.index', compact('customer'));
    }

    public function accountEnterprise() {
        $enterprise = DB::table('airlines')->where('username', Auth::user()->username)->first();
        return view('accounts.enterprise', compact('enterprise'));
    }

    public function GetUpdateInformation() {
        $username = Auth::user()->username;
        $customer = DB::table('customers')->where('username', $username)->first();
        return view('accounts.update-information', compact('customer'));
    }

    public function PostUpdateInformation(Request $request) {
        $saveCustomer = Customers::where('username', Auth::user()->username)->first();
        $saveCustomer->cusName = $request->input('cusName');
        $saveCustomer->DoB = $request->input('DoB');
        $saveCustomer->gender = $request->input('gender');
        $saveCustomer->phone = $request->input('phone');
        $saveCustomer->email = $request->input('email');
        $saveCustomer->update();
        return redirect('/management-user-account')->with('notify', 'changeSuccess');
    }

    public function GetChangePassword() {
        return view('accounts.update-password');
    }

    public function PostChangePassword(Request $request) {
        if ($request->input('newPass') == $request->input('confirmPass')) {
            $user = User::where('username', Auth::user()->username)->first();
            $hash = Hash::make($request->input('newPass'));
            $user->password = $hash;
            $user->update();
            if (Auth::user()->role == 'user') {
                return redirect('/management-user-account')->with('notify', 'changePass');
            }
            else {
                return redirect('/management-enterprise-account')->with('notify', 'changePass');
            }
        }
        else {
            return redirect('/change-password')->with('notify', 'match');
        }
    }
}
