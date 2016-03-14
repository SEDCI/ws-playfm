<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends MY_Controller {

	/**
	 * Clients Management for the website
	 *
	 * Maps to the following URL
	 * 		http://995play.fm/index.php/admin/clients
	 *	- or -
	 * 		http://995play.fm/index.php/admin/clients
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('loadview');
		$this->load->library('form_validation');
		$this->load->model('clients_model');
	}

	public function index()
	{
		$data['title'] = 'Clients';
		$data['alert'] = $this->session->flashdata('alert');

		$query_options = array(
			'criteria' => array(
				'status !=' => 'R'
			)
		);

		$data['clients'] = $this->clients_model->retrieveall($query_options);

		load_view_admin('clients/list', $data);
	}

	public function add()
	{
		if ($this->input->post()) {
			$this->form_validation->set_rules('clientname', 'Name', 'trim|required|max_length[150]');
			$this->form_validation->set_rules('clientdesc', 'Description', 'trim|max_length[300]');
			$this->form_validation->set_rules('clientcontentvid', 'Content Video', 'trim|max_length[150]');

			if ($this->form_validation->run() === true) {
				if ($_FILES['clientdisplay']['name'] != '' && $_FILES['clientdisplay']['size'] > 0) {
					$display_img_path = './images/clients/';

					$upload_config = array(
						'file' => 'clientdisplay',
						'upload_path' => $display_img_path,
						'create_thumb' => true
					);

					$upload = $this->uploadImg($upload_config);

					if (empty($upload['error'])) {
						$display_img_file = $upload['filename'];

						if ($_FILES['clientcontentimg']['name'] != '' && $_FILES['clientcontentimg']['size'] > 0) {
							$content_img_path = './images/clients/content/';

							$upload_config = array(
								'file' => 'clientcontentimg',
								'upload_path' => $content_img_path
							);

							$upload = $this->uploadImg($upload_config);

							if (empty($upload['error'])) {
								$content_img_file = $upload['filename'];
							} else {
								unlink(implode('', $clientdisplay));
								unlink($display_img_path.'thumb/'.$display_img_file);
							}
						}
					}

					if (!empty($upload['error'])) {
						$data['alert'] = $upload['error'];
					} else {
						$client_data = array(
							'display_img' => $display_img_file,
							'name' => $this->input->post('clientname'),
							'description' => $this->input->post('clientdesc'),
							'content_img' => $content_img_file,
							'content_vid' => $this->input->post('clientcontentvid'),
							'status' => 'A',
							'date_added' => date('Y-m-d H:i:s'),
							'added_by' => $this->session->userdata('adminuser')
						);

						$this->clients_model->create($client_data);

						$this->session->set_flashdata('alert', '<div class="alert alert-success">A client has been successfully added.</div>');

						redirect('admin/clients');
					}
				} else {
					$data['alert'] = '<div class="alert alert-danger"><p>Display Image is required.</p></div>';
				}
			} else {
				$data['alert'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			}
		}

		$data['title'] = 'Add Client';

		load_view_admin('clients/add', $data);
	}

	public function uploadImg($upload_config, $width = 100, $height = 0)
	{
		$this->load->library('upload');

		$config['upload_path'] = $upload_config['upload_path'];
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_ext_tolower'] = true;
		$config['encrypt_name'] = true;

		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload($upload_config['file'])) {
			$return = array(
				'error' => $this->upload->display_errors()
			);

			return $return;
		} else {
			$filename = $this->upload->data('file_name');

			if ($upload_config['create_thumb']) {
				$config['image_library'] = 'gd2';
				$config['source_image'] = $upload_config['upload_path'].$filename;
				$config['new_image'] = $upload_config['upload_path'].'thumb/'.$filename;
				$config['width'] = $width;

				if ($height > 0) {
					$config['height'] = $height;
				}

				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
			}

			$return = array(
				'filename' => $filename
			);
		}

		return $return;
	}

	public function edit($id)
	{
		$query_options = array(
			'criteria' => array(
				'id' => $id
			)
		);

		$data['client'] = $this->clients_model->retrieve($query_options);

		if (count($data['client']) == 0) {
			redirect('admin/clients');
		}

		if ($this->input->post()) {
			$display_img_file = $data['client']['display_img'];
			$content_img_file = $data['client']['content_img'];
			$display_img_msg = '';
			$content_img_msg = '';
			$content_img_path = './images/clients/content/';

			$this->form_validation->set_rules('clientname', 'Name', 'trim|required|max_length[150]');
			$this->form_validation->set_rules('clientdesc', 'Description', 'trim|max_length[300]');
			$this->form_validation->set_rules('clientcontentvid', 'Content Video', 'trim|max_length[150]');

			if ($this->form_validation->run() === true) {
				/**
				 * Validate Display Image
				 */
				if ($_FILES['clientdisplay']['name'] != '' && $_FILES['clientdisplay']['size'] > 0) {
					$display_img_path = './images/clients/';

					$upload_config = array(
						'file' => 'clientdisplay',
						'upload_path' => $display_img_path,
						'create_thumb' => true
					);

					$upload = $this->uploadImg($upload_config);

					if (empty($upload['error'])) {
						unlink($display_img_path.$display_img_file);
						unlink($display_img_path.'thumb/'.$display_img_file);
						$display_img_file = $upload['filename'];
					} else {
						$display_img_msg = '<p><b>Display Image:</b><p>'.$upload['error'];
					}
				}

				/**
				 * Validate Content Image
				 */
				if ($_FILES['clientcontentimg']['name'] != '' && $_FILES['clientcontentimg']['size'] > 0) {
					$upload_config = array(
						'file' => 'clientcontentimg',
						'upload_path' => $content_img_path
					);

					$upload = $this->uploadImg($upload_config);

					if (empty($upload['error'])) {
						unlink($content_img_path.$content_img_file);
						$content_img_file = $upload['filename'];
					} else {
						$content_img_msg = '<p><b>Content Image:</b></p>'.$upload['error'];
					}
				} elseif ($this->input->post('contidel')) {
					unlink($content_img_path.$content_img_file);
					$content_img_file = '';
				}

				/**
				 * Update Client Data
				 */
				if (empty($display_img_msg) && empty($content_img_msg)) {
					$client_data = array(
						'display_img' => $display_img_file,
						'name' => $this->input->post('clientname'),
						'description' => $this->input->post('clientdesc'),
						'content_img' => $content_img_file,
						'content_vid' => $this->input->post('clientcontentvid'),
						'date_updated' => date('Y-m-d H:i:s'),
						'updated_by' => $this->session->userdata('adminuser')
					);

					$this->clients_model->update(array('id' => $id), $client_data);

					$this->session->set_flashdata('alert', '<div class="alert alert-success">A client has been successfully updated.</div>');

					redirect('admin/clients');
				} else {
					$data['alert'] = '<div class="alert alert-danger">' . $display_img_msg . $content_img_msg . '</div>';
				}
			} else {
				$data['alert'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			}
		}

		$data['title'] = 'Edit Client';
		$data['id'] = $id;

		load_view_admin('clients/edit', $data);
	}

	public function delete($id)
	{
		if (!empty($id)) {
			$criteria = array('id' => $id);
			//$this->clients_model->delete($criteria);
			$data = array(
				'status' => 'R',
				'date_updated' => date('Y-m-d H:i:s')
			);
			$this->clients_model->update($criteria, $data);

			$this->session->set_flashdata('alert', '<div class="alert alert-success">A client has been successfully deleted.</div>');

			redirect('admin/clients');
		}
	}
}
