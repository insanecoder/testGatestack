<?php

namespace App\Http\Controllers;


use Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use Illuminate\Support\Facades\Request;
use App\Services\PaymentService;

class PaymentController extends Controller{
    
    private $paymentService;
    
    public function __construct(PaymentService $ps) {
        $this->paymentService= $ps;
    }
	
    public function makePayment(){
//        $orderID= substr(str_shuffle(str_repeat("0123456789", 5)), 0, 5);
//        $paramList["MID"] = env('PAYTM_MID');
//        $paramList["ORDER_ID"] = $orderID;//Request::get('order_id');
//        $paramList["CUST_ID"] = "cust_$orderID";
//        $paramList["INDUSTRY_TYPE_ID"] = env('PAYTM_INDUSTRY_TYPE');
//        $paramList["CHANNEL_ID"] = "WEB";
//        $paramList["TXN_AMOUNT"] = Request::get('txn_amount');
//        $paramList["WEBSITE"] = "https://gatestack.in/";
//        $paramList["EMAIL"]= Request::get('email');
//        $checkSum = getChecksumFromArray($paramList,env('PAYTM_MERCHANT_KEY'));
//        $paramList["CHECKSUMHASH"]= $checkSum;
//        return view('test/processPayment',['paramList'=>$paramList]);
        $payment = PaytmWallet::with('receive');
        $payment->prepare([
          'order' => substr(str_shuffle(str_repeat("0123456789", 5)), 0, 5),
            'user' => '123',
            'mobile_number' => '9643587956',
          'email' => Request::get('email'),
          'amount' => 100,
          'callback_url' => route('sucessPayment'),
        ]);
        return $payment->receive();
    }
    
    public function paymentSuccess() {
        $transaction = PaytmWallet::with('receive');
        $response = $transaction->response();
        var_dump($response);die;
    }
    
    public function createOrder(){
        $params= Request::input();
        $this->paymentService->createOrder($params);
    }
}