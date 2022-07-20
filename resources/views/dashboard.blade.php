<?php
    # handle database changes
    if (isset($_POST['Id'])) {
        if (isset($_POST['Delete'])) {
            DB::delete("DELETE FROM cars WHERE Id=?", [$_POST['Id']]);
        } else {
            $od = $_POST['Odometer'];
            if (empty($od)) $od = NULL;
            $yr = $_POST['ProductionYear'];
            if (empty($yr)) $yr = NULL;
            $pr = $_POST['Price'];
            if (empty($pr)) $pr = NULL;

            if ($_POST['Id'] == 0) {
                DB::insert("INSERT INTO cars (Make, Model, ProductionYear, Odometer, Price) VALUES (?, ?, ?, ?, ?)",
                [$_POST['Make'], $_POST['Model'], $yr, $od, $pr]);
            } else {
                DB::update("UPDATE cars SET Make=?, Model=?, ProductionYear=?, Odometer=?, Price=? WHERE Id=?",
                [$_POST['Make'], $_POST['Model'], $yr, $od, $pr, $_POST['Id']]);
            }
        }
    }
?>

<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <x-slot name="titleSlot">Manage Inventory</x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage Inventory
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-striped">
                        <thead>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Year</th>
                            <th>Kilometers</th>
                            <th>Price</th>
                        </thead>
                        <tbody>
                            <?php
                                $cars = DB::select("SELECT * FROM cars");
                                foreach($cars as $car) {
                                    echo "<tr>";
                                        echo "<td>".$car->Make."</td>";
                                        echo "<td>".$car->Model."</td>";
                                        echo "<td>".$car->ProductionYear."</td>";
                                        if (isset($car->Odometer)) echo "<td>".number_format($car->Odometer)."</td>";
                                        else echo "<td></td>";
                                        if (isset($car->Price)) echo "<td>$".number_format($car->Price)."</td>";
                                        else echo "<td></td>";
                                        echo "<td><a href='/edit-car/".$car->Id."'><button type='button'>Edit Car</button></a></td>";
                                        echo "<td><a href='/delete-car/".$car->Id."'><button type='button'>Delete Car</button></a></td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                    <a href='/edit-car/'><button type='button'>Add Car</button></a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
