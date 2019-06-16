<?php
defined('BASEPATH') or exit('No direct script access allowed');

class t_penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Penjualan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['penjualan'] = $this->db->get('penjualan')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/penjualan/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('kode_penjualan', 'kode_penjualan', 'required|trim');
        $this->form_validation->set_rules('kode_barang', 'kode_barang', 'required|trim');
        $this->form_validation->set_rules('nama_barang', 'nama_barang', 'required|trim');
        $this->form_validation->set_rules('jumlah_barang', 'jumlah_barang', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Maaf! Data gagal di tambahkan.</div>');
        } else {
            $data = array(
                "kode_penjualan" => $_POST['kode_penjualan'],
                "kode_barang" => $_POST['kode_barang'],
                "nama_barang" => $_POST['nama_barang'],
                "jumlah_barang" => $_POST['jumlah_barang']
            );
            $this->db->insert('penjualan', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat! Data berhasil di tambahkan.</div>');
        }

        redirect('t_penjualan');
    }

    public function edit()
    {
        $this->form_validation->set_rules('nama_barang', 'nama_barang', 'required|trim');
        $this->form_validation->set_rules('jumlah_barang', 'jumlah_barang', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Maaf! Data gagal di ubah.</div>');
        } else {
            $data = array(
                "nama_barang" => $_POST['nama_barang'],
                "jumlah_barang" => $_POST['jumlah_barang'],
            );
            $this->db->where('kode_penjualan', $_POST['kode_penjualan']);
            $this->db->update('penjualan', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat! Data berhasil di ubah.</div>');
        }

        redirect('t_penjualan');
    }

    public function hapus($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Maaf! Data gagal di hapus.</div>');
        } else {
            $this->db->where('kode_penjualan', $id);
            $this->db->delete('penjualan');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat! Data berhasil di hapus.</div>');
        }

        redirect('t_penjualan');
    }
}
