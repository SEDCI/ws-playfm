<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedules extends MY_Controller {

	/**
	 * Schedules Slider Management for the website
	 *
	 * Maps to the following URL
	 * 		http://995play.fm/index.php/admin/schedules
	 *	- or -
	 * 		http://995play.fm/index.php/admin/schedules
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('loadview');
		$this->load->library('form_validation');
		$this->load->model('schedules_model');
	}

	public function index()
	{
		$data['title'] = 'Show Schedule';
		$data['alert'] = $this->session->flashdata('alert');

		$query_options = array(
			'criteria' => array(
				'status !=' => 'R'
			)
		);

		$data['schedules'] = $this->schedules_model->retrieveall($query_options);

		load_view_admin('schedules/list', $data);
	}

	public function add()
	{
		if ($this->input->post()) {
			$this->form_validation->set_rules('scheduledesc', 'Description', 'trim|max_length[300]');

			if ($this->form_validation->run() === true) {
				if ($_FILES['schedulefile']['name'] != '' && $_FILES['schedulefile']['size'] > 0) {
					$config['upload_path'] = './images/sched/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['file_ext_tolower'] = true;
					$config['encrypt_name'] = true;

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('schedulefile')) {
						$filename = $this->upload->data('file_name');
						$config['image_library'] = 'gd2';
						$config['source_image'] = './images/sched/'.$filename;
						$config['new_image'] = './images/sched/thumb/'.$filename;
						$config['width'] = 100;

						$this->load->library('image_lib', $config);
						$this->image_lib->resize();

						$schedule_data = array(
							'filename' => $filename,
							'description' => $this->input->post('scheduledesc'),
							'status' => 'A',
							'date_added' => date('Y-m-d H:i:s'),
							'added_by' => $this->session->userdata('adminuser')
						);

						$this->schedules_model->create($schedule_data);

						$this->session->set_flashdata('alert', '<div class="alert alert-success">A schedule has been successfully added.</div>');

						redirect('admin/schedules');
					} else {
						$data['alert'] = '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>';
					}
				}
			} else {
				$data['alert'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			}
		}

		$data['title'] = 'Add Show Schedule';

		load_view_admin('schedules/add', $data);
	}

	public function edit($id)
	{
		$query_options = array(
			'criteria' => array(
				'id' => $id
			)
		);

		$data['schedule'] = $this->schedules_model->retrieve($query_options);

		if ($this->input->post()) {
			$this->form_validation->set_rules('scheduledesc', 'Description', 'trim|max_length[300]');

			if ($this->form_validation->run() === true) {
				if ($_FILES['schedulefile']['name'] != '' && $_FILES['schedulefile']['size'] > 0) {
					$config['upload_path'] = './images/sched/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['file_ext_tolower'] = true;
					$config['encrypt_name'] = true;

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('schedulefile')) {
						unlink($config['upload_path'].$data['schedule']['filename']);
						unlink($config['upload_path'].'thumb/'.$data['schedule']['filename']);

						$filename = $this->upload->data('file_name');
						$config['image_library'] = 'gd2';
						$config['source_image'] = './images/sched/'.$filename;
						$config['new_image'] = './images/sched/thumb/'.$filename;
						$config['width'] = 100;

						$this->load->library('image_lib', $config);
						$this->image_lib->resize();
					} else {
						$data['alert'] = '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>';
					}
				}

				if (empty($data['alert'])) {
					$schedule_data = array(
						'description' => $this->input->post('scheduledesc'),
						'status' => ($this->input->post('schedulestat')) ? 'A' : 'I',
						'date_updated' => date('Y-m-d H:i:s'),
						'updated_by' => $this->session->userdata('adminuser')
					);

					if ($filename != '') {
						$schedule_data['filename'] = $filename;
					}

					$this->schedules_model->update(array('id' => $id), $schedule_data);

					$this->session->set_flashdata('alert', '<div class="alert alert-success">A schedule has been successfully updated.</div>');

					redirect('admin/schedules');
				}
			} else {
				$data['alert'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			}
		}

		$data['title'] = 'Edit Show Schedule';
		$data['id'] = $id;

		load_view_admin('schedules/edit', $data);
	}

	public function delete($id)
	{
		if (!empty($id)) {
			$criteria = array('id' => $id);
			//$this->schedules_model->delete($criteria);
			$data = array(
				'status' => 'R',
				'date_updated' => date('Y-m-d H:i:s')
			);
			$this->schedules_model->update($criteria, $data);

			$this->session->set_flashdata('alert', '<div class="alert alert-success">A schedule has been successfully deleted.</div>');

			redirect('admin/schedules');
		}
	}
}
