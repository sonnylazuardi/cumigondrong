<script type="text/javascript">
	function fitbarang(obj) {
		fitimg(obj,170,170,true,true);
	}
</script>
<h1 class='header'><?php echo $attribute->nama_kategori ?></h1>

<?php
	foreach ($model as $key=>$value) {
		// echo $value->nama." ";
		// echo $value->harga." ";
		// echo $value->stok." ";
		// echo $value->keterangan." ";
		// echo "<img src='".$this->getBaseUrl()."/img/barang/".$value->gambar."'/>";
		// echo "<br/>";
		// VERTICAL DIVIDER CONSTRUCTION
		// DIV CONSTRUCTION
		if ($key==0) echo "<div class='wrapH'><div id='contentH'><div class='scrollH'>";
		if (($key==0)||(($key%2)==0)){
			echo "<div class='vertdiv'>";
		}
		echo "	<a href='product.php?id=1'><div class='itembox_img'><img onload='fitbarang(this)' src='".$this->getBaseUrl()."/img/barang/2.jpg' onload='FitImage(this)'/></div></a>";
		// VERTICAL DIV CLOSER
		if (($key%2)==1) echo "</div>";
	}
		// if ($n==0) echo "	<div style='position:absolute;width:400px;height:180px;left:50%;top:50%;margin-left:-200px;margin-top:-90px;text-align:center'>
		// 						<img src='img/adeepati.png' />
		// 						<p style='text-align:center;color:#808080'>No item.</p>
		// 					</div>";
		// else 
	echo "</div></div></div>";
?>