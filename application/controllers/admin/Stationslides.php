<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stationslides extends MY_Controller {

	/**
	 * Station Slides Management for the website
	 *
	 * Maps to the following URL
	 * 		http://995play.fm/index.php/admin/stationslides
	 *	- or -
	 * 		http://995play.fm/index.php/admin/stationslides
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('loadview');
		$this->load->library('form_validation');
		$this->load->model('stationslides_model');
	}

	public function index()
	{
		$data['title'] = 'Station Slides';
		$data['alert'] = $this->session->flashdata('alert');

		$query_options = array(
			'criteria' => array(
				'status !=' => 'R'
			)
		);

		$data['stationslides'] = $this->stationslides_model->retrieveall($query_options);

		load_view_admin('stationslides/list', $data);
	}

	public function add()
	{
		if ($this->input->post()) {
			$this->form_validation->set_rules('stationslidedesc', 'Description', 'trim|max_length[300]');

			if ($this->form_validation->run() === true) {
				if ($_FILES['stationslidefile']['name'] != '' && $_FILES['stationslidefile']['size'] > 0) {
					$config['upload_path'] = './images/slider/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['file_ext_tolower'] = true;
					$config['encrypt_name'] = true;

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('stationslidefile')) {
						$filename = $this->upload->data('file_name');
						$config['image_library'] = 'gd2';
						$config['source_image'] = './images/slider/'.$filename;
						$config['new_image'] = './images/slider/thumb/'.$filename;
						$config['width'] = 100;

						$this->load->library('image_lib', $config);
						$this->image_lib->resize();

						$stationslide_data = array(
							'filename' => $filename,
							'description' => $this->input->post('stationslidedesc'),
							'status' => 'A',
							'date_added' => date('Y-m-d H:i:s'),
							'added_by' => $this->session->userdata('adminuser')
						);

						$this->stationslides_model->create($stationslide_data);

						$this->session->set_flashdata('alert', '<div class="alert alert-success">A station slide has been successfully added.</div>');

						redirect('admin/stationslides');
					} else {
						$data['alert'] = '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>';
					}
				}
			} else {
				$data['alert'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			}
		}

		$data['title'] = 'Add Station Slide';

		load_view_admin('stationslides/add', $data);
	}

	public function edit($id)
	{
		$query_options = array(
			'criteria' => array(
				'id' => $id
			)
		);

		$data['stationslide'] = $this->stationslides_model->retrieve($query_options);

		if ($this->input->post()) {
			$this->form_validation->set_rules('stationslidedesc', 'Description', 'trim|max_length[300]');

			if ($this->form_validation->run() === true) {
				if ($_FILES['stationslidefile']['name'] != '' && $_FILES['stationslidefile']['size'] > 0) {
					$config['upload_path'] = './images/slider/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['file_ext_tolower'] = true;
					$config['encrypt_name'] = true;

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('stationslidefile')) {
						unlink($config['upload_path'].$data['stationslide']['filename']);
						unlink($config['upload_path'].'thumb/'.$data['stationslide']['filename']);

						$filename = $this->upload->data('file_name');
						$config['image_library'] = 'gd2';
						$config['source_image'] = './images/slider/'.$filename;
						$config['new_image'] = './images/slider/thumb/'.$filename;
						$config['width'] = 100;

						$this->load->library('image_lib', $config);
						$this->image_lib->resize();
					} else {
						$data['alert'] = '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>';
					}
				}

				if (empty($data['alert'])) {
					$stationslide_data = array(
						'description' => $this->input->post('stationslidedesc'),
						'status' => ($this->input->post('stationslidestat')) ? 'A' : 'I',
						'date_updated' => date('Y-m-d H:i:s'),
						'updated_by' => $this->session->userdata('adminuser')
					);

					if ($filename != '') {
						$stationslide_data['filename'] = $filename;
					}

					$this->stationslides_model->update(array('id' => $id), $stationslide_data);

					$this->session->set_flashdata('alert', '<div class="alert alert-success">A station slide has been successfully updated.</div>');

					redirect('admin/stationslides');
				}
			} else {
				$data['alert'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			}
		}

		$data['title'] = 'Edit Station Slide';
		$data['id'] = $id;

		load_view_admin('stationslides/edit', $data);
	}

	public function delete($id)
	{
		if (!empty($id)) {
			$criteria = array('id' => $id);
			//$this->stationslides_model->delete($criteria);
			$data = array(
				'status' => 'R',
				'date_updated' => date('Y-m-d H:i:s')
			);
			$this->stationslides_model->update($criteria, $data);

			$this->session->set_flashdata('alert', '<div class="alert alert-success">A station slide has been successfully deleted.</div>');

			redirect('admin/stationslides');
		}
	}
}
