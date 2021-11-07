<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {

        $user = auth()->user();

        $service = Service::userPackage()->first();

        return view('checkout', compact('service'));
    }

    public function payment()
    {

        $user = auth()->user();

        $service = Service::userPackage()->first();

        return view('payment', compact('service'));
    }

    public function store(Request $request)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://posservice.esnekpos.com/api/services/SubMerchantSet',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
   "Config":{
      "MERCHANT":"TEST1234",
      "MERCHANT_KEY":"4oK26hK8MOXrIV1bzTRVPA==",
      "BACK_URL":"http://localhost:51062/Pages/EYV3DPay.aspx",
      "PRICES_CURRENCY":"TRY",
      "ORDER_REF_NUMBER":"412",
      "ORDER_AMOUNT":"10.00"
   },
   "CreditCard":{
      "CC_NUMBER":"4531444531442283",
      "EXP_MONTH":"08",
      "EXP_YEAR":"2023",
      "CC_CVV":"000",
      "CC_OWNER":"test",
      "INSTALLMENT_NUMBER":"1"
   },
   "Customer":{
      "FIRST_NAME":"--",
      "LAST_NAME":"-",
      "MAIL":"abc@domain.com",
      "PHONE":"-",
      "CITY":"-",
      "STATE":"-",
      "ADDRESS":"-",
      "CLIENT_IP":"::1"
   },
   "SubMerchantDetails":[{
      "EXTERNAL_ID":"EXTERNAL_ID1",
      "AMOUNT":"5.00"
   },
   {
      "EXTERNAL_ID":"EXTERNAL_ID2",
      "AMOUNT":"4.00"
   }]
}',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        dd( $response );


        $service = Service::userPackage()->first();
        dd("store");
    }

}
