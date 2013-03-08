<?php

/* Base class for all controllers - FHM */

class Controller {

	// used to send data to the view
	public static $data;
	// accessible to child objets, for custom rendering - FHM 
	protected static $view;

	// create view object
	public function __construct(){
		self::$view = new View();
	}
        
	// render view for single view based on controller
	public function index(){

	  	self::$view->render(get_class($this), self::$data);
	}

	// render for single view based on controller's method ex:start/add/ (add is a view)
	// also for views that fall under a grouping, ex: start/crud/add/  (add is a view part of the crud grouping)
	public function custom($view, $subview=null){
		self::$view->render($view, self::$data, $subview);
	}

	// clear connections and switch database depending on provided entity - FHM 
	public static function switchDb($entity, $db_name){

		ActiveRecord\ConnectionManager::drop_connection();

		foreach (glob("config/" . ENVIRONMENT . "/" . $db_name . "/*.php") as $filename)
		{
		    require $filename;
		}
	}

	// throws error for proper logging and error notification - FHM
	public function handleError($level, $filename, $desc){

		// build error output - FHM
		$date = date('m/d/Y h:i:s a', time());
		$error_level = $level;
		$error_desc = $desc;
		$error_file = $filename;
		$error_action = $error_level == 'danger' ? 'quarantine' : '';
		$error = $date.' - '.$error_file.' : '.$error_desc.'-'.$error_action.'-'.$error_level;

		// send txt msg to kevin and freddy - FHM
		//	mail('2267912634@msg.telus.com', '', $error, '');

		// redirect to temp page and send email msg to kevin and freddy - FHM
		if($error_action == 'quarantine'){

			//		mail('freddy.hm@growple.com', '', $error, '');
			
			// redirect to error page - FHM
			header('Location:' . URL . 'error' );
		}

		// log error in server - FHM
		error_log($error);
	}
}