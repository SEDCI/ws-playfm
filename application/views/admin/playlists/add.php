                <h2 class="page-header"><?php echo $title; ?></h2>
<?php echo (!empty($alert)) ? $alert : ''; ?>
                <div>
                    <?php echo form_open_multipart('admin/playlists/add'); ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="playlistcont" class="control-label">Content:</label>
                                    <textarea class="form-control" id="playlistcont" name="playlistcont" placeholder="Enter List" rows="30"><?php echo set_value('playlistcont'); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="playlistend" class="control-label">End Date:</label>
                                    <input type="text" class="form-control datepicker" id="playlistend" name="playlistend" placeholder="Enter End Date ( e.g: 2015-12-31 )" value="<?php echo set_value('playlistend'); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" role="button">Save</button>
                                    <a class="btn btn-default" href="<?php echo base_url('admin/playlists'); ?>">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
