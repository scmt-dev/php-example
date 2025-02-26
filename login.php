

<?php 
$title = 'Login';
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