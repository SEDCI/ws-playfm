                <h2 class="page-header"><?php echo $title; ?></h2>
<?php echo (!empty($alert)) ? $alert : ''; ?>
                <div>
                    <?php echo form_open_multipart('admin/clients/add'); ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="clientdisplay" class="control-label">Display Image:</label>
                                    <input type="file" id="clientdisplay" name="clientdisplay" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="clientname" class="control-label">Name:</label>
                                    <input type="text" class="form-control" id="clientname" name="clientname" placeholder="Enter Name" value="<?php echo set_value('clientname'); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="clientdesc" class="control-label">Description:</label>
                                    <textarea class="form-control" id="clientdesc" name="clientdesc" placeholder="Enter Description"><?php echo set_value('clientdesc'); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="clientcontentimg" class="control-label">Content Image:</label>
                                    <input type="file" id="clientcontentimg" name="clientcontentimg" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="clientcontentvid" class="control-label">Content Video:</label>
                                    <input type="text" class="form-control" id="clientcontentvid" name="clientcontentvid" placeholder="Enter Video URL" value="<?php echo set_value('clientcontentvid'); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" role="button">Save</button>
                                    <a class="btn btn-default" href="<?php echo base_url('admin/clients'); ?>">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
