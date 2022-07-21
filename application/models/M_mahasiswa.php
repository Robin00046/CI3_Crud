<?php
class M_mahasiswa extends CI_Model
{
    public function GetAllMhs()
    {
        return $this->db->get('mahasiswa')->result_array();
    }
    public function tambahmahasiswa()
    {
        $data = [
            'nama' => $this->input->post('nama', true),
            'nrp' => $this->input->post('nrp', true),
            'email' => $this->input->post('email', true),
            'jurusan' => $this->input->post('jurusan', true),
        ];
        $this->db->insert('mahasiswa', $data);
    }
    public function hapusmahasiswa($id)
    {
        // $this->db->where('id_mhs', $id);
        $this->db->delete('mahasiswa', ['id_mhs' => $id]);
    }
    public function getmahasiswa($id)
    {
        return $this->db->get_where('mahasiswa', ['id_mhs' => $id])->row_array();
    }
    public function ubahmahasiswa()
    {
        $data = [
            'nama' => $this->input->post('nama', true),
            'nrp' => $this->input->post('nrp', true),
            'email' => $this->input->post('email', true),
            'jurusan' => $this->input->post('jurusan', true),
        ];
        $this->db->where('id_mhs', $this->input->post('id_mhs'));
        $this->db->update('mahasiswa', $data);
    }
    public function carimahasiswa()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('jurusan', $keyword);
        $this->db->or_like('nrp', $keyword);
        $this->db->or_like('email', $keyword);
        return $this->db->get('mahasiswa')->result_array();
    }
}
