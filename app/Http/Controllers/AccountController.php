<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class AccountController extends Controller
{
    public function accountUser() {
        $username = Auth::user()->username;
        $customer = DB::table('customers')->where('username', $username)->first();
        return view('accounts.index', compact('customer'));
    }

    public function accountEnterprise() {
        return view('accounts.enterprise');
    }
}
