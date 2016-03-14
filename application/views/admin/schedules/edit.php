                <h2 class="page-header"><?php echo $title; ?></h2>
<?php echo (!empty($alert)) ? $alert : ''; ?>
                <div>
                    <?php echo form_open_multipart('admin/schedules/edit/'.$id); ?>
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label for="scheduleimg" class="control-label">Current Image:</label>
                                    <img class="img img-responsive" id="scheduleimg" src="<?php echo base_url('images/sched/'.$schedule['filename']); ?>">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="schedulefile" class="control-label">Change Image:</label>
                                    <input type="file" id="schedulefile" name="schedulefile" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="scheduledesc" class="control-label">Description:</label>
                                    <textarea class="form-control" id="scheduledesc" name="scheduledesc" placeholder="Enter Description"><?php echo set_value('scheduledesc', $schedule['description']); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Active:</label>&nbsp;
                                    <input type="checkbox" id="schedulestat" name="schedulestat" value="A" <?php echo ($schedule['status'] == 'A') ? 'checked' : ''; ?> />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" role="button">Update</button>
                                    <a class="btn btn-default" href="<?php echo base_url('admin/schedules'); ?>">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
