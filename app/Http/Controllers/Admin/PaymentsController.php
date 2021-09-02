<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function all()
    {
        $payments = Payment::paginate(10);

        return view('admin.payments.all', compact('payments'));
    }
}
