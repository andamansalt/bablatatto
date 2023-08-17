<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom"">
      <a href="index_user.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <img src="img/logo.png" alt="logo" style="width: 15%;height: auto;">
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="index_user.php" class="nav-link px-2 link-danger">หน้าหลัก</a></li>
        <li><a href="booking.php" class="nav-link px-2 link-dark">จองคิว</a></li>
        <li><a href="about.php" class="nav-link px-2 link-dark">เกี่ยวกับเรา</a></li>
        
      </ul>

      <div class="col-md-3 text-end">
      <a href="user_profile.php"><i class="fa-solid fa-user" style="font-size:28px; color:#000000; padding-right:5%; padding-left:5%;"></i></a>
       <a href="noticfication.php"><i class="fa-solid fa-bell" style="font-size:28px; color:#000000; padding-right:5%; padding-left:5%"></i></a>
       <button  type="button" class="btn btn-danger"><a class="logout" href="logout.php" onclick="return confirm('คุณต้องการออกจากระบบใช่ไหม?');">logout</a></button>
      </div>
      
    </header>
  </div>
  <style>
    .logout{
        float: left;
        text-decoration: none;
        color: white;
    }
    .logout :hover{
        color: white;
    }
  </style>
  
