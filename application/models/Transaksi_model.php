<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select('transaksi.created, transaksi.jumlah as volume, transaksi.nama as nama_pengambil, transaksi.transaksi_id as id_transaksi,  users.*, barang.*, satuan.name as satuan_nama, jenis_barang.name as jenis_barang');
        $this->db->from('transaksi');
        $this->db->join('barang', 'barang.barang_id = transaksi.barang_id', 'inner');
        $this->db->join('users', 'users.user_id = transaksi.user_id', 'inner');
        $this->db->join('satuan', 'satuan.satuan_id = transaksi.satuan_id', 'inner');
        $this->db->join('jenis_barang', 'jenis_barang.jenis_barang_id = transaksi.jenis_barang_id', 'inner');
        if ($id != null) {

            $this->db->Where('transaksi.user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getDataWithDate($date1, $date2)
    {
        $this->db->select('transaksi.created, transaksi.jumlah as volume, transaksi.nama as nama_pengambil, transaksi.transaksi_id as id_transaksi,  users.*, barang.*, satuan.name as satuan_nama, jenis_barang.name as jenis_barang');
        $this->db->from('transaksi');
        $this->db->join('barang', 'barang.barang_id = transaksi.barang_id', 'inner');
        $this->db->join('users', 'users.user_id = transaksi.user_id', 'inner');
        $this->db->join('satuan', 'satuan.satuan_id = transaksi.satuan_id', 'inner');
        $this->db->join('jenis_barang', 'jenis_barang.jenis_barang_id = transaksi.jenis_barang_id', 'inner');
        $this->db->where('transaksi.created >=', $date1);
        $this->db->where('transaksi.created <=', $date2);
        $query = $this->db->get();
        return $query;
    }

    public function getDataSearchBarang($barang)
    {
        $this->db->select('transaksi.created, transaksi.jumlah as volume, transaksi.nama as nama_pengambil, transaksi.transaksi_id as id_transaksi,  users.*, barang.*, satuan.name as satuan_nama, jenis_barang.name as jenis_barang');
        $this->db->from('transaksi');
        $this->db->join('barang', 'barang.barang_id = transaksi.barang_id', 'inner');
        $this->db->join('users', 'users.user_id = transaksi.user_id', 'inner');
        $this->db->join('satuan', 'satuan.satuan_id = transaksi.satuan_id', 'inner');
        $this->db->join('jenis_barang', 'jenis_barang.jenis_barang_id = transaksi.jenis_barang_id', 'inner');
        $this->db->or_like('barang.nama_barang', $barang);
        $query = $this->db->get();
        return $query;
    }

    public function getDataSearchDivisi($divisi)
    {
        $this->db->select('transaksi.created, transaksi.jumlah as volume, transaksi.nama as nama_pengambil, transaksi.transaksi_id as id_transaksi,  users.*, barang.*, satuan.name as satuan_nama, jenis_barang.name as jenis_barang');
        $this->db->from('transaksi');
        $this->db->join('barang', 'barang.barang_id = transaksi.barang_id', 'inner');
        $this->db->join('users', 'users.user_id = transaksi.user_id', 'inner');
        $this->db->join('satuan', 'satuan.satuan_id = transaksi.satuan_id', 'inner');
        $this->db->join('jenis_barang', 'jenis_barang.jenis_barang_id = transaksi.jenis_barang_id', 'inner');
        $this->db->or_like('users.divisi', $divisi);
        $query = $this->db->get();
        return $query;
    }

    public function getEdit($id = null)
    {

        $this->db->select('transaksi.created as transaksi_created, transaksi.jumlah as volume, transaksi.nama as nama_pengambil, transaksi.transaksi_id as id_transaksi,  users.*, barang.*, satuan.name as satuan_nama, jenis_barang.name as jenis_barang');
        $this->db->from('transaksi');
        $this->db->join('barang', 'barang.barang_id = transaksi.barang_id');
        $this->db->join('users', 'users.user_id = transaksi.user_id');
        $this->db->join('satuan', 'satuan.satuan_id = transaksi.satuan_id');
        $this->db->join('jenis_barang', 'jenis_barang.jenis_barang_id = transaksi.jenis_barang_id');


        if ($id != null) {

            $this->db->Where('transaksi_id', $id);
        }

        $query = $this->db->get();
        return $query;
    }
    public function getData($id = null)
    {
        $this->db->select('barang.*, jenis_barang.name as jenis_barang_name, satuan.name as satuan_name');
        $this->db->from('barang');
        $this->db->join('jenis_barang', 'jenis_barang.jenis_barang_id = barang.jenis_barang_id');
        $this->db->join('satuan', 'satuan.satuan_id = barang.satuan_id');

        if ($id != null) {

            $this->db->Where('barang_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function getDataPerTanggalPegawai()
    {
        $date = date('Y-m-d');
        // $query = $this->db->get_where('transaksi', ['created' => $date]);
        $user_id = $this->fungsi->user_login()->user_id;
        $this->db->select('*');
        $this->db->where('created', $date);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('transaksi');

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function getDataPerTanggalAdmin()
    {
        $date = date('Y-m-d');
        // $query = $this->db->get_where('transaksi', ['created' => $date]);
        $this->db->select('*');
        $this->db->where('created', $date);
        $query = $this->db->get('transaksi');

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function tambah($post)
    {
        $params = [
            'nama' => $post['nama'],
            'nama_barang' => $post['nama_barang'],
            'jumlah' => $post['jumlah'],
            'user_id' => $post['user_id'],
            'jenis_barang_id' => $post['jenis_barang'],
            'satuan_id' => $post['satuan'],
            'created' => $post['created']



        ];
        $this->db->insert('transaksi', $params);
    }
    public function edit($post)
    {
        $params = [
            'nama' => $post['nama'],
            'jumlah' => $post['jumlah'],
            'user_id' => $post['user_id'],
            'jenis_barang_id' => $post['jenis_barang'],
            'satuan_id' => $post['satuan'],

            'created' => $post['created']

        ];
        $this->db->where('transaksi_id', $post['id']);
        $this->db->update('transaksi', $params);
    }
    public function hapus($id)
    {
        $this->db->where('transaksi_id', $id);
        $this->db->delete('transaksi');
    }
    public function getDataBarang($idjenisbarang)
    {
        return $this->db->get_where('barang', ['jenis_barang_id' => $idjenisbarang])->result();
    }

    public function totalTransaksiPegawai()
    {
        $user_id = $this->fungsi->user_login()->user_id;

        $query = $this->db->get_where('transaksi', ['user_id' => $user_id]);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function totalTransaksiAdmin()
    {
        $user_id = $this->fungsi->user_login()->user_id;

        $query = $this->db->get('transaksi');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    // range tanggal
    public function getDataTanggal($awal, $akhir, $id = null)
    {
        $this->db->select('transaksi.created as transaksi_created, transaksi.jumlah as volume, transaksi.nama as nama_pengambil, transaksi.transaksi_id as id_transaksi,  users.*, barang.*, satuan.name as satuan_nama, jenis_barang.name as jenis_barang');
        $this->db->from('transaksi');
        $this->db->join('barang', 'barang.barang_id = transaksi.barang_id');
        $this->db->join('users', 'users.user_id = transaksi.user_id');
        $this->db->join('satuan', 'satuan.satuan_id = transaksi.satuan_id');
        $this->db->join('jenis_barang', 'jenis_barang.jenis_barang_id = transaksi.jenis_barang_id');
        $this->db->where('transaksi.created >=', $awal);
        $this->db->where('transaksi.created <=', $akhir);
        if ($id != null) {

            $this->db->Where('transaksi.user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    /*public function getDataNamaBarang($id = null)
    {
        $this->db->select('transaksi.created as transaksi_created, transaksi.jumlah as volume, transaksi.nama as nama_pengambil, transaksi.transaksi_id as id_transaksi,  users.*, barang.*, satuan.name as satuan_nama, jenis_barang.name as jenis_barang');
        $this->db->from('transaksi');
        $this->db->join('barang', 'barang.barang_id = transaksi.barang_id');
        $this->db->join('users', 'users.user_id = transaksi.user_id');
        $this->db->join('satuan', 'satuan.satuan_id = transaksi.satuan_id');
        $this->db->join('jenis_barang', 'jenis_barang.jenis_barang_id = transaksi.jenis_barang_id');
        if ($id != null) {

            $this->db->Where('transaksi.user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function getDataDivisi($id = null)
    {
        $this->db->select('transaksi.created as transaksi_created, transaksi.jumlah as volume, transaksi.nama as nama_pengambil, transaksi.transaksi_id as id_transaksi,  users.*, barang.*, satuan.name as satuan_nama, jenis_barang.name as jenis_barang');
        $this->db->from('transaksi');
        $this->db->join('barang', 'barang.barang_id = transaksi.barang_id');
        $this->db->join('users', 'users.user_id = transaksi.user_id');
        $this->db->join('satuan', 'satuan.satuan_id = transaksi.satuan_id');
        $this->db->join('jenis_barang', 'jenis_barang.jenis_barang_id = transaksi.jenis_barang_id');
        if ($id != null) {

            $this->db->Where('transaksi.user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }*/
    public function view()
    {
        return $this->db->get('transaksi')->result();
    }
    public function save_batch($data)
    {
        return $this->db->insert_batch('transaksi', $data);
    }

    function fetch_data($q)
    {
        $this->db->select('*');
        $this->db->from('satuan');
        $this->db->join('barang', 'barang.satuan_id = satuan.satuan_id', 'inner');
        $this->db->join('jenis_barang', 'jenis_barang.jenis_barang_id = barang.jenis_barang_id');
        $this->db->or_like('jenis_barang.name', $q);
        $this->db->or_like('barang.nama_barang', $q);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $output[] = array(
                    'id' => $row['barang_id'],
                    'name'  => $row["nama_barang"],
                    'image' => $row["gambar"],
                    'jenis_barang_id' => $row["jenis_barang_id"],
                    'satuan_id' => $row["satuan_id"],
                    'satuan' => $row["name"],
                    'jenis_barang' => $this->db->select('name')->where('jenis_barang_id', $row["jenis_barang_id"])->get('jenis_barang')->first_row()->name,
                    'search' => $this->getSuggestion($q)
                );
            }
            echo json_encode($output);
        }
    }

    private function getSuggestion($q)
    {
        $getBarang = $this->db->or_like('barang.nama_barang', $q)->get('barang');
        if ($getBarang->num_rows() > 0) {
            $result = $getBarang->row()->nama_barang;
        } else {
            $getJenisBarang = $this->db->or_like('jenis_barang.name', $q)->get('jenis_barang');
            if ($getJenisBarang->num_rows() > 0) {
                $result = $getJenisBarang->row()->name;
            } else {
                $result = NULL;
            }
        }
        return $result;
    }

    function fetch_jenis($q)
    {
        $this->db->select('*');
        $this->db->from('satuan');
        $this->db->join('barang', 'barang.satuan_id = satuan.satuan_id', 'inner');
        $this->db->join('jenis_barang', 'jenis_barang.jenis_barang_id = barang.jenis_barang_id');
        $this->db->or_like('jenis_barang.name', $q);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $output[] = array(
                    'id' => $row['barang_id'],
                    'name'  => $row["nama_barang"],
                    'image' => $row["gambar"],
                    'jenis_barang_id' => $row["jenis_barang_id"],
                    'satuan_id' => $row["satuan_id"],
                    'satuan' => $row["name"],
                    'jenis_barang' => $this->db->select('name')->where('jenis_barang_id', $row["jenis_barang_id"])->get('jenis_barang')->first_row()->name
                );
            }
            echo json_encode($output);
        }
    }

    public function insertBatch($data)
    {
        return $this->db->insert_batch('transaksi', $data);
    }
}
