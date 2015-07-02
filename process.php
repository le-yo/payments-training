<?php

require_once('connect.php');

//recieve the phone number
$phone= $_POST['phone_number'];
//Recieve the amount
$amount=$_POST['amount'];

//appending 254 to the phone number
$phone = '+254'.substr($phone,-9);

//appending KES to the amount
$amount='KES '.$amount;

/*check whether the user exists, if the user exits get the user_id, if not create the user
and get the user id */



//we need to store the order of the airtime
//create order


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

function createUser($phone)
{
    //check if the user exists
    $query = mysql_query("SELECT phone FROM users WHERE phone='$phone'");
    if (mysql_num_rows($query) > 0) {
        $row = mysql_fetch_array($query);
        $id = $row['id'];
        return $id;
    } else {
        //create the user
        $result = mysql_query("INSERT INTO users (phone) VALUES ('$phone')");

        if ($result) {
            $query = mysql_query("SELECT phone FROM users WHERE phone='$phone'");
            $row = mysql_fetch_array($query);
            $id = $row['id'];
            return $id;
        }
    }
}


function createOrder($user_id,$amount_ordered){
    $query = mysql_query("INSERT INTO airtime_orders (user_id,amount_ordered) VALUES ('$user_id','$amount_ordered')");

    return $query;
}



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