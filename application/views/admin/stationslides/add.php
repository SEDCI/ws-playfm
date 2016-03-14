                <h2 class="page-header"><?php echo $title; ?></h2>
<?php echo (!empty($alert)) ? $alert : ''; ?>
                <div>
                    <?php echo form_open_multipart('admin/stationslides/add'); ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="stationslidefile" class="control-label">Image:</label>
                                    <input type="file" id="stationslidefile" name="stationslidefile" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="stationslidedesc" class="control-label">Description:</label>
                                    <textarea class="form-control" id="stationslidedesc" name="stationslidedesc" placeholder="Enter Description"><?php echo set_value('stationslidedesc'); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" role="button">Save</button>
                                    <a class="btn btn-default" href="<?php echo base_url('admin/stationslides'); ?>">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
