<link rel="stylesheet" href="./public/css/login_register.css">
<div class="login-box">
  <h2>Inscription</h2>
  <form method="post" action="index.php?ctrl=security&action=register" enctype="multipart/form-data">
    <div class="user-box">
      <input type="text" name="usernameInput" required=true>
      <label>Pseudonyme</label>
    </div>
    <div class="user-box">
      <input type="file" name="avatarInput" required=true>
      <label>Photo de profile</label>
    </div>
    <div class="user-box">
      <input type="email" name="emailInput" required=true>
      <label>Email</label>
    </div>
    <div class="user-box">
      <input type="password" name="passwordInput" required=true>
      <label>Mot de passe</label>
    </div>
    <button href="#">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      S'inscrire
    </button>
  </form>
</div>