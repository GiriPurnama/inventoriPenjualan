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

    public function rules()
    {
        return [
            [
                'field' => 'nama_barang',
                'label' => 'Nama_barang',
                'rules' => 'required'
            ],

            [
                'field' => 'jumlah_barang',
                'label' => 'Jumlah_barang',
                'rules' => 'required'
            ],

            [
                'field' => 'harga_barang',
                'label' => 'Harga_barang',
                'rules' => 'required'
            ]
        ];
    }

    public function getALL()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["kode_barang" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        //$this->kode_barang = uniqid();
        $this->nama_barang = $post["nama_barang"];
        $this->jumlah_barang = $post["jumlah_barang"];
        $this->tanggal_masuk = $post["tanggal_masuk"];
        $this->harga_barang = $post["harga_barang"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->kode_barang = $post["kode_barang"];
        $this->nama_barang = $post["nama_barang"];
        $this->jumlah_barang = $post["jumlah_barang"];
        $this->harga_barang = $post["harga_barang"];
        $this->db->update($this->_table, $this, array('kode_barang' => $post['kode_barang']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("kode_barang" => $id));
    }
}
