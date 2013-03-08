<?php

// set default timezone - FHM   
date_default_timezone_set('America/Toronto');


// set environment - development / staging / production - FHM
$environment = 'development'; 

// loading necessary files (order of loading is important!) - FHM
foreach (glob("config/*.php") as $filename)
{
    require $filename;
}

foreach (glob("config/$environment/*.php") as $filename)
{
    require $filename;
}

foreach (glob("config/$environment/admin/*.php") as $filename)
{
    require $filename;
}

foreach (glob("application/classes/*.php") as $filename)
{
    require $filename;
}

// The butlers are always the last to load - FHM
foreach (glob("application/butlers/*.php") as $filename)
{
    require $filename;
}

// set to output errors according to env - FHM
if(ENVIRONMENT == 'production'){
	error_reporting(0);
}else{
	error_reporting(E_ALL);
}

if(isset($_REQUEST['url'])){
	$url = explode('/', $_REQUEST['url']);
	
	// init session variable class if session doesn't exist and butlers aren't being called  - FHM
	if(!Session::exist() && $url[0] != 'butlers'){
		Session::init();
	}

}else if(!Session::exist()){
	Session::init();
}

// route to loading screen 
//$login = new Login(); 
$app = new Bootstrap();



