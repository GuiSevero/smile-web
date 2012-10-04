<?php


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$locale = 'pt_BR';
putenv('LC_ALL='.$locale);

$basetext = file_get_contents("basetext.txt");

$texto =  $_POST["texto"] .' ' .$basetext;


if ($texto) {

    $ran = rand ();
    $arqIn =  $ran . ".txt";
    $fh = fopen('tmp/' . $arqIn, 'w') or die("can't open file");
    fwrite($fh, $texto);
    fclose($fh);
	
    $ret = exec('java -jar sobek.jar ' . 'tmp/' . $arqIn, $result, $res); 
    //print_r($result); . "_Result.txt"
	

	echo implode($result, ' ');
	
    unlink('tmp/'.$arqIn);
  //  unlink('tmp/'.$ran.'_Result.txt');
    
    
}    
?>

