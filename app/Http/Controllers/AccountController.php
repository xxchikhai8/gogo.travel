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
        $this->validate($request, [
            'cusName'=>'required',
            'DoB'=>'required',
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email'=>'required|email',
        ],[
            'cusName.required' => 'Please Enter Your Full Name',
            'DoB.required' => 'Please Enter Your Date of Birth',
            'phone.required' => 'Please Enter Your Phone',
            'email.required' => 'Please Enter Your Email',
            'phone.regex' => 'Phone Number format is not valid',
            'email.email' => 'Email format is not valid',
        ]);
        $saveCustomer = Customers::where('username', Auth::user()->username)->first();
        $saveCustomer->cusName = $request->input('cusName');
        $saveCustomer->DoB = $request->input('DoB');
        $saveCustomer->gender = $request->input('gender');
        $saveCustomer->phone = $request->input('phone');
        $saveCustomer->email = $request->input('email');
        $saveCustomer->update();
        return redirect('/management/account/user')->with('notify', 'changeSuccess');
    }

    public function GetChangePassword() {
        return view('accounts.update-password');
    }

    public function PostChangePassword(Request $request) {
        $this->validate($request, [
            'newPass'=>'required',
            'confirmPass'=>'required',
        ],[
            'newPass.required' => 'Please Enter New Password',
            'confirmPass.required' => 'Please Enter Confirm Password',
        ]);
        if ($request->input('newPass') == $request->input('confirmPass')) {
            $user = User::where('username', Auth::user()->username)->first();
            $hash = Hash::make($request->input('newPass'));
            $user->password = $hash;
            $user->update();
            if (Auth::user()->role == 'user') {
                return redirect('//management/account/user')->with('notify', 'changePass');
            }
            else {
                return redirect('/management/account/enterprise')->with('notify', 'changePass');
            }
        }
        else {
            return redirect('/password/changes')->with('notify', 'match');
        }
    }

    public function deleteAccount(Request $request, $username) {
        $delUser = User::where('username', $username)->first();
        $delUser->state = 'not active';
        $delUser->update();
        Auth::logout();
        return redirect('/')->with('notify', 'del');
    }
}
