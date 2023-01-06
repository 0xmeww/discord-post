<?php
// start config akun
$auth = "ODMwMDM4NTcyODE5MTUyOTU2.GonThO.COY0DNiaZJf-5jHnyxS4GuVYjavVZ467AoB1UQ"; // jangan lupa di ganti
$X_Super_Properties = "eyJvcyI6IldpbmRvd3MiLCJicm93c2VyIjoiQ2hyb21lIiwiZGV2aWNlIjoiIiwic3lzdGVtX2xvY2FsZSI6ImlkLUlEIiwiYnJvd3Nlcl91c2VyX2FnZW50IjoiTW96aWxsYS81LjAgKFdpbmRvd3MgTlQgMTAuMDsgV2luNjQ7IHg2NCkgQXBwbGVXZWJLaXQvNTM3LjM2IChLSFRNTCwgbGlrZSBHZWNrbykgQ2hyb21lLzEwOC4wLjAuMCBTYWZhcmkvNTM3LjM2IiwiYnJvd3Nlcl92ZXJzaW9uIjoiMTA4LjAuMC4wIiwib3NfdmVyc2lvbiI6IjEwIiwicmVmZXJyZXIiOiJodHRwczovL2Rhc2hib2FyZC5xdWFpLm5ldHdvcmsvIiwicmVmZXJyaW5nX2RvbWFpbiI6ImRhc2hib2FyZC5xdWFpLm5ldHdvcmsiLCJyZWZlcnJlcl9jdXJyZW50IjoiaHR0cHM6Ly93d3cuZ29vZ2xlLmNvbS8iLCJyZWZlcnJpbmdfZG9tYWluX2N1cnJlbnQiOiJ3d3cuZ29vZ2xlLmNvbSIsInNlYXJjaF9lbmdpbmVfY3VycmVudCI6Imdvb2dsZSIsInJlbGVhc2VfY2hhbm5lbCI6InN0YWJsZSIsImNsaWVudF9idWlsZF9udW1iZXIiOjE2NTk0MywiY2xpZW50X2V2ZW50X3NvdXJjZSI6bnVsbH0="; // jangan lupa di ganti
$cookie = "__dcfduid=6fa4ce50137011eda402d1a42fb9d98e; __sdcfduid=6fa4ce51137011eda402d1a42fb9d98e7a96a9dc6592e5770ccff58c3f5a883f4b28c48517a202f46210d38c608e94b1; _gcl_au=1.1.314142743.1672973981; OptanonConsent=isIABGlobal=false&datestamp=Fri+Jan+06+2023+09:59:41+GMT+0700+(Waktu+Indonesia+Barat)&version=6.33.0&hosts=&landingPath=https://discord.com/&groups=C0001:1,C0002:1,C0003:1; locale=en-US; _ga=GA1.2.1504520162.1672973982; _gid=GA1.2.2114664055.1672973982; __cf_bm=v8Ahhs_eS3KrQEzsjYaCJguuepEKYN4voGR1Jwji4uI-1672973981-0-Abw7FxgtQGaiJzRtp94pQuZvtN2UjAxR4+X+H1z087ILLGQtDiXmgnhS72ATn2ayxuT/LaSI6xWTcKtIIYCrP/uNJR7+gtNURI4RYxNCZVA+GeXz/MpYxJy0jIEWvRa3y3qbtfeH3bA7suyP9g4U2yM=; __cfruid=de02d3ec294ff42de1c439308655eb9265b7e055-1672974675"; // jangan lupa di ganti
$targetServer = "1060255520574947450"; // jangan lupa di ganti
$targetChannel = "1060327942330261604"; // jangan lupa di ganti




function mulai(){
global $auth,$X_Super_Properties,$cookie,$targetServer,$targetChannel;

$random = rand(1000000000000000,1900000000000000);
$isiPesan = "Wofff woff woff soar this sound!! @everyone"; // jangan lupa di ganti
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
