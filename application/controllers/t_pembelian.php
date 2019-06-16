<?php
defined('BASEPATH') or exit('No direct script access allowed');

class t_pembelian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Pembelian';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['pembelian'] = $this->db->get('pembelian')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/pembelian/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('kode_barang', 'kode_barang', 'required|trim');
        $this->form_validation->set_rules('nama_barang', 'nama_barang', 'required|trim');
        $this->form_validation->set_rules('jumlah_barang', 'jumlah_barang', 'required|trim');
        $this->form_validation->set_rules('tanggal_pembelian', 'tanggal_pembelian', 'required|trim');
        $this->form_validation->set_rules('harga_barang', 'harga_barang', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Maaf! Data gagal di tambahkan.</div>');
        } else {
            $data = array(
                "kode_barang" => $_POST['kode_barang'],
                "nama_barang" => $_POST['nama_barang'],
                "jumlah_barang" => $_POST['jumlah_barang'],
                "tanggal_pembelian" => $_POST['tanggal_pembelian'],
                "harga_barang" => $_POST['harga_barang'],
            );
            $this->db->insert('pembelian', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat! Data berhasil di tambahkan.</div>');
        }

        redirect('t_pembelian');
    }

    public function edit()
    {
        $this->form_validation->set_rules('nama_barang', 'nama_barang', 'required');
        $this->form_validation->set_rules('jumlah_barang', 'jumlah_barang', 'required');
        $this->form_validation->set_rules('tanggal_pembelian', 'tanggal_pembelian', 'required');
        $this->form_validation->set_rules('harga_barang', 'harga_barang', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Maaf! Data gagal di ubah.</div>');
        } else {
            $data = array(
                "nama_barang" => $_POST['nama_barang'],
                "jumlah_barang" => $_POST['jumlah_barang'],
                "tanggal_pembelian" => $_POST['tanggal_pembelian'],
                "harga_barang" => $_POST['harga_barang'],
            );
            $this->db->where('kode_barang', $_POST['kode_barang']);
            $this->db->update('pembelian', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat! Data berhasil di ubah.</div>');
        }

        redirect('t_pembelian');
    }

    public function hapus($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Maaf! Data gagal di hapus.</div>');
        } else {
            $this->db->where('kode_barang', $id);
            $this->db->delete('pembelian');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat! Data berhasil di hapus.</div>');
        }

        redirect('t_pembelian');
    }
}
