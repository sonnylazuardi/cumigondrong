<h1>Selamat datang di Ruko Serba Ada</h1>

<?php echo $this->userLogged() ?>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, unde, voluptates nobis rerum saepe commodi placeat autem cupiditate eos ex deleniti quod vitae dolore mollitia corporis tempora cum. Quod, perspiciatis.</p>

<p>Silakan Login atau Register</p>

<?php if ($this->userLogged()): ?>
<a href="<?php echo $this->makeUrl('shopping') ?>">Shop</a>
<a href="<?php echo $this->makeUrl('index/logout') ?>">Logout</a>		
<?php else: ?>
<a href="<?php echo $this->makeUrl('index/login') ?>">Login</a>	
<a href="<?php echo $this->makeUrl('index/register') ?>">Register</a>
<?php endif ?>
