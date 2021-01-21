<section class="content">
  <div class="row">
    <div class="col-md-12">

      <div class="box box-primary">
         
        <div class="box-body">
              <?php $this->load->view('admin/include/_messages'); ?>
              <?php echo form_open_multipart(); ?>
<!--         <form name="frm" role="form" id="frm" method="post" enctype="multipart/form-data"
            action="<?=site_url(ADMIN_PATH . '/site_settings/site');?>"> -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">General Settings</a></li>
                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Social Media Settings</a></li>
                    <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Email Settings</a></li>
                    <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">HTML Head Code</a></li>
                     <li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="false">HTML Footer Code</a></li>
                    <li class=""><a href="#tab_6" data-toggle="tab" aria-expanded="false">Social Login Setting</a></li>
                    
                    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                </ul>
                <div class="tab-content settings-tab-content">
                    <!-- include message block -->
                    
                    <div class="tab-pane active" id="tab_1">
                        <hr>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3 col-xs-12 col-option">
                                    <label><span style="color:#3c8dbc">Webiste Online Status</span></label>
                                </div>
                                <div class="col-md-2 col-sm-4 col-xs-12 col-option">
                                    <input name="status" type="radio" value="1" <?php if ($site_info['status'] == "1") {
                                    echo "checked";}?> />
                                    <label for="status_1" class="option-label"><?php echo 'Online Live' ?></label>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-12 col-option">
                                    <input name="status" type="radio" value="0" <?php if ($site_info['status'] == "0") {
                                    echo "checked";}?>/>  <label for="status_2" class="option-label"><?php echo 'Maintenance mode' ?></label>
                                </div>
                            </div>
                        </div>
                         <hr>
                        <div class="form-group">
                            <label class="control-label">Application Name</label>
                            <input type="text" class="form-control" name="application_name"  value="<?=set_value('application_name', $site_info['application_name']);?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Webiste Title</label>
                            <input type="text" class="form-control" name="site_title"  value="<?=set_value('site_title', $site_info['site_title']);?>">
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Address</label>
                            <input type="text" class="form-control" name="address" placeholder="Address" value="<?=set_value('address', $site_info['address']);?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Email" value="<?=set_value('email', $site_info['email']);?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Phone</label>
                            <input type="text" class="form-control" name="phone" placeholder="Phone" value="<?=set_value('phone', $site_info['phone']);?>">
                        </div>

                         <div class="form-group">
                            <label class="control-label">Fax</label>
                            <input type="text" class="form-control" name="fax" placeholder="Phone" value="<?=set_value('fax', $site_info['fax']);?>">
                        </div>
                         <div class="form-group">
                            <label class="control-label">Google Map [ Iframe only ]</label>
                           <textarea class="form-control" cols="70" rows="" name="map" style="min-height: 150px;"><?=set_value('map',$site_info['map']);?></textarea>
                        </div>


                        


                        
                        <?php if ($site_info['logo'] != "") {?>
                        <div class="form-group">
                            <label class="control-label">Logo (180x50 px)</label>
                            <br>
                            <img src="<?=base_url();?>user_upload/images/<?=$site_info['logo'];?>" width="220px"/>
                            
                        </div>
                        <?php }?>
                        <input type="hidden" name="prev_image" value="<?=$site_info['logo'];?>"/>
                       <div class="form-group form-control">
                            <input name="picture" type="file" id="picture"
                            accept="jpg|gif|png|jpeg|JPG|GIF|PNG|JPEG">
                        </div>

                        <?php if ($site_info['favicon'] != "") {?>
                        <div class="form-group">
                            <label class="control-label">Favicon</label>
                            <br>
                            <img src="<?=base_url();?>user_upload/images/<?=$site_info['favicon'];?>"/>
                            
                        </div>
                        <?php }?>
                        <input type="hidden" name="prev_favicon" value="<?=$site_info['favicon'];?>"/>
                        <div class="form-group form-control">
                            <input name="favicon" type="file" id="favicon"
                            accept="jpg|gif|png|jpeg|JPG|GIF|PNG|JPEG">
                        </div>


                        
                        
                    </div>
                    <div class="tab-pane" id="tab_2">
                        <div class="form-group">
                            <label class="control-label">Facebook URL</label>
                            <input type="text" class="form-control" name="facebook_url" placeholder="" value="<?=set_value('facebook_url', $site_info['facebook_url']);?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Twitter URL</label>
                            <input type="text" class="form-control" name="twitter_url" placeholder="" value="<?=set_value('twitter_url', $site_info['twitter_url']);?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Instagram URL</label>
                            <input type="text" class="form-control" name="instagram_url" placeholder="" value="<?=set_value('instagram_url', $site_info['instagram_url']);?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Pinterest URL</label>
                            <input type="text" class="form-control" name="pinterest_url" placeholder="" value="<?=set_value('pinterest_url', $site_info['pinterest_url']);?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">LinkedIn URL</label>
                            <input type="text" class="form-control" name="linkedin_url" placeholder="" value="<?=set_value('linkedin_url', $site_info['linkedin_url']);?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Youtube URL</label>
                            <input type="text" class="form-control" name="youtube_url" placeholder="" value="<?=set_value('youtube_url', $site_info['youtube_url']);?>">
                        </div>
                        
                        
                        <div class="form-group">
                            <label class="control-label">VK URL</label>
                            <input type="text" class="form-control" name="vk_url" placeholder="" value="<?=set_value('vk_url', $site_info['vk_url']);?>">
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_3">

                        <div class=" form-group">
                            <label class="control-label">Mail library</label>
                            <select name="mail_library" class="form-control">
                                <option value="swift" selected="">swift</option>
                            </select>
                        </div>


                        <div class=" form-group">
                            <label class="control-label">Mail Protocol</label>
                            <select name="mail_protocol" class="form-control">
                                <option value="smtp" selected="">SMTP</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email Form [ Sender Email ]</label>
                            <input type="text" class="form-control" name="email_from" placeholder="SMTP Password"  value="<?=set_value('email_from', $site_info['email_from']);?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Mail Host</label>
                            <input type="text" class="form-control" name="mail_host" placeholder="Mail Host" value="<?=set_value('mail_host', $site_info['mail_host']);?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Mail Port</label>
                            <input type="text" class="form-control" name="mail_port" placeholder="Mail Port"  value="<?=set_value('mail_port', $site_info['mail_port']);?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Mail User</label>
                            <input type="text" class="form-control" name="mail_username" placeholder="Mail Email" value="<?=set_value('mail_username', $site_info['mail_username']);?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Mail Password</label>
                            <input type="password" class="form-control" name="mail_password" placeholder="Mail Password"  value="<?=set_value('mail_password', $site_info['mail_password']);?>">
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_4">
                        <div class="form-group">
                            <label class="control-label">HTML Head Code</label>
                            <!-- <textarea class="form-control text-area" name="head_code" placeholder="HTML Head Code" style="min-height: 140px;"></textarea> -->
                            <textarea class="form-control" cols="70" rows="5" name="head_code" style="min-height: 150px;"><?=set_value('head_code',$site_info['head_code']);?></textarea>
                        </div>
                    </div>

                     <div class="tab-pane" id="tab_5">
                        <div class="form-group">
                            <label class="control-label">HTML Footer Code</label>
                            <!-- <textarea class="form-control text-area" name="head_code" placeholder="HTML Head Code" style="min-height: 140px;"></textarea> -->
                            <textarea class="form-control" cols="70" rows="5" name="footer_code" style="min-height: 150px;"><?=set_value('footer_code',$site_info['footer_code']);?></textarea>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab_6">
                        <div class="form-group">
                            <label class="label-sitemap">Facebook App ID</label>
                            <input type="text" class="form-control" name="facebook_app_id" placeholder="App ID" value="<?=set_value('facebook_app_id', $site_info['facebook_app_id']);?>">
                        </div>
                        <div class="form-group">
                            <label class="label-sitemap"> Facebook App Secret</label>
                            <input type="password" class="form-control" name="facebook_app_secret" placeholder="App Secret" value="<?=set_value('facebook_app_secret', $site_info['facebook_app_secret']);?>">
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="label-sitemap">Goolge Client ID</label>
                            <input type="text" class="form-control" name="google_client_id" placeholder="Client ID" value="<?=set_value('google_client_id', $site_info['google_client_id']);?>">
                        </div>
                        <div class="form-group">
                            <label class="label-sitemap">Goolge Client Secret</label>
                            <input type="password" class="form-control" name="google_client_secret" placeholder="Client Secret" value="<?=set_value('google_client_secret', $site_info['google_client_secret']);?>">
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Save Changes</button>
            </div>
        </form>
    </div>
</div>
</div>
</section>