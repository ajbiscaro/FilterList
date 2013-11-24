<?php
/**
 * Filter List Model
 * Model for filtering child dropdown list.
 * @File name: filter_model.php
 * @Version: 1.0 (September 29, 2013)
 * @copyright Copyright (C) Ardel John Biscaro
 * @link http://ajbiscaro.net84.net
 **/
 
class Filter_model extends CI_Model {
		
	function get_country_list()
	{
		//query for country
	  $this->db->from('country');

	  $result = $this->db->get();
	  $countryData = array();
	  if($result->num_rows() > 0) {
	  
	  	$countryData[0] = 'Select a Country';
	  	
	  	//add id and name to array
	    foreach($result->result_array() as $row) {
	      $countryData[$row['id']] = $row['name'];
	    }
	  }
	  return $countryData;
	} 
	
	function get_city_list($country_id=NULL)
	{
		//query for city filtered by country id
	  $this->db->from('city');
	  
	  	if( $country_id != NULL ){
			$this->db->where('country_id', $country_id);
		}
		
	  $result = $this->db->get();
	  $cityData = array();
	  if($result->num_rows() > 0) {
	  
	  	$cityData[0] = 'No Country Selected';
	  	
	  	//add id and name to array
	    foreach($result->result_array() as $row) {
	      $cityData[$row['id']] = $row['name'];
	    }
	  }
	  return $cityData;
	} 
}