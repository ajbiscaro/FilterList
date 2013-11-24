<?php 
/**
 * Filter List Controller
 * Controller for filtering child dropdown list.
 * @File name: filter.php
 * @Version: 1.0 (September 29, 2013)
 * @copyright Copyright (C) Ardel John Biscaro
 * @link http://ajbiscaro.net84.net
 **/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Filter extends CI_Controller {
 
    function __construct()
    {
    		parent::__construct();
			
			//load filter model
			$this->load->model('filter_model');
 
    }
 
    public function index()
    {
    	//load country and city list data
		$data['country_list'] = $this->filter_model->get_country_list();
		$data['city_list'] = $this->filter_model->get_city_list();
		
		$this->load->view('filter_list', $data);
	}
	
	function get_city($country_id)
	{
		//load city data filtered by country id thru jason
		header('Content-Type: application/x-json; charset=utf-8');
		echo (json_encode($this->filter_model->get_city_list($country_id)));
	}
}
 