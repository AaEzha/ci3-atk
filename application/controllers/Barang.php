<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('barang_model');
        $this->load->model('jenis_barang_model');
        $this->load->model('satuan_model');
        $this->load->model('transaksi_model');
        $this->load->library('form_validation');


        check_not_login();
        check_admin();
    }


    public function index()
    {
        $data['row']  = $this->barang_model->get();
        $data['title'] = "Halaman barang";

        $this->template->load('template', 'product/barang_data', $data);
    }

    public function tambah()

    {
        $this->form_validation->set_rules('jenis_barang', 'JenisBarang', 'required');
        $this->form_validation->set_rules('barang_id', 'barang_id', 'required');
        $this->form_validation->set_message('required', '%s Masih kosong silahkan diisi');

        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {

            $barang = new stdClass();
            $barang->barang_id = null;


            $barang->nama_barang = null;
            $barang->jenis_barang_id = null;
            $barang->satuan_id = null;
            //$barang->gambar = null;
            $query_jenis_barang = $this->jenis_barang_model->get();
            $query_satuan = $this->satuan_model->get();


            $data = [
                'page' => 'tambah',
                'row' => $barang,
                'jenis_barang' =>  $query_jenis_barang,
                'satuan' =>  $query_satuan,
                'title' => 'Tambah Data',
            ];
            $this->template->load('template', 'product/barang_form', $data);
        } else {
            $post = $this->input->post(NULL, TRUE);
            if (isset($_POST['tambah'])) {
                $this->barang_model->tambah($post);
            }
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil ditambah');
            }
            redirect('barang');
        }
    }

    // public function process()
    // {
    // }

    public function edit($id)
    {
        if (isset($_POST['edit'])) {
            $post = $this->input->post(NULL, TRUE);
            if (isset($_POST['edit'])) {
                $this->barang_model->edit($post);
            }
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil diubah');
            }
            redirect('barang');
        } else {
            $query = $this->barang_model->get($id);
            if ($query->num_rows() > 0) {
                $barang = $query->row();
                $query_jenis_barang = $this->jenis_barang_model->get();
                $query_satuan = $this->satuan_model->get();
                $data = array(
                    'page' => 'edit',
                    'row' => $barang,
                    'jenis_barang' => $query_jenis_barang,
                    'satuan' => $query_satuan,
                    'title' => 'Edit Data',
                );
                $this->template->load('template', 'product/barang_edit', $data);
            } else {
                echo "<script>alert('data tidak ditemukan');";
                echo "window.location='" . site_url('barang') . "'; 
        </script>";
            }
        }
    }
    public function process()
    {
        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'jpg|jpeg|png|jfif';
        $config['max_size'] = 2048;
        $config['file_name'] = 'gambar-' . date('ymd') . '-' . substr(md5(rand()), 0, 10); //$this->barang_id;
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if (isset($_POST['tambah'])) {
            if ($this->barang_model->$post['barang_id']) {
                $this->session->set_flashdata('error,', "id $post[barang_id] sudah dipakai barang lain");
                redirect('barang/tambah');
            } else {
                if (@$_FILES['gambar']['name'] != null) {
                    if ($this->upload->do_upload('gambar')) {
                        $post['gambar'] = $this->upload->data('file_name');
                        $this->barang_model->tambah($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'data berhasil disimpan');
                        }
                        redirect('barang');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('barang/tambah');
                    }
                } else {
                    $post['gambar'] = null;
                    $this->barang_model->tambah($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'data berhasil disimpan');
                    }
                    redirect('barang');
                }
                //$this->barang_model->tambah($post);
            }
        } else if (isset($_POST['edit'])) {
            if ($this->barang_model->$post['id']) {
                $this->session->set_flashdata('error,', "id $post[barang_id] sudah dipakai barang lain");
                redirect('barang/edit/' . $post['id']);
            } else {
                if (@$_FILES['gambar']['name'] != null) {
                    if ($this->upload->do_upload('gambar')) {
                        $post['gambar'] = $this->upload->data('file_name');
                        $this->barang_model->edit($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'data berhasil disimpan');
                        }
                        redirect('barang');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('barang/tambah');
                    }
                } else {
                    $post['gambar'] = null;
                    $this->barang_model->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'data berhasil disimpan');
                    }
                    redirect('barang');
                }
                //$this->barang_model->tambah($post);
            }
            //$this->barang_model->edit($post);
            //}
        }
        //if($this->db->affected_rows() > 0) {
        //$this->session->set_flashdata('success', 'data berhasil disimpan');
        //}
        //redirect('barang');
    }

    public function hapus($id)
    {
        $this->barang_model->hapus($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'data berhasil dihapus');
        }
        redirect('barang');
    }


    function getBarangs()
    {
        $postData = $this->input->post();
        $data = $this->barang_model->getBarangs($postData);
        echo json_encode($data);
    }
}
