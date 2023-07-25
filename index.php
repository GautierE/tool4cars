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
</head>

<body>

    <label for="clientSelect">Select Client:</label>
    <select id="clientSelect">
        <option value="clienta">Client A</option>
        <option value="clientb">Client B</option>
        <option value="clientc">Client C</option>
    </select>
    <div class="dynamic-div" data-module="cars" data-script="ajax"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/utils/cookieUtils.js"></script>
    <script src="js/step1.js"></script>
</body>

</html>