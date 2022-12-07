<?php

namespace App\Http\Controllers\Admin\Payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Payment\StorePaymentRequest;
use App\Http\Services\Upload\UploadFile;
use App\Models\Account;
use App\Models\PaymentRequest;
use Illuminate\Support\Facades\Session;

class PaymentRequestController extends Controller
{
    public function index()
    {
        $paymentRrequests = PaymentRequest::query()
            ->with(['account', 'user'])
            ->get();
        return view('admin.payment.index', compact('paymentRrequests'));
    }

    public function store(StorePaymentRequest $storePaymentRequest, UploadFile $uploadFile)
    {
        $user = auth()->user();
        $account = Account::query()->where('account_number', $storePaymentRequest->account)->first();

        $file_name = $uploadFile->upload($storePaymentRequest->file, "/payment/");
        PaymentRequest::query()->create([
            'user_id' => $user->id,
            'account_id' => $account->id,
            'price' => $storePaymentRequest->price,
            'file_name' => $file_name,
        ]);
        Session::flash('success', ' با موفقیت اضافه شد');
        return redirect(route('home'));
    }

}
