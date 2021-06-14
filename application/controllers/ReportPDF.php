<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportPDF extends CI_Controller {

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
		$data['mtk'] = $this->Mtk_model->retreive();
		$this->load->view('ReportPDF_view', $data);
	}
	
	public function hsk(){
		$mpdf = new \Mpdf\Mpdf();
		$data['simpanan'] = $this->Nilai_model->retrieve($this->input->post('vKDMATKUL'));
		$output = $this->load->view('ReportPDF_cetak', $data, TRUE);
		$mpdf->WriteHTML($output);
		$mpdf->Output('1911601100_SatriaArdiPerdana.pdf', I);
	}
}
