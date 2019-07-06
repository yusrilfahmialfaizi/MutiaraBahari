<?php 
/**
  * 
  */
 class Notapdf extends CI_Controller
 {
 	
 	function __construct()
 	{
 		# code...
 		parent::__construct();
 		// $this->load->library('pdf');
 	}
 	function index(){
 		$this->load->library('pdf');
    	$pdf = $this->pdf->getInstance();
 		$pdf = new FPDF ('L','mm',array('360','160' ));
 		// $pdf = new FPDF ('L','cm',array('24.3','7' ));
 		// $pdf = new FPDF ('L','mm','A5');
 		$pdf -> AddPage();
 		$pdf -> SetFont("Arial", "", 14);
 		// $pdf->Cell(40,10,'Hello World !',1);
 		$pdf->Cell(70,8,'MUTIARA BAHARI',0,0,'L');
 		$pdf->SetFont("Arial", "U", 14);
 		$pdf->Cell(200,8,'INVOICE',0,0,'C');
 		$pdf->Cell(70,8,'',1,1,'C');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(70,8,'Jln. Argopuro Klompangan - Ajung',0,1,'L');
        $pdf->Cell(70,8,'Telp. 081333234042 - Jember',0,1,'L');
        $pdf->SetFont('Arial','',14);
 		$pdf->Cell(340,8,'KET',0,1,'C');
        $pdf->Cell(10,10,'',0,1);
        $pdf->SetFont('Arial','',11);
 		$pdf->Cell(85,7,'NO. INVOICE',1,0,'L');
 		$pdf->Cell(85,7,'TANGGAL',1,0,'L');
 		$pdf->Cell(85,7,'JTP',1,0,'L');
 		$pdf->Cell(85,7,'KET',1,0,'L');


        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,10,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'NO.',1,0,'C');
        $pdf->Cell(30,6,'KODE',1,0,'C');
        $pdf->Cell(150,6,'NAMA BARANG',1,0,'C');
        $pdf->Cell(25,6,'JUMLAH',1,0,'C');
        $pdf->Cell(50,6,'HARGA',1,0,'C');
        $pdf->Cell(25,6,'DISC',1,0,'C');
        $pdf->Cell(50,6,'TOTAL',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $mahasiswa = $this->db->query("SELECT dt.id_barang, b.nama_barang, dt.qty,dt.harga,dt.subtotal From barang as b, transaksi as t, detail_transaksi as dt Where dt.id_barang = b.id_barang && dt.id_transaksi = 'JL1905-0400001'")->result();
        $no = 1;
        foreach ($mahasiswa as $row){
            $pdf->Cell(10,6,$no++,1,0,'C');
            $pdf->Cell(30,6,$row->id_barang,1,0,'C');
            $pdf->Cell(150,6,$row->nama_barang,1,0);
            $pdf->Cell(25,6,$row->qty." PAK",1,0,'C'); 
            $pdf->Cell(50,6,number_format($row->harga),1,0,'R'); 
            $pdf->Cell(25,6,"0.0",1,0,'R'); 
            $pdf->Cell(50,6,number_format($row->subtotal),1,1,'R'); 
        }
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(68,6,'BCA NO. 2004553399',0,0,'L');
        $pdf->Cell(68,6,'Hormat Kami,',0,0,'C');
        $pdf->Cell(68,6,'Diterima Oleh,',0,0,'C');
        $pdf->Cell(34,6,'Subtotal',0,0,'L');
        $pdf->Cell(34,6,'Subtotal',0,0,'R');
        $pdf->Cell(34,6,'Bayar',0,0,'L');
        $pdf->Cell(34,6,'Bayar',0,1,'R');
        $pdf->Cell(68,6,'A/N SUPRIANTO ARIF PAMB',0,0,'L');
        $pdf->Cell(136,6,'',0,0,'L');
        $pdf->Cell(34,6,'Potongan',0,0,'L');
        $pdf->Cell(34,6,number_format("000"),0,0,'R');
        $pdf->Cell(34,6,'Sisa/Hutang',0,0,'L');
        $pdf->Cell(34,6,'Bayar',0,1,'R');
        $pdf->Cell(68,6,'',0,0,'L');
        $pdf->Cell(68,6,'Admin',0,0,'C');
        $pdf->Cell(68,6,'Customer',0,0,'C');
        $pdf->Cell(34,6,'Grand Total',0,0,'L');
        $pdf->Cell(34,6,number_format("000"),0,0,'R');
        $pdf->Cell(68,6,'',0,0,'L');
        $pdf->footer('Arial');
     //    $pdf->SetY(140);
	    // // Arial italic 8
	    // $pdf->SetFont('Arial','I',8);
	    // // Page number
	    // $pdf->Cell(170,10,'User :  ',0,0,'L');
	    // $pdf->Cell(170,10,'Jam :  ',0,0,'R');
	    // $pdf->Cell(0,10,'Page '.$pdf->PageNo().'/{nb}',0,0,'C');
        $pdf->Output();
 	}
 }
?>