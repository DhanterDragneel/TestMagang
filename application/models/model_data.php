<?php

class Model_Data extends CI_Model{
    public function tampil_data(){
        return $this->db->get('t_data');
    }
    public function tambah_data($data,$table)
	{
		$this->db->insert($table,$data);
	}
    public function edit_data($where,$table)
	{
		return $this->db->get_where($table,$where);

	}
    public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	public function update_datafoto($where,$data,$table)
	{
		$this->db->where($wherefotoku);
		$this->db->insert($table,$datafotoku);
	}
	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function hapus_data2($wherefoto,$datafoto,$table)
	{
		$this->db->where($wherefoto);
		$this->db->delete($table,$datafoto);
	}
}