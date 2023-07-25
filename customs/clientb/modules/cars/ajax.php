<?php
$carsData = file_get_contents("../../../../data/cars.json");
$cars = json_decode($carsData, true);

$garagesData = file_get_contents("../../../../data/garages.json");
$garages = json_decode($garagesData, true);

$clientCars = array_filter($cars, function ($car) {
    return $car["customer"] === "clientb";
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

<h1>Client B cars</h1>

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