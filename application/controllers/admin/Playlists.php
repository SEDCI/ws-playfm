<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Playlists extends MY_Controller {

	/**
	 * Playlists Management for the website
	 *
	 * Maps to the following URL
	 * 		http://995play.fm/index.php/admin/playlists
	 *	- or -
	 * 		http://995play.fm/index.php/admin/playlists
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('loadview');
		$this->load->library('form_validation');
		$this->load->model('playlists_model');
	}

	public function index()
	{
		$data['title'] = 'Playlists';
		$data['alert'] = $this->session->flashdata('alert');

		$query_options = array(
			'criteria' => array(
				'status !=' => 'R'
			),
			'order' => 'date_end DESC'
		);

		$data['playlists'] = $this->playlists_model->retrieveall($query_options);

		load_view_admin('playlists/list', $data);
	}

	public function add()
	{
		if ($this->input->post()) {
			$this->form_validation->set_rules('playlistcont', 'Content', 'trim|max_length[3000]');

			if ($this->form_validation->run() === true) {
				$playlist_data = array(
					'content' => str_replace(array("\r\n", "\n"), '<br>', $this->input->post('playlistcont')),
					'status' => 'A',
					'date_added' => date('Y-m-d H:i:s'),
					'added_by' => $this->session->userdata('adminuser'),
					'date_end' => $this->input->post('playlistend')
				);

				$this->playlists_model->create($playlist_data);

				$this->session->set_flashdata('alert', '<div class="alert alert-success">A playlist has been successfully added.</div>');

				redirect('admin/playlists');
			} else {
				$data['alert'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			}
		}

		$data['title'] = 'Add Playlist';

		load_view_admin('playlists/add', $data);
	}

	public function edit($id)
	{
		$query_options = array(
			'criteria' => array(
				'id' => $id
			)
		);

		$data['playlist'] = $this->playlists_model->retrieve($query_options);

		if ($this->input->post()) {
			$this->form_validation->set_rules('playlistcont', 'Content', 'trim|max_length[3000]');

			if ($this->form_validation->run() === true) {
				$playlist_data = array(
					'content' => str_replace(array("\r\n", "\n"), '<br>', $this->input->post('playlistcont')),
					'status' => ($this->input->post('playliststat')) ? 'A' : 'I',
					'date_updated' => date('Y-m-d H:i:s'),
					'updated_by' => $this->session->userdata('adminuser'),
					'date_end' => $this->input->post('playlistend')
				);

				$this->playlists_model->update(array('id' => $id), $playlist_data);

				$this->session->set_flashdata('alert', '<div class="alert alert-success">A playlist has been successfully updated.</div>');

				redirect('admin/playlists');
			} else {
				$data['alert'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			}
		}

		$data['title'] = 'Edit Playlist';
		$data['id'] = $id;

		load_view_admin('playlists/edit', $data);
	}

	public function delete($id)
	{
		if (!empty($id)) {
			$criteria = array('id' => $id);
			//$this->playlists_model->delete($criteria);
			$data = array(
				'status' => 'R',
				'date_updated' => date('Y-m-d H:i:s')
			);
			$this->playlists_model->update($criteria, $data);

			$this->session->set_flashdata('alert', '<div class="alert alert-success">A playlist has been successfully deleted.</div>');

			redirect('admin/playlists');
		}
	}
}
