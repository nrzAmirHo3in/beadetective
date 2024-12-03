<?php
try {
    $phone = $_POST["phone"];
    $pass = $_POST["newPass"];
    require "Database.php";
    $db = new Database;
    $r = $db->getRow("users", "u_phone", $phone);
    if (empty($r)) {
        die("nobody");
    }
    $newPass = hash('ripemd160', hash('sha512', md5($pass)));
    $db->update("users", [
        "u_pass" => $newPass
    ], $phone, "u_phone");
    $url = 'https://console.melipayamak.com/api/send/shared/37f5b47de61b4a1290f3c9c746301de7';
    $data = array('bodyId' => 203073, 'to' => $phone, 'args' => [$pass]);
    $data_string = json_encode($data);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

    // Next line makes the request absolute insecure
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // Use it when you have trouble installing local issuer certificate
	// See https://stackoverflow.com/a/31830614/1743997

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string)
        )
    );
	$result = curl_exec($ch);
	curl_close($ch);
	// to debug
	if(curl_errno($ch)){
	    echo 'Curl error: ' . curl_error($ch);
		$errorFile = fopen("error.log", "a");
		fwrite($errorFile, $th);
		fclose($errorFile);
	}
    die("success");
} catch (\Throwable $th) {
    $errorFile = fopen("error.log", "a");
    fwrite($errorFile, $th);
    fclose($errorFile);
}