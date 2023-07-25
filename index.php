<?php
if (!isset($_COOKIE["clientId"])) {
    setcookie("clientId", "clienta", time() + (86400 * 30), "/");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tool4cars</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/carList.css">
    <link rel="stylesheet" href="styles/garageList.css">
    <link rel="stylesheet" href="styles/edit.css">
</head>

<body>
    <div class="main-container">
        <div class="select-container">
            <div id="clientSelect">
                <div data-value="clienta">Client A</div>
                <div data-value="clientb">Client B</div>
                <div data-value="clientc">Client C</div>
            </div>
        </div>
        <div class="dynamic-div" data-module="cars" data-script="ajax"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/utils/cookieUtils.js"></script>
    <script src="js/main.js"></script>
</body>

</html>