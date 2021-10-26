<?php

namespace App\Http\Controllers;
use Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use APICredentials;
class UtilityBillsAPIController extends Controller
{
    
//protected $email= config('auth.BILLS_API_EMAIL');
//protected $password= config('auth.BILLS_API_PASSWORD');
//Log::info( $this->email);
public function walletInfo(Request $request){

$response = Http::withHeaders([
'Content-Type' => 'application/json',
'email' => APICredentials::email,
'password' =>APICredentials::password
])->post('https://www.api.ringo.ng/api/agent/p2', [
    'serviceCode'=> $serviceCode
])->throw()->json();

return $response;
}

public function fetchProductPerCategory(Request $request){

$response = Http::withHeaders([
'Content-Type' => 'application/json',
'email' =>  APICredentials::email,
'password' => APICredentials::password
])->post('http://34.74.220.10/ringo/public/ringoPayments/public/api/products', [
    'serviceCode'=> $request->serviceCode
])->throw()->json();

return $response;
}
 
 public function airtimePurchase(Request $request){

        $response = Http::withHeaders([
        'Content-Type' => 'application/json',
        'email' => APICredentials::email,
        'password' =>APICredentials::password
        ])->post('http://34.74.220.10/ringo/public/ringoPaytest/public/api/agent/p2', [
                'serviceCode'=> $request->serviceCode,
                'msisdn' => $request->msisdn,
                'amount'=> $request->amount,
                'request_id' => $request->request_id,
                'product_id'=> $request->product_id
        ])->throw()->json();

        return $response;
    }

    public function dataList(Request $request){

$response = Http::withHeaders([
'Content-Type' => 'application/json',
'email' =>  APICredentials::email,
'password' =>  APICredentials::password
])->post('http://34.74.220.10/ringo/public/ringoPaytest/public/api/agent/p2', [
        'serviceCode'=> $request->serviceCode,
        'network' => $request->network
])->throw()->json();

return $response;
}

public function purchaseData(Request $request){

$response = Http::withHeaders([
'Content-Type' => 'application/json',
'email' =>  APICredentials::email,
'password' => APICredentials::password
])->post('http://34.74.220.10/ringo/public/ringoPaytest/public/api/agent/p2', [
        'serviceCode'=> $request->serviceCode,
        'msisdn' =>  $request->msisdn,
        'product_id' =>  $request->product_id,
        'request_id' =>  $request->request_id
])->throw()->json();

return $response;
}

public function requeryTransactionById(Request $request){

$response = Http::withHeaders([
'Content-Type' => 'application/json',
'email' =>  APICredentials::email,
'password' =>  APICredentials::password
])->post('https://www.api.ringo.ng/api/b2brequery', [
        'request_id'=>  $request->request_id
])->throw()->json();

return $response;
}

public function validateElectricityMeterNumber(Request $request){

$response = Http::withHeaders([
'Content-Type' => 'application/json',
'email' => APICredentials::email,
'password' =>  APICredentials::password
])->post('http://34.74.220.10/ringo/public/ringoPaytest/public/api/agent/p2', [
        'serviceCode'=> $request->serviceCode,
        'disco'=> $request->disco,
        'meterNo'=> $request->meterNo,
        'type'=> $request->type,
        'amount'=> $request->amount,
        'phonenumber'=> $request->phoneNumber,
        'request_id'=> $request->request_id,
])->throw()->json();

return $response;
}

public function purchaseElectricity(Request $request){

$response = Http::withHeaders([
'Content-Type' => 'application/json',
'email' => APICredentials::email,
'password' => APICredentials::password
])->post('http://34.74.220.10/ringo/public/ringoPaytest/public/api/agent/p2', [
        'serviceCode'=> $request->serviceCode,
        'disco'=> $request->disco,
        'meterNo'=> $request->meterNo,
        'type'=> $request->type,
        'amount'=> $request->amount,
        'phonenumber'=> $request->phoneNumber,
        'request_id'=> $request->request_id
])->throw()->json();

return $response;
}

public function validateDSTVSmartCardNo(Request $request){

$response = Http::withHeaders([
'Content-Type' => 'application/json',
'email' => APICredentials::email,
'password' =>APICredentials::password
])->post('http://34.74.220.10/ringo/public/ringoPaytest/public/api/agent/p2', [
        'serviceCode'=> $request->serviceCode,
        'type'=> $request->type,
        'smartCardNo'=> $request->smartCardNo,
])->throw()->json();

return $response;
}

public function DSTVPaymentWithAddon(Request $request ){

$response = Http::withHeaders([
'Content-Type' => 'application/json',
'email' =>  APICredentials::email,
'password' => APICredentials::password
])->post('http://34.74.220.10/ringo/public/ringoPaytest/public/api/agent/p2', [
        'serviceCode'=> $request->serviceCode,
        'type'=> $request->type,
        'smartCardNo'=> $request->smartCardNo,
        'name'=> $request->name,
        'code'=> $request->code,
        'period'=> $request->period,
        'request_id'=> $request->request_id,
        'hasAddon'=>'True',
        'addondetails'=>[
            'name' => $request->name,
            'addoncode' => $request->addoncode
            ],
])->throw()->json();

return $response;
}

public function DSTVPayment(Request $request){

$response = Http::withHeaders([
'Content-Type' => 'application/json',
'email' =>  APICredentials::email,
'password' =>  APICredentials::password
])->post('http://34.74.220.10/ringo/public/ringoPaytest/public/api/agent/p2', [
        'serviceCode'=> $request->serviceCode,
        'type'=> $request->type,
        'smartCardNo'=> $request->smartCardNo,
        'name'=> $request->name,
        'code'=> $request->code,
        'period'=> $request->period,
        'request_id'=> $request->request_id,
        'hasAddon'=>'False'
])->throw()->json();

return $response;
}

public function fetchAddonListB(Request $request){

$response = Http::withHeaders([
'Content-Type' => 'application/json',
'email' =>  APICredentials::email,
'password' => APICredentials::password
])->post('https://www.api.ringo.ng/api/dstv/addon', [
        'code'=>$request->code
])->throw()->json();

return $response;
}

public function validateGOTVSmartCardNo(Request $request){

$response = Http::withHeaders([
'Content-Type' => 'application/json',
'email' =>  APICredentials::email,
'password' =>  APICredentials::password
])->post('http://34.74.220.10/ringo/public/ringoPaytest/public/api/agent/p2', [
        'serviceCode'=> $request->serviceCode,
        'type'=> $request->type,
        'smartCardNo'=> $request->smartCardNo
])->throw()->json();

return $response;
}

public function GOTVPayment(Request $request) {

$response = Http::withHeaders([
'Content-Type' => 'application/json',
'email' =>  APICredentials::email,
'password' => APICredentials::password
])->post('http://34.74.220.10/ringo/public/ringoPaytest/public/api/agent/p2', [
        'serviceCode'=> $request->serviceCode,
        'type'=> $request->type,
        'smartCardNo'=> $request->smartCardNo,
        'name'=> $request->name,
        'code'=> $request->code,
        'period'=> $request->period,
        'request_id'=> $request->request_id
])->throw()->json();

return $response;
}

public function validateStartimesNo(Request $request){

$response = Http::withHeaders([
'Content-Type' => 'application/json',
'email' =>  APICredentials::email,
'password' =>  APICredentials::password
])->post('http://34.74.220.10/ringo/public/ringoPaytest/public/api/agent/p2', [
        'serviceCode'=> $request->serviceCode,
        'type'=> $request->type,
        'smartCardNo'=> $request->smartCardNo
])->throw()->json();

return $response;
}

public function StartimesPayment(Request $request){

$response = Http::withHeaders([
'Content-Type' => 'application/json',
'email' =>  APICredentials::email,
'password' =>  APICredentials::password
])->post('http://34.74.220.10/ringo/public/ringoPaytest/public/api/agent/p2', [
        'serviceCode'=> $request->serviceCode,
        'type'=> $request->type,
        'smartCardNo'=> $request->smartCardNo,
        'request_id'=> $request->request_id,
        'price'=> $request->price
])->throw()->json();

return $response;
}

public function validateSmileAccountNumber(Request $request)
{

$response = Http::withHeaders([
'Content-Type' => 'application/json',
'email' =>  APICredentials::email,
'password' => APICredentials::password
])->post('http://34.74.220.10/ringo/public/ringoPaytest/public/api/agent/p2', [
        'serviceCode'=> $request->serviceCode,
        'account'=> $request->account,
        'type'=> $request->type
])->throw()->json();
return $response;
}
public function validateSmileRecharge(Request $request){

$response = Http::withHeaders([
'Content-Type' => 'application/json',
'email' =>  APICredentials::email,
'password' =>  APICredentials::password
])->post('http://34.74.220.10/ringo/public/ringoPaytest/public/api/agent/p2', [
        'serviceCode'=> $request->serviceCode,
        'account'=> $request->account
])->throw()->json();

return $response;
}

public function validateSmileBundleList(Request $request){

$response = Http::withHeaders([
'Content-Type' => 'application/json',
'email' =>  APICredentials::email,
'password' => APICredentials::password
])->post('http://34.74.220.10/ringo/public/ringoPaytest/public/api/agent/p2', [
        'serviceCode'=> $request->serviceCode,
        'account'=> $request->account,
        'type'=>$request->type
])->throw()->json();

return $response;
}

public function SmilePaymentBundle(Request $request) {

$response = Http::withHeaders([
'Content-Type' => 'application/json',
'email' =>  APICredentials::email,
'password' =>  APICredentials::password
])->post('http://34.74.220.10/ringo/public/ringoPaytest/public/api/agent/p2', [
        'serviceCode'=> $request->serviceCode,
        'type'=> $request->type,
        'request_id'=> $request->request_id,
        'account'=> $request->account,
        'price'=> $request->price,
        'name'=> $request->name,
        'allowance'=> $request->allowance,
        'validity'=> $request->validity,
        'code'=> $request->code
])->throw()->json();

return $response;
}

public function SmilePaymentRecharge(Request $request){

$response = Http::withHeaders([
'Content-Type' => 'application/json',
'email' =>  APICredentials::email,
'password' =>  APICredentials::password
])->post('http://34.74.220.10/ringo/public/ringoPaytest/public/api/agent/p2', [
        'serviceCode'=> $request->serviceCode,
        'account'=> $request->account,
        'amount'=> $request->amount,
        'request_id'=> $request->request_id
])->throw()->json();

return $response;
}

public function SMS(Request $request){

$response = Http::withHeaders([
'Content-Type' => 'application/json',
'email' =>  APICredentials::email,
'password' =>  APICredentials::password
])->post('http://34.74.220.10/ringo/public/ringoPaytest/public/api/agent/p2', [
        'serviceCode'=> $request->serviceCode,
        'request_id'=> $request->request_id,
        'sender_id'=> $request->sender_id,
        'mobile'=> $request->mobile,
        'msg'=> $request->msg
])->throw()->json();

return $response;
}

public function validateWAECResultChecker(Request $request){

$response = Http::withHeaders([
'Content-Type' => 'application/json',
'email' =>  APICredentials::email,
'password' =>  APICredentials::password
])->post('http://34.74.220.10/ringo/public/ringoPaytest/public/api/agent/p2', [
        'serviceCode'=> $request->serviceCode,
        'type'=> $request->type
])->throw()->json();

return $response;
}

public function purchaseWAECResultChecker(Request $request){

$response = Http::withHeaders([
'Content-Type' => 'application/json',
'email' =>  APICredentials::email,
'password' =>  APICredentials::password
])->post('http://34.74.220.10/ringo/public/ringoPaytest/public/api/agent/p2', [
        'serviceCode'=> $request->serviceCode,
        'amount'=> $request->amount,
        'type'=> $request->type,
        'pinNo'=> $request->pinNo,
        'request_id'=> $request->request_id
])->throw()->json();

return $response;
}

public function validateBetaData(Request $request){

$response = Http::withHeaders([
'Content-Type' => 'application/json',
'email' =>  APICredentials::email,
'password' =>  APICredentials::password
])->post('http://34.74.220.10/ringo/public/ringoPaytest/public/api/agent/p2', [
        'serviceCode'=> $request->serviceCode,
        'phone'=> $request->phone,
        'network'=> $request->network
])->throw()->json();

return $response;
}

public function purchaseBetaData(Request $request) {

$response = Http::withHeaders([
'Content-Type' => 'application/json',
'email' =>  APICredentials::email,
'password' =>  APICredentials::password
])->post('http://34.74.220.10/ringo/public/ringoPaytest/public/api/agent/p2', [
        'serviceCode'=> $request->serviceCode,
        'package'=> $request->package,
        'phone'=> $request->phone,
        'amount'=> $request->amount,
        'bundle'=> $request->bundle,
        'request_id'=> $request->request_id
])->throw()->json();

return $response;
}



}
