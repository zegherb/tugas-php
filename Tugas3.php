<?php

$arr = ['Aldi','Galih','Bayu','Zamrud','Putra'];

if (is_array($arr)) {
    echo "Ini array\n";
}else{
    echo "Bukan array\n";
}

$nama = $arr[1];
$sub = substr($nama, 0, 3);

echo "$sub \n";

$panjang_arr = count($arr);
echo "Panjang array adalah: $panjang_arr \n";

echo 'Array sebelum diurutkan: ';
for ($i=0; $i < count($arr); $i++) { 
    echo "$arr[$i] ";
}

sort($arr);
echo "\nArray setelah diurutkan (sort): ";
for ($i=0; $i < count($arr); $i++) { 
    echo "$arr[$i] ";
}

shuffle($arr);
echo "\nArray setelah diacak (shuffle): ";
for ($i=0; $i < count($arr); $i++) { 
    echo "$arr[$i] ";
}

array_push($arr, 'Syafiq');
echo "\nArray setelah ditambahkan data baru: ";
for ($i=0; $i < count($arr); $i++) { 
    echo "$arr[$i] ";
}

array_pop($arr);
echo "\nArray setelah elemen terakhir dihapus: ";
for ($i=0; $i < count($arr); $i++) { 
    echo "$arr[$i] ";
}

$arr2 = ['Akbar','Malik','Hambal','Syafi'];
$arr_gab = array_merge($arr, $arr2);
echo "\nArray setelah digabung: ";
for ($i=0; $i < count($arr_gab); $i++) { 
    echo "$arr_gab[$i] ";
}

$cari_data = array_search('Malik', $arr_gab);
if ($cari_data !== false) {
    echo "\nData berada pada index ke-$cari_data";
}else {
    echo "\nData tidak ditemukan";
}

?>