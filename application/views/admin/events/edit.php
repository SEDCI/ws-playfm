                <h2 class="page-header"><?php echo $title; ?></h2>
<?php echo (!empty($alert)) ? $alert : ''; ?>
                <div>
                    <?php echo form_open_multipart('admin/events/edit/'.$id); ?>
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label for="eventimg" class="control-label">Current Image:</label>
                                    <img class="img img-responsive" id="eventimg" src="<?php echo base_url('images/events/'.$event['filename']); ?>">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="eventfile" class="control-label">Change Image:</label>
                                    <input type="file" id="eventfile" name="eventfile" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="eventdesc" class="control-label">Description:</label>
                                    <textarea class="form-control" id="eventdesc" name="eventdesc" placeholder="Enter Description"><?php echo set_value('eventdesc', $event['description']); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="eventend" class="control-label">End Date:</label>
                                    <input type="text" class="form-control datepicker" id="" name="eventend" placeholder="Enter End Date" value="<?php echo set_value('eventend', $event['date_end']); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Active:</label>&nbsp;
                                    <input type="checkbox" id="eventstat" name="eventstat" value="A" <?php echo ($event['status'] == 'A') ? 'checked' : ''; ?> />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" role="button">Update</button>
                                    <a class="btn btn-default" href="<?php echo base_url('admin/events'); ?>">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
