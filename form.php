<?php
include 'top.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dataIsGood = false;
$message = '';
$firstname ='';
$lastname = '';
$email = '';
$knitter = 'Yes! Definitely';
$Stitches = false;
$History = false;
$Patterns = false;
$Nothing = false;

function getData($field) {
    if (!isset($_POST[$field])) {
        $data = "";
    } else {
        $data = trim($_POST[$field]);
        $data = htmlspecialchars($data);
    }
    return $data;
}

function verifyAlphaNum($testString) {
    // Check for letters, numbers and dash, period, space and single quote only.
    // added & ; and # as a single quote sanitized with html entities will have 
    // this in it bob's will be come bob's
    return (preg_match ("/^([[:alnum:]]|-|\.| |\'|&|;|#)+$/", $testString));
}

?>
<main class="straight">
    <h2>Knitting Knewsletter</h2>
    <section class = "box-1">
        <h3>would you like to sign up?</h3>
        <p>if you are potentially interested in signing up for our knitting newsletter, please fill out the form below!</p>
        <?php
        if($_SERVER["REQUEST_METHOD"] == 'POST'){
            //sanitizing data
            $firstname = getData('txtFirstName');
            $lastname = getData('txtLastName');
            $email = getData('txtEmail');

            $knitter = getData('radKnitter');

            $Stitches = (int) getData('chkStitches');
            $Patterns = (int) getData('chkPatterns');
            $History = (int) getData('chkHistory');
            $Nothing = (int) getData('chkNothing');

            //validate it
            $dataIsGood = true;
            if ($firstname == ''){
                print '<p class = "mistake">Please type in your first name.</p>';
                $dataIsGood = false;
            }

            if ($lastname == ''){
                print '<p class = "mistake">Please type in your last name.</p>';
                $dataIsGood = false;
            }

            if ($email == ''){
                print '<p class = "mistake">Please type in your email address.</p>';
                $dataIsGood = false;
            } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                print '<p class = "mistake">Your email address contains invalid characters.</p>';
                $dataIsGood = false;
            }

            if ($knitter != "Yes! Definitely" AND $knitter != "I like it I guess" AND $knitter != "Nah"){
                print '<p class = "mistake">Please tell us how much you enjoy knitting.</p>';
                $dataIsGood = false;
            }

            $totalChecked = 0;

            if($Stitches != 1) $Stitches = 0;
            $totalChecked += $Stitches;

            if($Patterns != 1) $Patterns = 0;
            $totalChecked += $Patterns;

            if($History != 1) $History = 0;
            $totalChecked += $History;

            if($Nothing != 1) $Nothing = 0;
            $totalChecked += $Nothing;

            if ($totalChecked==0){
                print '<p class="mistake">please chooce one checkbox to describe you. </p>';
                $dataIsGood = false;
            }

            //save the data!
            if ($dataIsGood){
                try{
                    $sql = 'INSERT INTO tblKnittingForm (fldFirstName, fldLastName, fldEmail, fldKnitter, fldStitches, fldPatterns, fldHistory, fldNothing) VALUES (?,?,?,?,?,?,?,?)';
                    $statement = $pdo->prepare($sql);
                    $data = array($firstname, $lastname, $email, $knitter, $Stitches, $Patterns, $History, $Nothing);
                    
                    if ($statement->execute($data)){
                        $message = '<h3>Thanks a Bunch!!!!!</h3>';
                        $message .='<p>You are now signed up for our Knitting Knewsletter.</p>';
                       
                        //mail user filling out form
                        $to = $email;
                        $from = 'Kickin Knit Team <adanilov@uvm.edu>';
                        $subject = 'Knitting Knewsletter SignUp Confirmation';

                        $mailMessage = '<html><body style="font-family: comic sans ms, cursive; color: purple;">';
                        $mailMessage .= '<h1>Thank you for signing up for the Knitting Knewsletter!</h2>';
                        $mailMessage .= '<p>Please expect some exciting stuff to start popping into your inbox from us!</p>';
                        $mailMessage .= '</body></html>';

                        $headers = "MIME-Version: 1.0\r\n";
                        $headers .= "Content-type: text/html; charset=utf-8\r\n";
                        $headers .= "From: " .$from . "\r\n";

                        $mailSent = mail($to, $subject, $mailMessage, $headers);

                        if ($mailSent) {
                            print "<p>Please expect something from us in your email shortly!</p>";
                        }
                    } else {
                        $message = '<p>Sign up not completed.</p>';
                    }
                } catch (PDOException $e){
                    $message = '<p>Sign up could not be completed, please contact the creators and we can get you all sorted!</p>';
                }
            } //data is good
        } //end submitting
        ?>
    </section>
    <section class="box-2">
        <h3 class="center">form</h3>
        <form action="#" id="frmKnitting" method="post">
            <fieldset class="contact">
                <legend>Contact</legend>
                <p>
                    <label class="required" for="txtFirstName">first name</label>
                    <input id="txtFirstName" maxlength="30" name="txtFirstName" onfocus="this.select()"
                    tabindex="305" type="text" value="<?php print $firstname;?>" required>
                </p>
                <p>
                    <label class="required" for="txtLastName">last name</label>
                    <input id="txtLastName" maxlength="30" name="txtLastName" onfocus="this.select()"
                    tabindex="310" type="text" value="<?php print $lastname;?>" required>
                </p>
                <p>
                    <label class="required" for="txtEmail">Email</label>
                    <input id="txtEmail" maxlength="30" name="txtEmail" onfocus="this.select()" 
                    tabindex="320" type="email" value="<?php print $email;?>" required>
                </p>
            </fieldset>
            <fieldset class="radio">
                <legend>Are you passionate about knitting?</legend>
                <p>
                    <input type = "radio" id="radKnitterYes" name="radKnitter" value="Yes! Definitely" tabindex="410" required <?php
                    if($knitter == "Yes! Definitely") print 'checked'; ?>>
                    <label class="radio-field" for="radKnitterYes">Yes! Definitely</label>
                </p>
                <p>
                    <input type="radio" id="radKnitterMaybe" name="radKnitter" value="I like it I guess" tabindex="430" required <?php
                    if($knitter == "I like it I guess") print 'checked'; ?>>
                    <label class="radio-field" for="radKnitterMaybe">I like it </label>
                </p>
                <p>
                    <input type="radio" id="radKnitterNah" name="radKnitter" value="Nah" tabindex="440" required <?php
                    if($knitter == "Nah") print 'checked'; ?>>
                    <label class="radio-field" for="radKnitterNah">Nah</label>
                </p>
            </fieldset>

            <fieldset class="checkbox">
                <legend>What are you interested in learning about knitting?</legend>
                <p>
                    <input id="chkStitches" name="chkStitches" tabindex="510" type="checkbox" value="1" <?php
                    if($Stitches) print 'checked';?>><label for="chkStitches">Stitches</label>
                </p>
                <p>
                    <input id="chkPatterns" name="chkPatterns" tabindex="520" type="checkbox" value="1" <?php
                    if($Patterns) print 'checked';?>><label for="chkPatterns">Patterns</label>
                </p>
                <p>
                    <input id="chkHistory" name="chkHistory" tabindex="530" type="checkbox" value="1" <?php
                    if($History) print 'checked';?>><label for="chkHistory">History</label>
                </p>
                <p>
                    <input id="chkNothing" name="chkNothing" tabindex="540" type="checkbox" value="1" <?php
                    if($Nothing) print 'checked';?>><label for="chkNothing">Nothing honestly</label>
                </p>
            </fieldset>
            <fieldset class="buttons">
                <input id="btnSubmit" name="btnSubmit" tabindex="900" type="submit" value="Sign Up">
            </fieldset>
        </form>
    </section>
    <section class="box-3 center">
        <h3>Did the form work?</h3>
        <?php
        print '<p>' . $message . '</p>';
        ?>
    </section>
</main>
<?php
include 'footer.php';
?>