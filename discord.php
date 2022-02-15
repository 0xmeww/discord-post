<?php

echo "


    _____                           __                    __            ___
  ____/ (_______________  _________/ /  ____  ____  _____/ /_   _   __ <  /
 / __  / / ___/ ___/ __ \/ ___/ __  /  / __ \/ __ \/ ___/ __/  | | / / / / 
/ /_/ / (__  / /__/ /_/ / /  / /_/ /  / /_/ / /_/ (__  / /_    | |/ _ / /  
\__,_/_/____/\___/\____/_/   \__,_/  / .___/\____/____/\__/    |___(_/_/   
                                  /_/                                    

            create this script by luv from khairulkrhacx
            --------------------------------------------

v.1 is about:
[-] post and delete message to your target.

next update very soon!
v.2 is about:
[-] add feature array for message ( rand + looping. )
[-] beauty template script.
";  
echo "--------------------------\n";
echo "[!] make sure the data is surely right.\n";
echo "----------------------------------------\n";

//**** READ ME ******//
// open discord from browser.
// f12 your browser.
// sent 1 message in your target channel.
// you can see what you need to fill out this data.
// delete { } from this script and fill out this data and target.
// enjoy it!


function anjay(){
$aut = "your-auth";
$xsuper = "your-x-super-properties";
$acak = rand(900000000000000000,999999999999999999);
$pesan = "isi pesan?";
$body = "{\"content\":\"$pesan\",\"nonce\":\"$acak \",\"tts\":false}";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://discord.com/api/v9/channels/{target-channel}/messages");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $body);

$headers = array();
$headers[] = 'Host: discord.com';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:97.0) Gecko/20100101 Firefox/97.0';
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: id,en-US;q=0.7,en;q=0.3';
//$headers[] = 'Accept-Encoding: gzip, deflate';
$headers[] = 'Content-Type: application/json';
$headers[] = "Authorization: $aut";
$headers[] = "X-Super-Properties: $xsuper";
$headers[] = 'X-Discord-Locale: en-US';
$headers[] = 'X-Debug-Options: bugReporterEnabled';
// $headers[] = 'Content-Length: 58';
$headers[] = 'Origin: https://discord.com';
$headers[] = 'Connection: close';
$headers[] = "Referer: https://discord.com/channels/{target-server}/{target-channel}";
$headers[] = 'Cookie: {your-cookies}';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-origin';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$data = json_decode($result,true);


$body2 = ($data['id']);
curl_setopt($ch, CURLOPT_URL, "https://discord.com/api/v9/channels/{target-channel}/messages/$body2");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
}

echo "[?] how many times delay to sending msg? (example : 60 seconds)";
$delay = trim(fgets(STDIN));
echo "[?] how much msg do you want to send? (example : 500 msg)";
$jumlah = trim(fgets(STDIN));


for($a=0;$a<$jumlah;$a++){
    $liat = anjay($a);
    echo "".$liat."\n";
    print "success sending msg in your target.\n";
    sleep($delay);
}
if ($a == $jumlah){
    print "----------------------\n";
    print "all msg has been sent. total ($a / $jumlah)";
} else ($a > $jumlah){
    print "something wrong in here.."
}
?>
