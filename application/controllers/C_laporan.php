<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class C_laporan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_pasien');
        $this->load->library('dompdf_gen');
    }
 
    public function index(){
        $this->load->view('v_laporan');
    }

    public function cetak(){      
        $tanggal       = $this->input->post('tanggal');   

        $data['data_cetak'] = $this->m_pasien->get_pasien($tanggal); 
        $data['dataa'] = $tanggal;

        $data['title'] = 'Cetak PDF Data BAR';  
        //query model semua barang 
        $this->load->view('v_report/v_c_laporan', $data);
 
        $paper_size  = 'LEGAL'; //paper size

        $orientation = 'POTRAIT'; //tipe format kertas
        $html = $this->output->get_output();
 
        $this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan.pdf", array("Attachment"=>0));
    }

}
/* End of file claporanpdf.php */
/* Location: ./application/controllers/claporanpdf.php */

/*$this->input->post('tanggal')*/