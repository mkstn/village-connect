<?php
/**
 * @Author: Prabhakar Gupta
 * @Date:   2016-02-16 01:57:09
 * @Last Modified by:   Prabhakar Gupta
 * @Last Modified time: 2016-02-20 05:39:33
 */


require_once 'login.function.inc.php';


/**
 * function to convert the passed timestamp to a human readable format
 * @param  integer 	$time 	timestamp
 * @return string 		 	desired time string
 */
function return_display_time($time){
	return date('D, g:i A', $time);
}


/**
 * function to call DuckDuckGo API (https://duckduckgo.com/api)
 * API is used to get the meaning of terms raised by villagers by admin
 * @param  string 	$keyword 
 * @return array
 */
function duckduckgoreturn($keyword){
	$searched_term = str_replace(" ", "+", $keyword);
	$search_url = "http://api.duckduckgo.com/?q=format=json&" . $searched_term;
	
	$json_results = json_decode(curl_URL_call($search_url), true);
	return $json_results['AbstractText'];
}


/**
 * function to make cURL calls
 * @param  string 	$url 	URL at which cURL call is to be made
 * @return string      		output string
 */
function curl_URL_call($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	$output = curl_exec($ch);
	curl_close($ch);
	return $output;
}


/**
 * function to delete messages at different levels
 * @param  connection_object 	$connection
 * @param  integer 				$message_id 
 * @return boolean
 */
function delete_message($connection, $message_id){
	$query = "DELETE FROM `messages` WHERE `m_id`='$message_id'";
	return (bool)(mysqli_query($connection, $query));
}