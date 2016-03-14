                <h2 class="page-header"><?php echo $title; ?></h2>
<?php echo (!empty($alert)) ? $alert : ''; ?>
                <div>
                    <?php echo form_open_multipart('admin/stationinfo/add'); ?>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="stationinfoclass" class="control-label">Classification:</label>
                                    <?php echo form_dropdown('stationinfoclass', array('P' => 'Profile', 'C' => 'Contact'), set_value('stationinfoclass'), 'class="form-control" id="stationinfoclass"'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="stationinfofile" class="control-label">Image:</label>
                                    <input type="file" id="stationinfofile" name="stationinfofile" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="stationinfodesc" class="control-label">Description:</label>
                                    <textarea class="form-control" id="stationinfodesc" name="stationinfodesc" placeholder="Enter Description"><?php echo set_value('stationinfodesc'); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" role="button">Save</button>
                                    <a class="btn btn-default" href="<?php echo base_url('admin/stationinfo'); ?>">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
