<?php 
function show_post_category_list($postId, $taxonomy){

    $terms = wp_get_post_terms($postId, $taxonomy);
    if ($terms) {
        $output = array();
        foreach ($terms as $term) {
            $output[] = $term->name;
        }
        return implode( ', ', $output );
    }
    else
    {
        return false;
    }
}

function back_url_link()
{
    $backUrl = htmlspecialchars($_SERVER['HTTP_REFERER']);

    return $backUrl;
}

function is_user_login_check()
{
    if( is_user_logged_in() ) { 
    }
    else
    {
        wp_redirect( home_url() );
        die;
    }
}

function emailTemplate($emailArray)
{
    $template = ''; $bodyTitle = ''; $subject = '';

    $emailType = $emailArray['emailType'];

    // template or email
    if(isset($emailArray['emailReturnType'])){ $emailReturnType = $emailArray['emailReturnType']; }else{$emailReturnType = 'email';}

    // admin or user or user_admin
    if(isset($emailArray['emailUserType'])){ $emailUserType = $emailArray['emailUserType']; }else{$emailUserType = 'user_admin';}
    if($emailUserType == 'user_admin'){ $sendUser = true; $sendAdmin = true; }
    else if($emailUserType == 'user'){ $sendUser = true; $sendAdmin = false; }
    else if($emailUserType == 'user'){ $sendUser = false; $sendAdmin = true; }

    if(isset($emailArray['toName'])){ $toName = $emailArray['toName']; }else{$toName = '';}

    if(isset($emailArray['emailData'])){ $emailData = $emailArray['emailData']; }else{$emailData = '';}

    switch ($emailType) {
        case 'newRegistration':
            if($sendUser === true)
            {
                $bodyTitle = 'WELCOME ONBOARD!';
                $subject = 'Welcome to Grantspass';
                $toEmail = $emailArray['toEmail'];
                $emailContent = '
                    <p>Hi '.$toName.' </p>

                    <p>Thanks for Subscribing and Welcome to Grantspass.com. We are very happy to have you as a Member of the Group. </p>

                    <p>Once you register, you would have automatically been able to Login. You can Edit your Profile Details and well as See all your Activity by Clicking on My Account Section in the Nav Menu under your First Name. </p>

                    <p>The Grantspass team endeavours to keep the site upto date with the latest happenings in Grantspass as well as the noteworthy news in the Entire Country. You can also contribute to our Blog as we encourage Guests to share any items they want to see on the site. This can be accessed via the Blog section on the Site. </p>

                    <p> From weather to sports, we bring all happenings in Grantspass to you. </p>

                    <p>Once again,welcome to the Grantspass.com Community. </p>

                    <p>Best, <br>
                    Gene
                    </p>
                ';
            }
            if($sendAdmin === true)
            {
                $adminBodyTitle = 'NEW REGISTRATION';
                $adminSubject = 'GrantsPass : New User Registration';
                $adminEmailContent = '
                    <p>You have a Registration Signed up to your Website. More details as below. </p>

                    <p>
                    First Name: '.$emailData['newreg_fname'].'<br>
                    Last Name: '.$emailData['newreg_lname'].' <br>
                    Email ID: '.$emailData['newreg_email'].' <br>
                    </p>

                    <p>Note: This is an Auto-Generated Email. Please do not reply. </p>
                ';
            }
            break;
        
        default:
            // code...
            break;
    }

    if($emailReturnType == 'email')
    {
        if($sendUser === true)
        {
            $to = $toEmail;
            $subject = $subject;
            $body = emailTemplateStructure($emailContent, $bodyTitle);
            
            wp_mail( $to, $subject, $body );
        }
        if($sendAdmin === true)
        {
            $to = ADMIN_EMAIL; //'noreply@grantspass.com';
            $subject = $adminSubject;
            $body = emailTemplateStructure($adminEmailContent, $adminBodyTitle);
            
            wp_mail( $to, $subject, $body );
        }         
    }
    else
    {
        return $template;
    }
}

function emailTemplateStructure($emailContent, $bodyTitle)
{
    $template = '';

    $template .='<div style="text-align:center; width:95%; margin: auto; font-family: Roboto, sans-serif; background-image: url('.THEME_URL.'assets/emial-images/bg.png); background-color: #263969; background-repeat: no-repeat; background-size: cover; padding-bottom: 100px; background-position: top center;">
        <table width="600" border="0" cellpadding="0" cellspacing="0" style="margin: auto; min-height: 200px; text-align:center; padding: 25px 0px 0px;">
            <tr>
                <td style="padding:15px 25px 35px 25px;">
                    <a href="#"><img src="'.THEME_URL.'assets/emial-images/logo.png"></a>
                </td>
            </tr>
            <tr>
                <td style="color:#fff; font-size:30px; font-weight:700; padding:15px 25px; background-image: url'.THEME_URL.'assets/emial-images/image.png); height: 196px; box-sizing: border-box; position: relative;">
                    <h2 style="padding:0px; margin:0px;"> '.$bodyTitle.' </h2>
                </td>
            </tr>
            <tr>
                <td align="left" style="padding:10px 25px 25px; background: #fff; border-radius: 0px 0px 15px 15px">
                    <div style="color:#454C53; font-size:16px; line-height: 150%;">
                    '.$emailContent.'
                    <div>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style="border:1px solid #1181DF; padding:20px 20px; margin: 20px; border-radius: 15px;">
                    <table border="0" width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                        <td width="40%" style="text-align: center;">
                            <img src="'.THEME_URL.'assets/emial-images/logo.png">
                        </td>
                        <td align="center">
                            <p style="color: #e2e5ea; font-size: 12px; letter-spacing: 10px;">FOLLOW US</p>
                            <a style="padding:0px 5px;" href="#"><img src="'.THEME_URL.'assets/emial-images/fcebook.png"></a>
                            <a style="padding:0px 5px;" href="#"><img src="'.THEME_URL.'assets/emial-images/linkedin.png"></a>
                            <a style="padding:0px 5px;" href="#"><img src="'.THEME_URL.'assets/emial-images/twitter.png"></a>
                            <a style="padding:0px 5px;" href="#"><img src="'.THEME_URL.'assets/emial-images/youtube.png"></a>
                        </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    ';

    return $template;
}

// function banner_slider(){
//     $args = array(
//             'post_type'  => 'banner_slider',
//             'numberposts' => -1,
//             'post_status' => 'publish',
//             'orderby' => 'ASC',
//             'order'     => 'ASC',
//             'posts_per_page' => 1,
//     );
//     $postslist = get_posts( $args );
//     wp_reset_postdata();

//     return $postslist;
// }
?>