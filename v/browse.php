<?php 
$query = array(
	'q'=>(isset($_GET['q']) ? 'q='.$_GET['q'] : null),
	'sort'=>(isset($_GET['sort']) ? 'sort='.$_GET['sort'] : null),
	'hal'=>(isset($_GET['hal']) ? 'hal='.$_GET['hal'] : null),
	'kat'=>(isset($_GET['kat']) ? 'kat='.$_GET['kat'] : null),
	'h1'=>(isset($_GET['h1']) ? 'h1='.$_GET['h1'] : null),
	'h2'=>(isset($_GET['h2']) ? 'h2='.$_GET['h2'] : null)
);
?>

<script type="text/javascript">
	function fitbarang(obj) {
		fitimg(obj,150,170,true,true,false);
	}
</script>

<div class="sorting">
	Urutan : 
	<?php 
		$query['sort'] = 'sort=nama asc';
		if (isset($_GET['sort'])) if ($_GET['sort'] == 'nama asc') $query['sort'] = 'sort=nama desc';
	?>
	<a href="?<?php echo implode('&', array_filter($query)) ?>" class="btn">Nama</a> 
	<?php 
		$query['sort'] = 'sort=harga asc';
		if (isset($_GET['sort'])) if ($_GET['sort'] == 'harga asc') $query['sort'] = 'sort=harga desc';
	?>
	<a href="?<?php echo implode('&', array_filter($query)) ?>" class="btn">Harga</a>
</div>
<div class="pagination"><?php echo $paging; ?></div>


<h1 class='header'><?php echo $title ?></h1>


<div id='cont1' class='group_product_cont short'>
	<?php
		if ($model == null) $model = array();
		foreach ($model as $key=>$value) {
			if (($key==0)||(($key%2)==0)){
				echo "<div class='vertdiv'>";
			}
			echo "	<a href='".$this->getBaseUrl()."/barang/".$value->id."'><div class='itembox_img'><img onload='fitbarang(this)' src='".$this->getBaseUrl()."/img/barang/".$value->gambar."' onload='FitImage(this)'/></div></a>";
			// VERTICAL DIV CLOSER
			if (($key%2)==1||($key==(count($model)-1))||($key==9))echo "</div>";
		}
	?>
</div>