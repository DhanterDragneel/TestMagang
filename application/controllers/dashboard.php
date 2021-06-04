<?php

class Dashboard extends CI_Controller{
    public function index(){
        $data['datamahasiswa']=$this->model_data->tampil_data()->result();
        $this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('dashboard',$data);
		$this->load->view('footer');

    }
    public function tambah_aksi()
	{
		$nama =$this->input->post('nama');
		$alamat =$this->input->post('alamat');
		$foto = $_FILES['foto']['name'];
		if ($foto =''){
			
		} else{
			$config['upload_path']   ='./uploads';
			$config['allowed_types'] ='jpg|jpeg|png|gif';

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('foto')){
				echo "Proses Gambar Gagal";
			}else{
				$foto=$this->upload->data('file_name');
			}
		}
        $foto_ktp = $_FILES['foto_ktp']['name'];
		if ($foto_ktp =''){
			
		} else{
			$config['upload_path']   ='./uploads';
			$config['allowed_types'] ='jpg|jpeg|png|gif';

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('foto_ktp')){
				echo "Proses Gambar Gagal";
			}else{
				$foto_ktp=$this->upload->data('file_name');
			}
		}
		$data = array(
			'nama'   =>$nama,
			'alamat' =>$alamat,
			'foto'   =>$foto,
            'foto_ktp'   =>$foto_ktp

		);
		$this->model_data->tambah_data($data, 't_data');
		redirect('dashboard/index');
	}
	public function edit($id){
		$where = array ('id'=>$id);
		$data['datamahasiswa'] = $this->model_data->edit_data($where, 't_data')->result();
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('edit_data',$data);
		$this->load->view('footer');
	}
	public function update(){
		$id     =$this->input->post('id');
		$nama  	=$this->input->post('nama');
		$alamat	=$this->input->post('alamat');
		$datafoto = array('foto'=>$foto);
		$wherefoto = array('id'=>$id);
		$this->model_data->hapus_data2($wherefoto,$datafoto, 't_data');
		$foto = $_FILES['foto']['name'];
		if ($foto !=""){
			$config['upload_path']   ='./uploads';
			$config['allowed_types'] ='jpg|jpeg|png|gif';
			$this->load->library('upload', $config);
			
			if(!$this->upload->do_upload('foto')){
				$error = array('error' => $this->upload->display_errors());
			}else{
				$upload_data=$this->upload->data();
            	$foto=$upload_data['file_name'];
				
			}
		} else{
			
			$foto=$this->input->post('foto');
		}
		

		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'foto' => $foto
		);

		$where = array (
			'id' => $id
		);

		$this->model_data->update_data($where,$data,'t_data');
		redirect('dashboard/index');

	}
	public function hapus ($id)
	{
		$where = array('id' => $id);
		$this->model_data->hapus_data($where, 't_data');
		redirect('dashboard/index');
	}
}
