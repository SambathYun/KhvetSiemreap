<?php 

// date_default_timezone_set("Asia/Phnom_Penh");

#1 base path : C:\xampp\htdocs\khvetsiemreap

define('BASE_PATH',str_replace("\\","/",dirname(__FILE__)).'/');


function BASE_PATH(){
    echo BASE_PATH;
}

#2 base path : http://localhost/khvetsiemreap
 
$seftPath = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))==='https://'?'https://':'http://';
$seftPath .= $_SERVER['HTTP_HOST'].'/';
$seftPath .= trim(str_replace($_SERVER['DOCUMENT_ROOT'],'',BASE_PATH),"/");

define('BASE_URL',$seftPath.'/');
define('ADMIN_URL',BASE_URL.'admin/');
unset($seftPath);


function BASE_URL(){
    echo BASE_URL;
}

?>