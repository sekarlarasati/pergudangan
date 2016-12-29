<script src="js/jquery-ui.js"></script>

<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <!--Form without header-->
    <form name="form1" method="post" action="" autocomplete="on">
      <div class="card">
        <div class="card-block">

          <!--Header-->
          <div class="text-xs-center">
            <h3><i class="fa fa-lock"></i> Barang Masuk:</h3>
            <hr class="mt-2 mb-2">
          </div>

          <!--Body-->


          <div class="md-form">
            <input placeholder="Selected date" type="text" id="date-picker-example" class="form-control datepicker" name="tglr">
            <label for="date-picker-example">Pilih tanggal : </label>
          </div>
          
          <div class="md-form">
            <i class="fa fa-envelope prefix"></i>
            <input type="text" id="kodebarang" name="kodebarang" class="form-control" onClick="window.open('http://localhost/tgudang/pages/web/viewbarang.php','popuppage','width=500,toolbar=0,resizable=0,scrollbars=no,height=400,top=100,left=100');">
            <label for="kodebarang">Pilih kode barang</label>
          </div>

          <div class="md-form">
            <i class="fa fa-envelope prefix"></i>
            <input type="text" id="namabarang" name="namabarang" class="form-control" value="Nama barang" disabled>
            <label for="namabarang">Nama barang</label>
          </div>

          <div class="md-form">
            <i class="fa fa-envelope prefix"></i>
            <input type="text" id="qty" name="qty" class="form-control">
            <label for="qty">Jumlah barang</label>
          </div>



          <div class="text-xs-center">
            <button type="submit" name="button" class="btn btn-deep-purple">Tambah</button>
          </div>

        </div>

      </div>
    </form>
  </div>
  <div class="col-md-2"></div>
</div>
<?php
if(isset($_POST['button']))
{
	$newDate = date("Y-m-d", strtotime($_POST['tglr']));
	$q=mysql_query("Insert into barang_masuk (`tgl`,`kode_barang`,`jumlah`) values ('".$newDate."','".$_POST['kodebarang']."','".$_POST['qty']."')") or die(mysql_error());
	$q2=mysql_query("Select * from data_persediaan where kode_barang='".$_POST['kodebarang']."'");
	$rc=mysql_num_rows($q2);
	if($rc==1)
	{
		$q3=mysql_query("Update data_persediaan SET masuk=masuk + ".$_POST['qty'].",stok_tersedia=stok_tersedia + ".$_POST['qty']." Where kode_barang='".$_POST['kodebarang']."'");
		if($q3)
		{
			echo "Data sudah disimpan";
		}
	}else{
		$q4=mysql_query("Insert into data_persediaan (`kode_barang`,`stok_awal`,`masuk`,`stok_tersedia`) values ('".$_POST['kodebarang']."','".$_POST['qty']."','".$_POST['qty']."','".$_POST['qty']."')");
		if($q4)
		{
			echo "Data sudah disimpan";
		}
	}
}
?>
