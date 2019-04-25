<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class Usermodel extends CI_Model
	{
		// user get All
		public function getUser()
		{
			return $this->db->get('user')->result();
		}
		
	}
?>