<?php
ob_start();
if(isset($_GET['id']))
{
	$rs=mysql_query("Select * from data_barang where sha1(kode_barang)='".$_GET['id']."'");
	$row=mysql_fetch_array($rs);
  ?>
  <!--Form without header-->
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <form name="form1" method="post" action="?cat=gudang&page=barangedit&id=<?php echo $_GET['id']; ?>&edit=1">
        <div class="card">
          <div class="card-block">

            <!--Header-->
            <div class="text-xs-center">
              <h3><i class="fa fa-lock"></i> Mengubah barang <?php echo $row['nama_barang']; ?>:</h3>
              <hr class="mt-2 mb-2">
            </div>

            <!--Body-->
            <div class="md-form">
              <i class="fa fa-envelope prefix"></i>
              <input type="text" id="form2" name="namabarang" class="form-control" value="<?php echo $row['nama_barang']; ?>">
              <label for="form2">Nama Barang</label>
            </div>

            <!--Blue select-->
            <div class="md-form">
              <select class="mdb-select colorful-select dropdown-primary" name="jenis">
                <option value="tidak ada">Jenis barang</option>
                <option value="panas">Panas</option>
                <option value="dingin">Dingin</option>
              </select>
            </div>
            <!--/Blue select-->


            <div class="text-xs-center">
              <button type="submit" name="button" class="btn btn-deep-purple">Ubah</button>
              <button type="reset" name="reset" class="btn btn-deep-purple" onclick="window.location='?cat=gudang&page=barang'">Kembali</button>
            </div>

          </div>

        </div>
      </form>
    </div>
    <div class="col-md-3"></div>
  </div>
  
  <?php
  ob_end_flush();
}else{
 echo "<script>window.location='?cat=gudang&page=barang'</script>";
}
?>
<?php
if(isset($_GET['edit']))
{

  $rs=mysql_query("Update data_barang SET nama_barang='".$_POST['namabarang']."',jenis_barang='".$_POST['jenis']."' Where sha1(kode_barang)='".$_GET['id']."'");
  if($rs)
  {
    echo "<script>window.location='?cat=gudang&page=barang'</script>";
  }
}
?>
