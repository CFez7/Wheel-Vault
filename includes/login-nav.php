<!-- login / register navigation. -->
<nav>
  <ul>
    <li id="login">
      <a id="login-trigger" href="#">
        Log in / Register <span>▼</span>
      </a>
    <!-- this div is shown when login/register button is clicked -->
      <div id="login-content">
          <form action="scripts/login.php" method="post" style="width:100%">
            <label id="label">Email</label><br>
            <input style="width:230px" id="inputs" type="text" name="email"><br>
            <label id="label">Password</label><br>
            <input style="width:230px" id="inputs" type="password" name="upassword"><br>
            <a href="../public_html/forgot-password.php">
                <label class="forgotpass">Forgot Password?</label>
            </a>
            <input id="submit" style="margin-top:10px" type="submit" name="login" value="Log In">
          </form>
            <label id="label">or</label><br>
            <a href="register.php"><input id="submit" type="button" value="Register"></a>
      </div>
    </li>
  </ul>
</nav>