<?
session_start();
if(!isset($_SESSION["user_id"])){
?>
	<script type="text/javascript">
	alert("로그인 해주세요");
	window.location = "index.php";
	</script>";
<?
}else
{
	include("config.php");
	include("db.php");
	include("include/menu.php");
	$query_event_form = "select * from $table_name_event_form";
	$result_event_form = mysqli_query($connect, $query_event_form);
?>

<!DOCTYPE html>
<html lang="ko">
<head>


	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/manage_form.js"></script>
	<script type="text/javascript">
	</script>


	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="../../assets/ico/favicon.png">

	<title><?=$config_title ?> DB - 홈</title>

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
	td{
	   //border-width:1px;
	   //border-style:solid;
	   font-size:12px;
	   font-family-korean: "맑은 고딕", "Malgun Gothic", "나눔고딕", NanumGothic, "돋움", dotum, "Georgia Pro", Arial;
	}
	.replace{
		display:none;
	}
	</style>

</head>
<body>


<div class="navbar navbar-inverse navbar-fixed-top">
   <div class="container">
      <div class="navbar-header">
	 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	    <span class="icon-bar"></span>
	    <span class="icon-bar"></span>
	    <span class="icon-bar"></span>
	 </button>
	 <a class="navbar-brand" href="#"><?=$config_title?> DB</a>
      </div>
		<?menu_print("폼관리");?>

   </div>
</div>
<div class="container">
   <div class="starter-template">
      <br /><br />
      <br /><br />
      <h1><?=$config_title?> DB 페이지입니다</h1>
      <div>
	 <div>
	 </div>
	 <table class="table table-bordered" style="font-size:11px">
	    <tr>
	       <th style="width:50px" >아이디</th>
	       <th style="width:150px">광고명</th>
	       <th style="width:100px">폼타입</th>
	       <th style="width:100px">분류</th>
	       <th style="width:100px">메모</th>
	       <th style="width:40px">링크주소</th>
	       <th style="width:50px">생성일</th>
	       <th style="width:30px">기능</th>
	    </tr>
		<?

			while($row = mysqli_fetch_array($result_event_form)){
?>
		<tr>
			<td > <?=$row['id']?></td>
			<td > <?=$row['title']?></td>
			<td > <?=$row['form_type']?></td>
			<td > <?=$row['category']?></td>
			<td > <?=$row['comment']?></td>

			<?$form_type = $row['form_type'] ;
				if($form_type == '상단고정'){
			?>

			<td > <a href="page_pop.php?id=<?=$row['id']?>" target="_blank">링크</a></td>

			<?
			}else if($form_type == '일반' || $form_type == '중간폼'){
			?>

			<td > <a href="page.php?id=<?=$row['id']?>" target="_blank">링크</a></td>
			<?}else{?>
			<td > <a href="page/<?=$form_type?>/index.php?id=<?=$row['id']?>" target="_blank">링크</a></td>
			<?}?>
			<td > <?=$row['c_date']?></td>
			<td >
				<a href="edit_form.php?event_id=<?=$row['id']?>" >수정</a><br />
				<a href="proce.php?flag=form_delete&event_id=<?=$row['id']?>">삭제</a><br />
			</td>
		</tr>
		<?}?>
	 </table>
      </div>
   </div>
</div><!-- /.container -->
<div class="container"  style="text-align: center;">
</div>


<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../../assets/js/jquery.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
</body>
</html>


<?
	include("db_close.php");
}
?>
