                <h2 class="page-header"><?php echo $title; ?></h2>
<?php echo (!empty($alert)) ? $alert : ''; ?>
                <div>
                    <?php echo form_open_multipart('admin/playlists/edit/'.$id); ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="playlistcont" class="control-label">Content:</label>
                                    <textarea class="form-control" id="playlistcont" name="playlistcont" placeholder="Enter List" rows="30"><?php echo set_value('playlistcont', str_replace('<br>', "\n", $playlist['content'])); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="playlistend" class="control-label">End Date:</label>
                                    <input type="text" class="form-control datepicker" id="" name="playlistend" placeholder="Enter End Date" value="<?php echo set_value('playlistend', $playlist['date_end']); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Active:</label>&nbsp;
                                    <input type="checkbox" id="playliststat" name="playliststat" value="A" <?php echo ($playlist['status'] == 'A') ? 'checked' : ''; ?> />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" role="button">Update</button>
                                    <a class="btn btn-default" href="<?php echo base_url('admin/playlists'); ?>">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
