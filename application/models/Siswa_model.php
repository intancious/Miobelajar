<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
    private $table = "siswa";

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }
}