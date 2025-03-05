

<?php 
session_start();
$title = 'Login';
$message = '';
// check if the form is submitted
if (isset($_POST['submit'])) {
    // get the form data
    $email = $_POST['email'];
    $password = $_POST['password'];
    // connect to the database
    include_once 'db.php';
    $QUERY = "SELECT * FROM users WHERE email = ?";
    $STMT = $db->prepare($QUERY);
    $STMT->bind_param('s', $email);
    $STMT->execute();
    $RESULT = $STMT->get_result();
    // check if the user exists
    if ($RESULT->num_rows > 0) {
        $USER = $RESULT->fetch_assoc();
        // check if the password is correct
        $isValid = password_verify($password, $USER['password']);
        if ($isValid) {
            // set the session variables
            $_SESSION['user_id'] = $USER['id'];
            $_SESSION['fullname'] = $USER['full_name'];
            // redirect to the home page
            header("Location: index.php");
        }else {
            $message = "Invalid password";
        }
    }else {
        $message = "User not found";
    }
}


include_once 'header.php';
?>
<form action="" method="post">
   <h1>Login your account</h1>
    <p>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
    </p>
    <p>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </p>

    <button type="submit" name="submit">Login</button>
    <div>
        <?php echo $message; ?>
    </div>
    <p>
        Don't have an account?
        <u>
            <a href="register.php"> Create account</a>
        </u>
    </p>
</form>
<?php 
include_once 'footer.php';
?>