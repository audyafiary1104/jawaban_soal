<?php
$data = json_decode(file_get_contents('https://rimbunesia.com/api/?data=items'),true);
$result = [];
$setIndex = [];
$unique_club = array_unique(array_column($data, 'club'));
$unique_cat = array_unique(array_column($data, 'category'));
    
foreach ($data as $key => $value) {
    // eksekusi looping 
    $setIndex[$value['category']][$unique_club[array_search($value['club'], $unique_club)]][] = $value;
}
foreach ($unique_cat as $key => $value) {
   $result[$value][] = $setIndex[$value];
}
// disave output nya ke file result.json baru di echo 
file_put_contents('result.json',json_encode($result));
// echo json_encode($result);
print_r($result);