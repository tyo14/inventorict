<div class="container">
      <form class="form-signin" method="post" action="<?php echo base_url();?>index.php/ict/login">
        <h2 class="form-signin-heading">Silahkan Masuk</h2>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" name="userid" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <input name="login" class="btn btn-lg btn-primary btn-block" type="submit" values="Sign in" />
      </form>

    </div> <!-- /container -->