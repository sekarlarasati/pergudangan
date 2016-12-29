<?php
ob_start();
if(isset($_GET['id']))
{
	$rs=mysql_query("Select * from user_login where sha1(username)='".$_GET['id']."'");
	$row=mysql_fetch_array($rs);
  ?>
  <!--Form without header-->
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <form name="form1" method="post" action="?cat=administrator&page=useredit&id=<?php echo $_GET['id']; ?>&edit=1">
        <div class="card">
          <div class="card-block">

            <!--Header-->
            <div class="text-xs-center">
              <h3><i class="fa fa-lock"></i> Mengubah user <?php echo $row['username']; ?>:</h3>
              <hr class="mt-2 mb-2">
            </div>

            <!--Body-->
            <div class="md-form">
              <i class="fa fa-envelope prefix"></i>
              <input type="text" id="form2" name="username" class="form-control" value="<?php echo $row['username']; ?>" disabled>
              <label for="form2">Username</label>
            </div>

            <div class="md-form">
              <i class="fa fa-lock prefix"></i>
              <input type="password" id="form4" name="password" class="form-control" value="<?php echo $row['password']; ?>">
              <label for="form4">Password</label>
            </div>


            <!--Blue select-->
            <div class="md-form">
              <select class="mdb-select colorful-select dropdown-primary" name="jenis">
                <option value="tidak ada">Jenis user</option>
                <option value="gudang">Gudang</option>
                <option value="sekretaris">Sekretaris</option>
                <option value="pimpinan">Pimpinan</option>
              </select>
            </div>
            <!--/Blue select-->


            <div class="text-xs-center">
              <button type="submit" name="button" class="btn btn-deep-purple">Ubah</button>
              <button type="reset" name="reset" class="btn btn-deep-purple" onclick="window.location='?cat=administrator&page=user'">Kembali</button>
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
 echo "<script>window.location='?cat=administrator&page=user'</script>";
}
?>
<?php
if(isset($_GET['edit']))
{

 $rs=mysql_query("Update user_login SET password='".md5($_POST['password'])."',login_hash='".$_POST['jenis']."' Where sha1(username)='".$_GET['id']."'");
 if($rs)
 {
  echo "<script>window.location='?cat=administrator&page=user'</script>";
}
}
?>
