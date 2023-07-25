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

<h1 class="list-title">Client A cars</h1>

<div class="car-list">
    <?php foreach ($clientCars as $car) { ?>
        <?php
        $currentYear = date("Y");
        $carYear = date("Y", $car["year"]);
        $isOlderThan10Years = ($currentYear - $carYear) > 10;
        $isYoungerThan2Years = ($currentYear - $carYear) < 2;
        $cssClass = "car-card ";

        if ($isOlderThan10Years) {
            $cssClass = $cssClass . "older-than-10-years";
        } elseif ($isYoungerThan2Years) {
            $cssClass = $cssClass . "younger-than-2-years";
        }
        ?>

        <div data-car-id=<?php echo $car["id"]; ?> class="<?php echo $cssClass; ?>">

            <img class="car-image" src="<?php echo $car["imgPath"]; ?>" alt="car" />

            <div class="car-title">
                <div><?php echo $car["modelName"]; ?></div>
            </div>
            <div class="car-detail">
                <div><?php echo $car["brand"]; ?></div>
                |
                <div><?php echo date("Y", $car["year"]); ?></div>
                |
                <div><?php echo $car["power"]; ?></div>
            </div>
        </div>
    <?php } ?>
</div>