<!DOCTYPE html>
<html>
<head>
    <style>
        td{
            padding: 6px 16px 6px 16px;
            text-align: center;
        }
        .bg-black{
            background-color: black;
            color: white;
        }
        table{
            border-spacing: 0;
        }
    </style>
</head>
<body>
    <table>
        <?php
        $n = 64; $m = 8; $row = $n/$m; $number = 1;
        for ($i = 1; $i <= $row; $i++) {
            echo "<tr>";?>
            <?php
            for($j = 1; $j<=$m; $j++){
                if($number%3 == 0){
                    echo "<td>".$number."</td>";
                    $number++;
                } else if ($number%4 == 0){
                    echo "<td>".$number."</td>";
                    $number++;
                } else {
                    echo "<td class='bg-black'>".$number."</td>";
                    $number++;
                }
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>