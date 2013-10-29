
<?php if ($isSuccess){
		 	echo "<h1>Transaction Berhasil!</h1><LABEL>Selamat Anda telah menyelesaikan transaksi ini</LABEL>";
		 }else{
		 	echo "<h1>Transaction Gagal!</h1><LABEL>Maaf transaksi ini gagal!</LABEL><br/>";
		 	echo "<LABEL>";
		 }
?>
<LABEL>Untuk melakukan transaksi lain, silahkan klik <a href='<?php echo $this->getBaseUrl() . '/index/home'; ?>' >disini</a></LABEL>
