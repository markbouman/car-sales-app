<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $car->ProductionYear." ".$car->Make." ".$car->Model; ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <?php include __DIR__."/components/header.php" ?>        
        <div class="container bg-light">
            <h1><?php echo $car->ProductionYear." ".$car->Make." ".$car->Model; ?></h1>
            <table class="table table-sm">
                <tbody>
                    <tr>
                        <td>Make</td>
                        <td><?php echo $car->Make?></td>
                    </tr>
                    <tr>
                        <td>Model</td>
                        <td><?php echo $car->Model?></td>
                    </tr>
                    <tr>
                        <td>Year</td>
                        <td><?php echo $car->ProductionYear?></td>
                    </tr>
                    <?php if (isset($car->Odometer)) {
                        echo "<tr>
                            <td>Kilometers</td>
                            <td>".number_format($car->Odometer)."</td>
                        </tr>";
                    } ?>
                    <?php if (isset($car->Price)) {
                        echo "<tr>
                            <td>Price</td>
                            <td>$".number_format($car->Price)."</td>
                        </tr>";
                    } ?>
                </tbody>
            </table>
            <a href='/'><button type='button'>Back</button></a>
        </div>
        <?php include __DIR__."/components/footer.php" ?>
    </body>
</html>