<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products_model extends CI_Model
{

    public $table = 'products';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {   $this->db->select('products.id,products.name,products.stock,products.deskripsi,categories.name as kategori');
        $this->db->join('categories', 'products.category_id = categories.id', 'left');
        // $this->db-order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    function dd_kategori()
    {
        // ambil data dari db
        // $this->db->order_by('categories', 'asc');
        $result = $this->db->get('categories');
        // bikin array
        // please select berikut ini merupakan tambahan saja agar saat pertama
        // diload akan ditampilkan text please select.
        // $dd[''] = 'Please Select';
        // if ($result->num_rows() > 0) {
        //     foreach ($result->result() as $row) {
        //     // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
        //         $dd[$row->id] = $row->name;
        //     }
        // }
        return $result;
    }
    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('name', $q);
	$this->db->or_like('stock', $q);
	$this->db->or_like('deskripsi', $q);
	$this->db->or_like('category_id', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('name', $q);
	$this->db->or_like('stock', $q);
	$this->db->or_like('deskripsi', $q);
	$this->db->or_like('category_id', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Products_model.php */
/* Location: ./application/models/Products_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-19 08:45:15 */
/* http://harviacode.com */