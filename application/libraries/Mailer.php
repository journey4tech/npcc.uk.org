<?php
class Mailer 
{
	function __construct()
	{
		$this->CI =& get_instance();
	}
	//=============================================================
	function registration_email($username, $email_verification_link)
	{
    $login_link = base_url('auth/login');  

		$tpl = '<h3>Hi ' .strtoupper($username).'</h3>
            <p>Welcome to Onjob!</p>
            <p>Active your account with the link above and start your Career :</p>  
            <p>'.$email_verification_link.'</p>

            <br>
            <br>

            <p>Regards, <br> 
               Onjob Team <br> 
            </p>
    ';
		return $tpl;		
	}

        function pwd_reset_link_j4t($username, $reset_link)
    {
$tpl = '<h3>Hi ' .strtoupper($username).'</h3>


            <table bgcolor="#F4F3F4" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
        <tr>
            <td style="padding:15px;">
                <center>
                    <table bgcolor="#ffffff" cellpadding="0" cellspacing="0" width="550">
                        <tbody>
                            <tr>
                                <td align="left">
                                    <div style="border:solid 1px #d9d9d9;">
                                        <table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" id="header" style="line-height:1.6;font-size:12px;font-family: Helvetica, Arial, sans-serif;border:solid 1px #FFFFFF;color:#444;" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td colspan="2" height="30" style="color: #ffffff;" valign="bottom">
                                                        .</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-right: 30px; text-align: center;" valign="baseline">
                                                        <span style="font-size:14px;color:#777777"><a href="[SITE_URL]" style="text-decoration:none;" target="_blank"><img src="'.$this->config->item('logo').'" /></a></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" id="content" style="margin-top:15px;margin-right:30px; margin-left:30px;color:#444;line-height:1.6;font-size:12px;font-family: Arial, sans-serif;color: #444;" width="490">
                                            <tbody>
                                                <tr>
                                                    <td colspan="2" style="border-top: solid 1px #d9d9d9">
                                                        <div style="padding:15px 0;">
                                                            Hey !<br />
                                                            <strong>'.strtoupper($username).'</strong><br />
                                                            <div id="cke_pastebin">
                                                                Please click on the link below to reset your password.</div>
                                                            <div id="cke_pastebin">
                                                                <span style="line-height: 1.6;">'.$reset_link.'</span></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" id="footer" style="line-height:1.5;font-size:12px;font-family: Arial, sans-serif;margin-right:30px;margin-left:30px;" width="490">
                                            <tbody>
                                                <tr style="font-size:11px;color:#999999;">
                                                    <td colspan="2" style="border-top: solid 1px #d9d9d9;">
                                                        <div style="padding-top:15px; padding-bottom:1px;">
                                                            Email Sent <strong>[CURRENT_DATE]</strong></div>
                                                        <div>
                                                            For any requests, please contact <a href="mailto:no-reply@classfied.com"><strong>no-reply@classfied.com</strong></a></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" height="15" style="color: #ffffff;">
                                                        .</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </center>
            </td>
        </tr>
    </tbody>
</table>
<p>
    &nbsp;</p>
';
        return $tpl;
    }

	//=============================================================
	function pwd_reset_link($username, $reset_link)
	{
		$tpl = '<h3>Hi ' .strtoupper($username).'</h3>
          <p>Welcome to Classified!</p>
            <p>We have received a request to reset your password. If you did not initiate this request, you can simply ignore this message and no action will be taken.</p> 
            <p>To reset your password, please click the link below:</p> 
            
              <p>'.$reset_link.'</p>

            <br>
            <br>

          <p>© 2019 classified - All rights reserved</p>
    ';
		return $tpl;		
  }
  // line 110 add this -<img src="'.$logo.'" />
  	//=============================================================
	function email_verification($username, $acivation_link)
	{
		$tpl = '<h3>Hi ' .strtoupper($username).'</h3>
            <p>Welcome to Classified!</p>
            <p>We have received a request verify your email. If you did not initiate this request, you can simply ignore this message and no action will be taken.</p> 
            <p>To reset your password, please click the link below:</p> 
            <p>'.$acivation_link.'</p>

            <br>
            <br>

            <p>© 2019 classified - All rights reserved</p>
    ';
		return $tpl;		
	}

  
  
  

}
?>