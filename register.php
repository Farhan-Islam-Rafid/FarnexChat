<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $student_id = $_POST['student_id'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // password match check
    if ($password !== $confirm_password) {
        die("❌ Passwords do not match!");
    }

    // hash password (security)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // prepare SQL
    $stmt = $conn->prepare("INSERT INTO users (name, email, student_id, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $student_id, $hashed_password);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful!'); window.location='login.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>







<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register • FarnexChat</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

<style>
:root{
    --primary:#C395FF;
    --primary-dark:#A96EFF;
}

body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#fdfcff,#f3ecff);
    padding:30px 0;
    font-family:'Segoe UI',sans-serif;
}

.register-card{
    width:500px;
    background:rgba(255,255,255,0.95);
    backdrop-filter:blur(20px);
    border-radius:30px;
    padding:40px;
    box-shadow:0 15px 40px rgba(124,58,237,0.15);
}

.logo{
    font-size:2rem;
    font-weight:800;
    color:var(--primary);
}

.form-control{
    height:55px;
    border-radius:15px;
    border:2px solid #eee;
}

.form-control:focus{
    border-color:var(--primary);
    box-shadow:0 0 0 0.25rem rgba(195,149,255,.25);
}

.btn-register{
    background:linear-gradient(135deg,var(--primary),var(--primary-dark));
    color:white;
    border:none;
    border-radius:15px;
    height:55px;
    font-weight:600;
}

.btn-register:hover{
    color:white;
    transform:translateY(-3px);
}
</style>

</head>
<body>

<div class="register-card">

    <div class="text-center mb-4">

        <div class="logo">
            <i class="bi bi-chat-heart-fill"></i> FarnexChat
        </div>

        <h3 class="mt-3 fw-bold">
            Create Account
        </h3>

        <p class="text-muted">
            Join your college community today.
        </p>

    </div>

    <form action="" method="POST">

        <div class="mb-3">
            <label class="form-label">
                Full Name
            </label>

            <input type="text"
                   class="form-control"
                   placeholder="Enter full name"
                   name="name"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">
                 Email
            </label>

            <input type="email"
                   class="form-control"
                   placeholder="example@college.edu"
                   name="email"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">
                Student ID
            </label>

            <input type="text"
                   class="form-control"
                   placeholder="Student ID"
                   name="student_id"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">
                Password
            </label>

            <input type="password"
                   class="form-control"
                   placeholder="Create password"
                   name="password"
                   required>
        </div>

        <div class="mb-4">
            <label class="form-label">
                Confirm Password
            </label>

            <input type="password"
                   class="form-control"
                   placeholder="Confirm password"
                   name="confirm_password"
                   required>
        </div>

        <div class="form-check mb-4">

            <input class="form-check-input"
                   type="checkbox"
                   required>

            <label class="form-check-label">
                I agree to the Terms &
                Privacy Policy
            </label>

        </div>

        <button class="btn btn-register w-100">

            <i class="bi bi-person-plus-fill"></i>

            Create Account

        </button>

    </form>

    <p class="text-center mt-4">

        Already have an account?

        <a href="login.php"
           class="fw-bold text-decoration-none">

            Login

        </a>

    </p>

</div>

</body>
</html>