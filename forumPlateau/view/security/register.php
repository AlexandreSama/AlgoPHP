<link rel="stylesheet" href="./public/css/login_register.css">
<div class="login-box">
  <h2>Register</h2>
  <form method="post" action="index.php?ctrl=security&action=register">
    <div class="user-box">
      <input type="text" name="usernameInput" required=true>
      <label>Username</label>
    </div>
    <div class="user-box">
      <input type="email" name="emailInput" required=true>
      <label>Email</label>
    </div>
    <div class="user-box">
      <input type="password" name="passwordInput" required=true>
      <label>Password</label>
    </div>
    <button  href="#">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Submit
    </button>
  </form>
</div>