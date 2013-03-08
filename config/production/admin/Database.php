<?php

    require_once 'vendors/php-activerecord/ActiveRecord.php';

    ActiveRecord\Config::initialize(function($cfg)
    {
       $cfg->set_model_directory(MODEL_DIR);
       $cfg->set_connections(array('admin' => ''));
        $cfg->set_default_connection("admin");
    });