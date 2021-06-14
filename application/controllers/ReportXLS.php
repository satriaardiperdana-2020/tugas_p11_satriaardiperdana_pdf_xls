<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class ReportXLS extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Mahasiswa_model');
		$this->load->model('Mtk_model');
		$this->load->model('Nilai_model');
		}
	 
	function index(){
		$data['mhs'] = $this->Mahasiswa_model->retreive();
		$this->load->view('ReportXLS_view', $data);
	}
	
	public function hsk(){
		$filename = '1911601100_SatriaArdiPerdana';
		$results = $this->Nilai_model->retrieve($this->input->post('vKDMATKUL'));

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$spreadsheet->getActiveSheet()->mergeCells("A1:K1");
		$sheet->setCellValue("A1","Laporan Nilai");
		if($results->num_rows() > 0){
			$sheet->setCellValue("A2","No.");
			$sheet->setCellValue("B2","Nim");
			$sheet->setCellValue("C2","Nama");
			$sheet->setCellValue("D2","Kode MTK");
			$sheet->setCellValue("E2","Matakuliah");
			$sheet->setCellValue("F2","Absen");
			$sheet->setCellValue("G2","Tugas");
			$sheet->setCellValue("H2","UTS");
			$sheet->setCellValue("I2","UAS");
			$sheet->setCellValue("J2","NILAI AKHIR");
			$sheet->setCellValue("K2","GRADE");

			foreach($results->result() as $key => $row){

				$akhir = ($row->tugas * 30 / 100) + ($row->uts * 30 / 100) + ($row->uas * 40 / 100);
                $grade = 'E';
                if($akhir >= 85 && $akhir <= 100) $grade = 'A';
                if($akhir >= 80 && $akhir < 85) $grade = 'A-';
                if($akhir >= 75 && $akhir < 80) $grade = 'B+';
                if($akhir >= 70 && $akhir < 75) $grade = 'B';
                if($akhir >= 65 && $akhir < 70) $grade = 'B-';
                if($akhir >= 60 && $akhir < 65) $grade = 'C';
                if($akhir >= 45 && $akhir < 60) $grade = 'D';
                if($akhir >= 0 && $akhir < 45) $grade = 'E';

				$nomor = $key + 2;
				$sheet->setCellValue('A'.($nomor+1), $key+1);
				$sheet->setCellValue('B'.($nomor+1), $row->nim);
				$sheet->setCellValue('C'.($nomor+1), $row->nama);
				$sheet->setCellValue('D'.($nomor+1), $row->kdmtk);
				$sheet->setCellValue('E'.($nomor+1), $row->namamtk);
				$sheet->setCellValue('F'.($nomor+1), $row->absen);
				$sheet->setCellValue('G'.($nomor+1), $row->tugas);
				$sheet->setCellValue('H'.($nomor+1), $row->uts);
				$sheet->setCellValue('I'.($nomor+1), $row->uas);
				$sheet->setCellValue('J'.($nomor+1), $akhir);
				$sheet->setCellValue('K'.($nomor+1), $grade);
			}
		}

		$writer = new Xlsx($spreadsheet);
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}
?>
