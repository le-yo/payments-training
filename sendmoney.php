<?php



//sending money using lipisha
function sendmoney($mobile_no,$amount){

    $url = "https://lipisha.com/payments/accounts/index.php/v2/api/send_money";


    $api_key = "";

    $account_no = "02394";

    $mobile_no = $mobile_no;

    $amount = $amount;

    $api_signature = "";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POST, 1);

    curl_setopt($ch, CURLOPT_POSTFIELDS,
        http_build_query(array('api_key' => $api_key,
            'api_signature'=> $api_signature,
            'amount' =>$amount,
            'api_type'=>'Callback',
            'account_number'=> $account_no,
            'mobile_number' => $mobile_no
        )));

// receive server response ...
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec ($ch);



    curl_close ($ch);
    return $server_output;

}




?>