<?php
$nilai = array(72,65,73,78.75,74,90,81,87,65,55,69,72,78,79,91,100,40,67,77,86);

$average = array_sum($nilai)/count($nilai); //rata-rata
$highest = max($nilai); //nilai tertinggi
$lowest = min($nilai); //nilai terendah

echo "Nilai rata-rata = ".$average."<br> Nilai tertinggi = ".$highest."<br> Nilai terendah = ".$lowest;
?>