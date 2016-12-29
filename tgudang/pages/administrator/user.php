<?php
ob_start();
?>
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <!--Form without header-->
    <form name="form1" method="post" action="?cat=administrator&page=user&act=1">
      <div class="card">
        <div class="card-block">

          <!--Header-->
          <div class="text-xs-center">
            <h3><i class="fa fa-lock"></i> User Management:</h3>
            <hr class="mt-2 mb-2">
          </div>

          <!--Body-->
          <div class="md-form">
            <i class="fa fa-envelope prefix"></i>
            <input type="text" id="form2" name="username" class="form-control">
            <label for="form2">Username</label>
          </div>

          <div class="md-form">
            <i class="fa fa-lock prefix"></i>
            <input type="password" id="form4" name="password" class="form-control">
            <label for="form4">Password</label>
          </div>


          <!--Blue select-->
          <div class="md-form">
            <select class="mdb-select colorful-select dropdown-primary" name="jenis">
              <option value="1">Jenis user</option>
              <option value="gudang">Gudang</option>
              <option value="sekretaris">Sekretaris</option>
              <option value="pimpinan">Pimpinan</option>
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
?>
<table class="table table-striped">
  <thead class="thead-inverse">
    <tr>
      <th>Username</th>
      <th>Jenis Login</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $rw=mysql_query("Select * from user_login");
    while($s=mysql_fetch_array($rw))
    {
      ?>
      <tr>
        <td><?php echo $s['username']; ?></td>
        <td><?php echo $s['login_hash']; ?></td>
        <td><a href="?cat=administrator&page=useredit&id=<?php echo sha1($s['username']); ?>" class="teal-text"><i class="fa fa-pencil"></i></a> - <a href="?cat=administrator&page=user&del=1&id=<?php echo sha1($s['username']); ?>" class="red-text"><i class="fa fa-times"></a></td>
      </tr>
      <?php
    }
    ?>


  </tbody>
</table>
<?php
if(isset($_GET['act']))
{

  $rs=mysql_query("Insert into user_login (`username`,`password`,`login_hash`) values ('".$_POST['username']."','".md5($_POST['password'])."','".$_POST['jenis']."')") or die(mysql_error());
  if($rs)
  {
    echo "<script>window.location='?cat=administrator&page=user'</script>";
  }
}
?>

<?php
if(isset($_GET['del']))
{
  $ids=$_GET['id'];
  $ff=mysql_query("Delete from user_login Where sha1(username)='".$ids."'");
  if($ff)
  {
    echo "<script>window.location='?cat=administrator&page=user'</script>";
  }
}
?>
</div>
<div class="col-md-2"></div>
</div>

