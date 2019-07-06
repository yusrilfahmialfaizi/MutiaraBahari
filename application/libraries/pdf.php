<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	require APPPATH.'/third_party/fpdf/fpdf.php';
	/**
	 * 
	 */
	class pdf extends FPDF
	{
		
		function __construct()
		{
			# code...
		}
		function footer(){
	        $this->SetY(-15);
		    // Arial italic 8
		    $this->SetFont('Arial','I',8);
		    // Page number
		    $this->Cell(170,10,'User :  ',0,0,'L');
		    $this->Cell(170,10,'Jam :  ',0,0,'R');
	 	}
	 	public function getInstance(){
	        return new pdf();
	    }
	}
?>