<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Home extends Par_Controller
{
	public function __construct()
	{
		parent::__construct(array());
	}

	public function index()
	{
		
		$this->defaultview();
	}

	public function defaultview()
	{
		$elements = array();
		$element_data = array();
		$param = array();

		$js_arr = array();
		$css_arr = array();
		$res = array();

		$this->data['js_arr'] = $js_arr;
		$this->data['css_arr'] = $css_arr;
		$this->data['param'] = $param;

		$res = $this->getRecords($param);
		$res = json_decode($res, true);

		$this->data['data'] = $res['data'];

		$this->data['metaTitle'] = 'OUTSIDE';
		$this->data['metaDescription'] = 'OUTSIDE';

		$element_data['main'] = $this->data;
		$this->layout->setLayout($this->layoutPath . 'par_layout');
		$this->layout->multiple_view($this->elements, $element_data);
	}

	public function getRecords()
	{
		/* API URL */
		$url = 'http://palnbg.mypressonline.com/index.php/api/store_content/getData/onenbg';

		/* Init cURL resource */
		$curl = curl_init($url);

		curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_TIMEOUT => 30000,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				// Set Here Your Requesred Headers
				'Content-Type: application/json',
			),
		));

		/* execute request */
		$result = curl_exec($curl);

		/* close cURL resource */
		curl_close($curl);

		return $result;
	}
}
