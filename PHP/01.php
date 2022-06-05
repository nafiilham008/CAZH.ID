<?php

$nilai = array('72', '65', '73', '78', '75', '74', '90', '81', '87', '65', '55', '69', '72', '78', '79', '91', '100', '40', '67', '77', '86');

// RATA-RATA
$avg = array_sum($nilai) / count($nilai);

echo "Rata-Rata ", number_format((float)$avg, 2, '.', '');

// URUTAN 
echo "<br> Urutan dari terbesar ke terkecil ";

rsort($nilai);

for ($x = 0; $x < 7; $x++) {
    echo $nilai[$x];
    echo " ";
}

echo "<br> Urutan dari terkecil ke terbesar ";

sort($nilai);

for ($x = 0; $x < 7; $x++) {
    echo $nilai[$x];
    echo " ";
}
