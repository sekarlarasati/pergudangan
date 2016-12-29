<?php
ob_start();
?>
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <!--Form without header-->
    <form name="form1" method="post" action="?cat=gudang&page=barang&act=1">
      <div class="card">
        <div class="card-block">

          <!--Header-->
          <div class="text-xs-center">
            <h3><i class="fa fa-lock"></i> Barang Management:</h3>
            <hr class="mt-2 mb-2">
          </div>

          <!--Body-->
          <div class="md-form">
            <i class="fa fa-envelope prefix"></i>
            <input type="text" id="form2" name="namabarang" class="form-control">
            <label for="form2">Nama Barang</label>
          </div>

          <!--Blue select-->
          <div class="md-form">
            <select class="mdb-select colorful-select dropdown-primary" name="jenis">
              <option value="1">Jenis barang</option>
              <option value="panas">Panas</option>
              <option value="dingin">Dingin</option>
            </select>
          </div>
          <!--/Blue select-->


          <div class="text-xs-center">
            <button type="submit" name="button" class="btn btn-deep-purple">Daftar</button>
            <button type="reset" name="reset" class="btn btn-deep-purple">Reset</button>
          </div>

        </div>

      </div>
    </form>
<!-- /Form without header
<form name="form1" method="post" action="?cat=administrator&page=user&act=1">
  <label>Username</label>

  <input type="text" name="username" id="username">
  <label>Password</label>
  <input type="text" name="password" id="password">
  <label>Jenis Login</label>
  <select name="jenis" id="jenis">
    <option value="gudang">Bagian Gudang</option>
    <option value="sekretaris">Sekretaris</option>
    <option value="pimpinan">Pimpinan</option>
  </select>

  <p></p>
  <input type="submit" class="btn btn-primary" name="button" id="button" value="Daftar">&nbsp;&nbsp;<input type="reset" class="btn btn-danger" name="reset" id="reset" value="Reset">
</form> -->
<?php
ob_end_flush();
/*$count_query   = mysql_query("SELECT COUNT(data_barang.kode_barang) AS numrows,data_barang.kode_barang, data_barang.nama_barang, data_barang.jenis_barang, data_persediaan.stok_tersedia
  FROM data_barang LEFT JOIN data_persediaan ON data_barang.kode_barang = data_persediaan.kode_barang");
*/
  
//jalankan query menampilkan data per blok $offset dan $per_hal
$query = mysql_query("SELECT data_barang.kode_barang, data_barang.nama_barang, data_barang.jenis_barang, data_persediaan.stok_tersedia
  FROM data_barang LEFT JOIN data_persediaan ON data_barang.kode_barang = data_persediaan.kode_barang GROUP BY data_barang.kode_barang");
  ?>
  <table class="table table-striped">
    <thead class="thead-inverse">
      <tr>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Jenis Barang</th>
        <th>Stok Tersedia</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($result=mysql_fetch_array($query))
      {
        ?>
        <tr>
          <td><?php echo $result['kode_barang']; ?></td>
          <td><?php echo $result['nama_barang']; ?></td> 
          <td><?php echo $result['jenis_barang']; ?></td> 
          <td><?php echo $result['stok_tersedia']; ?></td> 
          <td><a href="?cat=gudang&page=barangedit&id=<?php echo sha1($result['kode_barang']); ?>" class="teal-text"><i class="fa fa-pencil"></i></a> - <a href="?cat=gudang&page=barang&del=1&id=<?php echo sha1($result['kode_barang']); ?>" class="red-text"><i class="fa fa-times"></a></td>
        </tr>
        <?php
      }
      ?>


    </tbody>
  </table>
  <?php
  if(isset($_GET['act']))
  {

    $rs=mysql_query("Insert into data_barang (`nama_barang`,`jenis_barang`) values ('".$_POST['namabarang']."','".$_POST['jenis']."')") or die(mysql_error());
    if($rs)
    {

      echo "<script>window.location='?cat=gudang&page=barang'</script>";
    }
  }
  ?>

  <?php
  if(isset($_GET['del']))
  {
    $ids=$_GET['id'];
    $ff=mysql_query("Delete from data_barang Where sha1(kode_barang)='".$ids."'");
    if($ff)
    {
      echo "<script>window.location='?cat=gudang&page=barang'</script>";
    }
  }
  ?>
</div>
<div class="col-md-2"></div>
</div>

