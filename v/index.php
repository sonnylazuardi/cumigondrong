<script>
		function RefreshCartandShow(){
			//REFRESH CART
				var obj = document.getElementById('cart_frame');
				obj.src=obj.src;
			//SHOW
				if (document.getElementById('content_frame').style.opacity<1){
					// CONTENT FADE IN
					var n = 10;
					var m = 1;
					for (x=0;x<=11;x++){
						setTimeout(function(){
							document.getElementById('content_frame').style.opacity = 0.1*n;
							n++;
						}, (500+(50*(m+1))));
					m++;
					}
					// LOGO FADE OUT
					var o = 0;
					var p = 1;
					for (x=0;x<=11;x++){
						setTimeout(function(){
							document.getElementById('trans').style.opacity = (0.1*p);
							p--;
						}, (400+(50*(o+1))));
						o++;
					}
				}
		}
		
		function fadein(){
			//---- WELCOME PROCESS ----\\
				var n = 0;
				var m = 1;
				// WELCOME FADE IN
				for (x=0;x<=20;x++){
					setTimeout(function(){
						document.getElementById('starter').style.opacity = 0.05*n;
						n++;
					}, ((50*(m+1))));
				m++;
				}
				// WELCOME FADE OUT
				m=0;
				for (x=0;x<=21;x++){
					setTimeout(function(){
						document.getElementById('starter').style.opacity = (0.05*n);
						n--;
					}, (3000+(50*(m+1))));
				m++;
				}
			//---- PREFACE PROCESS ----\\
			var b = 0;
			var a = 1;
				// PREFACE FADE IN
				for (x=0;x<=20;x++){
					setTimeout(function(){
						document.getElementById('starter2').style.opacity = 0.05*b;
						b++;
					}, (4000+(50*(a+1))));
				a++;
				}
				// PREFACE FADE OUT
				a=0;
				for (x=0;x<=21;x++){
					setTimeout(function(){
						document.getElementById('starter2').style.opacity = (0.05*b);
						b--;
					}, (10000+(50*(a+1))));
				a++;
				}
			// CONTENT FADE IN
			var o = 0;
			var p = 1;
			for (x=0;x<=20;x++){
				setTimeout(function(){
					document.getElementById('content').style.opacity = (0.05*p);
					p++;
				}, (12000+(50*(o+1))));
			o++;
			}
		}
		
		function transition(link){
			var n = 10;
			var m = 1;
			// CONTENT FADE OUT
			for (x=0;x<=10;x++){
				setTimeout(function(){
					document.getElementById('content_frame').style.opacity = 0.1*n;
					n--;
				}, (50*(m+1)));
			m++;
			}
			// LOGO FADE IN
			var o = 0;
			var p = 1;
			for (x=0;x<=10;x++){
				setTimeout(function(){
					document.getElementById('trans').style.opacity = (0.1*p);
					p++;
				}, (300+(50*(o+1))));
				o++;
			}
			//CHANGE LINK
				setTimeout(function(){
					document.getElementById('content_frame').src=link;
				}, 2000);
		}
	</script>
<?php if (isset($effect)&&$effect) {?>
	<script>fadein();</script>
<?php } ?>	
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
