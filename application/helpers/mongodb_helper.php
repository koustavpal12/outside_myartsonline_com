<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('mongodbConnection')) {

    function mongodbConnection() {
        /*
        $ci = & get_instance();
        $mongo_server_IP = $ci->config->item('mongo_server_IP');
        return $mng = new MongoDB\Driver\Manager($mongo_server_IP);
        */
        require 'application/third_party/vendor/autoload.php'; // include Composer's autoloader

        return $client = new MongoDB\Client("mongodb://localhost:27017");
    }

}

