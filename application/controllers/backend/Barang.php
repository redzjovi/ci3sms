<?php
class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_Model');
    }

    public function create()
    {
        $this->login_library->is_guest(true);

        $this->form_validation->set_rules('nama_barang', lang('product_name'), 'required|max_length[100]');
        $this->form_validation->set_rules('ukuran', lang('size'), 'required|max_length[11]|numeric');
        $this->form_validation->set_rules('harga', lang('price'), 'required|max_length[11]|numeric');
        $this->form_validation->set_rules('stok', lang('stock'), 'required|max_length[11]|numeric');

        if ($this->form_validation->run() === true) {
            $data = $this->input->post();
            $this->Barang_Model->create($data);
            $this->session->set_flashdata('message_success', lang('data_create_success'));
            redirect('backend/barang');
        }

        $this->load->view('backend/barang/create');
    }

    public function delete($id = NULL)
    {
        if ($id) {
            $this->Barang_Model->delete($id);
            $this->session->set_flashdata('message_success', lang('data_delete_success'));
        }
        redirect('backend/barang');
    }

    public function find_by_pk()
    {
        if ($this->input->is_ajax_request()) {
            $data = $this->db
                ->from($this->Barang_Model->table)
                ->where('id_barang', $this->input->get('id'))
                ->get()->row_array();

            echo json_encode($data);
        }
    }

    public function index()
    {
        $this->login_library->is_guest(true);

        $params['barang'] = $this->db->get($this->Barang_Model->table);
        $this->load->view('backend/barang/index', $params);
    }

    public function update($id = NULL)
    {
        $this->login_library->is_guest(true);

        $id = $this->input->post('id_barang') ? $this->input->post('id_barang') : $id;

        $this->form_validation->set_rules('nama_barang', lang('product_name'), 'required|max_length[100]');
        $this->form_validation->set_rules('ukuran', lang('size'), 'required|max_length[11]|numeric');
        $this->form_validation->set_rules('harga', lang('price'), 'required|max_length[11]|numeric');
        $this->form_validation->set_rules('stok', lang('stock'), 'required|max_length[11]|numeric');

        if ($this->form_validation->run() === true) {
            $data = $this->input->post();
            $this->Barang_Model->update($id, $data);
            $this->session->set_flashdata('message_success', lang('data_update_success'));
            redirect('backend/barang');
        }

        $barang = $this->db->from($this->Barang_Model->table)->where('id_barang', $id)->get()->row();
        if ($barang) {
            $params['barang'] = $barang;
            $this->load->view('backend/barang/update', $params);
        } else {
            $this->session->set_flashdata('message_danger', lang('data_not_exist'));
            redirect('backend/barang');
        }
    }
}
