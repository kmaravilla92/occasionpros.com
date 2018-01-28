<?php

if(!function_exists('calculate_distance')) {
	function calculate_distance($lat1, $lon1, $lat2, $lon2, $unit) {

		if(
			!$lat1 ||
			!$lon1 ||
			!$lat2 ||
			!$lon2
		){
			return '0';
		}

		$theta = $lon1 - $lon2;
		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;
		$unit = strtoupper($unit);

		if ($unit == "K") {
			return round(($miles * 1.609344));
		} else if ($unit == "N") {
			return round(($miles * 0.8684));
		} else {
			return round($miles);
		}
	}
}