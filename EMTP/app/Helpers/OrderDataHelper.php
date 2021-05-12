<?php

namespace App\Helpers;

class OrderDataHelper
{
    public static function getOrderData(&$dataArray, &$requestObj, &$authUser, $programName, $transactionId)
    {
        $dataArray["user_id"] = $authUser->id;
        $dataArray["customer_name"] = $requestObj->first_name . " " . $requestObj->last_name;
        $dataArray["user_email"] = $authUser->email;
        $dataArray["price"] = $requestObj->total;
        $dataArray["purchased_program_id"] = $requestObj->program;
        $dataArray["purchased_program_name"] = $programName;
        $dataArray["transaction_id"] = $transactionId;
        $dataArray["customer_street"] = $requestObj->street;
        $dataArray["customer_city"] = $requestObj->city;
        $dataArray["customer_zip"] = $requestObj->zip;
        $dataArray["customer_country"] = $requestObj->country;
        $dataArray["customer_apartment"] = $requestObj->apartment;
        $dataArray["customer_state"] = $requestObj->state;
        $dataArray["customer_phone"] = $requestObj->phone;
    }
}
