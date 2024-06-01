<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Transactions;

class DashboardController extends Controller
{
   

    public function dashboard(){

        $transactionsCount = Transactions::count();
        $title = "Dashboard";
        $username = Auth::user()->username;
        return view ('dashboard', compact('title' , 'username', 'transactionsCount'));

    }
}
