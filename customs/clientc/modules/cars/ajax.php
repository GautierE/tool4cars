<?php
$carsData = file_get_contents("../../../../data/cars.json");
$cars = json_decode($carsData, true);

$clientCars = array_filter($cars, function ($car) {
    return $car["customer"] === "clientc";
});
?>

<h1>Client C cars</h1>

<div class="car-list">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Brand</th>
                <th>Color</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientCars as $car) { ?>
                <tr data-car-id=<?php echo $car["id"]; ?>>
                    <td><?php echo $car["modelName"]; ?></td>
                    <td><?php echo $car["brand"]; ?></td>
                    <td style="background-color: <?php echo $car["colorHex"]; ?>"></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>