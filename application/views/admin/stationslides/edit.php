                <h2 class="page-header"><?php echo $title; ?></h2>
<?php echo (!empty($alert)) ? $alert : ''; ?>
                <div>
                    <?php echo form_open_multipart('admin/stationslides/edit/'.$id); ?>
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label for="stationslideimg" class="control-label">Current Image:</label>
                                    <img class="img img-responsive" id="stationslideimg" src="<?php echo base_url('images/slider/'.$stationslide['filename']); ?>">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="stationslidefile" class="control-label">Change Image:</label>
                                    <input type="file" id="stationslidefile" name="stationslidefile" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="stationslidedesc" class="control-label">Description:</label>
                                    <textarea class="form-control" id="stationslidedesc" name="stationslidedesc" placeholder="Enter Description"><?php echo set_value('stationslidedesc', $stationslide['description']); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Active:</label>&nbsp;
                                    <input type="checkbox" id="stationslidestat" name="stationslidestat" value="A" <?php echo ($stationslide['status'] == 'A') ? 'checked' : ''; ?> />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" role="button">Update</button>
                                    <a class="btn btn-default" href="<?php echo base_url('admin/stationslides'); ?>">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
