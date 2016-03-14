                <h2 class="page-header"><?php echo $title; ?></h2>
<?php echo (!empty($alert)) ? $alert : ''; ?>
                <div>
                    <?php echo form_open_multipart('admin/events/add'); ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="eventfile" class="control-label">Image:</label>
                                    <input type="file" id="eventfile" name="eventfile" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="eventdesc" class="control-label">Description:</label>
                                    <textarea class="form-control" id="eventdesc" name="eventdesc" placeholder="Enter Description"><?php echo set_value('eventdesc'); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="eventend" class="control-label">End Date:</label>
                                    <input type="text" class="form-control datepicker" id="eventend" name="eventend" placeholder="Enter End Date ( e.g: 2015-12-31 )" value="<?php echo set_value('eventend'); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" role="button">Save</button>
                                    <a class="btn btn-default" href="<?php echo base_url('admin/events'); ?>">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
