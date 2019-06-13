<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        //baru
        $this->load->model("barangmasuk_model");
        $this->load->library('form_validation');
    }

    public function index($id = null)
    {
        $data['title'] = 'Barang Masuk';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        //$this->load->model('Menu_model', 'menu');

        //$data['subMenu'] = $this->menu->getSubMenu();
        //$data['menu'] = $this->db->get('user_menu')->result_array();

        $data['barang_masuk'] = $this->db->get('barang_masuk')->result_array();
        $data['barang_masuk_edit'] = $this->db->get_where('barang_masuk', ["kode_barang" => $id])->row();

        /*
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');
        */

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('transaksi/barang_masuk/list', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            New sub menu added!</div>');
            redirect('menu/submenu');
        }
    }

    public function add()
    {
        $data['title'] = 'Transaksi';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        /*
        $barang_masuk = $this->barangmasuk_model;
        $validation = $this->form_validation;
        $validation->set_rules($barang_masuk->rules());
        */

        //$data['barang_masuk'] = $this->db->get('barang_masuk')->result_array();

        $data = [
            'kode_barang' => $this->input->post('kode_barang'),
            'nama_barang' => $this->input->post('nama_barang'),
            'jumlah_barang' => $this->input->post('jumlah_barang'),
            'tanggal_masuk' => $this->input->post('tanggal_masuk'),
            'harga_barang' => $this->input->post('harga_barang')
        ];

        $this->db->insert('barang_masuk', $data);

        redirect('transaksi');

        /*
        if ($validation->run()) {
            $barang_masuk->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        */

        /*
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/barang_masuk/list', $data);
        $this->load->view('templates/footer');
        */
    }

    public function edit($id = null)
    {
        $data['title'] = 'Transaksi';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        /*
        $data = [
            'nama_barang' => $this->input->post('nama_barang'),
            'jumlah_barang' => $this->input->post('jumlah_barang'),
            'tanggal_masuk' => $this->input->post('tanggal_masuk'),
            'harga_barang' => $this->input->post('harga_barang')
        ];

        //'kode_barang' => $this->input->post('kode_barang')
        $data['barang_masuk'] = $this->db->update('barang_masuk', $data, array('kode_barang' => $id));
        */

        if (!isset($id)) redirect('transaksi');

        //$data['barang_masuk'] = $this->db->get_where('barang_masuk', array("kode_barang" => $id))->row_array();

        // $this->db->update($this->_table, $this, array('kode_barang' => $post['kode_barang'])); 

        /*
        $barangmasuk = $this->barangmasuk_model;
        $validation = $this->form_validation;
        $validation->set_rules($barangmasuk->rules());

        if ($validation->run()) {
            $barangmasuk->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["barang_masuk"] = $barangmasuk->getById($id);
        if (!$data["barang_masuk"]) show_404();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("transaksi/barang_masuk/list", $data);
        $this->load->view('templates/footer');
        */
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        $this->db->delete('barang_masuk', array("kode_barang" => $id));
        redirect('transaksi');

        /*
        if ($this->barangmasuk_model->delete($id)) {
            redirect('transaksi');
        }
        */
    }
}
