<!-- <div class="container"> -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> <!-- navbar-dark bg-dark -->
    <div class="container-fluid">
      <a class="navbar-brand" href="/"><img src="https://picturepan2.github.io/spectre/img/spectre-logo.svg"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          
          <?php if (isset($_SESSION['loggedin']) AND $_SESSION['loggedin']): ?>
          <li class="nav-item">
            <a class="nav-link" href="/users">Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/groups">Groups</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><?php echo ucfirst($_SESSION['username']); ?></a>
          </li>  
          <li class="nav-item">
            <a class="nav-link" href="logout">Logout</a>
          </li>
          <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="login">Login</a>
          </li>
          <?php endif ?>
        </ul>
      </div>
    </div>
  </nav>
<!-- </div> -->