<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login • FarnexChat</title>

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
    font-family:'Segoe UI',sans-serif;
    overflow:hidden;
}

body::before{
    content:'';
    position:absolute;
    width:400px;
    height:400px;
    background:#C395FF30;
    border-radius:50%;
    top:-100px;
    right:-100px;
    filter:blur(80px);
}

body::after{
    content:'';
    position:absolute;
    width:350px;
    height:350px;
    background:#A96EFF25;
    border-radius:50%;
    bottom:-100px;
    left:-100px;
    filter:blur(80px);
}

.login-card{
    width:420px;
    background:rgba(255,255,255,0.95);
    backdrop-filter:blur(20px);
    border-radius:30px;
    padding:45px;
    box-shadow:0 15px 40px rgba(124,58,237,0.15);
    position:relative;
    z-index:2;
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

.btn-login{
    background:linear-gradient(135deg,var(--primary),var(--primary-dark));
    color:white;
    border:none;
    border-radius:15px;
    height:55px;
    font-weight:600;
}

.btn-login:hover{
    color:white;
    transform:translateY(-3px);
}

.social-btn{
    border:2px solid #eee;
    border-radius:15px;
    padding:12px;
    text-decoration:none;
    color:#555;
    transition:.3s;
}

.social-btn:hover{
    border-color:var(--primary);
    color:var(--primary);
}
</style>

</head>
<body>

<div class="login-card">

    <div class="text-center mb-4">
        <div class="logo">
            <i class="bi bi-chat-heart-fill"></i> FarnexChat
        </div>

        <h3 class="mt-3 fw-bold">Welcome Back!</h3>
        <p class="text-muted">
            Login to continue chatting with your college friends.
        </p>
    </div>

    <form action="" method="POST">

        <div class="mb-3">
            <label class="form-label">Email Address</label>

            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-envelope-fill"></i>
                </span>

                <input type="email"
                       class="form-control"
                       placeholder="Enter your email"
                       name="email"
                       required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>

            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-lock-fill"></i>
                </span>

                <input type="password"
                       class="form-control"
                       placeholder="Enter your password"
                       name="password"
                       required>
            </div>
        </div>

        <div class="d-flex justify-content-between mb-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox">
                <label class="form-check-label">
                    Remember Me
                </label>
            </div>

            <a href="#" class="text-decoration-none">
                Forgot Password?
            </a>
        </div>

        <button class="btn btn-login w-100">
            <i class="bi bi-box-arrow-in-right"></i>
            Login
        </button>

    </form>

    

    <p class="text-center mt-4">
        Don't have an account?
        <a href="register.php"
           class="fw-bold text-decoration-none">
            Register
        </a>
    </p>

</div>

</body>
</html>