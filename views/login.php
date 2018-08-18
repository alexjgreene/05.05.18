<form class="form-horizontal" method="POST">
<fieldset>

<!-- Form Name -->
<legend>Вход в систему</legend>

<?php if ($this->message) { ?>
<div class="alert alert-danger" role="alert">
	<?= htmlspecialchars($this->message) ?>
</div>
<?php } ?>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">E-mail</label>  
  <div class="col-md-4">
  <input id="email" 
	  name="login[email]"
	  type="text" 
	  placeholder="placeholder" 
	  class="form-control input-md" 
	  value='<?= htmlspecialchars($this->login['email'])?>'
  >
  <span class="help-block">help</span>  
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password ">Пароль</label>
  <div class="col-md-4">
    <input id="password " name="login[password]" 
	type="password"
	placeholder="placeholder" 
	class="form-control input-md"
	value='<?= htmlspecialchars($this->login['password'])?>'
	>
    <span class="help-block">help</span>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Вход</button>
  </div>
</div>

</fieldset>
</form>
