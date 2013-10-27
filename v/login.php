<h1>Login</h1>

<form method="post">
	<input type="text" name="Login[username]" id="username" placeholder="username" value="<?php echo $model->username ?>"><br>
	<input type="password" name="Login[password]" id="password" placeholder="password" value="<?php echo $model->password ?>"><br>
	<button onclick="login(); return false;" class="btn">Login</button>
</form>

<script src="<?php echo $this->getBaseUrl() ?>/js/login.js"></script>
<script>
	var server = "<?php echo $this->getBaseUrl() ?>";
</script>
