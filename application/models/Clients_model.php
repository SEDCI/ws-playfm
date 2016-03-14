<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function create($data)
	{
		return $this->db->insert('clients', $data);
	}

	public function retrieveall($options = '', $fields = '')
	{
		if (!empty($fields)) {
			$this->db->select($fields);
		}

		if (!empty($options)) {
			if (array_key_exists('criteria', $options)) {
				$this->db->where($options['criteria']);
			}

			if (array_key_exists('order', $options)) {
				$this->db->order_by($options['order']);
			}
		}

		$result = $this->db->get('clients');

		return $result->result_array();
	}

	public function retrieve($options = '', $fields = '')
	{
		if (!empty($fields)) {
			$this->db->select($fields);
		}

		if (!empty($options)) {
			if (array_key_exists('criteria', $options)) {
				$this->db->where($options['criteria']);
			}

			if (array_key_exists('order', $options)) {
				$this->db->order_by($options['order']);
			}
		}

		$result = $this->db->get('clients');

		return $result->row_array();
	}

	public function update($criteria, $data)
	{
		return $this->db->update('clients', $data, $criteria);
	}

	public function delete($criteria)
	{
		return $this->db->delete('clients', $criteria);
	}
}