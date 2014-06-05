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


	$get_event_id = $_GET['event_id'];
	$query = "select * from $table_name_event_form where id like '$get_event_id'";
	$result = mysqli_query($connect, $query);
	$row = mysqli_fetch_array($result);

	//기본데이터 
	$event_title =  $row['title'];
	$event_id =  $row['id'];
	$event_img_01 =  $row['img_hash_01'];
	$event_img_02 =  $row['img_hash_02'];
	$event_comment = $row['comment'];
	$form_type= $row['form_type'];
	$category= $row['category'];

	//체크박스 데이터
	$ch_name =  $row['ch_name']; //이름
	$ch_age =   $row['ch_age'];//나이
	$ch_sex =   $row['ch_sex'];//성별
	$ch_day =   $row['ch_day'];//날짜
	$ch_time =   $row['ch_time'];//시간
	$ch_phone =   $row['ch_phone'];//연락처
	$ch_price =   $row['ch_price'];//가격
	$ch_branch =   $row['ch_branch'];//지점
	$ch_email =   $row['ch_email'];//이메일
	$ch_story =   $row['ch_story'];//사연 문의 
	$ch_group =   $row['ch_group'];//진료선택
	$ch_agree=   $row['ch_agree'];//개인정보 동의

	$query = "select * from $table_name_event_list where event_id like '$get_event_id'";
	$result_event = mysqli_query($connect, $query);
	$row_count = mysqli_num_rows($result_event);



	?>

		<!DOCTYPE html>
		<html lang="ko">
		<head>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/create_form.js">
		<script type="text/javascript" src="js/all.js"></script>
		</script>
		<script type="text/javascript">
			$(window).load(function(){
				ch_togle('ch_name','<?=$ch_name?>');
				ch_togle('ch_age','<?=$ch_age?>');
				ch_togle('ch_sex','<?=$ch_sex?>');
				ch_togle('ch_day','<?=$ch_day?>');
				ch_togle('ch_time','<?=$ch_time?>');
				ch_togle('ch_phone','<?=$ch_phone?>');
				ch_togle('ch_price','<?=$ch_price?>');
				ch_togle('ch_branch','<?=$ch_branch?>');
				ch_togle('ch_email','<?=$ch_email?>');
				ch_togle('ch_story','<?=$ch_story?>');
				ch_togle('ch_group','<?=$ch_group?>');
				ch_togle('ch_agree','<?=$ch_agree?>');

				form_type_select('<?=$form_type?>');
				show_price(<?=$row_count?>);	
				
			});


		</script>
		<link rel="stylesheet" type="text/css" href="css/create_form.css" />
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

		<link href="css/all.css" rel="stylesheet">
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
			

<?menu_print("보고서");?>

		<div class="container">
		<div class="starter-template">
		<h1><?=$config_title?> 폼 생성 페이지입니다</h1>
		<form role="form" action="proce.php" method="post" id="create_form_form"  enctype="multipart/form-data" class="form-horizontal" >
		<input type="hidden" name="flag" id="flag" value="form_edit">
		<input type="hidden" name="form_type" id="form_type" value="<?=$form_type?>">
		<input type="hidden" name="price_count" id="price_count" value="1">


		<div class="form-group">
		<label for="exampleInputEmail1">이벤트 제목</label>
		<input type="text" style="width:300px;display:block" class="" name="event_title" id="event_title" value="<?=$event_title?>"  placeholder="이벤트  제목을 입력해 주세요">
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">이벤트 아이디</label>
			<input type="text"  style="width:300px;display:block" class="" name="event_id"  id="event_id" value="<?=$event_id?>" placeholder="이벤트  아이디을 입력해 주세요">
			<br />

			<label for="exampleInputEmail1">분류 </label>
			<select style="width:100px;" id="cate" name = "cate"class="">
				<option value="일반" <?echo $category == "일반" ? "selected" : ""?>>일반</option>
				<option value="체험단"<?echo $category == "체험단" ? "selected" : ""?>>체험단</option>
				<option value="사연"<?echo $category == "사연" ? "selected" : ""?>>사연</option>
				<option value="기타"<?echo $category == "기타" ? "selected" : ""?>>기타</option>
			</select>

			<br />
			<br />

			<div class="panel panel-default" style="width:600px"> 
				<div class="panel-heading">출력 옵션 선택</div>
					<div class="panel-body">

						<label style="width:100px; margin-left:10px"> <input type="checkbox" id="ch_name"  name="ch_name" value="ch_name" > 이름 </label>
						<label style="width:100px; margin-left:10px"> <input type="checkbox" id="ch_age" name="ch_age" value="ch_age" > 나이 </label>
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


		<div class="form-group">
	<label for="exampleInputEmail1">스킨선택 </label>
	<br />

			<select style="width:100px;" id="form_type" name = "form_type"class="">
		<?
			$d= dir("page/");
			while(false!==($entry = $d->read())){
				if($entry == '.' || $entry == ".." || $entry == 'img') continue;
				echo "<option value=\"$entry\">$entry</option> \n";
			}
		?>	

		</select>

		<br />
		<br />

		<div id="image_div_01" class="form-group">
		<label for="exampleInputFile">이벤트 이미지 01 </label>
		<input type="file" id="event_img_01" name="event_img_01" >

		<?
			if($event_img_01 == ""){
				echo '<p class="help-block">이미지 가로크기는 800px로 해주세요</p>';
			}else{
				echo '<p class="help-block">새로운 이미지를 올리면 기존의 이미지가 삭제됩니다 <br /> <a href="page/img/' .  $event_img_01.'">' .  $event_img_01.'</a></p>';
			}
		?>
		</div>

		<div id="image_div_02" class="form-group">
		<label for="exampleInputFile">이벤트 이미지 02</label>
		<input type="file" id="event_img_02" name="event_img_02" >

		<?
			if($event_img_02 == ""){
				echo '<p class="help-block">이미지 가로크기는 800px로 해주세요</p>';
			}else{
				echo '<p class="help-block">새로운 이미지를 올리면 기존의 이미지가 삭제됩니다 <br /> <a href="page/img/' .  $event_img_02.'">' .  $event_img_02.'</a></p>';
			}
		?>
	
		</div>


		<div id="price_group" class="form-group">
			<div class="form-group">
			<?
				for($i=1; $i<11;$i++){
					if($row_count >= $i){
						$row = mysqli_fetch_array($result_event);
						$l_name= $row['name'];
						$l_price = $row['price'];
					}else{
						$l_name= "";
						$l_price = "";
					}
			?>
				<div style=""id="price_div_<?=$i?>">
					<label style="width:80px;"  class="col-lg-2" for="exampleInputFile" id="event1" name="event1">종류 <?=$i?></label>
					<input style="width:200px;"  class="col-lg-2 " type="text" id="event<?=$i?>_name" name="event<?=$i?>_name" value="<?=$l_name?>" placeholder="">
					<label  style="width:80px;" class="col-lg-2" for="exampleInputFile">가격 </label>
					<input style="width:200px;" type="text" class=" col-lg-2" id="event<?=$i?>_name" name="event<?=$i?>_price" value="<?=$l_price?>" placeholder=""> 
					<a href="#" id="price_del_<?=$i?>" class=""  href="">삭제</a>
				</div>
			<?}?>
					<button type="button" id="btn-price" style="margin-left:500px;margin-top:20px;" class="">종류 추가</button>
					<span id="span-price" style="margin-left:500px;margin-top:20px;" >종류는 10개까지 가능합니다</span>
			</div>
		</div>
		<p class="help-block">* 종류에 "종아리퇴축술" 가격에 "88만원" 입력시에  "종아리퇴축술 88만원"</p>

		<div class="form-group">
		<label for="exampleInputEmail1">메모</label>
		<textarea class="form-control" style="width:560px;" rows="3" id="event_comment" name="event_comment"><?=$event_comment?></textarea>
		</div>
		<button type="submit" class="">이벤트 수정</button>
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
