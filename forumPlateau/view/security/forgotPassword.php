<link rel="stylesheet" href="./public/css/login_register.css">
<div class="login-box">
  <h2>Mot de passe oublié ?</h2>
  <form method="post" action="index.php?ctrl=security&action=forgotPasswordMail">
    <div class="user-box">
      <input type="text" name="honeyPotInput" style="display: none;">
      <label style="display: none;">HoneyPot</label>
    </div>
    <div class="user-box">
      <input type="text" name="usernameInput" require>
      <label>Votre pseudonyme</label>
    </div>
    <button href="#">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Récupérer mon mot de passe
    </button>
  </form>
</div>