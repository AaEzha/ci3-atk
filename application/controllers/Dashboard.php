<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('transaksi_model');
    }
    public function index()
    {
        $params = array(
            'nama_page' => 'dashboard'

        );
        $this->session->set_userdata($params);
        $data['row'] = $this->transaksi_model->get();
        if ($this->fungsi->user_login()->level == 2) {
            $data['total'] = $this->transaksi_model->totalTransaksiPegawai();
        } else {
            $data['total'] = $this->transaksi_model->totalTransaksiAdmin();
        }
        if ($this->fungsi->user_login()->level == 2) {

            $data['rows'] = $this->transaksi_model->getDataPerTanggalPegawai();
        } else {
            $data['rows'] = $this->transaksi_model->getDataPerTanggalAdmin();
        }

		// divisi
		$sql = "select divisi, count(user_id) jumlah from users where divisi is not null group by divisi order by divisi asc";
		$res = $this->db->query($sql);
		$divisi_name = "";
		$divisi_jumlah = "";
		foreach ($res->result() as $r) {
			$divisi_name .= "'".$r->divisi ."', ";
			$divisi_jumlah .= $r->jumlah .", ";
		}
		$data['div_name'] = rtrim($divisi_name, ", ");
		$data['div_jum'] = rtrim($divisi_jumlah, ", ");
		// end of divisi

		// barang
		$sql = "Select DATE_FORMAT(created,'%Y-%m') periode, sum(jumlah) jumlah from transaksi group by DATE_FORMAT(created,'%Y-%m') order by created asc";
		$res = $this->db->query($sql);
		$barang_periode = "";
		$barang_jumlah = "";
		foreach ($res->result() as $r) {
			$barang_periode .= "'".$r->periode ."', ";
			$barang_jumlah .= $r->jumlah .", ";
		}
		$data['bar_periode'] = rtrim($barang_periode, ", ");
		$data['bar_jum'] = rtrim($barang_jumlah, ", ");
		// end of barang

		$data['js'] = 'dashboard/js';
        $data['title'] = "Halaman Dashboard";

		// tipe diagram untuk divisi
		// kalau chart doughnut, paling baik minimal di angka 60 sampai 100
		// kalau pie, beri nilai 0
		$data['ukuran'] = 0; 


        $this->template->load('template', 'dashboard', $data);
    }
    
}
