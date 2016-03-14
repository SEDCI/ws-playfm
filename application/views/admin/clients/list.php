				<h2 class="page-header"><?php echo $title; ?></h2>
<?php echo $alert; ?>
				<div>
					<a class="btn btn-default" title="Add Slide" href="<?php echo base_url('admin/clients/add'); ?>"><span class="glyphicon glyphicon-plus"></span> Add</a>
					<div class="panel panel-default list">
						<div class="table-responsive">
							<table class="table table-collapse table-striped table-hover">
								<thead>
									<tr>
										<th>No.</th>
										<th>Preview</th>
										<th>Name</th>
										<th>Description</th>
										<th>Date Added</th>
										<th>Status</th>
										<th>Date Updated</th>
										<th class="actions">Action</th>
									</tr>
								</thead>
								<tbody>
<?php
if (!empty($clients)):
$i = 1;
foreach ($clients as $client):
?>
									<tr>
										<th><?php echo $i++; ?></th>
										<td><img class="thumbs" data-toggle="modal" data-target=".modal" title="Click to Preview" src="<?php echo base_url('images/clients/thumb/'.$client['display_img']); ?>" title="<?php echo $client['description']; ?>"></td>
										<td><?php echo $client['name']; ?></td>
										<td><span class="description"><?php echo $client['description']; ?></span><input type="hidden" class="contentimg" value="<?php echo $client['content_img']; ?>"><input type="hidden" class="contentvid" value="<?php echo $client['content_vid']; ?>"></td>
										<td><?php echo date('F j, Y', strtotime($client['date_added'])); ?></td>
										<td><?php echo ($client['status'] == 'A') ? 'Active' : 'Inactive'; ?></td>
										<td><?php echo (!is_null($client['date_updated'])) ? date('F j, Y', strtotime($client['date_updated'])) : ''; ?></td>
										<td><div class="btn-group"><a class="btn btn-sm btn-default glyphicon glyphicon-pencil" title="Edit" href="<?php echo base_url('admin/clients/edit/'.$client['id']); ?>"></a><a class="btn btn-sm btn-default glyphicon glyphicon-trash delrec" title="Delete" href="<?php echo base_url('admin/clients/delete/'.$client['id']); ?>"></div></td>
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