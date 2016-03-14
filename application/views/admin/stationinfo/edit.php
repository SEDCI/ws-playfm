                <h2 class="page-header"><?php echo $title; ?></h2>
<?php echo (!empty($alert)) ? $alert : ''; ?>
                <div>
                    <?php echo form_open_multipart('admin/stationinfo/edit/'.$id); ?>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="stationinfoclass" class="control-label">Classification:</label>
                                    <?php echo form_dropdown('stationinfoclass', array('P' => 'Profile', 'C' => 'Contact'), set_value('stationinfoclass', $stationinfo['classification']), 'class="form-control" id="stationinfoclass"'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label for="stationinfoimg" class="control-label">Current Image:</label>
                                    <img class="img img-responsive" id="stationinfoimg" src="<?php echo base_url('images/profile/'.$stationinfo['filename']); ?>">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="stationinfofile" class="control-label">Change Image:</label>
                                    <input type="file" id="stationinfofile" name="stationinfofile" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="stationinfodesc" class="control-label">Description:</label>
                                    <textarea class="form-control" id="stationinfodesc" name="stationinfodesc" placeholder="Enter Description"><?php echo set_value('stationinfodesc', $stationinfo['description']); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Active:</label>&nbsp;
                                    <input type="checkbox" id="stationinfostat" name="stationinfostat" value="A" <?php echo ($stationinfo['status'] == 'A') ? 'checked' : ''; ?> />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" role="button">Update</button>
                                    <a class="btn btn-default" href="<?php echo base_url('admin/stationinfo'); ?>">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
