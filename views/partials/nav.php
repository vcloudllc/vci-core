<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">VCloud Demo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="voice">Voice</a>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="video">Video</a>
      </li> -->
      <?php if (isAuthenticated()) : ?>
        <span class="navbar-text">
          Welcome back <?= currentUser()->name ?>. want to <a href="#" onclick="signOut();">Sign out</a>?
        </span>
      <?php else : ?>
        <a class="navbar-text" href="/login">Login</a>
        <!-- <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div> -->
      <?php endif ?>
    </ul>

  </div>
</nav>
