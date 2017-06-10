<?php
use Mailgun\Mailgun;

class Reminder extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelanggan_Model');
        $this->load->model('Pembelian_Model');
        $this->load->model('Pengaturan_Model');
    }

    public function index()
    {
        $data = $this->db
            ->select('pelanggan.*')
            ->select('pembelian.*')
            ->from($this->Pembelian_Model->table)
            ->join($this->Pelanggan_Model->table, 'pelanggan.id_pelanggan = pembelian.id_pelanggan')
            ->where('status', '0')
            ->get()->result_array();
        $pengaturan = $this->Pengaturan_Model->find_by_tipe('peringatan_pembayaran');

        $jatuh_tempo = $pengaturan->jatuh_tempo;
        $pesan = $pengaturan->pesan;

        foreach ((array) $data as $row) {
            $tanggal_jatuh_tempo = date('Y-m-d', strtotime($row['tanggal_jatuh_tempo']. ' - '.$jatuh_tempo.' days'));

            if ($row['status'] == '0' && date('Y-m-d') >= $tanggal_jatuh_tempo) {
                $date_diff = date_diff(
                    date_create($row['tanggal_jatuh_tempo']),
                    date_create(date('Y-m-d'))
                )->format('%a');
                $pesan_new = str_replace('{nama}', $row['nama'], $pesan);
                $pesan_new = str_replace('{jumlah_hari}', $date_diff, $pesan_new);
                $pesan_new = str_replace('{tanggal_jatuh_tempo}', $tanggal_jatuh_tempo, $pesan_new);

                $this->email->from('no-reply@email.com', 'Admin');
                $this->email->to($row['email']);
                $this->email->subject('Email reminder');
                $this->email->message($pesan_new);
                $this->email->set_newline("\r\n");
                $this->email->send();
                echo $this->email->print_debugger();
            }
        }
    }
}
