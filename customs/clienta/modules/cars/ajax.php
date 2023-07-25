<?php
$carsData = file_get_contents("../../../../data/cars.json");
$cars = json_decode($carsData, true);

$clientCars = array_filter($cars, function ($car) {
    return $car["customer"] === "clienta";
});
?>
<style>
    .older-than-10-years {
        background-color: red;
    }

    .younger-than-2-years {
        background-color: green;
    }
</style>

<h1>Client A cars</h1>

<div class="car-list">
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
                <?php
                $currentYear = date("Y");
                $carYear = date("Y", $car["year"]);
                $isOlderThan10Years = ($currentYear - $carYear) > 10;
                $isYoungerThan2Years = ($currentYear - $carYear) < 2;
                $cssClass = "";

                if ($isOlderThan10Years) {
                    $cssClass = "older-than-10-years";
                } elseif ($isYoungerThan2Years) {
                    $cssClass = "younger-than-2-years";
                }
                ?>

                <tr data-car-id=<?php echo $car["id"]; ?> class="<?php echo $cssClass; ?>">
                    <td><?php echo $car["modelName"]; ?></td>
                    <td><?php echo $car["brand"]; ?></td>
                    <td><?php echo date("Y", $car["year"]); ?></td>
                    <td><?php echo $car["power"]; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>