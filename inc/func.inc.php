<?php 

ob_start();
session_start();

$script_name = $_SERVER['SCRIPT_NAME'];
@$http_referer = $_SERVER['HTTP_REFERER'];

function loggedin(){
	if(isset($_SESSION['id']) && !empty($_SESSION['id']))
		return true;
	else
		return false;
}

function isadmin(){
	if(isset($_SESSION['id']) && $_SESSION['id'] == 1)
		return true;
	else
		return false;
}

function return_display_time($time){
	return date('D, g:i A', $time);
}

function duckduckgoreturn($keyword){
	$search_url = "http://api.duckduckgo.com/?q=" . str_replace(" ", "+", $keyword) . "&format=json&pretty=1";
	$json_results = json_decode(curl_URL_call($search_url), true);
	return $json_results['AbstractText'];
}

function curl_URL_call($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	$output = curl_exec($ch);
	curl_close($ch);
	return $output;
}

function delete_message($connection, $message_id){
	$query = "DELETE FROM `messages` WHERE `m_id`='$message_id'";
	// die;
	return mysqli_query($connection, $query);
}