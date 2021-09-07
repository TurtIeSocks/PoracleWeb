<?php

// Cache Geofences Tiles

if (file_exists("./.cache") && @$disable_geomap <> 'True') {

   $opts = array(
     'http'=>array(
       'method'=>"GET",
       'header'=>"Accept-language: en\r\n" .
                 "X-Poracle-Secret: $api_secret\r\n"
     )
   );

   $context = stream_context_create($opts);

   $geo_hash = file_get_contents("$api_address/api/geofence/all/hash", false, $context);
   $json = json_decode($geo_hash, true); 
   $geo_hash = $json['areas'];

   foreach ($json['areas'] as $area_name => $hash) { 

      $geo_hash[strtoupper($area_name)] = $hash;
      $encode_name = rawurlencode($area_name);
      $area_name = strtoupper(str_replace(' ', '_', $area_name));

      // Call Each Geofence and check hash

      if (!file_exists("./.cache/geo_".$area_name."_".$hash.".png")) { 
         $geo = file_get_contents("$api_address/api/geofence/".$encode_name."/map", false, $context);
	 $json = json_decode($geo, true);
	 $png=$json['url'];
	 if ( isset($png) ) {
	    if ( @fopen($png, 'r') ) { 
	          file_put_contents("./.cache/geo_".$area_name."_".$hash.".png", file_get_contents($png));
	    }
	 }
      }

   }

}

?>
