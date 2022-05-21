<?php 


$api_url = "https://raw.githubusercontent.com/penggguna/QuranJSON/master/surah/1.json";
$quran = "https://raw.githubusercontent.com/penggguna/QuranJSON/master/quran.json";
$data1 = file_get_contents($api_url);
$data2 = file_get_contents($quran);



echo $data1;


?>