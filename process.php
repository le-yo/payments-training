<?php

//recieve the phone number
$phone= $_POST['phone_number'];
//Recieve the amount
$amount=$_POST['amount'];

//appending 254 to the phone number
$phone = '+254'.substr($phone,-9);

//appending KES to the amount
$amount='KES '.$amount;

//we need to store the order of the airtime

//wait for the user to make payments

//top up the users account

//from the users account, remove amount equal to the airtime ordered

///send airtime


//nouns orders, users, account, airtime,

//verbs top up, store, make payments, send airtime

//users - phone, balance,

//order - user_id, amount, status

//transaction_log


//building the recipients array
$recipients = array();

$data['phoneNumber']=$phone;
$data['amount'] = $amount;

array_push($recipients,$data);



//sending the airtime
sendAirtime($recipients);



function sendAirtime($recipients){

    require_once "AfricasTalkingGateway.php";

    //Specify your credentials
    $username = "username";
    $apiKey   = "apikey";

    $recipientStringFormat = json_encode($recipients);

    //Create an instance of our awesome gateway class and pass your credentials
    $gateway = new AfricasTalkingGateway($username, $apiKey);

    try {
        $results = $gateway->sendAirtime($recipientStringFormat);

        foreach($results as $result) {
            echo $result->status;
            echo $result->amount;
            echo $result->phoneNumber;
            echo $result->discount;
            echo $result->requestId;

            //Error message is important when the status is not Success
            echo $esult->errorMessage;
        }
    }
    catch(AfricasTalkingGatewayException $e){
        echo $e->getMessage();
    }



}