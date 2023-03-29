<?php
include './config.php';

echo "Github : https://github.com/khairulkrhacx \n";
echo "Saweria : https://github.com/khairulkrhacx \n";
echo "30/03/2023 \n\n";
echo "[?] Delay sending message / seconds ? (example : 60) ";
$delay = trim(fgets(STDIN));
echo "[?] How much message we need to send ? (example : 500) ";
$total = trim(fgets(STDIN));

for($j=0;$j<$total;$j++){
    $start = go($j);
    sleep($delay);
}

?>