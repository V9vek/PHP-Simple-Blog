<?php
	//In this format_helper.php file we will create helper functions to modify something

	//Format of the Date
	function formatDate($date){
		return date('F j, Y, g:i a' , strtotime($date));
	}


	//Format the post body
	function shortenText($text,$chars = 450){
		$text = $text." ";
		$text =  substr($text,0,$chars); //substr(string, start ,end)
		$text = substr($text,0,strrpos($text,' '));
		$text = $text."...";

		return $text; 
	}
 ?>