<!DOCTYPE html>
<html>
    <head>
        <title>Mark's Cars</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <script src="https://unpkg.com/vue@3"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <?php include __DIR__."/components/header.php" ?>
        <div class="container" id="app">
            <h1>Our Inventory</h1>
            <label for="search" style="padding-right:20px">Search:</label>
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
                            $carNameJS = '"' . $car->Make . ' ' . $car->Model . '".toLowerCase()';
                            echo "<tr v-if='".$carNameJS.".includes(search.toLowerCase())'>";
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
