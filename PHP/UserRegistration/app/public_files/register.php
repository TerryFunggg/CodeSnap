<?php

include '../Model/User.php';
include '../Library/common.php';
include '../Library/functions.php';

session_start();
header('Cache-control: private');
ob_start();
?>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <table>
        <tr>
            <td><label for="username">Username</label> </td>
            <td><input type="text" name="username" id="username"
                       value="<?php if(isset($_POST['username'])){
                           echo $_POST['username'];} ?>"/></td>
        </tr>
        <tr>
            <td><label for="password">Password</label> </td>
            <td><input type="password" name="password" id="password" value=""/></td>
        </tr>
        <tr>
            <td><label for="password2">Password Again</label> </td>
            <td><input type="password" name="password2" id="password2" value=""/></td>
        </tr>
        <tr>
            <td><label for="email">Email</label> </td>
            <td><input type="text" name="email" id="email"
                       value="<?php
                                if(isset($_POST['email'])){
                                    echo $_POST['email'];}?>"/></td>
        </tr>
        <tr>
            <td><label for="captcha">Verify</label> </td>
            <td>Enter text seen in this image <br/ >
                <img src="img/captcha.php?nocache=<?php echo time(); ?>" alt=""/><br>
                <input type="text" name="captcha" id="captcha"/></td>
        </tr>
        <tr>
            <td><input type="hidden" name="submitted" id="submitted" value="1" ></td>
            <td><input type="submit" value="Sign Up"/></td>
        </tr>
    </table>
</form>
<?php
$form = ob_get_clean();

// show the form if this is the first time the page is viewed
if(!isset($_POST['submitted']))
{
    //header("Content-Type:multipart/form-data");
    $GLOBALS['TEMPLATE']['content'] = $form;
}
else { //else process incoming data
    $password1 = (isset($_POST['password'])) ? $_POST['password'] : '';
    $password2 = (isset($_POST['password2'])) ? $_POST['password2'] :'';
    $password = ($password1 && $password1 == $password2) ? sha1($password1) : '';

    // validate CAPTCHA
    // check form input captcha is equal to session captcha return boolean.
    $captcha = (isset($_POST['captcha']) &&
        strtoupper($_POST['captcha']) == $_SESSION['captcha']);

    // check the user name,email,password,captcha are validate
    if (User::validateUsername($_POST['username']) && $password
            && User::validateEmailAddress($_POST['email']) && $captcha)
    {
        $user = User::getByUsername($_POST['username']);
        // check the name already exist or not, if true, user should input other user name
        if ($user->user_id){
            $GLOBALS['TEMPLATE']['content'] = '<p><strong>Sorry the account already exits.</strong></p>';
            $GLOBALS['TEMPLATE']['content'] .= $form;
        }else{
            // create an inactive user record
            $user = new User();
            $user->username = $_POST['username'];
            $user->password = $password;
            $user->email_addr = $_POST['email'];
            $token = $user->setInactive();
            // email message
            $message = 'Thank you for signing up for an account!'
                .'before you can login you need to verify your account.'
                .'You can do so by visiting http://www.example.com/verify.php?'
                ."uid=$user->user_id&token=$token.";

            if(@mail($user->email_addr, 'Active your new account',$message))
            {
                $headers = array('MIME-Version: 1.0','Content-Type: text/html; charset="iso-8859-1"');
                $GLOBALS['TEMPLATE']['content'] = '<p><strong>Thank you for registering</strong></p>'
                    .'<p>You will be receiving an email shortly with instructions on activating your account</p>';
            }else{
                $GLOBALS['TEMPLATE']['content'] = '<p><strong>There was an error sending email</strong></p>';
            }
        }
    }else{ // if those data is invalid
        $GLOBALS['TEMPLATE']['content'] .= "<p><strong>You provide some invalid data.</strong></p>";
        $GLOBALS['TEMPLATE']['content'] .= $form;
    }
}

include '../templates/template-page.php';



