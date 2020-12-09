<?php


function get_form_name($pokemon_id, $form_id) {

include "./config.php";
$monsters = file_get_contents("$poracle_dir/src/util/monsters.json");
$json = json_decode($monsters, true);

foreach ($json as $name => $pokemon) {

   if ($pokemon['id'] == "$pokemon_id") { 
      if ( $pokemon['form']['id'] == "$form_id") {
         return $pokemon['form']['name'];
      }
   }
}

}

function get_all_forms($pokemon_id) {

include "./config.php";
$monsters = file_get_contents("$poracle_dir/src/util/monsters.json");
$json = json_decode($monsters, true);
$form_exclude = array("Shadow", "Normal", "Purified", "Copy 2019", "Fall 2019", "Spring 2020", "Vs 2019");
$forms=array();
$forms[0] = "Normal";

foreach ($json as $name => $pokemon) {

   if ($pokemon['id'] == "$pokemon_id") {
      if ( $pokemon['form']['id'] <> "0" && !in_array( $pokemon['form']['name'], $form_exclude ) ) {
         $forms[$pokemon['form']['id']] = $pokemon['form']['name'];
      }
   }
}
return $forms;
}

function get_all_mons() {

include "./config.php";
$monsters = file_get_contents("$poracle_dir/src/util/monsters.json");
$json = json_decode($monsters, true);
$monsters=array();

foreach ($json as $name => $pokemon) {
	$arr = explode("_", $name, 2);
        $pokemon_id = $arr[0];
	$monsters[$pokemon_id] = $pokemon['name'];
   }
$monsters=array_unique($monsters);
return $monsters;
}

function get_mons($pokemon_id) {

include "./config.php";
$monsters = file_get_contents("$poracle_dir/src/util/monsters.json");
$json = json_decode($monsters, true);
$monsters=array();

foreach ($json as $name => $pokemon) {
   $arr = explode("_", $name, 2);
   if ($arr['0'] == "$pokemon_id") {
        $found_name = $pokemon['name']; 
      }
}
return $found_name; 
}

function get_areas() {

include "./config.php";
$areas = file_get_contents("$poracle_dir/config/geofence.json");
$json = json_decode($areas, true);
$areas=array();

foreach ($json as $id => $area) {
	array_push($areas, $area['name']);
}
return $areas;
}

get_areas();


?>
