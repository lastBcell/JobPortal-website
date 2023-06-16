<?php
session_start();
if (!isset($_SESSION['SESSION_EMAIL'])) {
  header("Location: index.php");
  die();
}

include 'config.php';

$query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");

if (mysqli_num_rows($query) > 0) {
  $row = mysqli_fetch_assoc($query);

  // echo $row["name"];
  // echo $row["email"];
}
if (isset($_POST['details'])) {
  $sid = $_POST['detailid'];
  $_SESSION['SESSION_id'] =  $sid;
  header("Location: jobdetails.php");
  // echo $_SESSION['SESSION_id'];
  // echo $sid;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <title>My Website</title>
</head>

<body>
  <style>
    .wrapper .center {
      /* color: aliceblue; */
      /* position: relative;
      align-items: center;
      vertical-align: middle; */
      font-size: 2rem;
      text-align: center;
      margin-top: 50px;
      color: crimson;

    }
  </style>
  <!-- Header -->
  <section id="header">
    <div class="header container">
      <div class="nav-bar">
        <div class="brand">
          <a href="#hero">
            <h1>Job<span>portal</span></h1>
          </a>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
            <li><a href="#hero" data-after="Home">Home</a></li>
            <li><a href="#search" data-after="Home">Joblist</a></li>
            <li <?php if ($row["choice"] == 0) {
                  echo 'style="display:none;"';
                } ?>><a href="employer.php" data-after="Home">Employers</a></li>
            <li <?php if ($row["choice"] == 1) {
                  echo 'style="display:none;"';
                } ?>><a href="employee.php" data-after="Home">Employees</a></li>
            <li><a href="#services" data-after="Service">Companies</a></li>
            <li><a href="#about" data-after="About">About Us</a></li>
            <li><a href="#contact" data-after="Contact">Contact Us</a></li>
            <li><a href="logout.php" data-after="footer">
                <div class="logout">Logout</div>
              </a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->


  <!-- Hero Section  -->
  <section id="hero">
    <div class="hero container">
      <div>
        <h1>Find your<span></span></h1>
        <h1>perfect <span></span></h1>
        <h1> Job <span></span></h1>
        <a href="#search" type="button" class="cta">search</a>
      </div>
    </div>
  </section>
  <!-- End Hero Section  -->
  <!-- search -->
  <section id="search">
    <div class="search container">
      <div class="top">
        <h1 class="section-title">find your favourite <span>job</span> <ion-icon name="search-outline"></ion-icon></h1>
      </div>
      <form action="" method="post" id="jobsearch">
        <div class="searchbar">

          <input type="text" name="search" placeholder="Search.." id="nameid" autocomplete="off">
          <!-- <button  class="button">Search</button> -->

        </div>
      </form>
      <div class="wrapper">
        <div id="searchresult"></div>

      </div>
    </div>
  </section>


  <!-- end of search -->


  <!-- Service Section -->
  <section id="services">
    <div class="services container">
      <div class="service-top">
        <h1 class="section-title">company<span>info</span></h1>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum deleniti maiores pariatur assumenda quas
          magni et, doloribus quod voluptate quasi molestiae magnam officiis dolorum, dolor provident atque molestias
          voluptatum explicabo!</p>
      </div>
      <div class="service-bottom">
        <?php
        $aquery = mysqli_query($conn, "SELECT * FROM emp where choice= '1'"); ?>
        <?php
        while ($arow = mysqli_fetch_assoc($aquery)) {
          $a = $arow["cname"];
          $b = $arow["compemail"];
          $c = $arow["website"]
        ?>

          <div class="service-item">
            <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
            <h2><?php echo $a; ?></h2>
            <p><?php echo $b; ?></p>
            <p><?php echo $c; ?></p>
          </div>

        <?php } ?>
        <!--
        <div class="service-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
          <h2>google</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis debitis rerum, magni voluptatem sed
            architecto placeat beatae tenetur officia quod</p>
        </div>

       
        <div class="service-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
          <h2>tata</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis debitis rerum, magni voluptatem sed
            architecto placeat beatae tenetur officia quod</p>
        </div>
        <div class="service-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
          <h2>infosys</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis debitis rerum, magni voluptatem sed
            architecto placeat beatae tenetur officia quod</p>
        </div> 
        <div class="service-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
          <h2>zomato</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis debitis rerum, magni voluptatem sed
            architecto placeat beatae tenetur officia quod</p>
        </div>
        <div class="service-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
          <h2>uber</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis debitis rerum, magni voluptatem sed
            architecto placeat beatae tenetur officia quod</p>
        </div>
        <div class="service-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
          <h2>ibm</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis debitis rerum, magni voluptatem sed
            architecto placeat beatae tenetur officia quod</p>
        </div>
        <div class="service-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
          <h2>wipro</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis debitis rerum, magni voluptatem sed
            architecto placeat beatae tenetur officia quod</p>
        </div> -->

      </div>
    </div>
  </section>
  <!-- End Service Section -->


  <!-- About Section -->
  <section id="about">
    <div class="about container">

      <div class="col-right">
        <h1 class="section-title">About <span>Us</span></h1>
        <h2>Front End Developer</h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores, velit alias eius non illum beatae atque
          repellat ratione qui veritatis repudiandae adipisci maiores. At inventore necessitatibus deserunt
          exercitationem cumque earum omnis ipsum rem accusantium quis, quas quia, accusamus provident suscipit magni!
          Expedita sint ad dolore, commodi labore nihil velit earum ducimus nulla quae nostrum fugit aut, deserunt
          reprehenderit libero enim!</p>

      </div>
    </div>
  </section>
  <!-- End About Section -->

  <!-- Contact Section -->
  <section id="contact">
    <div class="contact container">
      <div>
        <h1 class="section-title">Contact <span>info</span></h1>
      </div>
      <div class="contact-items">
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/phone.png" /></div>
          <div class="contact-info">
            <h1>Phone</h1>
            <h2>+1 234 123 1234</h2>
            <h2>+1 234 123 1234</h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/new-post.png" /></div>
          <div class="contact-info">
            <h1>Email</h1>
            <h2>info@gmail.com</h2>
            <h2>abcd@gmail.com</h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/map-marker.png" /></div>
          <div class="contact-info">
            <h1>Address</h1>
            <h2>Fatikchhari, Chittagong, Bangladesh</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Contact Section -->

  <!-- Footer -->
  <section id="footer">
    <div class="footer container">
      <div class="brand">
        <h1>Job<span>Portal</span> </h1>
      </div>
      <h2>Find your perfect job</h2>
      <div class="social-icon">
        <div class="social-item">
          <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/facebook-new.png" /></a>
        </div>
        <div class="social-item">
          <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/instagram-new.png" /></a>
        </div>
        <div class="social-item">
          <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/twitter.png" /></a>
        </div>
      </div>


    </div>
  </section>
  <!-- End Footer -->
  <script src="./app.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js">

  </script>
  <script src="action3.js"></script>
</body>

</html>