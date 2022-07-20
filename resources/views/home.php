<!DOCTYPE html>
<html>
    <head>
        <title>Car sales app</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <script src="https://unpkg.com/vue@3"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <?php include __DIR__."/components/header.php" ?>
        <div class="container" id="app">
            <h1>Our Inventory</h1>
            <label for="search">Search:</label>
            <input id="search" v-model="search" />
            <table class="table table-striped">
                <thead>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Year</th>
                </thead>
                <tbody>
                    <?php
                        $cars = DB::select("SELECT * FROM cars");
                        foreach($cars as $car) {
                            $conditionMake = '"'.$car->Make.'"'.'.includes(search)';
                            $conditionModel = '"'.$car->Model.'"'.'.includes(search)';
                            echo "<tr v-if='".$conditionMake." || ".$conditionModel."'>";
                                echo "<td>".$car->Make."</td>";
                                echo "<td>".$car->Model."</td>";
                                echo "<td>".$car->ProductionYear."</td>";
                                echo "<td><a href='/car-info/".$car->Id."'><button type='button'>View Details</button></a></td>";
                            echo "</tr>";
                        }
                    ?>  
                </tbody>
            </table>
        </div>
        <?php include __DIR__."/components/footer.php" ?>
    </body>

    
    <script>
    const { createApp } = Vue

    createApp({
        data() {
        return {
            search: ''
        }
        }
    }).mount('#app')
    </script>
</html>
