<?php


class Format 
{

public function Validation($data){


    $data=trim($data); //removes whitespace and other predefined characters from both sides of a string
    $data=stripcslashes($data); //remove backslashes
    $data=htmlspecialchars($data); //transforms html tags 

    return $data;

}

//For Products List 
public function textShorten($text, $limit = 200){
	$text = $text. "";  //starting blank
	$text = substr($text, 0, $limit); //substract text
	$text = $text.".."; //add .. after 400
	return $text; 
}
  //order date pt admin   
public function formatDate($date){
    return date('d/m/Y H:i:s', strtotime($date));
    }



}

?>