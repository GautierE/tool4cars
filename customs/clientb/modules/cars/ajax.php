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

<h1>Client B</h1>

<div>
    <button id="carListButton">Show Car List</button>
    <button id="garageListButton">Show Garage List</button>
</div>


<div class="car-list">
    <h2>Cars List</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Brand</th>
                <th>Garage</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientCars as $car) { ?>
                <tr data-car-id=<?php echo $car["id"]; ?>>
                    <td><?php echo strtolower($car["modelName"]); ?></td>
                    <td><?php echo $car["brand"]; ?></td>
                    <td><?php echo getGarageTitle($car["garageId"], $garages); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div id="garageList" style="display: none;">
    <h2>Garages List</h2>
    <table>
        <thead>
            <tr>
                <th>Garage Title</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientGarages as $garage) { ?>
                <tr data-garage-id=<?php echo $garage["id"]; ?>>
                    <td><?php echo $garage["title"]; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div id="garageDetails">
</div>

<script src="js/clientb.js">
</script>