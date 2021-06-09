<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
    private $table = "siswa";

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }
    public function save($data)
    {
        return $this->db->insert($this->table, $data); /*insert data ke dalam tabel tb_siswa */
        //  parameter  $data adalah variabel array yang 
        // berisi inputan form yang dikirimkan dari controller
        //  Siswa.php pada function save
    }
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["kd_siswa" => $id])->row();
    }
    public function update($data, $id)
    {
        return $this->db->update($this->table, $data, array('kd_siswa' => $id));
    }
    public function delete($id)
    {
        return $this->db->delete($this->table, array("kd_siswa" => $id));
    }
}
