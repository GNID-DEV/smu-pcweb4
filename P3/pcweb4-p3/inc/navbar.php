<!-- Original Nav Code -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">

    <!-- Logo -->
    <a class="navbar-brand " href="homepage.php"><i class="text-danger fas fa-film fa-2x"></i></a>

    <!-- Hamburger -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

  <!--  -->

	<!-- Nav Menu -->
  <div class="collapse navbar-collapse" id="navbarColor02">
      
    <ul class="navbar-nav ">
        
    <!-- Your Review Button -->
    <li class="nav-item">
      <a class="nav-link" href="yourreview.php?user=<?php echo $_SESSION['username']; ?>"> Your Reviews </a>
    </li>
    
    <!-- Friends Button -->
        <li class="nav-item">
          <a class="nav-link" href="friends.php"> Friends </a>
        </li>
  </div>
  
  <!-- Logout Button -->
    <form method = "post" class="form-inline" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
      <button class="btn btn-sm btn-outline-dark" type="submit" name="logout">Logout</button>
    </form>
</nav>

  <!--  -->
