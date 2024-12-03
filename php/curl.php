<?php

function sendCurl($data, $url, $contentType = 'Content-Type:application/json')
{
    $ch = curl_init();
    $new_data = json_encode($data);

    $array_options = array(
        CURLOPT_URL => $url,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $new_data,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array($contentType)
    );

    curl_setopt_array($ch, $array_options);
    $resp = curl_exec($ch);

    // Check for CURL errors
    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
    }

    curl_close($ch);

    // Handle CURL error
    if (isset($error_msg)) {
        return $error_msg;
    }

    $res = json_decode($resp, true);
    return $res;
}
