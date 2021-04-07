<?php

if (strcmp($_POST['var_a'],"") == 0) {
    $var_a = 1;
}
else {
    $var_a = $_POST['var_a'];
}

if (!isset($_POST['sinus'])) {
    $sin_checkbox = "No";

}
else {
    $sin_checkbox = $_POST['sinus'];
}
if (!isset($_POST['cosinus'])) {
    $cos_checkbox = "No";

}
else {
    $cos_checkbox = $_POST['cosinus'];
}
if (!isset($_POST['sincos'])) {
    $sincos_checkbox = "No";

}
else {
    $sincos_checkbox = $_POST['sincos'];
}

// WRITE _POST VALUES TO FILE.TXT IN SSE FOLDER.
$myText = $var_a .",".$sin_checkbox.",".$cos_checkbox.",".$sincos_checkbox;
$myFile = fopen("/home/xtrebichalsky/public_html/sse/file.txt", "w+");
fwrite($myFile,$myText);


