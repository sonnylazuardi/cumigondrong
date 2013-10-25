<h1>Shopping bag</h1>

<form method="post" action = "<?php echo $this->getBaseUrl() ?>/shopping/updateBagContent">
	<?php
			
			$array = $model->cariSemua();
			foreach ($array as $item) {
				echo $item->nama . '<input type="text" name="bag['.$item->nama.']" id="bag['.$item->nama.']" value=""> <br>';
			}
			
	?>

<button type ="submit">update</button>

</form>

