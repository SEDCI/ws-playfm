<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for the website
	 *
	 * Maps to the following URL
	 * 		http://995play.fm/index.php/home
	 *	- or -
	 * 		http://995play.fm/index.php/home/index
	 */
	public function index()
	{
		$data['stationinfo'] = $this->getStationinfo();
		$data['stationslides'] = $this->getStationslides();
		$data['events'] = $this->getEvents();
		$data['schedules'] = $this->getSchedules();
		$data['playlist'] = $this->getPlaylist();
		$data['clients'] = $this->getClients();

		$this->load->view('public/index', $data);
	}

	public function getStationinfo()
	{
		$this->load->model('stationinfo_model');

		$profile_options = array(
			'criteria' => array(
				'classification' => 'P',
				'status' => 'A'
			)
		);

		$contact_options = array(
			'criteria' => array(
				'classification' => 'C',
				'status' => 'A'
			)
		);

		$data['profile'] = $this->stationinfo_model->retrieveall($profile_options);
		$data['contact'] = $this->stationinfo_model->retrieveall($contact_options);

		return $data;
	}

	public function getStationslides()
	{
		$this->load->model('stationslides_model');

		$stationslides_options = array(
			'criteria' => array(
				'status' => 'A'
			)
		);

		return $this->stationslides_model->retrieveall($stationslides_options);
	}

	public function getEvents()
	{
		$this->load->model('events_model');

		$events_options = array(
			'criteria' => array(
				'status' => 'A',
				'date_end >=' => date('Y-m-d')
			),
			'order' => 'date_end ASC'
		);

		return $this->events_model->retrieveall($events_options);
	}

	public function getSchedules()
	{
		$this->load->model('schedules_model');

		$schedules_options = array(
			'criteria' => array(
				'status' => 'A'
			)
		);

		return $this->schedules_model->retrieveall($schedules_options);
	}

	public function getPlaylist()
	{
		$this->load->model('playlists_model');

		$playlist_options = array(
			'criteria' => array(
				'status' => 'A',
				'date_end >=' => date('Y-m-d')
			),
			'order' => 'date_end DESC'
		);

		return $this->playlists_model->retrieve($playlist_options);
	}

	public function getClients()
	{
		$this->load->model('clients_model');

		$clients_options = array(
			'criteria' => array(
				'status' => 'A'
			)
		);

		return $this->clients_model->retrieveall($clients_options);
	}
}
