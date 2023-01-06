<?php
// start config akun
$auth = "EDIT SENDIRI"; // jangan lupa di ganti
$X_Super_Properties = "EDIT SENDIRI"; // jangan lupa di ganti
$cookie = "EDIT SENDIRI"; // jangan lupa di ganti
$targetServer = "EDIT SENDIRI"; // jangan lupa di ganti
$targetChannel = "EDIT SENDIRI"; // jangan lupa di ganti




function mulai(){
global $auth,$X_Super_Properties,$cookie,$targetServer,$targetChannel;

$random = rand(1000000000000000,1900000000000000);
$isiPesan = "EDIT SENDIRI"; // jangan lupa di ganti
$body = "{\"content\":\"$isiPesan\",\"nonce\":\"$random\",\"tts\":false}";
// end config akun
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
$headers[] = "Authorization: $auth";
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

$result = curl_exec($ch);

// MENGHAPUS PESAN
$data = json_decode($result,true);
$body2 = $data['id'];

curl_setopt($ch, CURLOPT_URL, "https://discord.com/api/v9/channels/$targetChannel/messages/$body2");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);

// BATAS MENGHAPUS PESAN
}
echo "[?] berapa lama detik delay yang di butuhkan? (contoh : 60)";
$delay = trim(fgets(STDIN));
echo "[?] berapa banyak pesan yang akan di kirim? (contoh : 500)";
$jumlah = trim(fgets(STDIN));


for($i=1;$i<=$jumlah;$i++){
    $liat = mulai($i);
    echo "pesan terkirim! ($i/$jumlah)\n";
    sleep($delay);
}
?>
