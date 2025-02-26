

<?php 
$title = 'Register';
include_once 'header.php';
?>
<form action="" method="post">
   <h1>Create Account</h1>
    <p>
        <label for="fullname">Fullname</label>
        <input type="text" name="fullname" id="fullname">
    </p>
    <p>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
    </p>
    <p>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </p>
    <button type="submit" name="submit">Create Account</button>
    <p>
        I have an account?
        <u>
            <a href="login.php">Login</a>
        </u>
    </p>
</form>
<?php 
include_once 'footer.php';
?>