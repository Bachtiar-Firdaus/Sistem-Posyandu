<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {	
	public function __construct()
	{
		parent::__construct();


		if($this->session->userdata('akses')!='ADMIN'){
		if($this->session->userdata('akses')!='KADER-PENDAFTARAN'){
		if($this->session->userdata('akses')!='KMS'){
      	$url=base_url();
		redirect($url);
    }
}
}


		$this->load->model('m_user');
		$this->load->model('m_pasien');

        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('download');
        $this->load->library('pdf');
	}

	public function index()
	{
		$data['contents'] = 'admin/content/dashboard';
		$this->load->view('admin/index',$data);
    }


    public function Kelola_Petugas()
	{
		$data['contents'] = 'admin/content/v_kelola_petugas';
		$this->load->view('admin/index',$data);
    }

	public function ajax_list()
	{
		$list = $this->m_user->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $m_user) {			
            $row[] = $no++;
			$row = array();
            $row[] = $m_user->no;
            $row[] = $m_user->user;
            $row[] = $m_user->alamat;
            $row[] = $m_user->nohp;
            $row[] = $m_user->password;
            $row[] = $m_user->level;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_m_kd('."'".$m_user->no."'".')"><i class="glyphicon glyphicon-pencil"></i>Ubah</a><a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_m_kd('."'".$m_user->no."'".')">
				<i class="glyphicon glyphicon-trash"></i>Hapus</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_user->count_all(),
						"recordsFiltered" => $this->m_user->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->m_user->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{

		$data = array(
				'user' => $this->input->post('user'),
				'password' => $this->input->post('password'),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'nohp' => $this->input->post('nohp'),
				'level' => $this->input->post('level'),
			);
		$insert = $this->m_user->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		date_default_timezone_set("Asia/Jakarta");/*
		date("Y-m-d H:i:s"),*/


	
		$data = array(
				'user' => $this->input->post('user'),
				'password' => $this->input->post('password'),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'nohp' => $this->input->post('nohp'),
				'level' => $this->input->post('level'),
			);



		$this->m_user->update(array('no' => $this->input->post('no')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->m_user->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}





























    public function Kelola_pasien()
	{
		$data['contents'] = 'admin/content/v_kelola_pasien';
        $this->load->view('admin/index',$data);
    }


	public function ajax_list1()
	{
		
		$list = $this->m_pasien->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $m_pasien) {			
            $row[] = $no++;
			$row = array();
            $row[] = $m_pasien->no;
            $row[] = $m_pasien->tanggal;
            $row[] = $m_pasien->nama;
            $row[] = $m_pasien->jk;
            $row[] = $m_pasien->alamat;
            $row[] = $m_pasien->nohp;
            $row[] = $m_pasien->kategori;
            $row[] = $m_pasien->umur_b;
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_m_kd('."'".$m_pasien->no."'".')"><i class="glyphicon glyphicon-pencil"></i>Ubah</a><a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_m_kd('."'".$m_pasien->no."'".')">
				<i class="glyphicon glyphicon-trash"></i>Hapus</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_pasien->count_all(),
						"recordsFiltered" => $this->m_pasien->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit1($id)
	{
		$data = $this->m_pasien->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add1()
	{


		$data = array(
				'no' => $this->input->post('no'),
				'tanggal' => $this->input->post('tanggal'),
				'nama' => $this->input->post('nama'),
				'jk' => $this->input->post('jk'),
				'alamat' => $this->input->post('alamat'),
				'nohp' => $this->input->post('nohp'),
				'kategori' => $this->input->post('kategori'),
				'umur_b' => $this->input->post('umur_b'),
			);
		$insert = $this->m_pasien->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update1()
	{
		date_default_timezone_set("Asia/Jakarta");/*
		date("Y-m-d H:i:s"),*/




		$data = array(
				'tanggal' => $this->input->post('tanggal'),
				'nama' => $this->input->post('nama'),
				'jk' => $this->input->post('jk'),
				'alamat' => $this->input->post('alamat'),
				'nohp' => $this->input->post('nohp'),
				'kategori' => $this->input->post('kategori'),
				'umur_b' => $this->input->post('umur_b'),
			);

		$this->m_pasien->update(array('no' => $this->input->post('no')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete1($id)
	{
		$this->m_pasien->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}



























    public function kelola_kms()
	{
		$data['contents'] = 'admin/content/v_kelola_kms';
		$this->load->view('admin/index',$data);
    }

	public function ajax_list2()
	{
		
		$list = $this->m_pasien->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $m_pasien) {			
            $row[] = $no++;
			$row = array();
            $row[] = $m_pasien->no;
            $row[] = $m_pasien->tanggal;
            $row[] = $m_pasien->nama;
            $row[] = $m_pasien->jk;
            $row[] = $m_pasien->alamat;
            $row[] = $m_pasien->nohp;
            $row[] = $m_pasien->kategori;
            $row[] = $m_pasien->umur_b;
            $row[] = $m_pasien->tanggal_kms;
            $row[] = $m_pasien->berat_badan;
            $row[] = $m_pasien->keluhan;
            $row[] = $m_pasien->tindakan;
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_m_kd('."'".$m_pasien->no."'".')"><i class="glyphicon glyphicon-pencil"></i>Ubah</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_pasien->count_all(),
						"recordsFiltered" => $this->m_pasien->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit2($id)
	{
		$data = $this->m_pasien->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add2()
	{


		$data = array(
				'tanggal_kms' => $this->input->post('tanggal_kms'),
				'berat_badan' => $this->input->post('berat_badan'),
				'keluhan' => $this->input->post('keluhan'),
				'tindakan' => $this->input->post('tindakan'),
			);
		$insert = $this->m_pasien->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update2()
	{
		date_default_timezone_set("Asia/Jakarta");/*
		date("Y-m-d H:i:s"),*/





		$data = array(
				'tanggal_kms' => $this->input->post('tanggal_kms'),
				'berat_badan' => $this->input->post('berat_badan'),
				'keluhan' => $this->input->post('keluhan'),
				'tindakan' => $this->input->post('tindakan'),
			);

		$this->m_pasien->update(array('no' => $this->input->post('no')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete2($id)
	{
		$this->m_pasien->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}































    public function laporan()
	{
		$data['contents'] = 'admin/content/v_laporan';
		$this->load->view('admin/index',$data);
    }

	public function ajax_list3()
	{
		
		$list = $this->m_pasien->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $m_pasien) {			
            $row[] = $no++;
			$row = array();
            $row[] = $m_pasien->no;
            $row[] = $m_pasien->tanggal;
            $row[] = $m_pasien->nama;
            $row[] = $m_pasien->jk;
            $row[] = $m_pasien->alamat;
            $row[] = $m_pasien->nohp;
            $row[] = $m_pasien->kategori;
            $row[] = $m_pasien->umur_b;
            $row[] = $m_pasien->tanggal_kms;
            $row[] = $m_pasien->berat_badan;
            $row[] = $m_pasien->keluhan;
            $row[] = $m_pasien->tindakan;
			//add html for action
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_pasien->count_all(),
						"recordsFiltered" => $this->m_pasien->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}




	

}
