                <h2 class="page-header"><?php echo $title; ?></h2>
<?php echo (!empty($alert)) ? $alert : ''; ?>
                <div>
                    <?php echo form_open_multipart('admin/schedules/add'); ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="schedulefile" class="control-label">Image:</label>
                                    <input type="file" id="schedulefile" name="schedulefile" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="scheduledesc" class="control-label">Description:</label>
                                    <textarea class="form-control" id="scheduledesc" name="scheduledesc" placeholder="Enter Description"><?php echo set_value('scheduledesc'); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" role="button">Save</button>
                                    <a class="btn btn-default" href="<?php echo base_url('admin/schedules'); ?>">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
