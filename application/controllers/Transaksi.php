<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    function __construct()

    {
        parent::__construct();
        $this->load->model('transaksi_model');
        $this->load->model('barang_model');
        $this->load->model('user_model');
        $this->load->model('jenis_barang_model');
        $this->load->model('satuan_model');
        $this->load->library('cart');
        check_not_login();
    }


    public function index()
    {
        $nilaifilter = $this->input->post('nilaifilter', TRUE);
        $tanggalawal = $this->input->post('tanggalawal', TRUE);
        $tanggalakhir = $this->input->post('tanggalakhir', TRUE);
        $nama_barang = $this->input->post('nama_barang', TRUE);
        $divisi = $this->input->post('divisi', TRUE);
        $filter = $this->filter([$nilaifilter, $tanggalawal, $tanggalakhir, $nama_barang,$divisi]);
        if ($this->fungsi->user_login()->level == 2) {
            $id = $this->fungsi->user_login()->user_id;
            $row = $this->transaksi_model->get($id);
        } else {
            $row = empty($filter) && !isset($_POST['edit']) ? $this->transaksi_model->get() : $filter;
        }
        $data = [
            'row' => $row,
            'title' => 'Halaman Transaksi',
            'satuan' => $this->db->get('satuan')->result()
        ];
        $this->template->load('template', 'transaksi/transaksi_data', $data);
    }

    private function filter($post = [])
    {
        $nilai = $post[0];
        $tanggalawal = $post[1];
        $tanggalakhir = $post[2];
        $barang = $post[3];
        $divisi = $post[4];
        if ($nilai == 1) {
            $query = $this->transaksi_model->getDataWithDate($tanggalawal, $tanggalakhir);
        } else if ($nilai == 2) {
            $query = $this->transaksi_model->getDataSearchBarang($barang);
        } else if ($nilai == 3) {
            $query = $this->transaksi_model->getDataSearchDivisi($divisi);
        } else {
            $query =  $this->transaksi_model->get();
        }
        return $query;
    }


    function fetch()
    {
        echo $this->transaksi_model->fetch_data($this->uri->segment(3));
    }

    function fetch_jenis()
    {
        echo $this->transaksi_model->fetch_jenis($this->uri->segment(3));
    }

    public function tambah()
    {
        $transaksi = new stdClass();
        $transaksi->id_transaksi = null;
        $transaksi->nama_pengambil = null;
        $transaksi->volume = null;
        $transaksi->user_id = null;
        $transaksi->barang_id = null;
        $transaksi->jenis_barang_id = null;
        $transaksi->satuan_id = null;
        $transaksi->transaksi_created = null;
        $barang = $this->barang_model->get();
        $query_user = $this->user_model->getUser();
        $query_jenis_barang = $this->jenis_barang_model->get();
        $query_satuan = $this->satuan_model->get();

        $data = [
            'page' => 'tambah',
            'row' => $transaksi,
            'barang' =>  $barang,
            'user' => $query_user,
            'satuan' =>  $query_user,
            'title' => 'Tambah Data',
            'jenis_barang' =>  $query_jenis_barang,
            'satuan' =>  $query_satuan,
        ];

        $this->template->load('template', 'transaksi/transaksi_form', $data);
    }

    public function add_barang($id, $qty)
    {
        $getBarang = $this->barang_model->get($id);
        if ($getBarang->num_rows() > 0) {
            $row = $getBarang->row();
            $data = array(
                'id'        => $row->barang_id,
                'name'      => $row->nama_barang,
                'qty'       => $qty,
                'price'     => 0,
                'jenis' => $row->jenis_barang_name,
                'satuan' => $row->satuan_name,
                'id_jenis' => $row->jenis_barang_id,
                'id_satuan' => $row->satuan_id
            );
            $this->cart->insert($data);
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            echo "barang tidak tersedia";
        }
    }

    public function process()
    {
        $post = $this->input->post(NULL, TRUE);
        if (isset($_POST['tambah'])) {
            $this->transaksi_model->tambah($post);
        } else if (isset($_POST['edit'])) {
            $this->transaksi_model->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil ditambah');
        }
        redirect('transaksi');
    }

    public function simpan_transaksi()
    {
        foreach ($this->cart->contents() as $items) {
            $output[] = [
                'nama' => $this->fungsi->user_login()->name,
                'nama_barang' => $items['name'],
                'barang_id' => $items['id'],
                'jumlah' => $items['qty'],
                'user_id' => $this->session->userdata('userid'),
                'jenis_barang_id' => $items['id_jenis'],
                'satuan_id' => $items['id_satuan'],
                'created' => date('Y-m-d')
            ];
        }
        $this->transaksi_model->insertBatch($output);
        $this->cart->destroy();
        if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('success', 'Data Transaksi Berhasil Ditambah!');
        }
        redirect('transaksi');
    }

    public function ubah_qty()
    {
        $data = array(
            'rowid' => $this->input->post('rowid'),
            'qty'   => $this->input->post('qty')
        );
        $this->cart->update($data);
        redirect($_SERVER['HTTP_REFERER']);
    }

    function cancel()
    {
        $this->cart->destroy();
        redirect($_SERVER['HTTP_REFERER']);
    }


    public function getDataBarang()
    {
        $idjenisbarang = $this->input->post('id');
        $data = $this->transaksi_model->getDataBarang($idjenisbarang);
        $output = '<option value="">--Pilih--</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->barang_id . '">' . $row->nama_barang . ' </option>';
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }



    public function getDataAutoComplete()
    {
        $autocomplete = $this->input->get('term');
        if ($autocomplete) {
            $getDataAutoComplete = $this->barang_model->getDataAutoComplete($autocomplete);
            foreach ($getDataAutoComplete as $row) {
                $results[] = array(
                    'label' => $row['nama_barang']
                );

                $this->output->set_content_type('application/json')->set_output(json_encode($results));
            }
        }
    }

    public function delete_cart($row = NULL)
    {
        $data = array(
            'rowid' => $row,
            'qty'   => 0,
        );
        $this->cart->update($data);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function edit($id)
    {
        $query = $this->transaksi_model->getEdit($id);
        if ($query->num_rows() > 0) {
            $barang = $this->barang_model->get();
            $transaksi = $query->row();
            $query_jenis_barang = $this->jenis_barang_model->get();
            $query_satuan = $this->satuan_model->get();
            $query_user = $this->user_model->getUser();
            $data = [
                'page' => 'edit',
                'row' => $transaksi,
                'barang' =>  $barang,
                'user' => $query_user,
                'satuan' =>  $query_user,
                'title' => 'Tambah Data',
                'jenis_barang' =>  $query_jenis_barang,
                'satuan' =>  $query_satuan,
            ];
            $this->template->load('template', 'transaksi/transaksi_form_edit', $data);
        } else {
            echo "<script>alert('data tidak ditemukan');";
            echo "window.location='" . site_url('transaksi') . "'; 
        </script>";
        }
    }
    public function hapus($id)
    {
        $this->transaksi_model->hapus($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'data berhasil dihapus');
        }
        redirect('transaksi');
    }
}
