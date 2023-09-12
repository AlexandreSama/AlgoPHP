<link rel="stylesheet" href="./public/css/login_register.css">
<div class="login-box">
  <h2>Connexion</h2>
  <form method="post" action="index.php?ctrl=security&action=login">
    <div class="user-box">
      <input type="text" name="honeyPotInput" style="display: none;">
      <label>HoneyPot</label>
    </div>
    <div class="user-box">
      <input type="text" name="usernameInput" require>
      <label>Pseudonyme</label>
    </div>
    <div class="user-box">
      <input type="password" name="passwordInput" require>
      <label>Mot de passe</label>
    </div>
    <button href="#">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Se connecter
    </button>
  </form>
</div>