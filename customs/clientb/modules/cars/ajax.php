<?php
$carsData = file_get_contents("../../../../data/cars.json");
$cars = json_decode($carsData, true);

$garagesData = file_get_contents("../../../../data/garages.json");
$garages = json_decode($garagesData, true);

$clientCars = array_filter($cars, function ($car) {
    return $car["customer"] === "clientb";
});

$clientGarages = array_filter($garages, function ($garage) {
    return $garage["customer"] === "clientb";
});

function getGarageTitle($garageId, $garages)
{
    foreach ($garages as $garage) {
        if ($garage["id"] === $garageId) {
            return $garage["title"];
        }
    }
    return "Unknown Garage";
}
?>

<h1 class="list-title">Client B</h1>
<button id="switchButton"></button>

<div class="car-list">
    <?php foreach ($clientCars as $car) { ?>
        <div class="car-card" data-car-id=<?php echo $car["id"]; ?>>
            <img class="car-image" src="<?php echo $car["imgPath"]; ?>" alt="car" />

            <div class="car-title">
                <div><?php echo $car["modelName"]; ?></div>
            </div>
            <div class="car-detail">
                <div><?php echo $car["brand"]; ?></div>
                |
                <div><?php echo getGarageTitle($car["garageId"], $garages); ?></div>
            </div>
        </div>
    <?php } ?>
</div>

<div id="garageList" style="display: none;">
    <?php foreach ($clientGarages as $garage) { ?>
        <div class="garage-card" data-garage-id=<?php echo $garage["id"]; ?>>
            <img class="garage-image" src="public/images/garage.jpg" alt="garage" />
            <div class="garage-title">
                <div>Garage : <?php echo $garage["title"]; ?></div>
            </div>
        </div>
    <?php } ?>
</div>

<div id="garageDetails">
</div>

<script src="js/clientb.js"></script>