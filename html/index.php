<?php 
    require 'fizzbuzz_service.php';
    $service = new FizzbuzzService();
    $number_entered;
    if (array_key_exists("number", $_POST) && !empty($_POST["number"])) {
        $service->increment_number( $_POST["number"]);
        $number_entered = $_POST["number"];
    }
?>

<html>
    <head>
        <title>Hello Fizzbuzz</title>
    </head>
    <body>
        <form action="" method="post">
            Number: <input type="number" name="number">
            <input type="submit" value="Submit">
        </form>
        <?php
            if(isset($number_entered)) {
                echo "<div> You entered {$number_entered}. <strong>";
                if($number_entered % 3 == 0) {
                    echo 'FIZZ';
                } 
                if($number_entered % 5 == 0) {
                    echo 'BUZZ';
                }
                echo '</strong></div>';
            }
        ?>
        <div>
            <h2>Top 3</h2>
            <?php 
                $result =  $service->get_top_3();
                while($row = $result->fetch_assoc()) {
                    echo "Number: " . $row["fizzbuzz_number"]. " - Count: " . $row["count"] . "<br />";
                }
            ?>
        </div>
    </body>
</html>