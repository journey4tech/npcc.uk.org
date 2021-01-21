<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="profile-tabs">
    <ul class="nav">
        <li class="nav-item <?php echo ($active_tab == 'update_profile') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>settings">
                <div class="setting-title"><span>Settings</span></div>
                <!-- <span><?php echo trans("update_profile"); ?></span> -->
            </a>
        </li>
       
        <li class="nav-item <?php echo ($active_tab == 'contact_informations') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>settings/contact-informations">
            <div class="setting-title"><span>Contact informations</span></div>
            </a>
        </li>
        
        <li class="nav-item <?php echo ($active_tab == 'social_media') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>settings/social-media">
                <div class="setting-title"><span>Social media</span></div>
            </a>
        </li>
        <li class="nav-item <?php echo ($active_tab == 'change_password') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>settings/change-password">
                <div class="setting-title"><span>Change password</span></div>
            </a>
        </li>
    </ul>
</div>