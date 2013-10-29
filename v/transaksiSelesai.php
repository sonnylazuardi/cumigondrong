
<?php if ($isSuccess){
		 	echo "<h1 class='header'>Transaction Berhasil!</h1><br/><LABEL>Selamat Anda telah menyelesaikan transaksi ini</LABEL>";
		 }else{
		 	echo "<h1 class='header'>Transaction Gagal!</h1><br/><LABEL>Transaksi ini gagal dilakukan </LABEL>";
		 	if (isset($errorMsg)){
				echo "karena " . $errorMsg;		 		
		 	}
		 	echo "<br/><LABEL>";
		 }
?>
<LABEL>Untuk melakukan transaksi lain, silahkan klik <a href='<?php echo $this->getBaseUrl() . '/index/home'; ?>' >disini</a></LABEL>
