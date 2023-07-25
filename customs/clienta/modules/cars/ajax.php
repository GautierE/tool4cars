<?php
$carsData = file_get_contents("../../../../data/cars.json");
$cars = json_decode($carsData, true);

$clientCars = array_filter($cars, function ($car) {
    return $car["customer"] === "clienta";
});
?>

<h1>Client A cars</h1>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Brand</th>
            <th>Year</th>
            <th>Power</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clientCars as $car) { ?>
            <tr data-car-id=<?php echo $car["id"]; ?>>
                <td><?php echo $car["modelName"]; ?></td>
                <td><?php echo $car["brand"]; ?></td>
                <td><?php echo date("Y", $car["year"]); ?></td>
                <td><?php echo $car["power"]; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>