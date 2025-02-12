<?php
    $message = "";
    # Check if the form is submitted
    if (isset($_POST['submit'])) {
        include_once "db.php";
        // Get the form data from the $_POST array
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        // Check if the name field is empty
        if(!$name) {
            $message = "Please enter your name";
        }
        if(!$email) {
            $message = "Please enter your email";
        }
        if(!$password) {
            $message = "Please enter your password";
        }

        if($name && $email && $password) {
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = $db->query($sql);
            if($result->num_rows > 0) {
                $message = "Email already exists";
            } else {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO users (full_name, email, password) VALUES ('$name', '$email', '$password')";
                if($db->query($sql) === TRUE) {
                    $message = "Registration successful";
                } else {
                    $message = "Error: " . $sql . "<br>" . $db->error;
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Kupa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 md:flex md:items-center md:justify-center min-h-screen">
    <div class="md:bg-white p-6 rounded-lg md:shadow-md md:max-w-md w-full">
        <!-- Back Arrow Icon -->
        <div class="flex items-center mb-4">
            <button class="text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
        </div>

        <!-- Sign Up Heading -->
        <h1 class="text-2xl font-bold mb-2">Sign Up</h1>
        <p class="text-gray-500 mb-6">Create account and choose favorite menu</p>

        <!-- Form -->
        <form action="signup.php" method="post">
            <!-- Name Input -->
            <div class="mb-4">
                <label for="name" class="block text-left text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" placeholder="Your name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
            </div>

            <!-- Email Input -->
            <div class="mb-4">
                <label for="email" class="block text-left text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" placeholder="Your email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
            </div>

            <!-- Password Input -->
            <div class="mb-4">
                <label for="password" class="block text-left text-sm font-medium text-gray-700">Password</label>
                <div class="relative">
                    <input type="password" id="password" name="password" placeholder="Your password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    <button type="button" class="absolute inset-y-0 right-3 flex items-center text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" width="32" height="32" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M2.036 12.322a1 1 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178c.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178"/><path d="M15 12a3 3 0 1 1-6 0a3 3 0 0 1 6 0"/></g></svg>
                    </button>
                </div>
            </div>

            <!-- Register Button -->
            <button type="submit" name="submit" value="submit" class="w-full bg-green-600 text-white py-2 rounded-md mb-4 font-semibold">Register</button>

            <?php
                echo $message;
             ?>

            <!-- Sign In Option -->
            <p class="text-center text-gray-500 text-sm">Have an account? <a href="signin.html" class="text-green-600 font-semibold">Sign In</a></p>

            <!-- Terms and Data Policy -->
            <p class="text-center text-gray-400 text-sm mt-4">By clicking Register, you agree to our <a href="#" class="text-green-600">Terms and Data Policy.</a></p>
        </form>
    </div>
</body>
</html>