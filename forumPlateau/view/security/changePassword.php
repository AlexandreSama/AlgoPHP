<link rel="stylesheet" href="./public/css/login_register.css">
<div class="login-box">
  <h2>Changer de mot de passe</h2>
  <form method="post" action="index.php?ctrl=security&action=changePassword&id=<?php echo $result["data"]['userId'] ?>" enctype="multipart/form-data">
    <div class="user-box">
      <input type="text" name="honeyPotInput" style="display: none;">
      <label style="display: none;">HoneyPot</label>
    </div>
    <div class="user-box">
      <input type="password" name="passwordInput" require>
      <label>Mot de passe</label>
    </div>
    <div class="user-box">
      <input type="password" name="passwordVerificatorInput" require>
      <label>Confirmer votre mot de passe</label>
    </div>
    <button href="#">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Changer son mot de passe
    </button>
  </form>
</div>