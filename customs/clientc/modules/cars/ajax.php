<?php
$carsData = file_get_contents("../../../../data/cars.json");
$cars = json_decode($carsData, true);

$clientCars = array_filter($cars, function ($car) {
    return $car["customer"] === "clientc";
});
?>

<h1 class="list-title">Client C cars</h1>

<div class="car-list">
    <?php foreach ($clientCars as $car) { ?>
        <div data-car-id=<?php echo $car["id"]; ?> class="car-card">

            <img class="car-image" src="<?php echo $car["imgPath"]; ?>" alt="car" />

            <div class="car-title">
                <div><?php echo $car["modelName"]; ?></div>
            </div>
            <div class="car-detail">
                <div><?php echo $car["brand"]; ?></div>
                |
                <div style="width: 30px; height: 30px; background-color: <?php echo $car["colorHex"]; ?>"></div>
            </div>
        </div>
    <?php } ?>
</div>