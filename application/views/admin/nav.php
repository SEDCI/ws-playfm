	<nav class="navbar navbar-admin navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo base_url('admin/dashboard'); ?>"><img src="<?php echo base_url('images/logo-heading.png'); ?>" /></a>
			</div>
			<div class="collapse navbar-collapse" id="top-navbar">
				<ul class="nav navbar-nav navbar-right">
					<!--<li><a href="<?php echo base_url('admin/dashboard'); ?>">Dashboard <span class="sr-only">(current)</span></a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administration <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('admin/users'); ?>">Users</a></li>
							<li><a href="<?php echo base_url('admin/devices'); ?>">Devices</a></li>
							<li><a href="#">Administrators</a></li>
							<li><a href="#">Settings</a></li>
						</ul>
					</li>-->
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b><?php echo $this->session->userdata('adminuser'); ?></b> <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Profile</a></li>
							<li><a href="#">Change Password</a></li>
							<li><a href="#">Settings</a></li>
							<li><a href="<?php echo base_url('admin/logout'); ?>">Log out</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<main class="main-container">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3">
					<ul class="nav nav-pills nav-stacked side-nav">
						<li role="presentation" class="side-nav-dashboard"><a href="<?php echo base_url('admin/dashboard'); ?>"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
						<li role="presentation" class="side-nav-company"><a href="<?php echo base_url('admin/stationinfo'); ?>"><span class="glyphicon glyphicon-home"></span> Station Info</a></li>
						<li role="presentation" class="side-nav-stationslides"><a href="<?php echo base_url('admin/stationslides'); ?>"><span class="glyphicon glyphicon-blackboard"></span> Station Slides</a></li>
						<li role="presentation" class="side-nav-events"><a href="<?php echo base_url('admin/events'); ?>"><span class="glyphicon glyphicon-calendar"></span> Events</a></li>
						<li role="presentation" class="side-nav-showsched"><a href="<?php echo base_url('admin/schedules'); ?>"><span class="glyphicon glyphicon-list"></span> Show Schedule</a></li>
						<li role="presentation" class="side-nav-djs"><a href="<?php echo base_url('admin/dashboard'); ?>"><span class="glyphicon glyphicon-cd"></span> Disk Jockeys</a></li>
						<li role="presentation" class="side-nav-clients"><a href="<?php echo base_url('admin/clients'); ?>"><span class="glyphicon glyphicon-tags"></span> Clients</a></li>
						<li role="presentation" class="side-nav-playlist"><a href="<?php echo base_url('admin/playlists'); ?>"><span class="glyphicon glyphicon-play"></span> Playlist</a></li>
					</ul>
				</div>
				<div class="col-sm-9">
