<?php

/* base class for all views - FHM */

class View {

    function __construct() {
    }

    // check if data is sent in form of array, extract variable
    public function render($viewname, $data = null, $subviewname=null)
    {
        if(isset($data))
        {
           extract($data);	
        }

        //gets subview by looking at directory with viewname - FHM 
        $subviewname = !is_null($subviewname) ? $subviewname : "index"; 
        $lwr_viewname = strtolower($viewname);
        $viewname = is_dir("application/views/".$lwr_viewname) ? $lwr_viewname."/".$subviewname : $lwr_viewname; 

        require 'application/views/common/header.php';    
        require 'application/views/' . $viewname . '.php';
        require 'application/views/common/footer.php';
    }   
}