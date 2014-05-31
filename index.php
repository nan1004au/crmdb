<?
session_start();

if(isset($_SESSION["user_id"])){
?>
<script type="text/javascript">
window.location = "report.php";
</script>";
<?
}else
{



if($_SESSION["session_id"]) { //# 세션 변수가 존재하면 실행 #//
	echo "<script>alert('로그인 성공');location.href='report.php';</script>";
}else{
	$flag = "false";
}

?>

<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">

    <title><?=$config_title?> DB </title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){

	$('#login_btn').click(function(){
			login();
	});

	
	$('#pass').focus();
	$("#pass").bind("keydown", function(e) {
		if (e.keyCode == 13) { // enter key
			login();
		}
	});

	$('#user_id').focus();
	$("#pass").bind("keydown", function(e) {
		if (e.keyCode == 13) { // enter key
			login();
		}
	});

});

function login(){
		$.ajax({   
			type: "GET",   
			url: "proce.php",   
			data: {flag : 'login', user_id : $('#user_id').val() , pass : $('#pass').val()}   

		}).done(function( msg ) {   
			if(msg == "ok"){
				$(location).attr('href',"report.php");
			}else{
				
				alert(msg + "로그인실패 아이디와 비밀번호를 확인해 주세요");
			}
		});  


}
</script>

  </head>

  <body>

    <div class="container" style="width:300px">

      <form class="form-signin">
	<h2 class="form-signin-heading">관리자 로그인</h2>
	<input type="text" class="form-control" placeholder="id" id="user_id" autofocus>
	<input type="password" class="form-control" placeholder="Password" id="pass">
<br />
<!--	
	<label class="checkbox">
	  <input type="checkbox" value="remember-me"> Remember me
	</label>
--!>
	<button class="btn btn-lg btn-primary btn-block" id="login_btn" type="button">로그인하기 </button>
      </form>

    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>

<?}?>
