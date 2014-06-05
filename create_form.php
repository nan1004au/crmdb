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
	?>

		<!DOCTYPE html>
		<html lang="ko">
		<head>

		<script type="text/javascript" src="js/all.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/create_form.js"></script>
		<link rel="stylesheet" type="text/css" href="css/create_form.css" />
		<link href="css/all.css" rel="stylesheet">
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


		<?menu_print("폼생성");?>

		<div class="container">
		<div class="starter-template">
		<h1><?=$config_title?> 폼 생성 페이지입니다</h1>
		<form role="form" action="proce.php" method="post" id="create_form_form"  enctype="multipart/form-data" class="form-horizontal" >
		<input type="hidden" name="flag" id="flag" value="event_create">
		<input type="hidden" name="form_type" id="form_type" value="일반">
		<input type="hidden" name="price_count" id="price_count" value="1">


		<div class="form-group">
		<label for="exampleInputEmail1">이벤트 제목</label>
		<input type="text" style="width:300px;display:block" class="" name="event_title" id="event_title" placeholder="이벤트  제목을 입력해 주세요">
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">이벤트 아이디</label>
			<input type="text"  style="width:300px;display:block" class="" name="event_id"  id="event_id" placeholder="이벤트  아이디을 입력해 주세요">
			<br />

			<label for="exampleInputEmail1">분류 </label>
			<select style="width:100px;display:block" id="cate" name = "cate"class="">
				<option value="일반" selected>일반</option>
				<option value="체험단">체험단</option>
				<option value="사연">사연</option>
				<option value="기타">기타</option>
			</select>

			<br />

			<div class="panel panel-default" style="width:600px"> 
				<div class="panel-heading">출력 옵션 선택</div>
					<div class="panel-body">

						<label style="width:100px; margin-left:10px"> <input type="checkbox" id="ch_name"  name="ch_name" value="ch_name"> 이름 </label>
						<label style="width:100px; margin-left:10px"> <input type="checkbox" id="ch_age" name="ch_age" value="ch_age"> 나이 </label>
						<label style="width:100px; margin-left:10px"> <input type="checkbox" id="ch_sex" name="ch_sex" value="ch_sex"> 성별  </label>
						<label style="width:100px; margin-left:10px"> <input type="checkbox" id="ch_day" name="ch_day" value="ch_day"> 예약날짜  </label>
						<br />
						<label style="width:100px; margin-left:10px"> <input type="checkbox" id="ch_time" name="ch_time" value="ch_time"> 통화시간 </label>
						<label style="width:100px; margin-left:10px"> <input type="checkbox" id="ch_phone" name="ch_phone" value="ch_phone"> 연락처 </label>
						<label style="width:100px; margin-left:10px"> <input type="checkbox" id="ch_price" name="ch_price" value="ch_price"> 종류/가격 </label>
						<label style="width:100px; margin-left:10px"> <input type="checkbox" id="ch_branch" name="ch_branch" value="ch_branch"> 지점 </label>
						<br />
						<label style="width:100px; margin-left:10px"> <input type="checkbox" id="ch_email" name="ch_email" value="ch_email"> 이메일 </label>
						<label style="width:100px; margin-left:10px"> <input type="checkbox" id="ch_story" name="ch_story" value="ch_story"> 사연 </label>
						<label style="width:100px; margin-left:10px"> <input type="checkbox" id="ch_group" name="ch_group" value="ch_group"> 진료선택 </label>
						<label style="width:150px; margin-left:10px"> <input type="checkbox" id="ch_agree" name="ch_agree" value="ch_agree"> 개인정보동의</label>
					</div>
				</div>
			</div>

		</div>
		<label for="exampleInputEmail1">폼 스킨 </label>
		<div class="form-group">
			<select style="width:100px;display:block" id="form_type" name = "form_type"class="">
		<?
			$d= dir("page/");
			while(false!==($entry = $d->read())){
				if($entry == '.' || $entry == ".." || $entry == 'img') continue;
				echo "<option value=\"$entry\">$entry</option> \n";
			}
		?>	

			</select>

		</div>

		<div id="image_div_01" class="form-group">
		<label for="exampleInputFile">이벤트 이미지 01 </label>
		<input type="file" id="event_img_01" name="event_img_01" >
		<p class="help-block">이미지 가로크기는 800px로 해주세요</p>
		</div>

		<div id="image_div_02" class="form-group">
		<label for="exampleInputFile">이벤트 이미지 02</label>
		<input type="file" id="event_img_02" name="event_img_02" >
		<p class="help-block">이미지 가로크기는 800px로 해주세요</p>
		</div>


		<div id="price_group" class="form-group">
			<div class="form-group">
			<?
				for($i=1; $i<11;$i++){
			?>
				<div id="price_div_<?=$i?>">
					<label style="width:80px;"  class="col-lg-2" for="exampleInputFile" id="event1" name="event1">종류 <?=$i?></label>

					<input style="width:200px;"  class="col-lg-2 " type="text" id="event<?=$i?>_name" name="event<?=$i?>_name"  placeholder="">

					<label  style="width:80px;" class="col-lg-2" for="exampleInputFile">가격 </label>

					<input style="width:200px;" type="text" class="" id="event<?=$i?>_name" name="event<?=$i?>_price" placeholder="">
				</div>
			<?}?>
			<br />
					<button type="button" id="btn-price" style="margin-left:500px;margin-top:20px;" class="">종류 추가</button>
					<span id="span-price" style="margin-left:500px;margin-top:20px;" >종류는 10개까지 가능합니다</span>
			</div>
		</div>
		<p class="help-block">* 종류에 "종아리퇴축술" 가격에 "88만원" 입력시에  "종아리퇴축술 88만원"</p>

		<div class="">
		<label for="exampleInputEmail1">메모</label>
		<textarea class="" style="width:560px;" rows="3" id="event_comment" name="event_comment"></textarea>
		</div>
		<br />
		<button type="submit" class="">이벤트 만들기</button>
		</form>
		</div>
		</div>


		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="assets/js/jquery.js"></script>
		<script src="dist/js/bootstrap.min.js"></script>
		</body>
		</html>

		<?
		include("db_close.php");
}
?>
