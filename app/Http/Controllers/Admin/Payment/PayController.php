<?php

namespace App\Http\Controllers\Admin\Payment;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\PaymentRequest;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PayController extends Controller
{
    public function pay($payment_request_id)
    {
        DB::transaction(function () use($payment_request_id) {
            $payment_request = PaymentRequest::query()->findOrFail($payment_request_id);
            # main account or company account
            $main_account = Account::query()->where('type', 1)->first();
            # price is unsigned Integer 
            $main_account->update([
                'cash' => $main_account->cash - $payment_request->price
            ]);

            # add price to sub account
            $sub_account = Account::query()->find($payment_request->account_id);
            $sub_account->update([
                'cach' => $sub_account->cash + $payment_request->price
            ]);

            # add to transaction table
            Transaction::query()->create([
                'from_account_id' => $payment_request->account_id,
                'to_account_id' => $sub_account->id,
                'payment_request_id' => $payment_request->id,
                'price' => $payment_request->price
            ]);

            # change status request to paid
            $payment_request->update(['status' => 1]);
        });

        return redirect('home');
    }
}
