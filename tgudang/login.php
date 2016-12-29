
<!--Form with header-->
<form id="loginform" action="index.php?login_attempt=1" method="post">

	<div class="card">
		<div class="card-block">

			<!--Header-->
			<div class="form-header  primary-color-dark darken-4">
				<h3><i class="fa fa-lock"></i> Login:</h3>
			</div>

			<!--Body-->
			<div class="md-form">
				<i class="fa fa-envelope prefix"></i>
				<input type="text" id="form2" name="username" class="form-control">
				<label for="form2">Your Username</label>
			</div>

			<div class="md-form">
				<i class="fa fa-lock prefix"></i>
				<input type="password" id="form4" name="password" class="form-control">
				<label for="form4">Your password</label>
			</div>

			<div class="text-xs-center">
				<button class="btn primary-color-dark">Login</button>
			</div>

		</div>

		<!--Footer-->

	</div>
</form>
<!--/Form with header-->

<!-- <form id="loginform" action="index.php?login_attempt=1" method="post">
	<p class="animate4 bounceIn"><input type="text" id="username" name="username" placeholder="Username" /></p>
	<p class="animate5 bounceIn"><input type="password" id="password" name="password" placeholder="Password" /></p>
	<p class="animate6 bounceIn"><button class="btn btn-default btn-block">Masuk</button></p>

</form> -->


<?php
if(isset($_GET['login_attempt']))
{
	$spf=sprintf("Select * from user_login where username='%s' and password='%s'",$_POST['username'],md5($_POST['password']));
	$rs=mysql_query($spf);
	$rw=mysql_fetch_array($rs);
	$rc=mysql_num_rows($rs);
	
	if($rc==1)
	{
		$_SESSION['login_hash']=$rw['login_hash'];
		$_SESSION['login_user']=$rw['username'];
		echo "<script>window.location='beranda.php'</script>";
	}
}
?>