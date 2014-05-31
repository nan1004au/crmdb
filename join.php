<?

include("config.php");
include("db.php");

?>
<!DOCTYPE html>
<html lang="ko">
<head>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#join_btn').click(function(){
		$.ajax({   
			type: "GET",   
			url: "proce.php",   
			data: {flag : "join", user_id : $('#user_id').val() , pass : $('#pass').val()	}   
		}).done(function( msg ) {   
			alert(msg + " 가입되었습니다");
			$(location).attr('href',"index.php");
		});  
	});
});
</script>


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="../../assets/ico/favicon.png">

<title>오로라 클리닉 DB - 홈</title>

<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="starter-template.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
<style tyle="text/css">
</style>

</head>

<body>

<br />
<br />
<br />

<div class="navbar navbar-inverse navbar-fixed-top">
   <div class="container">
      <div class="navbar-header">
	 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	    <span class="icon-bar"></span>
	    <span class="icon-bar"></span>
	    <span class="icon-bar"></span>
	 </button>
	 <a class="navbar-brand" href="#">Aurora Clinic DB</a>
      </div>
      <div class="collapse navbar-collapse">
	 <ul class="nav navbar-nav">
	    <li><a href="#">홈</a></li>
	    <li class="active"><a href="report.php">보고서</a></li>
	    <li><a href="#about">분석</a></li>
	    <li><a href="#about">폼생성</a></li>
	    <li><a href="#about">폼관리</a></li>
    </ul>
      </div><!--/.nav-collapse -->
   </div>
</div>
<div class="container">
   <div class="starter-template">
	   <div style="width:300px" >
		    <h1>회원가입</h1>
		    * 아이디 <input class="form-control"  type="textbox" id="user_id" />
		    <br />
		    * 패스워드 <input class="form-control"  type="password" id="pass" />
		    <br />
		    <input type="button" id="join_btn" class="btn btn-default" value="가입하기"/>
	</div>
   </div>
</div><!-- /.container -->


<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
</body>
</html>


<?
include("db_close.php");
?>
