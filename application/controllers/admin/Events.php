<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends MY_Controller {

	/**
	 * Events Management for the website
	 *
	 * Maps to the following URL
	 * 		http://995play.fm/index.php/admin/events
	 *	- or -
	 * 		http://995play.fm/index.php/admin/events
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('loadview');
		$this->load->library('form_validation');
		$this->load->model('events_model');
	}

	public function index()
	{
		$data['title'] = 'Events';
		$data['alert'] = $this->session->flashdata('alert');

		$query_options = array(
			'criteria' => array(
				'status !=' => 'R'
			),
			'order' => 'date_end DESC'
		);

		$data['events'] = $this->events_model->retrieveall($query_options);

		load_view_admin('events/list', $data);
	}

	public function add()
	{
		if ($this->input->post()) {
			$this->form_validation->set_rules('eventdesc', 'Description', 'trim|max_length[300]');

			if ($this->form_validation->run() === true) {
				if ($_FILES['eventfile']['name'] != '' && $_FILES['eventfile']['size'] > 0) {
					$config['upload_path'] = './images/events/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['file_ext_tolower'] = true;
					$config['encrypt_name'] = true;

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('eventfile')) {
						$filename = $this->upload->data('file_name');
						$config['image_library'] = 'gd2';
						$config['source_image'] = './images/events/'.$filename;
						$config['new_image'] = './images/events/thumb/'.$filename;
						$config['width'] = 100;

						$this->load->library('image_lib', $config);
						$this->image_lib->resize();

						$event_data = array(
							'filename' => $filename,
							'description' => $this->input->post('eventdesc'),
							'status' => 'A',
							'date_added' => date('Y-m-d H:i:s'),
							'added_by' => $this->session->userdata('adminuser'),
							'date_end' => $this->input->post('eventend')
						);

						$this->events_model->create($event_data);

						$this->session->set_flashdata('alert', '<div class="alert alert-success">An event has been successfully added.</div>');

						redirect('admin/events');
					} else {
						$data['alert'] = '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>';
					}
				}
			} else {
				$data['alert'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			}
		}

		$data['title'] = 'Add Event';

		load_view_admin('events/add', $data);
	}

	public function edit($id)
	{
		$query_options = array(
			'criteria' => array(
				'id' => $id
			)
		);

		$data['event'] = $this->events_model->retrieve($query_options);

		if ($this->input->post()) {
			$this->form_validation->set_rules('eventdesc', 'Description', 'trim|max_length[300]');

			if ($this->form_validation->run() === true) {
				if ($_FILES['eventfile']['name'] != '' && $_FILES['eventfile']['size'] > 0) {
					$config['upload_path'] = './images/events/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['file_ext_tolower'] = true;
					$config['encrypt_name'] = true;

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('eventfile')) {
						unlink($config['upload_path'].$data['event']['filename']);
						unlink($config['upload_path'].'thumb/'.$data['event']['filename']);

						$filename = $this->upload->data('file_name');
						$config['image_library'] = 'gd2';
						$config['source_image'] = './images/events/'.$filename;
						$config['new_image'] = './images/events/thumb/'.$filename;
						$config['width'] = 100;

						$this->load->library('image_lib', $config);
						$this->image_lib->resize();
					} else {
						$data['alert'] = '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>';
					}
				}

				if (empty($data['alert'])) {
					$event_data = array(
						'description' => $this->input->post('eventdesc'),
						'status' => ($this->input->post('eventstat')) ? 'A' : 'I',
						'date_updated' => date('Y-m-d H:i:s'),
						'updated_by' => $this->session->userdata('adminuser'),
						'date_end' => $this->input->post('eventend')
					);

					if ($filename != '') {
						$event_data['filename'] = $filename;
					}

					$this->events_model->update(array('id' => $id), $event_data);

					$this->session->set_flashdata('alert', '<div class="alert alert-success">An event has been successfully updated.</div>');

					redirect('admin/events');
				}
			} else {
				$data['alert'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			}
		}

		$data['title'] = 'Edit Event';
		$data['id'] = $id;

		load_view_admin('events/edit', $data);
	}

	public function delete($id)
	{
		if (!empty($id)) {
			$criteria = array('id' => $id);
			//$this->events_model->delete($criteria);
			$data = array(
				'status' => 'R',
				'date_updated' => date('Y-m-d H:i:s')
			);
			$this->events_model->update($criteria, $data);

			$this->session->set_flashdata('alert', '<div class="alert alert-success">An event has been successfully deleted.</div>');

			redirect('admin/events');
		}
	}
}
