				<h2 class="page-header"><?php echo $title; ?></h2>
<?php echo $alert; ?>
				<div>
					<a class="btn btn-default" title="Add Schedule" href="<?php echo base_url('admin/schedules/add'); ?>"><span class="glyphicon glyphicon-plus"></span> Add</a>
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
if (!empty($schedules)):
$i = 1;
foreach ($schedules as $schedule):
?>
									<tr>
										<th><?php echo $i++; ?></th>
										<td><img class="thumbs" data-toggle="modal" data-target=".modal" title="Click to Preview" src="<?php echo base_url('images/sched/thumb/'.$schedule['filename']); ?>" title="<?php echo $schedule['description']; ?>"></td>
										<td><span class="description"><?php echo $schedule['description']; ?></span></td>
										<td><?php echo date('F j, Y', strtotime($schedule['date_added'])); ?></td>
										<td><?php echo ($schedule['status'] == 'A') ? 'Active' : 'Inactive'; ?></td>
										<td><?php echo (!is_null($schedule['date_updated'])) ? date('F j, Y', strtotime($schedule['date_updated'])) : ''; ?></td>
										<td><div class="btn-group"><a class="btn btn-sm btn-default glyphicon glyphicon-pencil" title="Edit" href="<?php echo base_url('admin/schedules/edit/'.$schedule['id']); ?>"></a><a class="btn btn-sm btn-default glyphicon glyphicon-trash delrec" title="Delete" href="<?php echo base_url('admin/schedules/delete/'.$schedule['id']); ?>"></div></td>
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