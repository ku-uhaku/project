<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;

class PDFPaymentController extends Controller
{
    public function generatePaymentPDF($user)
    {
        $payments = Payment::with('user')->where('student_id', $user)->get();
        $user = User::findOrFail($user);




        $data = [
            'title' => 'E_AutoEcole',
            'date' => date('m/d/Y'),
            'payments' => $payments,
            'user' => $user,
        ];

        $pdf = PDF::loadView('PDF.pdfPayment', $data);

        return $pdf->download($user->name . '.pdf');
    }
}
