<?php
$carsData = file_get_contents("data/cars.json");
$cars = json_decode($carsData, true);

if (isset($_GET['id'])) {
    $carId = $_GET['id'];

    $selectedCar = null;
    foreach ($cars as $car) {
        if ($car['id'] == $carId) {
            $selectedCar = $car;
            break;
        }
    }

?>
    <div id="carDetail">
        <?php
        if ($selectedCar) {
        ?>
            <h1>Car Details</h1>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Year</th>
                    <th>Power</th>
                    <th>Color</th>
                </tr>
                <tr>
                    <td><?php echo $selectedCar['id']; ?></td>
                    <td><?php echo $selectedCar['modelName']; ?></td>
                    <td><?php echo $selectedCar['brand']; ?></td>
                    <td><?php echo date("Y", $selectedCar['year']); ?></td>
                    <td><?php echo $selectedCar['power']; ?></td>
                    <td style="background-color: <?php echo $selectedCar['colorHex']; ?>"></td>
                </tr>
            </table>
    <?php
        } else {
            echo "<p>Car not found.</p>";
        }
    } else {
        echo "<p>Invalid request.</p>";
    }
    ?>
    </div>