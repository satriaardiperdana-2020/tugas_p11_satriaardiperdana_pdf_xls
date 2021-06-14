<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

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
		$this->load->view('Report_view', $data);
	}
	
	public function hsk(){
		$mpdf = new \Mpdf\Mpdf();
		$results = $this->Nilai_model->retrieve($this->input->post('vNIM'));
		
		$output = "<h1>Hasil Studi</h1>";
		$output = "<table border='2' widht='100%' cellpadding='5'>
					<tr>
						<th>No.</th>
						<th>Kode MTK</th>
						<th>Matakuliah</th>
						<th>Absen</th>
						<th>Tugas</th>
						<th>UTS</th>
						<th>UAS</th>
					</tr>";
		$no=1;
		foreach($results as $data){
			$output .="<tr>
						<td>$no.</td>
						<td>$data[1]</td>
						<td>$data[2]</td>
						<td>$data[3]</td>
						<td>$data[4]</td>
						<td>$data[5]</td>
						<td>$data[6]</td>
					   </tr>";
			$no++;
		}
		$output .="</table>";
		$mpdf->WriteHTML($output);
		$mpdf->Output();
	}
}
