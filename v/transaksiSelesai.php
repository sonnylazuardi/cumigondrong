
<?php if ($isSuccess){
		 	echo "<h1 class='header'>Transaksi Berhasil!</h1><br/><LABEL>Selamat Anda telah menyelesaikan transaksi ini</LABEL>";
		 }else{
		 	echo "<h1 class='header'>Transaksi Gagal!</h1><br/><LABEL>Transaksi ini gagal dilakukan </LABEL>";
		 	if (isset($errorMsg)){
				echo "karena " . $errorMsg;		 		
		 	}
		 	echo "<br/><LABEL>";
		 }
?>
<LABEL>Untuk melakukan transaksi lain, silahkan klik <br/><br/><a class="btn" href='<?php echo $this->makeUrl("index/home"); ?>' >disini</a></LABEL>
