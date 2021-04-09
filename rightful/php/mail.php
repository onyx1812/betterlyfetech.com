<?php

$recepient1 = "support@gearelevation.com";
$sitename = "Gear Elevation";

$data = $_POST;
$message = "";

foreach ($data as $key => $value) {
    $message .= "$key : $value \n";
}

echo $message;

$first_name = trim($_POST["first_name"]);
$email = trim($_POST["email"]);

$pagetitle = "New message from \"$sitename\"";
mail($recepient1, $sitename, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $first_name");