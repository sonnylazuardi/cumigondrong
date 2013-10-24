<!DOCTYPE html>
<html>
<head>
	<title><?php echo $this->brankas->config['title'] ?></title>
	<link rel='stylesheet' type='text/css' href='<?php echo $this->getBaseUrl() ?>/css/style.css' />
</head>
<body onload='fadein()'>
<?php if (isset($effect)&&$effect) {?>
<img class='loader' id='starter' src='<?php echo $this->getBaseUrl() ?>/img/site/logo_b.png'></img>
<div class='prolog' id='starter2'><p>We are here to provide you with a brand new aura in our country through fashion, creativity, and innovative designs with world class quality. We always provide the best for our consumers by giving the best quality of our products. We will bring to you products made out of best chosen materials. We collaborate with the experts who have years and years of experience in the fashion and design industry. We will excite you with our new and creative concept to be more fashionable. And we guarantee you no dissatisfaction because we are sure that you will be satisfied at any cost whatsoever.</br></br>Best Regards,</br>Adeepati's Owner</p></div>
<img class='trans' id='trans' src='img/logo.png'></img>
<div class='background' id='content'>
<?php }?>
	<div class='conctr'>
			<div id='content_frame' name='page' onLoad="RefreshCartandShow()">
				<?php $this->show($view) ?>
			</div>
			<div class='head'>
			<div class='logo'></div>
			<a href='cart.php' target='page'>
				<div class='shopping'>
					<p>Shopping Cart : </p>
				<img src='img/cart_black.png' style='margin-right:5px;'/>
				</div>
			</a>
			<div class='menu'>
				<a onclick="transition('slide.php')">
				<div class='permenu'>
					<div class='menuborder'></div>
					<div class='menutxt'><h1 id='txtmenu0' class='menu'>home</h1></div>
					<div class='menuborder'></div>
				</div>
				</a>
				<a onclick="transition('about.php')">
				<div class='permenu'>
					<div class='menuborder'></div>
					<div class='menutxt'><h1 id='txtmenu1' class='menu'>about</h1></div>
					<div class='menuborder'></div>
				</div>
				</a>
				<a onclick="transition('category.php')">
				<div class='permenu'>
					<div class='menuborder'></div>
					<div class='menutxt'><h1 id='txtmenu2' class='menu'>catalog</h1></div>
					<div class='menuborder'></div>
				</div>
				</a>
				<a onclick="transition('category.php')">
				<div class='permenu'>
					<div class='menuborder'></div>
					<div class='menutxt'><h1 id='txtmenu2' class='menu'>account</h1></div>
					<div class='menuborder'></div>
				</div>
				</a>
				<a onclick="transition('contact.php')">
				<div class='permenu'>
					<div class='menuborder'></div>
					<div class='menutxt'><h1 id='txtmenu3' class='menu'>contact us</h1></div>
					<div class='menuborder'></div>
				</div>
				</a>
			</div>
		</div>
			<h2 id='footer_txt'><b>www.adeepati.com Oficial Website</b></br>Explore The World at Rapid Speed</h2>
			<a href='https://twitter.com/_ADPT'><img title='@_ADPT' src='img/twitter.png' id='footer_img'/></a>
	</div>
<?php if (isset($effect)&&$effect) echo "</div>" ?>
</body>
</html>