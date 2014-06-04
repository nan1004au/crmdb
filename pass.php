<?
$user_id = $_GET['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$user_id?> 패스워드 변경</title>
	<link href="dist/css/bootstrap.css" rel="stylesheet">
	<style>
		.pass{
			width:300px;
			margin:20px;
		}

		input[type="submit"]{
			width:100px;
			margin:20px;
		}

		h1{
			margin:30px;
			font-size:20px;
		}
	</style>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.validate.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$("#pass_form").validate({
			onkeyup:false,
			onclick:false,
			onfocusout:false,
			showErrors:function(errorMap, errorList){
				if(!$.isEmptyObject(errorList)){
					alert(errorList[0].message);
				}
			},
			rules:{
				pass1:{
					equalTo : "#pass2"
				}

			},
			messages: {
				pass1: "비밀번호가 다릅니다"
			}

	});
});


	</script>
</head>
<body>
	<form id="pass_form"  method="post" action="proce.php">
		<h1><?=$user_id?> 비밀번호 변경</h1>
		<input type="hidden" name="flag" value="edit_member_pass">
		<input type="hidden" name="user_id" value="<?=$user_id?>">
		<input id="pass1" name="pass1" class="pass form-control" type="password" placeholder="비밀번호를 입력해 주세요" >
		<input id="pass2" name="pass2" class="pass form-control" type="password" placeholder="한번 더 비밀번호를 입력해 주세요" >
		<input type="submit"  class="form-control" value="비밀번호 변경">
	</form>
</body>
</html>
