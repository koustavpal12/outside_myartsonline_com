<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
if (!defined('FOLDER_SEPERATOR')) {
    define('FOLDER_SEPERATOR', '/');
}

if (!defined('MAIN_FOLDER')) {
    define('MAIN_FOLDER', '');
}

class Par_Controller extends CI_Controller {

    public $modelPath;
    public $layoutPath;
    public $viewPath;
    public $controllerPath;
    public $baseURL;
    public $maxPerPage = 5;
    public $current_controller;
    public $current_method;
    
    public $pageHeaderTitle;
    public $pageTitle;
    public $elements = array();
    public $data = NULL;
    public $results = NULL;

	public $stote_name;

    public function __construct($param = array()) {
        parent::__construct();
        ob_start();
      
        $this->modelPath = (MAIN_FOLDER ? MAIN_FOLDER . FOLDER_SEPERATOR : '');
        $this->layoutPath = (MAIN_FOLDER ? MAIN_FOLDER . FOLDER_SEPERATOR : '');
        $this->controllerPath = (MAIN_FOLDER ? MAIN_FOLDER . FOLDER_SEPERATOR : '');
        $this->baseURL = (MAIN_FOLDER ? MAIN_FOLDER . FOLDER_SEPERATOR : '');
        $this->viewPath = (MAIN_FOLDER ? MAIN_FOLDER . FOLDER_SEPERATOR : '');
        
        $this->current_controller = $this->controllerPath . $this->router->fetch_class();
        $this->current_method = $this->router->fetch_method();
        $this->current_method = $this->current_method == 'index' ? 'defaultview' : $this->current_method;
        if (isset($param['viewSubFolder']) && !empty($param['viewSubFolder'])) {
            $this->viewPath = $this->viewPath . trim($param['viewSubFolder'], FOLDER_SEPERATOR) . FOLDER_SEPERATOR . $this->router->fetch_class() . FOLDER_SEPERATOR;
        } else {
            $this->viewPath = $this->viewPath . $this->router->fetch_class();
        }

		if(isset($param['stote_name'])) {
			$this->stote_name = $param['stote_name'];
		}



        $this->userID = '';
        
		$this->pageHeaderTitle = 'Test Pro';
        $this->pageTitle = '';

        $this->MaxPerPage = 50;
        $this->results = array('success' => true, 'message' => 'Updated Successfully.', 'recData' => '');
        $this->data = array();
        $this->data['title'] = 'Test Pro';
        $this->data['meta_description'] = 'Test ProTest ProTest Pro';
        $this->data['meta_keywords'] = 'Test ProTest ProTest ProTest ProTest ProTest ProTest Pro';
        $this->data['controller_name'] = $this->current_controller;
        $this->data['controller_path'] = $this->controllerPath;
        $this->data['method_name'] = $this->current_method;
        $this->data['pageHeaderTitle'] = $this->pageHeaderTitle;
        $this->data['pageTitle'] = $this->pageTitle;
       

		$js_arr = array(
			COMMON_JS
		);

        $this->data['common_js_arr'] = $js_arr;
        
		$this->elements['main'] = str_replace('//', '/', $this->viewPath . '/' . $this->current_method);

    }

    public function index() {
        $this->defaultview();
    }

    public function defaultview() {
        die('<h1> Please write your own defaultview function </h1>');
    }

}

