<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$myFile = fopen("/home/xtrebichalsky/public_html/sse/file.txt", "w+");
fwrite($myFile,"1,Yes,Yes,Yes");

function sendMessage($id,$message)
{
    echo "id: $id\n";
    echo "event: event\n";
    echo "data: $message\n\n";

    ob_flush();
    flush();
}
$fileStr = file_get_contents("./file.txt");
$array = explode(",",$fileStr);


$index = 0;
while(true) {
    // open file, then -> to array
    $fileStr = file_get_contents("./file.txt");
    $array = explode(",",$fileStr);

    // getting const from file
    $a = $array[0];
    $sin = sin($index * $a) * sin($index * $a);
    $cos = cos($index * $a) * cos($index * $a);
    $sincos = sin($index * $a) * cos($index * $a);

    // getting show/hide from file
    $showSin = $array[1];
    $showCos = $array[2];
    $showSincos = $array[3];

    if (strcmp($showSin,"No") == 0) {
        $sin = null;
    }
    if (strcmp($showCos,"No") == 0) {
        $cos = null;
    }
    if (strcmp($showSincos,"No") == 0) {
        $sincos = null;
    }

    sendMessage($index++, json_encode(["sinuss" => $sin, "cosinuss" => $cos, "sinuscos" => $sincos]));

    sleep(1);
}