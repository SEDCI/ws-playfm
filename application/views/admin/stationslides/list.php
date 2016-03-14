				<h2 class="page-header"><?php echo $title; ?></h2>
<?php echo $alert; ?>
				<div>
					<a class="btn btn-default" title="Add Slide" href="<?php echo base_url('admin/stationslides/add'); ?>"><span class="glyphicon glyphicon-plus"></span> Add</a>
					<div class="panel panel-default list">
						<div class="table-responsive">
							<table class="table table-collapse table-striped table-hover">
								<thead>
									<tr>
										<th>No.</th>
										<th>Preview</th>
										<th>Description</th>
										<th>Date Added</th>
										<th>Status</th>
										<th>Date Updated</th>
										<th class="actions">Action</th>
									</tr>
								</thead>
								<tbody>
<?php
if (!empty($stationslides)):
$i = 1;
foreach ($stationslides as $stationslide):
?>
									<tr>
										<th><?php echo $i++; ?></th>
										<td><img class="thumbs" data-toggle="modal" data-target=".modal" title="Click to Preview" src="<?php echo base_url('images/slider/thumb/'.$stationslide['filename']); ?>" title="<?php echo $stationslide['description']; ?>"></td>
										<td><span class="description"><?php echo $stationslide['description']; ?></span></td>
										<td><?php echo date('F j, Y', strtotime($stationslide['date_added'])); ?></td>
										<td><?php echo ($stationslide['status'] == 'A') ? 'Active' : 'Inactive'; ?></td>
										<td><?php echo (!is_null($stationslide['date_updated'])) ? date('F j, Y', strtotime($stationslide['date_updated'])) : ''; ?></td>
										<td><div class="btn-group"><a class="btn btn-sm btn-default glyphicon glyphicon-pencil" title="Edit" href="<?php echo base_url('admin/stationslides/edit/'.$stationslide['id']); ?>"></a><a class="btn btn-sm btn-default glyphicon glyphicon-trash delrec" title="Delete" href="<?php echo base_url('admin/stationslides/delete/'.$stationslide['id']); ?>"></div></td>
									</tr>
<?php endforeach; endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="modal fade" id="preview" tabindex="-1" role="dialog">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-body">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</button>
								<img class="img-responsive" src="">
							</div>
						</div>
					</div>
				</div>