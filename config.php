<?php 
// FOCUS JUST EDIT THE CONFIG !

// start config
$tokenAuth = "xxx";
$X_Super_Properties = "xxx";
$cookie = "xxx";
$targetServer = "xxx";
$targetChannel = "xxx";

$MessageArray = [
    "YOUR MESSAGE1",
    "YOUR MESSAGE2",
    "YOUR MESSAGE3",
    "YOUR MESSAGE4",
    "YOUR MESSAGE5",
    "YOUR MESSAGE6",
    "YOUR MESSAGE7",
    "YOUR MESSAGE8",
    "YOUR MESSAGE9",
    "YOUR MESSAGE10",
    "YOUR MESSAGE11",
    "YOUR MESSAGE12",
    "YOUR MESSAGE13",
    "YOUR MESSAGE14",
    "YOUR MESSAGE15",
    "YOUR MESSAGE16",
    "YOUR MESSAGE17",
    "YOUR MESSAGE18",
    "YOUR MESSAGE19",
    "YOUR MESSAGE20",
];
// end config


function go($j){
    global $tokenAuth,$X_Super_Properties,$cookie,$targetServer,$targetChannel,$MessageArray;

            Retry1:
        shuffle($MessageArray);
        $randomIndexArray = rand(0,count($MessageArray)-1);
        if($randomIndexArray < 0 ) goto Retry1;
        shuffle($MessageArray);

    $random = rand(1000000000000000,1900000000000000);
    $body = "{\"content\":\"$MessageArray[$randomIndexArray]\",\"nonce\":\"$random\",\"tts\":false}";
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://discord.com/api/v9/channels/$targetChannel/messages");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    
    $headers = array();
    $headers[] = 'Host: discord.com';
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20100101 Firefox/108.0';
    $headers[] = 'Accept: */*';
    $headers[] = 'Accept-Language: id,en-US;q=0.7,en;q=0.3';
    $headers[] = "Referer: https://discord.com/channels/$targetServer/$targetChannel";
    $headers[] = 'Content-Type: application/json';
    $headers[] = "Authorization: $tokenAuth";
    $headers[] = "X-Super-Properties: $X_Super_Properties";
    $headers[] = 'X-Discord-Locale: en-US';
    $headers[] = 'X-Debug-Options: bugReporterEnabled';
    $headers[] = 'Origin: https://discord.com';
    $headers[] = 'Connection: close';
    $headers[] = "Cookie: $cookie";
    $headers[] = 'Sec-Fetch-Dest: empty';
    $headers[] = 'Sec-Fetch-Mode: cors';
    $headers[] = 'Sec-Fetch-Site: same-origin';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
            Retry2:
        $result = curl_exec($ch);
        $data = json_decode($result,true);
        $x = $data['id'];
        if(!$x) goto Retry2;
        echo(">> Success sending message : $MessageArray[$randomIndexArray] | with message ID : $x \n");
    
    }

?>