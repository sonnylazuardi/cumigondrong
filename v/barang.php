<?php
		foreach ($model as $value) {
			echo $value->nama." ";
			echo $value->harga." ";
			echo $value->stok." ";
			echo $value->keterangan." ";
			echo "<img src='".$this->getBaseUrl()."/img/barang/".$value->gambar."'/>";
			echo "<br/>";
		}
?>