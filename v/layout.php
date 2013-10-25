<!DOCTYPE html>
<html>
<head>
	<title><?php echo $this->brankas->config['title'] ?></title>
	<link rel='stylesheet' type='text/css' href='<?php echo $this->getBaseUrl() ?>/css/style.css' />
	<script type="text/javascript">
		function showLogin() {
			document.getElementById('login_cont').style.opacity = 0;
			document.getElementById('login_cont').style.top = "0px";
			var x,aa,bb; 
			aa = 0;
			bb = 0;
			for (x=0;x<=11;x++){
				setTimeout(function(){
					document.getElementById('login_cont').style.opacity = 0.1*aa;
					aa++;
				}, (50*(bb+1)));
				bb++;
			}
		}
		function hideLogin() {
			document.getElementById('login_cont').style.opacity = 1;
			var x,aa,bb;
			aa = 0;
			bb = 0;
			for (x=0;x<=11;x++){
				setTimeout(function(){
					document.getElementById('login_cont').style.opacity = 1-(0.1*aa);
					if (aa>=10) document.getElementById('login_cont').style.top = "-100%";
					aa++;
				}, (50*(bb+1)));
				bb++;
			}
		}
	</script>
</head>
<body>
<?php if (isset($effect)&&$effect) {?>

<img class='loader' id='starter' src='<?php echo $this->getBaseUrl() ?>/img/site/logo_b.png'></img>
<div class='prolog' id='starter2'><p>We are here to provide you with a brand new aura in our country through fashion, creativity, and innovative designs with world class quality. We always provide the best for our consumers by giving the best quality of our products. We will bring to you products made out of best chosen materials. We collaborate with the experts who have years and years of experience in the fashion and design industry. We will excite you with our new and creative concept to be more fashionable. And we guarantee you no dissatisfaction because we are sure that you will be satisfied at any cost whatsoever.</br></br>Best Regards,</br>Calvin Valentino & Salvy Reynalv</p></div>
<img class='trans' id='trans' src='img/logo.png'></img>
<div class='background' id='content'>
<?php }?>
	<div class='conctr'>
			<div id='content_frame' name='page' onLoad="RefreshCartandShow()">
				<?php $this->show($view) ?>
			</div>
			<div class='head'>
			<a href='<?php echo $this->getBaseUrl()?>/index/home'><div class='logo'></div></a>
			<div class='status'>
				<p>You are not login. (<a href='#' onclick='showLogin()'>Login</a> or <a href="<?php echo $this->getBaseUrl() ?>/index/register">Register now</a>)</p>
			<!-- <img src='<?php echo $this->getBaseUrl() ?>/img/site/cart_black.png' style='margin-right:5px;'/> -->
			</div>
			<div class='menu'>
				<a href='<?php echo $this->getBaseUrl() ?>/index/home'>
				<div class='permenu per<?php echo (min(array(count($model),4))+1) ?>'>
					<div class='menuborder'></div>
					<div class='menutxt'><h1 id='txtmenu0' class='menu'>home</h1></div>
					<div class='menuborder'></div>
				</div>
				</a>

				<a href='<?php echo $this->getBaseUrl() ?>/index/shop'>
				<div class='permenu per<?php echo (min(array(count($model),4))+1) ?>'>
					<div class='menuborder'></div>
					<div class='menutxt'><h1 id='txtmenu1' class='menu'>shop</h1></div>
					<div class='menuborder'></div>
				</div>
				</a>

				<?php
				if ($model === null) $model = array();
				function writeMenu($data = null, $baseurl,$div) {
					echo "	<a href='".$baseurl."/kategori/";
					if ($data!=null) echo "view/".$data->id;
					echo "'><div class='permenu per".$div."'>
							<div class='menuborder'></div>
							<div class='menutxt'><h1 id='txtmenu1' class='menu'>";
					if ($data!=null) echo $data->nama_kategori;
					else echo "others";
					echo "</h1></div>
							<div class='menuborder'></div>
						</div>
					</a>";
				}
				foreach ($model as $key => $value) {
					if ($key<3) {
						writeMenu($value,$this->getBaseUrl(),(min(array(count($model),4))+1));
					}
					else {
						if ($key==3) {
							if (count($model)==4) {
								writeMenu($value,$this->getBaseUrl(),(min(array(count($model),4))+1));
							}
							else {
								writeMenu(null,$this->getBaseUrl(),(min(array(count($model),4))+1));
							}
						}
					}
				}
				?>
			</div>
		</div>
			<h2 id='footer_txt'><b>www.calvinsalvy.com Oficial Website</b></br>Explore The World at Rapid Speed</h2>
			<a href='https://twitter.com/darksta5'><img title='@calvinsalvy' src='<?php echo $this->getBaseUrl() ?>/img/site/twitter.png' id='footer_img'/></a>
	</div>
<?php if (isset($effect)&&$effect) echo "</div>" ?>
	<div id='login_cont'>
		<div id='login_box'>
			<h1>LOGIN</h1>
			<a class='exit' onclick='hideLogin()'>x</a>
			<div id="loading"></div>
			<form>
				<label>Username</label><input type='text' id="username" name="Login[username]"></input><br/>
				<label>Password</label><input type='password' id="password" name="Login[password]"></input><br/>
				<button type='submit' onclick="login(); return false;" class='btn'>Login</button>
			</form>
		</div>
		<script src="<?php echo $this->getBaseUrl() ?>/js/login.js"></script>
		<script>
			var server = "<?php echo $this->getBaseUrl() ?>";
		</script>
	</div>
</body>
</html>