<?php
include "database.php";

$message = "";

if (isset($_POST['register'])) {
    $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($check) > 0) {
        $message = "Username already exists";
    } else {
        $insert = mysqli_query($conn, "INSERT INTO users (fullName, username, password) VALUES ('$fullName', '$username', '$password')");
        if ($insert) {
            header("Location: login.php");
        } else {
            $message = "Registration failed";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register</title>
<link rel="stylesheet" href="style.css">

<style>
    * {
  box-sizing: border-box;
  font-family: Arial, sans-serif;
}

body {
  background: #f6f1ef;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.container {
  width: 100%;
  max-width: 400px;
}

.card {
  background: #fff;
  padding: 30px;
  border-radius: 8px;
  box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

h2 {
  margin-bottom: 20px;
}

input {
  width: 100%;
  padding: 12px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-size: 14px;
}

button {
  width: 100%;
  padding: 12px;
  border: none;
  background: #e5e7eb;
  font-size: 16px;
  border-radius: 6px;
  cursor: pointer;
}

button:hover {
  background: #d1d5db;
}

.error {
  color: #dc2626;
  margin-bottom: 10px;
}

.link {
  margin-top: 15px;
  font-size: 14px;
}

.link a {
  color: #2563eb;
  text-decoration: none;
  font-weight: 500;
}

.link a:hover {
  color: #1d4ed8;
  text-decoration: underline;
}

.password-wrapper {
  position: relative;
}

.password-wrapper input {
  width: 100%;
  padding-right: 40px;
}

.toggle-password {
  position: absolute;
  right: 12px;
  top: 35%;
  transform: translateY(-50%);
  cursor: pointer;
  font-size: 18px;
  opacity: 0.6;
}

.toggle-password:hover {
  opacity: 1;
}


</style>
</head>
<body>

<div class="container">
  <div class="card">
    <h2>Daftar sebagai admin</h2>

    <?php if ($message): ?>
      <p class="error"><?= $message ?></p>
    <?php endif; ?>

    <form method="POST">
    <input type="text" name="fullName" placeholder="Nama lengkap" required>

    <input type="text" name="username" placeholder="Username" required>

    <div class="password-wrapper">
    <input type="password" id="password" name="password" placeholder="Password" required>
    <span class="toggle-password" onclick="togglePassword()">
&#128065;
    </span>
    </div>


      <button type="submit" name="register">Daftar</button>
    <p class="link">
      Sudah punya akun?
      <a href="login.php">Login disini</a>
    </p>
</div>
        <script>
            function togglePassword() {
                const pass = document.getElementById("password");
                if (pass.type === "password") {
                    pass.type = "text";
                } else {
                    pass.type = "password";
                }
            }
        </script>
    </form>


  </div>
</div>

</body>
</html>
