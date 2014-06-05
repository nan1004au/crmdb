<?
	session_start();
	if(!isset($_SESSION["user_id"])){
?>
<script type="text/javascript">
	alert("로그인 해주세요");
	window.location = "index.php";
</script>";
<?
}else{
include("config.php");
include("db.php");
include("fun.php");
include("include/menu.php");
include("include/report_header.php");
?>

<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="../../assets/ico/favicon.png">

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="js/report.js"></script>
<script type="text/javascript" src="js/all.js"></script>
<script type="text/javascript" src="js/html5shiv.js"></script>
<title><?=$config_title ?> DB - 홈</title>
<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="css/all.css" rel="stylesheet">
<link href="css/report.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="../../assets/js/html5shiv.js"></script>
  <script type="text/javascript" src="http://helloworld.naver.com/respond.min.js"></script>
<![endif]-->
<style tyle="text/css">
td{
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
<section>
<div class="container">
	<div class="starter-template">
	  <h1><?=$config_title?> DB 페이지입니다</h1>
	<div>
	<article>
<div class="">
	<form class="form-inline" role="form" style="margin-bottom:5px; ">
		<select style="width:200px;" id="en" class="">
		<?
			echo "<option value=\"이벤트명\" $eventNameSelect >이벤트명</option>";
			printSelectDistinct($connect, $table_name_db, "event_name", $ev);
		?>
	</select>
<?
	if($id_branch =="관리자"){ //관리자일 경우에는 지점을 출력해 준다 
?>
	<!-- 지점별 --> 
	<select style="width:100px;" id="branchFromSelect" class="">
	<?
	echo  "<option value=\"지점별\" $branchNameSelect>지점별</option>";
	printSelectDistinct($connect, $table_name_branch, "name", $br);
?>
	</select>
<?}?>

	<!-- 지점별 --> 
	<select style="width:100px;" id="categoryFromSelect" class="">
	<?
	echo  "<option value=\"분류별\" $categoryFromSelect>분류별</option>";
	printSelectDistinct($connect, $table_name_db, "j_group", $ca);
?>
	</select>
	<select style="width:110px;" id="ch_list" class="">
<?

$ch_yes= "";
$ch_no = "";
$ch_all = "";
if(!strcmp($ch,"no_check")){
	$ch_no = " selected=\"selected\" ";
}else if(!strcmp($ch,"check")){
	$ch_yes= " selected=\"selected\" ";
}else{
	$ch_all = " selected=\"selected\" ";
}
?>

	<option <?echo "$ch_all" ?> value="확인여부">확인여부</option>
	   <option  <?echo "$ch_no" ?> value="no_check">미확인</option>
	   <option  <?echo "$ch_yes" ?> value="check">확인</option>
	</select>



<!-- 검색 창 --> 
	<input type="text" id="sh_txt" value="<?echo $sh?>" class=""  style="width:200px;" />
	<input type="button" id="sh_btn" class="" value="검색"/>
	<input type="button" id="excel_btn" class="" value="엑셀로 다운로드">
 </form>
 </div>

<!-- 항목 테이블 시작 --> 
 <table class="" style="font-size:11px">
	<tr>
	   <th style="width:30px;">번호</th>
	   <th style="width:30px;">분류</th>
	   <th style="width:80px;">이벤트명</th>
	   <th style="width:80px;">지점</th>
	   <th style="width:100px;">진료항목</th>
	   <th style="width:100px;">진료선택</th>
	   <th style="width:150px;">기본정보</th>
	   <th style="width:140px;">문의&사연</th>
	   <th style="width:150px;">메모</th>
	   <th style="width:150px;">유입경로</th>
	   <th>접수일</th>
	   <th>기능</th>
	</tr>


<?
while($row = mysqli_fetch_array($result)){
?>
	<tr class="item ">
	   <td class="center">
		<?echo $row['idx']; ?>
	   </td>

	   <td class="center">
		<?echo $row['j_group']; ?>
	   </td>
	   <td class="center"><?echo $row['event_name']; ?></td>
	   
	   <td class="center">
		<?echo $row['branch']; ?>
	   </td>

	   <td class="center"><?echo $row['event']?></td>
	   <td class="center">
		<?echo $row['j_category']; ?>
	   </td>


	   <td> 
	  <strong>이름 : </strong> <?echo $row['name']; ?><br /> 
	  <strong>연락처 : </strong> <?echo $row['phone']; ?> <br />
	  <strong>통화시간 : </strong> <?echo $row['time']; ?> <br />
	  <strong>예약날짜 : </strong> <?echo $row['r_date']; ?> <br />
	  <strong>나이 : </strong><?echo $row['age'];?> <br />
	  <strong>성별 : </strong><?echo $row['sex'];?> <br />
	  <strong>이메일 : </strong><?echo $row['email'];?> <br />
	  <strong>정보동의 : </strong><?echo $row['agree'];?> <br />
	   </td>


	   <td>
	  <div style="overflow-y:scroll;width:140px;height:120px;">
		<?echo $row['etc']; ?>
	  </div>
	   </td>
	   <td>
	   <textarea id="memo_<?echo $row[idx]?>" class="" name="memo[10931]" cols="10" rows="5" ><? echo $row[memo]?></textarea>

	   </td>
	   <td>
	   <p>유입 : <?echo $row[user_agent]?></p>
	   <p>유입주소:<a href="<?echo $row[prev_url]?>"> 링크 <?//echo $row[prev_url]?></a></p>
<?
	$phone_d = $row[phone_d];

	if($row[phone_d] > 1 ){
		$phone_d = " <b style=\"font-weight:bold;color:red\">" . $phone_d . "개</b>";

	}else{
		$phone_d = " 중복없음";
	}

?>
<p>핸드폰중복 :<?echo $phone_d?></b></p>
	   </td>
<td>
<?
	$dtime = new DateTime($row[c_date]);
	print $dtime->format("y/m/d");
	print "<br />";
	print $dtime->format("H:i:s");
	//echo $row[c_date]
?>

	   </td>

	   <td>
	  <input type="hidden" name="no" value="10931">
	  <input type="button" value="수정" class="" id="memo_edit_<?echo $row[idx]?>" onclick="memo(this.id,$('#memo_<?echo $row[idx]?>').val(), <?echo $row[idx]?>)">
	  <input type="button" value="삭   제" class="" id="db_del_<?echo $row[idx]?>" onclick="db_del(<?echo $row[idx]?>)">

<?
	$ch_class = " ";	
	$ch_value = "글 확인";
	if($row[ch]==1){
		$ch_class = $ch_class . "disable_button";
		$ch_value = "확인됨";

	}else{
		$ch_class = $ch_class . "";
	}

?>

<input type="button" class="<?echo $ch_class?>" value="<?echo $ch_value?>" no="10931" id="ch_<?echo $row[idx]?>" onclick="ch(this.id, <?echo $row[idx]?>)" >
	   </td>


	</tr>
<?
}
?>
 </table>
  </div>
</div>
<article>
</section>
</div><!-- /.container -->
<div class="container"  style="text-align: center;">
<ul class="pagination  pagination-lg">
<?
for($i=1;$i<=$page_num;$i++){
	if($i == $page_seq){
?>
  <li class="active"><a class="page_seq" id="page_seq_<?=$i?>" href="#"><?echo "$i";?></a></li>
<?
	}else{
?>
  <li><a class="page_seq"  id="page_seq_<?=$i?>" href="#"><?echo "$i";?></a></li>
<?
	}
}
?>
</ul>
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
