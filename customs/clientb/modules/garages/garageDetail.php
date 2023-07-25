<?php
$garagesData = file_get_contents("../../../../data/garages.json");
$garages = json_decode($garagesData, true);

if (isset($_GET['id'])) {
    $garageId = $_GET['id'];

    $selectedGarage = null;
    foreach ($garages as $garage) {
        if ($garage['id'] == $garageId) {
            $selectedGarage = $garage;
            break;
        }
    }

    if ($selectedGarage) {
?>
        <div id="garageDetail">
            <h2>Garage Detail</h2>
            <p>Title : <?php echo $selectedGarage['title'] ?></p>
            <p>Address : <?php echo $selectedGarage['address'] ?></p>
        </div>
<?php
    } else {
        echo "<p>Garage not found.</p>";
    }
} else {
    echo "<p>Invalid request.</p>";
}
?>