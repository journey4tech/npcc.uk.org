<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('email/_header', ['title' => "Reset Password"]); ?>
    <!-- START CENTERED WHITE CONTAINER -->
    <table role="presentation" class="main">
        <!-- START MAIN CONTENT AREA -->
        <tr>
            <td class="wrapper">
                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            <h1 style="text-decoration: none; font-size: 24px;line-height: 28px;font-weight: bold">Reset Password</h1>
                            <div class="mailcontent" style="line-height: 26px;font-size: 14px;">
                                <p style='text-align: center'>
                                  Please click on the button below to reset your password.<br>
                                </p>
                                <p style='text-align: center;margin-top: 30px;'>
                                    <a href="<?php echo base_url(); ?>reset-password?token=<?php echo $token; ?>" style='font-size: 14px;text-decoration: none;padding: 14px 40px;background-color: #09b1ba;color: #ffffff !important; border-radius: 3px;'>
                                       Reset Password
                                    </a>
                                </p>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <!-- END MAIN CONTENT AREA -->
    </table>
<?php $this->load->view('email/_footer'); ?>