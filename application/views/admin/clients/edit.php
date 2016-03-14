                <h2 class="page-header"><?php echo $title; ?></h2>
<?php echo (!empty($alert)) ? $alert : ''; ?>
                <div>
                    <?php echo form_open_multipart('admin/clients/edit/'.$id); ?>
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label for="curdisplay" class="control-label">Current Display Image:</label>
                                    <img class="img img-responsive" id="curdisplay" src="<?php echo base_url('images/clients/'.$client['display_img']); ?>">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="clientdisplay" class="control-label">Change Display Image:</label>
                                    <input type="file" id="clientdisplay" name="clientdisplay" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="clientname" class="control-label">Name:</label>
                                    <input type="text" class="form-control" id="clientname" name="clientname" placeholder="Enter Name" value="<?php echo set_value('clientname', $client['name']); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="clientdesc" class="control-label">Description:</label>
                                    <textarea class="form-control" id="clientdesc" name="clientdesc" placeholder="Enter Description"><?php echo set_value('clientdesc', $client['description']); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label class="control-label">Current Content Image:</label><?php if ($client['content_img']) { ?> <span class="remimg">[<a href="javascript:void(0);">Remove</a>]</span><?php } ?>
                                    <div>
    <?php if ($client['content_img']): ?>
                                        <img class="img img-responsive" id="curcontenti" src="<?php echo base_url('images/clients/content/'.$client['content_img']); ?>">
    <?php else: ?>
                                        <div class="alert alert-info">No image.</div>
    <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="clientcontentimg" class="control-label">Change Content Image:</label>
                                    <input type="file" id="clientcontentimg" name="clientcontentimg" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="clientcontentvid" class="control-label">Content Video:</label>
                                    <input type="text" class="form-control" id="clientcontentvid" name="clientcontentvid" placeholder="Enter Video URL" value="<?php echo set_value('clientcontentvid', $client['content_vid']); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" role="button">Update</button>
                                    <a class="btn btn-default" href="<?php echo base_url('admin/clients'); ?>">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
