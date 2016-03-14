<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stationinfo extends MY_Controller {

	/**
	 * Station Info Management for the website
	 *
	 * Maps to the following URL
	 * 		http://995play.fm/index.php/admin/stationinfo
	 *	- or -
	 * 		http://995play.fm/admin/stationinfo
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('loadview');
		$this->load->library('form_validation');
		$this->load->model('stationinfo_model');
	}

	public function index()
	{
		$data['title'] = 'Station Info';
		$data['alert'] = $this->session->flashdata('alert');

		$profile_options = array(
			'criteria' => array(
				'classification' => 'P',
				'status !=' => 'R'
			)
		);

		$contact_options = array(
			'criteria' => array(
				'classification' => 'C',
				'status !=' => 'R'
			)
		);

		$data['profileinfo'] = $this->stationinfo_model->retrieveall($profile_options);
		$data['contactinfo'] = $this->stationinfo_model->retrieveall($contact_options);

		load_view_admin('stationinfo/list', $data);
	}

	public function add()
	{
		if ($this->input->post()) {
			$this->form_validation->set_rules('stationinfodesc', 'Description', 'trim|max_length[300]');

			if ($this->form_validation->run() === true) {
				if ($_FILES['stationinfofile']['name'] != '' && $_FILES['stationinfofile']['size'] > 0) {
					$config['upload_path'] = './images/profile/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['file_ext_tolower'] = true;
					$config['encrypt_name'] = true;

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('stationinfofile')) {
						$filename = $this->upload->data('file_name');
						$config['image_library'] = 'gd2';
						$config['source_image'] = './images/profile/'.$filename;
						$config['new_image'] = './images/profile/thumb/'.$filename;
						$config['width'] = 100;

						$this->load->library('image_lib', $config);
						$this->image_lib->resize();

						$stationinfo_data = array(
							'classification' => $this->input->post('stationinfoclass'),
							'filename' => $filename,
							'description' => $this->input->post('stationinfodesc'),
							'status' => 'A',
							'date_added' => date('Y-m-d H:i:s'),
							'added_by' => $this->session->userdata('adminuser')
						);

						$this->stationinfo_model->create($stationinfo_data);

						$this->session->set_flashdata('alert', '<div class="alert alert-success">A station info has been successfully added.</div>');

						redirect('admin/stationinfo');
					} else {
						$data['alert'] = '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>';
					}
				}
			} else {
				$data['alert'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			}
		}

		$data['title'] = 'Add Station Info';

		load_view_admin('stationinfo/add', $data);
	}

	public function edit($id)
	{
		$query_options = array(
			'criteria' => array(
				'id' => $id
			)
		);

		$data['stationinfo'] = $this->stationinfo_model->retrieve($query_options);

		if ($this->input->post()) {
			$this->form_validation->set_rules('stationinfodesc', 'Description', 'trim|max_length[300]');

			if ($this->form_validation->run() === true) {
				if ($_FILES['stationinfofile']['name'] != '' && $_FILES['stationinfofile']['size'] > 0) {
					$config['upload_path'] = './images/profile/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['file_ext_tolower'] = true;
					$config['encrypt_name'] = true;

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('stationinfofile')) {
						unlink($config['upload_path'].$data['stationinfo']['filename']);
						unlink($config['upload_path'].'thumb/'.$data['stationinfo']['filename']);

						$filename = $this->upload->data('file_name');
						$config['image_library'] = 'gd2';
						$config['source_image'] = './images/profile/'.$filename;
						$config['new_image'] = './images/profile/thumb/'.$filename;
						$config['width'] = 100;

						$this->load->library('image_lib', $config);
						$this->image_lib->resize();
					} else {
						$data['alert'] = '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>';
					}
				}

				if (empty($data['alert'])) {
					$stationinfo_data = array(
						'classification' => $this->input->post('stationinfoclass'),
						'description' => $this->input->post('stationinfodesc'),
						'status' => ($this->input->post('stationinfostat')) ? 'A' : 'I',
						'date_updated' => date('Y-m-d H:i:s'),
						'updated_by' => $this->session->userdata('adminuser')
					);

					if ($filename != '') {
						$stationinfo_data['filename'] = $filename;
					}

					$this->stationinfo_model->update(array('id' => $id), $stationinfo_data);

					$this->session->set_flashdata('alert', '<div class="alert alert-success">A station info has been successfully updated.</div>');

					redirect('admin/stationinfo');
				}
			} else {
				$data['alert'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			}
		}

		$data['title'] = 'Edit Station Info';
		$data['id'] = $id;

		load_view_admin('stationinfo/edit', $data);
	}

	public function delete($id)
	{
		if (!empty($id)) {
			$criteria = array('id' => $id);
			//$this->stationinfo_model->delete($criteria);
			$data = array(
				'status' => 'R',
				'date_updated' => date('Y-m-d H:i:s')
			);
			$this->stationinfo_model->update($criteria, $data);

			$this->session->set_flashdata('alert', '<div class="alert alert-success">A station info has been successfully deleted.</div>');

			redirect('admin/stationinfo');
		}
	}
}
