<?php
	$_model_ = new Kategori();
	$_listkategori_ = $_model_->cariSemua();
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $this->brankas->config['title'] ?></title>
	<link rel='stylesheet' type='text/css' href='<?php echo $this->getBaseUrl() ?>/css/style.css' />
	<script type="text/javascript">
		function hasClass(ele,cls) {
			return ele.className.match(new RegExp('(\\s|^)'+cls+'(\\s|$)'));
		}
		 
		function addClass(ele,cls) {
			if (!this.hasClass(ele,cls)) ele.className += " "+cls;
		}
		 
		function removeClass(ele,cls) {
			if (hasClass(ele,cls)) {
			var reg = new RegExp('(\\s|^)'+cls+'(\\s|$)');
			ele.className=ele.className.replace(reg,' ');
			}
		}
		function fitimg(obj,width,height,xfit,yfit,overlay)
		{
			var objheight = obj.offsetHeight;
			var objwidth = obj.offsetWidth;
			var screen = objheight/objwidth;
			var fit = height/width;
			if (Math.abs(screen-fit)<=0.1) {
				obj.width = width;
				obj.height = height;
			}
			else if (((screen<fit)&&overlay)||((screen>fit)&&!overlay)){
					obj.height = height;
					if (xfit) {
						obj.width = ((height*1.0)/(screen*1.0));
						obj.style.marginLeft = (((1.0*width)-((1.0*height)/(1.0*screen)))/2).toString()+"px";
					}
					else {
						obj.width = width;
					}
				}
			else {
					obj.width = width;
					if (yfit) {
						obj.height = (width*screen);
						obj.style.marginTop = ((height-(width*screen))/2).toString()+"px";
					}
					else {
						obj.height = height;
					}
			}
		}
		function showLogin() {
			document.getElementById('login_cont').style.opacity = 0;
			document.getElementById('login_cont').style.top = "0px";
			document.getElementById('login_username').focus();
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
<a href='<?php echo $this->getBaseUrl() ?>/index/home'><img class='trans' id='trans' src='img/logo.png'></img></a>
<div class='background' id='content'>
<?php }?>
	<div class='conctr'>
			<div id='content_frame' name='page' onLoad="RefreshCartandShow()">
				<?php $this->show($view) ?>
			</div>
			<div class='head'>
			<a href='<?php echo $this->getBaseUrl()?>/index/home'><div class='logo'></div></a>
			<div class='status'>
				<?php if ($this->userLogged()): ?>
					<p class="left"> welcome, <a href='<?php echo $this->makeUrl('profile/index') ?>/'><?php echo $this->userLogged() ?></a>! (<a href='<?php echo $this->makeUrl('index/logout') ?>'>Logout</a>)
					</p>
					<p class="right">
						<a href="<?php echo $this->makeUrl('/cart/index') ?>">Shopping Cart</a> <img src='<?php echo $this->getBaseUrl() ?>/img/site/cart_white.png' style='margin-right:5px;'/>
					</p>
				<?php else: ?>
					<p>You are not login. (<a href='#' onclick='showLogin()'>Login</a> or <a href='<?php echo $this->getBaseUrl() ?>/index/register'>Register now</a>)</p>
				<?php endif ?>
			</div>
			<div class='menu'>
				<a href='<?php echo $this->getBaseUrl() ?>/index/shop'>
				<!-- <div class='permenu per<?php echo (min(array(count($model),4))) ?>'>
					<div class='menuborder'></div>
					<div class='menutxt'><h1 id='txtmenu1' class='menu'>shop</h1></div>
					<div class='menuborder'></div>
				</div> -->
				</a>

				<?php
				if ($_listkategori_ === null) $_listkategori_ = array();
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
				$minKategori = (min(array(count($_listkategori_),5)));
				foreach ($_listkategori_ as $key => $value) {
					if ($key<4) {
						writeMenu($value,$this->getBaseUrl(),$minKategori);
					}
					else {
						if ($key==4) {
							if (count($_listkategori_)==5) {
								writeMenu($value,$this->getBaseUrl(),$minKategori);
							}
							else {
								writeMenu(null,$this->getBaseUrl(),$minKategori);
							}
						}
					}
				}
				?>
			</div>
		</div>
		<h2 id='footer_txt'><b>www.calvinsalvy.com Oficial Website</b></br>Karena rasa adalah segalanya.</h2>
		<a href='https://twitter.com/darksta5'><img title='@calvinsalvy' src='<?php echo $this->getBaseUrl() ?>/img/site/twitter.png' id='footer_img'/></a>
	</div>
<?php if (isset($effect)&&$effect) echo "</div>" ?>
	<div id='login_cont'>
		<div id='login_box'>
			<h1>LOGIN</h1>
			<a class='exit' onclick='hideLogin()'>x</a>
			<div id="loading"></div>
			<form>
				<label>Username</label><input type='text' id="login_username" name="Login[username]"></input><br/>
				<label>Password</label><input type='password' id="login_password" name="Login[password]"></input><br/>
				<button type='submit' onclick="login(); return false;" class='btn right'>Login</button>
			</form>
		</div>
		<script src="<?php echo $this->getBaseUrl() ?>/js/login.js"></script>
		<script>
			var server = "<?php echo $this->getBaseUrl() ?>";
		</script>
	</div>
	<script type="text/javascript">
		function _opensearchbox(margin) {
			if (margin<=0) {
				document.getElementById('search-popup-content').style.marginLeft = margin.toString()+"px";
				setTimeout(function(){
					_opensearchbox(margin+2);
				}, 5);
			}
		}
		function _closesearchbox(margin) {
			if (margin>=-200) {
				document.getElementById('search-popup-content').style.marginLeft = margin.toString()+"px";
				setTimeout(function(){
					_closesearchbox(margin-2);
				}, 5);
			}
			else {
				setTimeout(function(){
					_showicon(-75);
				}, 100);
			}
		}
		function _hideicon(margin) {
			if (margin>=-70) {
				document.getElementById('search-popup').style.marginLeft = margin.toString()+"px";
				setTimeout(function(){
					_hideicon(margin-2);
				}, 5);
			}
			else {
				setTimeout(function(){
					_opensearchbox(-200);
				}, 100);
			}
		}
		function _showicon(margin) {
			if (margin<=0) {
				document.getElementById('search-popup').style.marginLeft = margin.toString()+"px";
				setTimeout(function(){
					_showicon(margin+2);
				}, 5);
			}
		}
		function opensearch() {
			_hideicon(0);
		}
		function closesearch() {
			_closesearchbox(0);
		}
	</script>
	<div id = 'search-popup' class='search-popup <?php if ((isset($search_show))&&($search_show)) echo "left-hide";?>' onclick='opensearch()'></div>
	<div id = 'search-popup-content' class='search-popup-content <?php if ((isset($search_show))&&($search_show)) echo "left-show";?>'>
		<form action="<?php echo $this->makeUrl('barang/search') ?>" method="get">
			<?php 
				$q = (isset($_GET['q'])?$_GET['q']:"");
				$kat = (isset($_GET['kat'])?$_GET['kat']:""); 
				$h1 = (isset($_GET['h1'])?$_GET['h1']:""); 
				$h2 = (isset($_GET['h2'])?$_GET['h2']:""); 
			?>
			<h4>Search</h4>
			<p onclick='closesearch()'>x</p>
			<input type="text" name="q" value="<?php echo $q ?>" placeholder="Nama Barang">
			<select name="kat" value="<?php echo $kat ?>" required>
				<option value="0">All Categories</option>
				<?php foreach ($_listkategori_ as $key => $value): ?>
					<option value="<?php echo $value->id ?>"><?php echo $value->nama_kategori ?></option>
				<?php endforeach ?>
			</select>
			<input type="number" name="h1" value="<?php echo $h1 ?>" placeholder="Harga Bawah">
			<input type="number" name="h2" value="<?php echo $h2 ?>" placeholder="Harga Atas">
			<button type="submit" class="btn">Search</button>
		</form>
	</div>
</body>
</html>