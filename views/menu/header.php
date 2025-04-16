 <?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>

 <!DOCTYPE html>
 <html lang="vi">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>WeCLE</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
     <link rel="stylesheet" href="public/css/course.css">
     <link rel="stylesheet" href="public/css/style.css">
 </head>

 <body>
     <div class="wrapper">
         <nav class="navbar">
             <div class="container">
                 <div class="navbar-left">
                     <a class="navbar-brand" href="home">
                         <img src="public/images/logo.png?v=<?= time(); ?>" alt="WeCLE Logo"> <!-- hàm time() để làm mới cache logo, thay logo mới -->
                     </a>
                 </div>
                 <div class="navbar-center">
                     <ul class="nav-links">
                         <li><a href="home">Home</a></li>
                         <li><a href="translation">Translate</a></li>
                         <li><a href="chatbot">Chatbox</a></li>
                         <li><a href="test">Test</a></li>
                         <li><a href="index.php?controller=userCourse&action=index">Course</a></li>

                         <?php if (isset($_SESSION["username"])): ?>
                             <li><a href="index.php?controller=usercourse&action=registeredCourses">My courses</a></li>
                         <?php endif; ?>

                         <li><a href="index.php?controller=home&action=vocab">
                                 <i class="fa fa-search"></i>
                             </a></li>
                         <?php if (isset($_SESSION["role"]) && $_SESSION["role"] === "admin"): ?>
                             <li><a href="index.php?controller=admin&action=index">Admin</a></li>
                         <?php endif; ?>
                     </ul>
                 </div>
                 <div class="navbar-right">
                     <div class="nav-icons">
                         <?php if (isset($_SESSION["username"])): ?>
                             <span style="color: white;">👋 Xin chào, <strong><?= htmlspecialchars($_SESSION["username"]) ?></strong></span>
                             <a href="index.php?controller=auth&action=logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                         <?php else: ?>
                             <a href="index.php?controller=auth&action=login"><i class="fa fa-user"></i> Login</a>
                         <?php endif; ?>
                     </div>
                 </div>
             </div>
         </nav>
     </div>