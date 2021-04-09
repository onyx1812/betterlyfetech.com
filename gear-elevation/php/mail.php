<<<<<<< HEAD
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
=======
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
>>>>>>> f7500f2c99fc2f55edfc823de06c9bd0c816b38e
mail($recepient1, $sitename, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $first_name");