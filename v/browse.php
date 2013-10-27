<script type="text/javascript">
	function fitbarang(obj) {
		fitimg(obj,150,170,true,true);
	}
</script>
<h1 class='header'><?php echo $attribute->nama_kategori ?></h1>
<div class='prevarrow short' onclick='prevCategory()'></div>
<?php
	foreach ($model as $key=>$value) {
		if ($key<10) {
			if (($key==0)||(($key%2)==0)){
				echo "<div class='vertdiv'>";
			}
			echo "	<a href='".$this->getBaseUrl()."/barang/".$value->id."'><div class='itembox_img'><img onload='fitbarang(this)' src='".$this->getBaseUrl()."/img/barang/".$value->gambar."' onload='FitImage(this)'/></div></a>";
			// VERTICAL DIV CLOSER
			if (($key%2)==1||($key==(count($model)-1))||($key==9))echo "</div>";
		}
	}
?>
<div class='nextarrow short' onclick='prevCategory()'></div>