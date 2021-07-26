<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class import extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('barang_model');
    }

	public function index()
	{
        $data['title'] = 'import';
		$this->load->view('import', $data);
	}

    public function uploaddata()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['file_name'] = 'doc' . time();
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('importexcel')) {
            $file = $this->upload->data();
            $reader = ReaderEntityFactory::createXLSXReader();

            $reader->open('uploads/' . $file['file_name']);
            foreach($reader->getSheetIterator()as $sheet){
                $numRow = 1;
                foreach($sheet->getRowIterator() as $row){
                    if($numRow > 1) {
                        $databarang = array(
                            'jenis_barang_name' => $row->getCellAtIndex(1),
                            'barang_id' => $row->getCellAtIndex(2),
                            'nama_barang' => $row->getCellAtIndex(3),
                            'satuan_name' => $row->getCellAtIndex(4),
                        );
                        $this->barang_model->import_data($databarang);
                    }
                $numRow++;
                }
            }
        } else {
            echo "Error :". $this->upload->display_errors();
        };
    }
}
