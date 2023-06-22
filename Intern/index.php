<!DOCTYPE html>
<html>
<head>
    <title>Electricity Consumption Calculator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">


    <style>
        body,html{
            margin: 10px 50px;
            scroll-behavior: smooth;
        }

        table{
            width: 80%;
            color: white;
            background-color:black;
            cursor: pointer;
           }
           tr:hover{
            color: red; 
           }
           #trr{
            color: green;
           }

        
    </style>
</head>
<body>
    <div class="container">
        <h1>Electricity Consumption Calculator</h1>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="voltage">Voltage (V)</label>
                <input type="number" class="form-control" id="voltage" name="voltage" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="current">Current (A)</label>
                <input type="number" class="form-control" id="current" name="current" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="rate">Current Rate (sen/kW)</label>
                <input type="number" class="form-control" id="rate" name="rate" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Calculate</button>
        </form>


        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve input values
            $voltage = $_POST["voltage"];
            $current = $_POST["current"];
            $rate = $_POST["rate"];
            

            // Calculate power (Wh = V * I)
            $power = $voltage * $current;

            // Calculate energy (kWh = (Wh / 1000) * time)
            $energy = ($power / 1000);

            // Calculate total charge (Total = Energy * Rate)
            $totalCharge = $energy * ($rate / 100);
            

            // Display the results
            echo "<br><h2>Results:</h2>";
            echo "<p>Rate: RM " . $rate / 1000 . "</p>";
            echo "<p>Power: " . $energy . " kW</p>";
            echo "<p>Total: RM " . $totalCharge . "</p>";

            
        }

        if(isset($_POST['submit'])){

            echo '<table border="1">
                  <tr id="trr">
                    <th>#</th>
                    <th>Hour</th>
                    <th>Energy(kWh)</th>
                    <th>TOTAL(RM)</th>
                  </tr>';


                for ($col=1; $col <= 24; $col++) { 
                    
                     $totalCharge = $energy * ($rate / 100);
                    
                    //$new1 = energy
                    //$New_total = total at table
                    //$col loop until 24 hours
                    $new1=$col * $energy;
                    $total = ($rate / 100) * $new1;
                    $New_total = round($total, 2);
                 


           
                   echo "<tr>

            <th>$col</th>
            <td >$col</td>
            <td >$new1</td>
            <td > $New_total</td>";
            }








                echo "</table>";


        
    }
        ?>
    </div>
</body>
</html>
