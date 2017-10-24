<?php
/**
 * API Helper - Helper
 *
 * @category Helper
 * @package Helper
 * @subpackage APIHelper
 * @author Nikhil Chaughule <nikhil.chaughule@inscripts.in>
 * @copyright 2015 Inscripts.com
 * @version 1.0.0
 */
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );


/**
 * Function to set value for user in hierarchy filter as per the area acces assigned.
 *
 * @return array.
 */
function load_view($url="enquiry/enquiry", $data=array()){
	$CI = & get_instance ();
	$menu['data'] = $CI -> menus->getAllMenus();

	$CI->load->view('header',$menu);
	$CI->load->view($url,$data);
	$CI->load->view('footer');
	
}

