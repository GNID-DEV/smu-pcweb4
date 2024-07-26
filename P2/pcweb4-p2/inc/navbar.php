<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

  <div class="container-fluid">
    <!-- Brand -->
	<a class="navbar-brand" href=<?php echo ROOT_URL; ?>>VINCE DING</a>
    
	<!-- Hamburger -->
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

	<!-- Nav Menu -->
    <div class="collapse navbar-collapse" id="navbarColor02">
      
	  <ul class="navbar-nav ">
        <!-- Homepgae -->
		<li class="nav-item">
          <a class="nav-link" href=<?php echo ROOT_URL; ?>><i class="fas fa-home"></i> &nbsp; Home </a> <!-- Modify URL from config.php -->
        </li>
		<!-- About
        <li class="nav-item">
          <a class="nav-link" href=<?php echo ABOUT_URL; ?>><i class="fas fa-info-circle"></i> &nbsp; About</a>
        </li> -->
		<!-- Upload -->
        <li class="nav-item">
          <a class="nav-link" href=<?php echo ADD_URL; ?>><i class="fas fa-plus-circle"></i> &nbsp; Add </a>
        </li>
		<!-- Edit -->
        <li class="nav-item">
          <a class="nav-link" href=<?php echo EDIT_URL; ?>><i class="fas fa-edit"></i> &nbsp; Edit </a>
        </li>
      </ul>

    </div>
</nav>