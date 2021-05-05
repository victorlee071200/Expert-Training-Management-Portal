<?php

namespace App\Helpers;

class OrderDataHelper
{
    public static function getOrderData(&$dataArray, &$requestObj, &$authUser, $programTitle, $transactionId)
    {
        $dataArray["user_id"] = $authUser->id;
        $dataArray["client_name"] = $requestObj->first_name . " " . $requestObj->last_name;
        $dataArray["user_email"] = $authUser->email;
        $dataArray["price"] = $requestObj->total;
        $dataArray["purchased_program_id"] = $requestObj->program;
        $dataArray["purchased_program_title"] = $programTitle;
        $dataArray["transaction_id"] = $transactionId;
        $dataArray["client_street"] = $requestObj->street;
        $dataArray["client_city"] = $requestObj->city;
        $dataArray["client_zip"] = $requestObj->zip;
        $dataArray["client_country"] = $requestObj->country;
        $dataArray["client_apartment"] = $requestObj->apartment;
        $dataArray["client_state"] = $requestObj->state;
        $dataArray["client_phone"] = $requestObj->phone;
    }
}
