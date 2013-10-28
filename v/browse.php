<script type="text/javascript">
	function fitbarang(obj) {
		fitimg(obj,150,170,true,true);
	}
</script>
<h1 class='header'><?php echo $attribute->nama_kategori ?></h1>
<div class='prevarrow short' onclick='prevPage()'></div>
<?php
	$page_count = 1;
	$page = 1;
	echo "<div id='cont1' class='group_product_cont short";
	if ($page!=1) echo " hidden";
	echo "'>";
	foreach ($model as $key=>$value) {
		if ((($key%10)==0)&&($key!=0)) {
			$page_count++;
			echo "</div><div id='cont".$page_count."' class='group_product_cont short";
			if ($page_count!=$page) echo " hidden";
			echo "'>";
		}
		if (($key==0)||(($key%2)==0)){
			echo "<div class='vertdiv'>";
		}
		echo "	<a href='".$this->getBaseUrl()."/barang/".$value->id."'><div class='itembox_img' ><img title='".$value->nama." (IDR ".$this->toCurrency($value->harga).")' onload='fitbarang(this)' src='".$this->getBaseUrl()."/img/barang/".$value->gambar."' onload='FitImage(this)'/></div></a>";
		// VERTICAL DIV CLOSER
		if (($key%2)==1||($key==(count($model)-1))||($key==9))echo "</div>";
	}
?>
</div>
<div class='nextarrow short' onclick='nextPage()'></div>

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
	function nextPage() {
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
	function prevPage() {
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