<?php
		// foreach ($model as $value) {
		// 	echo $value->id." ";
		// 	echo $value->nama_kategori." ";
		// 	// echo "<img src='".$this->getBaseUrl()."/img/barang/".$value->gambar."'/>";
		// 	echo "<br/>";
		// }

?>
<div id='prevarrow' onclick='prevCategory()'></div>
<div class='group_product_cont' id='cont1'>
	<div class='prodcont' id='prod_kemeja' style='margin-left:5px'>
		<div class='nativearea' id='native1'></div>
		<div class='cat_title'><h3 class='layout_cat' style='margin-top:9px'>AMITOLA</h3><p class='layout_detail' style='font-size:12px'><b>Center of Attention</b></p><p class='layout_detail'>-Picture Parterned Shirt-</p></div>
		<div class='cat_detail'></div>
		<!--<a href='browse.php?cat=FO' target=''><div class='browse'><h1>BROWSE</h1></div></a>-->
		<div class='browse'><h1 class='comingsoon'>COMING SOON</h1></div>
	</div>
	<div class='prodcont' id='prod_case'>
		<div class='nativearea' id='native3'></div>
		<div class='cat_title'><h3 style='margin-top:9px'>ELMOZA</h3><p class='layout_detail' style='font-size:12px'><b>Smart Looking and Classy</b></p><p class='layout_detail'>-Gadget Case-</p></div>
		<div class='cat_detail'></div>
		<a href='elmoza.php' target=''><div class='browse'><h1>BROWSE</h1></div></a>
		<!--<div class='browse'><h1 class='comingsoon'>COMING SOON</h1></div>-->
	</div>
	<div class='prodcont' id='prod_parfum' style='margin-right:5px'>
		<div class='nativearea' id='native2'></div>
		<div class='cat_title'><h3 style='margin-top:1px'>PERLA</h3><p class='layout_detail' style='font-size:12px'><b>Being Trendy and High Sense of Belonging to Indonesia</b></p><p class='layout_detail'>-Air Freshener-</p></div>
		<div class='cat_detail'></div>
		<a href='perla.php' target=''><div class='browse'><h1>BROWSE</h1></div></a>
		<!--<div class='browse'><h1 class='comingsoon'>COMING SOON</h1></div>-->
	</div>
</div>
<div class='group_product_cont hidden' id='cont2'>
	<div class='prodcont' id='prod_kemeja' style='margin-left:5px'>
		<div class='nativearea' id='native1'></div>
		<div class='cat_title'><h3 class='layout_cat' style='margin-top:9px'>AMITOLA 2</h3><p class='layout_detail' style='font-size:12px'><b>Center of Attention</b></p><p class='layout_detail'>-Picture Parterned Shirt-</p></div>
		<div class='cat_detail'></div>
		<!--<a href='browse.php?cat=FO' target=''><div class='browse'><h1>BROWSE</h1></div></a>-->
		<div class='browse'><h1 class='comingsoon'>COMING SOON</h1></div>
	</div>
	<div class='prodcont' id='prod_case'>
		<div class='nativearea' id='native3'></div>
		<div class='cat_title'><h3 style='margin-top:9px'>ELMOZA 2</h3><p class='layout_detail' style='font-size:12px'><b>Smart Looking and Classy</b></p><p class='layout_detail'>-Gadget Case-</p></div>
		<div class='cat_detail'></div>
		<a href='elmoza.php' target=''><div class='browse'><h1>BROWSE</h1></div></a>
		<!--<div class='browse'><h1 class='comingsoon'>COMING SOON</h1></div>-->
	</div>
	<div class='prodcont' id='prod_parfum' style='margin-right:5px'>
		<div class='nativearea' id='native2'></div>
		<div class='cat_title'><h3 style='margin-top:1px'>PERLA 2</h3><p class='layout_detail' style='font-size:12px'><b>Being Trendy and High Sense of Belonging to Indonesia</b></p><p class='layout_detail'>-Air Freshener-</p></div>
		<div class='cat_detail'></div>
		<a href='perla.php' target=''><div class='browse'><h1>BROWSE</h1></div></a>
		<!--<div class='browse'><h1 class='comingsoon'>COMING SOON</h1></div>-->
	</div>
</div>
<div id='nextarrow' onclick='nextCategory()'></div>
<script type="text/javascript">
	function showCategory() {
		var n = 1;
		while (document.querySelectorAll('#cont'+n).length) {
			if (!document.querySelectorAll('#cont'+n+'.hidden').length) return n;
			n++;
		}
		return 0;
	}

	var show = showCategory();
	var items = document.querySelectorAll('.group_product_cont').length;
	
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
	function nextCategory () {
		if (show<items) {
			var x,y,vara,varb,varc,vard;
			vara = 0;
			varb = 0;
			for (x=0;x<=11;x++){
				setTimeout(function(){
					document.getElementById('cont'+show).style.opacity = 1-(0.1*vara);
					if (vara==10) addClass(document.getElementById('cont'+show), " hidden");
					vara++;
					console.log(x+' : cont'+show);
				}, (50*(varb+1)));
				varb++;
			}
			setTimeout(function(){
				show++;
				varc = 0;
				vard = 0;
				for (y=0;y<=11;y++){
					setTimeout(function(){
						if (varc==0) removeClass(document.getElementById('cont'+show), "hidden");
						document.getElementById('cont'+show).style.opacity = 0.1*varc;
						varc++;
						console.log(y+' : cont'+show);
					}, (120+(50*(vard+1))));
					vard++;
				}
			},600);
		}
	}
	function prevCategory () {
		if (show>1) {
			var x,y,vara,varb,varc,vard;
			vara = 0;
			varb = 0;
			for (x=0;x<=11;x++){
				setTimeout(function(){
					document.getElementById('cont'+show).style.opacity = 1-(0.1*vara);
					if (vara==10) addClass(document.getElementById('cont'+show), " hidden");
					vara++;
					console.log(x+' : cont'+show);
				}, (50*(varb+1)));
				varb++;
			}
			setTimeout(function(){
				show--;
				varc = 0;
				vard = 0;
				for (y=0;y<=11;y++){
					setTimeout(function(){
						if (varc==0) removeClass(document.getElementById('cont'+show), "hidden");
						document.getElementById('cont'+show).style.opacity = 0.1*varc;
						varc++;
						console.log(y+' : cont'+show);
					}, (120+(50*(vard+1))));
					vard++;
				}
			},600);
		}
	}
</script>