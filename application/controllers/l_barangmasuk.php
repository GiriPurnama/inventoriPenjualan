<?php
class l_barangmasuk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
    }

    public function index()
    {
        $pdf = new FPDF('l', 'mm', 'A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string 
        $pdf->Cell(190, 7, 'LAPORAN BARANG MASUK SYO STORE', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(190, 7, 'DAFTAR BARANG GUDANG', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(35, 6, 'KODE BARANG', 1, 0);
        $pdf->Cell(55, 6, 'NAMA BARANG', 1, 0);
        $pdf->Cell(27, 6, 'JUMLAH', 1, 0);
        $pdf->Cell(38, 6, 'TANGGAL MASUK', 1, 0);
        $pdf->Cell(35, 6, 'HARGA BARANG', 1, 1);
        $pdf->SetFont('Arial', '', 10);

        $mahasiswa = $this->db->get('barang_masuk')->result();
        foreach ($mahasiswa as $row) {
            $pdf->Cell(35, 6, $row->kode_barang, 1, 0);
            $pdf->Cell(55, 6, $row->nama_barang, 1, 0);
            $pdf->Cell(27, 6, $row->jumlah_barang, 1, 0);
            $pdf->Cell(38, 6, $row->tanggal_masuk, 1, 0);
            $pdf->Cell(35, 6, $row->harga_barang, 1, 1);
        }
        $pdf->Output();
    }
}
