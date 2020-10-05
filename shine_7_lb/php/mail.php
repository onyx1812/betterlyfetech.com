<?php

$recepient1 = "cs@betterlyfetech.com";
$sitename = trim($_POST["href"]);

$firstName = trim($_POST["first_name"]);
$lastName = trim($_POST["last_name"]);
$email = trim($_POST["email"]);
$message = trim($_POST["message"]);
$finalMessage = "First Name: $firstName\n Last Name: $lastName\n Email: $email\n Message: $message";

$pagetitle = "New message from \"$sitename\"";
mail($recepient1, $sitename, $finalMessage, "Content-type: text/plain; charset=\"utf-8\"\n From: $sitename");