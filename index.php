
<?php
session_start();

?>





<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FarnexChat - College Chat Platform</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">


<style>
  :root {
    --primary: #C395FF;
    --primary-dark: #a96eff;
    --primary-deeper: #7c3aed;
    --light-bg: #f9f7ff;
    --white: #ffffff;
    --text-dark: #1e1b2e;
    --gray: #6c757d;
    --footer-bg: #12062a;
    --footer-surface: #1a0d38;
    --footer-border: #2e1760;
    --footer-muted: #9b8cba;
  }
  * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
  body { background: linear-gradient(135deg, #fdfcff 0%, #f3ecff 100%); overflow-x: hidden; }

  .navbar {
    background: rgba(255,255,255,0.95);
    backdrop-filter: blur(20px);
    box-shadow: 0 2px 24px rgba(124,58,237,0.08);
  }
  .navbar-brand { font-size: 1.7rem; font-weight: 800; color: var(--primary) !important; }

  .nav-link {
    color: #3d2d60 !important;
    font-weight: 500;
    font-size: 0.92rem;
    padding: 6px 14px !important;
    border-radius: 8px;
    transition: 0.2s;
  }
  .nav-link:hover { color: var(--primary-dark) !important; background: rgba(195,149,255,0.1); }
  .nav-link.active { color: var(--primary-dark) !important; background: rgba(195,149,255,0.12); }

  .nav-btn-login {
    background: linear-gradient(135deg, #c395ff, #a96eff);
    color: white !important;
    padding: 7px 20px !important;
    border-radius: 10px;
    font-weight: 600 !important;
    font-size: 0.88rem !important;
    box-shadow: 0 4px 14px rgba(169,110,255,0.3);
    transition: 0.25s;
  }
  .nav-btn-login:hover { background: linear-gradient(135deg, #a96eff, #7c3aed) !important; transform: translateY(-2px); box-shadow: 0 6px 18px rgba(124,58,237,0.35) !important; }

  .nav-btn-register {
    border: 1.5px solid var(--primary) !important;
    color: var(--primary-dark) !important;
    padding: 7px 20px !important;
    border-radius: 10px;
    font-weight: 600 !important;
    font-size: 0.88rem !important;
    background: transparent !important;
    transition: 0.25s;
  }
  .nav-btn-register:hover { background: rgba(195,149,255,0.12) !important; transform: translateY(-2px); }

  .navbar-toggler { border-color: rgba(195,149,255,0.4); }
  .navbar-toggler-icon { filter: invert(0.4) sepia(1) saturate(5) hue-rotate(240deg); }

  .hero {
    min-height: 100vh;
    display: flex;
    align-items: center;
    position: relative;
    overflow: hidden;
  }
  .hero::before {
    content: '';
    position: absolute; top: -120px; right: -120px;
    width: 520px; height: 520px;
    background: radial-gradient(circle, #c395ff55, transparent 70%);
    border-radius: 50%;
  }
  .hero::after {
    content: '';
    position: absolute; bottom: -120px; left: -120px;
    width: 420px; height: 420px;
    background: radial-gradient(circle, #a96eff33, transparent 70%);
    border-radius: 50%;
  }
  .hero-content { position: relative; z-index: 2; }

  .badge-custom {
    display: inline-block;
    background: linear-gradient(135deg, rgba(195,149,255,0.18), rgba(169,110,255,0.12));
    color: var(--primary-dark);
    padding: 10px 24px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.95rem;
    border: 1px solid rgba(195,149,255,0.3);
    letter-spacing: 0.3px;
  }
  .hero-title { font-size: 3.8rem; font-weight: 800; color: var(--text-dark); margin: 22px 0 18px; line-height: 1.15; }
  .hero-title span { color: var(--primary); }
  .hero-text { color: var(--gray); font-size: 1.15rem; max-width: 620px; margin: auto; line-height: 1.75; }

  .btn-login {
    background: linear-gradient(135deg, #c395ff, #a96eff);
    color: white; border: none;
    padding: 14px 34px; border-radius: 14px;
    font-weight: 600; font-size: 0.97rem;
    transition: 0.3s;
    box-shadow: 0 8px 28px rgba(169,110,255,0.35);
  }
  .btn-login:hover { background: linear-gradient(135deg, #a96eff, #7c3aed); transform: translateY(-4px); color: white; box-shadow: 0 12px 32px rgba(124,58,237,0.4); }

  .btn-register {
    border: 2px solid var(--primary);
    color: var(--primary); background: white;
    padding: 14px 34px; border-radius: 14px;
    font-weight: 600; font-size: 0.97rem;
    transition: 0.3s;
  }
  .btn-register:hover { background: linear-gradient(135deg, #c395ff, #a96eff); color: white; transform: translateY(-4px); border-color: transparent; }

  .section-title { font-size: 2.2rem; font-weight: 800; color: var(--text-dark); }
  .section-sub { color: var(--gray); font-size: 1.05rem; }

  .feature-card {
    background: white; border-radius: 22px; padding: 32px;
    transition: 0.4s; box-shadow: 0 6px 30px rgba(0,0,0,0.05);
    height: 100%; border: 1px solid rgba(195,149,255,0.1);
  }
  .feature-card:hover { transform: translateY(-8px); box-shadow: 0 18px 48px rgba(195,149,255,0.22); border-color: rgba(195,149,255,0.3); }
  .feature-icon {
    width: 64px; height: 64px;
    background: linear-gradient(135deg, rgba(195,149,255,0.18), rgba(169,110,255,0.1));
    color: var(--primary-dark); border-radius: 18px;
    display: flex; align-items: center; justify-content: center;
    font-size: 28px; margin-bottom: 18px;
    border: 1px solid rgba(195,149,255,0.2);
  }
  .feature-card h4 { font-size: 1.1rem; font-weight: 700; color: var(--text-dark); margin-bottom: 10px; }

  .stats {
    background: white; border-radius: 28px; padding: 48px 40px;
    box-shadow: 0 8px 40px rgba(124,58,237,0.08);
    border: 1px solid rgba(195,149,255,0.15);
    position: relative; overflow: hidden;
  }
  .stats::before {
    content: ''; position: absolute; top: -60px; right: -60px;
    width: 200px; height: 200px;
    background: radial-gradient(circle, rgba(195,149,255,0.12), transparent 70%);
    border-radius: 50%;
  }
  .stat-number { font-size: 2.8rem; font-weight: 800; color: var(--primary-dark); }
  .stat-label { color: var(--gray); font-size: 0.95rem; margin-top: 4px; }
  .stat-divider { border-left: 1px solid rgba(195,149,255,0.2); }

  .cta-section {
    background: linear-gradient(135deg, #f5eeff, #ede0ff);
    border-radius: 30px; padding: 60px 40px;
    border: 1px solid rgba(195,149,255,0.2);
  }

  footer {
    background: var(--footer-bg);
    color: var(--footer-muted);
    position: relative; overflow: hidden;
  }
  footer::before {
    content: ''; position: absolute; top: 0; left: 0; right: 0; height: 1px;
    background: linear-gradient(90deg, transparent, rgba(195,149,255,0.5), transparent);
  }
  footer::after {
    content: ''; position: absolute; top: -100px; left: 50%;
    transform: translateX(-50%);
    width: 600px; height: 300px;
    background: radial-gradient(ellipse, rgba(124,58,237,0.12) 0%, transparent 70%);
    border-radius: 50%;
  }
  .footer-inner { position: relative; z-index: 2; }

  .footer-brand {
    font-size: 1.6rem; font-weight: 800;
    background: linear-gradient(135deg, #c395ff, #a96eff);
    -webkit-background-clip: text; -webkit-text-fill-color: transparent;
    margin-bottom: 12px;
  }
  .footer-desc { color: #7a6a9a; line-height: 1.75; font-size: 0.9rem; }
  .footer-heading { color: #d4b8ff; font-weight: 700; font-size: 0.8rem; letter-spacing: 1.4px; text-transform: uppercase; margin-bottom: 16px; }

  footer a { color: var(--footer-muted); text-decoration: none; transition: 0.25s; font-size: 0.9rem; }
  footer a:hover { color: #c395ff; padding-left: 6px; }

  .footer-contact-item { display: flex; align-items: flex-start; gap: 10px; margin-bottom: 10px; font-size: 0.9rem; }
  .footer-contact-icon { color: #c395ff; font-size: 1rem; margin-top: 2px; flex-shrink: 0; }

  .footer-hr { border-color: #2e1760; margin: 32px 0 24px; }

  .footer-watermark {
    font-family: 'Arial Black', sans-serif;
    font-size: clamp(2.5rem, 7vw, 5.5rem);
    font-weight: 900; letter-spacing: 8px;
    text-transform: uppercase; color: transparent;
    -webkit-text-stroke: 1px rgba(195,149,255,0.08);
    user-select: none; line-height: 1; margin-bottom: 12px; text-align: center;
  }

  .footer-copy { color: #4a3d6e; font-size: 0.82rem; }

  .footer-dev {
    display: inline-flex; align-items: center; gap: 6px;
    background: rgba(195,149,255,0.1);
    border: 1px solid rgba(195,149,255,0.2);
    color: #c395ff;
    font-size: 0.82rem; font-weight: 600;
    padding: 6px 16px; border-radius: 50px;
    margin-top: 10px;
    letter-spacing: 0.3px;
  }
  .footer-dev i { font-size: 0.85rem; }

  @media(max-width:768px) {
    .hero-title { font-size: 2.4rem; }
    .stat-divider { border-left: none; border-top: 1px solid rgba(195,149,255,0.2); padding-top: 24px; margin-top: 24px; }
  }
</style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">

    <a class="navbar-brand" href="#">
      <i class="bi bi-chat-heart-fill"></i> FarnexChat
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMenu">

      <ul class="navbar-nav mx-auto gap-1">
        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Study Groups</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Events</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Resources</a></li>
      </ul>

      <div class="d-flex gap-2 mt-2 mt-lg-0">

        <?php if(isset($_SESSION['user_id'])) { ?>

          <!-- AFTER LOGIN -->
          <span class="nav-link text-dark fw-bold">
             <?php echo $_SESSION['user_name']; ?>
          </span>

          <a href="logout.php" class="nav-link nav-btn-login">
            <i class="bi bi-box-arrow-right me-1"></i>Logout
          </a>

        <?php } else { ?>

          <!-- BEFORE LOGIN -->
          <a href="login.php" class="nav-link nav-btn-login">
            <i class="bi bi-box-arrow-in-right me-1"></i>Login
          </a>

          <a href="register.php" class="nav-link nav-btn-register">
            <i class="bi bi-person-plus-fill me-1"></i>Register
          </a>

        <?php } ?>

      </div>

    </div>
  </div>
</nav>

<!-- Hero -->
<section class="hero">
  <div class="container text-center hero-content py-5 mt-5">
    <span class="badge-custom">💬 The Ultimate College Chat Community</span>
    <h1 class="hero-title">Connect, Share &amp; Chat with<br><span>College Friends</span></h1>
    <p class="hero-text">FarnexChat is a modern college communication platform where students can connect, create study groups, discuss assignments, share campus updates, and build meaningful friendships.</p>
    <div class="mt-5 d-flex justify-content-center gap-3 flex-wrap">
      <a href="login.php" class="btn btn-login"><i class="bi bi-box-arrow-in-right me-2"></i>Login</a>
      <a href="login.php" class="btn btn-register"><i class="bi bi-person-plus-fill me-2"></i>Register</a>
    </div>
  </div>
</section>

<!-- Features -->
<section class="py-5 mt-3">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="section-title">Amazing Features</h2>
      <p class="section-sub mt-2">Everything students need in one platform.</p>
    </div>
    <div class="row g-4">
      <div class="col-md-4"><div class="feature-card"><div class="feature-icon"><i class="bi bi-chat-dots-fill"></i></div><h4>Real-Time Messaging</h4><p class="text-muted">Chat instantly with classmates and friends through a seamless messaging experience.</p></div></div>
      <div class="col-md-4"><div class="feature-card"><div class="feature-icon"><i class="bi bi-people-fill"></i></div><h4>Study Groups</h4><p class="text-muted">Create subject-based groups for assignments, exams, and collaborative learning.</p></div></div>
      <div class="col-md-4"><div class="feature-card"><div class="feature-icon"><i class="bi bi-calendar-event-fill"></i></div><h4>Campus Events</h4><p class="text-muted">Stay updated with college activities, seminars, and important announcements.</p></div></div>
      <div class="col-md-4"><div class="feature-card"><div class="feature-icon"><i class="bi bi-shield-lock-fill"></i></div><h4>Secure Environment</h4><p class="text-muted">Verified college accounts ensure a safe and trusted community.</p></div></div>
      <div class="col-md-4"><div class="feature-card"><div class="feature-icon"><i class="bi bi-book-fill"></i></div><h4>Resource Sharing</h4><p class="text-muted">Share notes, study materials, and useful resources with classmates.</p></div></div>
      <div class="col-md-4"><div class="feature-card"><div class="feature-icon"><i class="bi bi-emoji-smile-fill"></i></div><h4>Friendly Community</h4><p class="text-muted">Make new friends, collaborate, and enjoy your college journey together.</p></div></div>
    </div>
  </div>
</section>

<!-- Stats -->
<section class="py-5">
  <div class="container">
    <div class="stats">
      <div class="row text-center align-items-center">
        <div class="col-md-4 py-2"><div class="stat-number">5000+</div><div class="stat-label">Student Members</div></div>
        <div class="col-md-4 py-2 stat-divider"><div class="stat-number">300+</div><div class="stat-label">Study Groups</div></div>
        <div class="col-md-4 py-2 stat-divider"><div class="stat-number">24/7</div><div class="stat-label">Campus Connection</div></div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="py-5">
  <div class="container">
    <div class="cta-section text-center">
      <h2 class="fw-bold mb-3" style="color: var(--text-dark);">Join FarnexChat Today!</h2>
      <p class="text-muted mb-4">Start connecting with your college community and enhance your campus experience.</p>
      <div class="d-flex justify-content-center gap-3 flex-wrap">
        <a href="#" class="btn btn-login">Get Started</a>
        <a href="#" class="btn btn-register">Learn More</a>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="pt-5 pb-4 mt-5">
  <div class="container footer-inner">
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="footer-brand"><i class="bi bi-chat-heart-fill"></i> FarnexChat</div>
        <p class="footer-desc">A modern college chat platform helping students connect, collaborate, and build friendships — all in one place.</p>
      </div>
      <div class="col-md-4 mb-4">
        <h6 class="footer-heading">Quick Links</h6>
        <a href="#" class="d-block mb-2">Home</a>
        <a href="#" class="d-block mb-2">Study Groups</a>
        <a href="#" class="d-block mb-2">Campus Events</a>
        <a href="#" class="d-block mb-2">Resources</a>
        <a href="login.php" class="d-block mb-2">Login</a>
        <a href="register.php" class="d-block mb-2">Register</a>
      </div>
      <div class="col-md-4 mb-4">
        <h6 class="footer-heading">Contact</h6>
        <div class="footer-contact-item"><span class="footer-contact-icon"><i class="bi bi-geo-alt-fill"></i></span><span>Narayanganj, Bangladesh</span></div>
        <div class="footer-contact-item"><span class="footer-contact-icon"><i class="bi bi-envelope-fill"></i></span><span>support@farnexchat.com</span></div>
        <div class="footer-contact-item"><span class="footer-contact-icon"><i class="bi bi-telephone-fill"></i></span><span>+880 15334-77264</span></div>
      </div>
    </div>

    <hr class="footer-hr">

    <div class="footer-watermark">FarnexChat</div>

    <div class="text-center mt-2">
      <p class="footer-copy mb-2">© 2026 FarnexChat — All rights reserved.</p>
      <span class="footer-dev">
        <i class="bi bi-code-slash"></i> Developed by Farhan Islam Rafid
      </span>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
