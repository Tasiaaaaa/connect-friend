<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    //
    public function showPaymentPage()
    {
        $user = Auth::user();
        $price = $user->register_price;
        return view('pay', compact('price'));
    }
}
