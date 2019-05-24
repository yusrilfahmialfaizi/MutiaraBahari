<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class Merekandroid extends CI_Model
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
		}
		function merektampil()
		{
			return $this->db->get("merek")->result();
		}
	}
?>