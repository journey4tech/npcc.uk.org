<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<table role="presentation" border="0" cellpadding="0" cellspacing="0" style="margin-top: 10px;">
    <tr>
        <td class="content-block" style="text-align: center;width: 100%;">
            <?php if (!empty($this->config->item('facebook_url'))) : ?>
                <a href="<?php echo html_escape($this->config->item('facebook_url')); ?>" target="_blank" style="color: transparent;margin-right: 5px;">
                    <img src="<?php echo base_url('front_css'); ?>/social-icons/facebook.png" alt="" style="width: 28px; height: 28px;"/>
                </a>
            <?php endif; ?>
            <?php if (!empty($this->config->item('twitter_url'))) : ?>
                <a href="<?php echo html_escape($this->config->item('twitter_url')); ?>" target="_blank" style="color: transparent;margin-right: 5px;">
                    <img src="<?php echo base_url('front_css'); ?>/social-icons/twitter.png" alt="" style="width: 28px; height: 28px;"/>
                </a>
            <?php endif; ?>
          
            <?php /*?>
            <?php if (!empty($settings->pinterest_url)) : ?>
                <a href="<?php echo html_escape($settings->pinterest_url); ?>" target="_blank" style="color: transparent;margin-right: 5px;">
                    <img src="<?php echo base_url('front_css'); ?>/social-icons/pinterest.png" alt="" style="width: 28px; height: 28px;"/>
                </a>
            <?php endif; ?>
            <?php if (!empty($settings->instagram_url)) : ?>
                <a href="<?php echo html_escape($settings->instagram_url); ?>" target="_blank" style="color: transparent;margin-right: 5px;">
                    <img src="<?php echo base_url('front_css'); ?>/social-icons/instagram.png" alt="" style="width: 28px; height: 28px;"/>
                </a>
            <?php endif; ?>
            <?php if (!empty($settings->linkedin_url)) : ?>
                <a href="<?php echo html_escape($settings->linkedin_url); ?>" target="_blank" style="color: transparent;margin-right: 5px;">
                    <img src="<?php echo base_url('front_css'); ?>/social-icons/linkedin.png" alt="" style="width: 28px; height: 28px;"/>
                </a>
            <?php endif; ?>
            <?php if (!empty($settings->vk_url)) : ?>
                <a href="<?php echo html_escape($settings->vk_url); ?>" target="_blank" style="color: transparent;margin-right: 5px;">
                    <img src="<?php echo base_url('front_css'); ?>/social-icons/vk.png" alt="" style="width: 28px; height: 28px;"/>
                </a>
            <?php endif; ?>
            <?php if (!empty($settings->youtube_url)) : ?>
                <a href="<?php echo html_escape($settings->youtube_url); ?>" target="_blank" style="color: transparent;margin-right: 5px;">
                    <img src="<?php echo base_url('front_css'); ?>/social-icons/youtube.png" alt="" style="width: 28px; height: 28px;"/>
                </a>
            <?php endif; ?>
            <?php */ ?>
        </td>
    </tr>
</table>

<!-- START FOOTER -->
<div class="footer">
    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td class="content-block powered-by">
                <span class="apple-link"><?php echo $this->config->item('address'); ?></span><br>
                <?php echo $this->config->item('application_name'); ?>
            </td>
        </tr>
    </table>
</div>
<!-- END FOOTER -->

<!-- END CENTERED WHITE CONTAINER -->
</div>
</td>
<td>&nbsp;</td>
</tr>
</table>

<style>
    .wrapper table tr td img {
        height: auto !important;
    }

    .table-products {
        border-bottom: 1px solid #d1d1d1;
        padding-bottom: 30px;
        margin-top: 20px;
    }

    .table-products th, td {
        padding: 8px 5px;
    }

    .wrapper table tr td img {
        height: auto !important;
    }
</style>
</body>
</html>
