<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Kontak extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get() {
        $id = $this->get('nik');
        if ($id == '') {
            $kontak = $this->db->get('tb_ktp')->result();
        } else {
            $this->db->where('nik', $id);
            $kontak = $this->db->get('tb_ktp')->result();
        }
        $this->response($kontak, 200);
    }

    //Mengirim atau Menambah data Kontak
    function index_post() {
        $data = array(
                    'nik'               => $this->post('nik'),
                    'nama'              => $this->post('nama'),
                    'tempatLahir'       => $this->post('tempatLahir'),
                    'tanggalLahir'      => $this->post('tanggalLahir'),
                    'jenisKelamin'      => $this->post('jenisKelamin'),
                    'golDarah'          => $this->post('golDarah'),
                    'alamat'            => $this->post('alamat'),
                    'kodeRt'            => $this->post('kodeRt'),
                    'kodeRw'            => $this->post('kodeRw'),
                    'kelurahan'         => $this->post('kelurahan'),
                    'kecamatan'         => $this->post('kecamatan'),
                    'agama'             => $this->post('agama'),
                    'statusPerkawinan'  => $this->post('statusPerkawinan'),
                    'pekerjaan'         => $this->post('pekerjaan'),
                    'kewarganegaraan'   => $this->post('kewarganegaraan'),
                    'berlakuHingga'     => $this->post('berlakuHingga'),
                    'gambar_ktp'        => $this->post('gambar_ktp'));
        $insert = $this->db->insert('tb_ktp', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Memperbaharui data yang sudah ada
    function index_put() {
        $id = $this->put('id');
        $data = array(
                    'nik'               => $this->post('nik'),
                    'nama'              => $this->post('nama'),
                    'tempatLahir'       => $this->post('tempatLahir'),
                    'tanggalLahir'      => $this->post('tanggalLahir'),
                    'jenisKelamin'      => $this->post('jenisKelamin'),
                    'golDarah'          => $this->post('golDarah'),
                    'alamat'            => $this->post('alamat'),
                    'kodeRt'            => $this->post('kodeRt'),
                    'kodeRw'            => $this->post('kodeRw'),
                    'kelurahan'         => $this->post('kelurahan'),
                    'kecamatan'         => $this->post('kecamatan'),
                    'agama'             => $this->post('agama'),
                    'statusPerkawinan'  => $this->post('statusPerkawinan'),
                    'pekerjaan'         => $this->post('pekerjaan'),
                    'kewarganegaraan'   => $this->post('kewarganegaraan'),
                    'berlakuHingga'     => $this->post('berlakuHingga'),
                    'gambar_ktp'        => $this->post('gambar_ktp'));
        $this->db->where('nik', $id);
        $update = $this->db->update('tb_ktp', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Menghapus data yang sudah ada
    function index_delete() {
        $id = $this->delete('nik');
        $this->db->where('nik', $id);
        $delete = $this->db->delete('tb_ktp');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Masukan function selanjutnya disini
}
?>