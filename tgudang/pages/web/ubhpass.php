<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<!--Naked Form-->
		<form method="post">
			
			<div class="card-block">

				<!--Header-->
				<div class="text-xs-center">
					<h3><i class="fa fa-lock"></i> Perubahan password untuk <?php
						echo "".$_SESSION['login_user']."";
						?> :</h3>
						<hr class="mt-2 mb-2">
					</div>

					<!--Body-->
					<div class="md-form">
						<i class="fa fa-lock prefix"></i>
						<input type="password" id="form2" name="old_password" class="form-control">
						<label for="form2">Password lama</label>
					</div>

					<div class="md-form">
						<i class="fa fa-lock prefix"></i>
						<input type="password" id="form4" name="new_password" class="form-control">
						<label for="form4">Password baru</label>
					</div>

					<div class="text-xs-center">
						<button type="submit" name="button" class="btn btn-deep-purple">Ubah password</button>
					</div>

				</div>
				<!--Naked Form-->
			</form>
		</div>
		<div class="col-md-3"></div>
	</div>


<!-- 	<form method="post">
	<label>Password Lama</label>
	<input type="password" name="old_password">
	<label>Password Baru</label>
	<input type="password" name="new_password">
	<p></p>
	<input type="submit" class="btn btn-default" name="button" value="Ubah">
</form> -->
<?php
if(isset($_POST['button']))
{
	$sc1=sprintf("Select * from user_login where username='%s' and password='%s'",$_SESSION['login_user'],md5($_POST['old_password']));

	$q1=mysql_query($sc1);
	$rc1=mysql_num_rows($q1);
	if($rc1==1)
	{
		$sc2=sprintf("Update user_login Set password='%s' Where username='%s'",md5($_POST['new_password']),$_SESSION['login_user']);
		$q2=mysql_query($sc2);
		if($q2)
		{
			echo "<script>alert('Password berhasil diubah,silahkan login kembali nanti');window.location='beranda.php'</script>";
		}
	}else{
		echo "<script>alert('Verifikasi Password lama salah')</script>";
	}
}
?>