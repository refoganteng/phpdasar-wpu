<?php
//Looping in array
//foreach
$numbers = [3, 2, 1, 3, 4, 5, 11, 9, 999, -1, 89, 100];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan array 2</title>
    <style>
        .div2 {
            width: 50px;
            height: 50px;
            background-color: aquamarine;
            text-align: center;
            line-height: 50px;
            margin: 3px; 
            float: left;
        }

        .clear {
            clear: both;
        }
    </style>
</head>

<body>
    <div class="div1">
        <?php for ($i = 0; $i < count($numbers); $i++) { ?>

            <div class="div2">
                <?php echo $numbers[$i]; ?>
            </div>

        <?php } ?>
    </div>

    <div class="clear"></div>

    <hr>

    <?php foreach ($numbers as $number) { ?>
        <div class="div2">
            <?php echo $number; ?>
        </div>
    <?php } ?>

    <div class="clear"></div>

    <hr>

    <?php foreach ($numbers as $number) : ?>
        <div class="div2">
            <?= $number ?>
        </div>
    <?php endforeach; ?>




</body>

</html>