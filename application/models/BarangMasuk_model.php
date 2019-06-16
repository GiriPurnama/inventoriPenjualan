<?php defined('BASEPATH') or exit('No direct script access allowed');

class BarangMasuk_model extends CI_Model
{
    //nama tabel
    private $_table = "barang_masuk";

    //nama kolom pada tabel
    public $kode_barang;
    public $nama_barang;
    public $jumlah_barang;
    public $tanggal_masuk; //= date(Y - m - d);
    public $harga_barang;

    public function read($where = null)
    {
        if (!empty($where))
            $this->db->where($where);

        $query = $this->db->get($this->_table);
        if ($query->num_rows() > 0)
            return $query->result(); //atau >= 1
        else
            return array();
    }

    public function create($data)
    {
        $this->db->insert($this->_table, $data);
    }

    public function update($where, $data)
    {
        $this->db->where($where);
        $this->db->update($this->_table, $data);
    }

    public function delete($where)
    {
        $this->db->where($where);
        $this->db->delete($this->_table);
    }
}
