<?php
// Include your database connection file
include_once('database.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Use a more secure method for password hashing

    // SQL query to insert data into the 'student' table
    $sql = "INSERT INTO users(id, username, email, password) VALUES ('$id', '$username', '$email', '$password')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign up form validation</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="CreatAccount.css" />
    <style>
        * {
    box-sizing: border-box;
}

body {
    background-color: #e3c41204;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    margin: 0;
}

.container {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    width: 400px;
    max-width: 100%;
    overflow: hidden;
    height: 100%;
}

.header {
    background-color: #f7f7f7;
    border-bottom: 1px solid #f0f0f0;
    padding: 20px 40px;
}

.header h2 {
    margin: 0;
}

.form {
    padding: 30px 40px;

}

.form-control {
    margin-bottom: 10px;
    padding-bottom: 20px;
    position: relative;
}

.form-control label {
    display: inline-block;
    margin-bottom: 5px;
}

.form-control input {
    border: 2px solid #f0f0f0;
    border-radius: 4px;
    display: block;
    font-size: 14px;
    width: 100%;
    padding: 10px;

}

.form-control i {
    position: absolute;
    top: 40px;
    right: 10px;
    visibility: hidden;
}

.form-control small {
    position: absolute;
    bottom: 0;
    left: 0;
    visibility: hidden;
}

.form button {
    background-color: #8e44fd;
    border: 2px solid #8e44fd;
    color: #fff;
    display: block;
    padding: 10px;
    width: 100%;
    font-size: 16px;
    border-radius: 4px;
}

.form-control.success input {
    border-color: #2ecc71;
}

.form-control.error input {
    border-color: #e74c3c;
}

.form-control.success i.fa-check-circle {
    visibility: visible;
    color: #2ecc71;

}

.form-control.error i.fa-exclamation-circle {
    visibility: visible;
    color: #e74c3c;

}

.form-control.error small {
    visibility: visible;
    color: #e74c3c;
}

    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>CREATE ACCOUNT</h2>
        </div>
        <form class="form" id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-control">
                <label>ID</label>
                <input type="text" placeholder="ID" name="id" required>
            </div>

            <div class="form-control">
                <label>Username</label>
                <input type="text" placeholder="Username" name="username" required>
            </div>

            <div class="form-control">
                <label>Email</label>
                <input type="email" placeholder="Abdl@gmail.com" name="email" required>
            </div>

            <div class="form-control">
                <label>Password</label>
                <input type="password" placeholder="Password" name="password" required>
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>
    <script src="CreatAccount.js"></script>
</body>

</html>
