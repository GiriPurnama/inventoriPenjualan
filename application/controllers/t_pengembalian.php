<?php
defined('BASEPATH') or exit('No direct script access allowed');

class t_pengembalian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Pengembalian';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['pengembalian'] = $this->db->get('return_barang')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/pengembalian/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('kode_barang', 'kode_barang', 'required|trim');
        $this->form_validation->set_rules('nama_barang', 'nama_barang', 'required|trim');
        $this->form_validation->set_rules('jumlah_barang', 'jumlah_barang', 'required|trim');
        $this->form_validation->set_rules('tanggal_masuk', 'tanggal_masuk', 'required|trim');
        $this->form_validation->set_rules('harga_barang', 'harga_barang', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Maaf! Data gagal di tambahkan.</div>');
            redirect('transaksi');
        } else {
            $data = array(
                "kode_barang" => $_POST['kode_barang'],
                "nama_barang" => $_POST['nama_barang'],
                "jumlah_barang" => $_POST['jumlah_barang'],
                "tanggal_masuk" => $_POST['tanggal_masuk'],
                "harga_barang" => $_POST['harga_barang'],
            );
            $this->db->insert('barang_masuk', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat! Data berhasil di tambahkan.</div>');
            redirect('transaksi');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('kode_barang', 'kode_barang', 'required');
        $this->form_validation->set_rules('nama_barang', 'nama_barang', 'required');
        $this->form_validation->set_rules('jumlah_barang', 'jumlah_barang', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'tanggal_masuk', 'required');
        $this->form_validation->set_rules('harga_barang', 'harga_barang', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Maaf! Data gagal di ubah.</div>');
            redirect('transaksi');
        } else {
            $data = array(
                "nama_barang" => $_POST['nama_barang'],
                "jumlah_barang" => $_POST['jumlah_barang'],
                "tanggal_masuk" => $_POST['tanggal_masuk'],
                "harga_barang" => $_POST['harga_barang'],
            );
            $this->db->where('kode_barang', $_POST['kode_barang']);
            $this->db->update('barang_masuk', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat! Data berhasil di ubah.</div>');
            redirect('transaksi');
        }
    }

    public function hapus($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Maaf! Data gagal di hapus.</div>');
            redirect('transaksi');
        } else {
            $this->db->where('kode_barang', $id);
            $this->db->delete('barang_masuk');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat! Data berhasil di hapus.</div>');
            redirect('transaksi');
        }
    }
}
