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
$ev = $_GET['ev'];
$ch = $_GET['ch'];
$sh = $_GET['sh'];
$br = $_GET['br'];
$ca = $_GET['ca'];
$page_seq = $_GET['page_seq'];

$ev_query = "";
$ch_query = "";
$sh_query = "";
$br_query = "";

//------------------------------ 셀렉트문 출력용 
$eventNameSelect = "";
$branchNameSelect  = "";
if(isset($ev)){
	$ev_query = "and event_name like '$ev' ";
}else {
	$eventNameSelect = " selected=\"selected\" ";
}

if(isset($br)){
	$br_query = "and branch like '$br' ";
}else {
	$branchNameSelect =  " selected=\"selected\" ";
}

if(isset($ca)){
	$ca_query = "and j_group like '$ca' ";
}else {
	$categoryNameSelect =  " selected=\"selected\" ";
}


if(isset($ch)){
	if($ch == "check"){
		$ch_query = "and ch=1 ";
	}else if($ch == "no_check"){
		$ch_query = "and ch is NULL ";
	}
}

// 검색이 설정되어 있을 경우 
if(isset($sh)){
		$sh_query = "and (etc like '%$sh%' or event like '%$sh%' or phone like '%$sh%' or name like '%$sh%' or memo like '%$sh%' or prev_url like '$sh' or time like '%$sh%'  or j_group like '%$sh%'  or j_category like '%$sh%' or branch like '%$sh%' or email like '%$sh%')";
}

$event_name = mysqli_query($connect, "select Distinct(event_name) from $table_name_db ");
$result = mysqli_query($connect, "SELECT * FROM $table_name_db where idx is not null $ev_query $ch_query $sh_query $br_query $ca_query order by idx desc"); 
$total = mysqli_num_rows($result);


//페이징과 관련된 작업 
if($page_seq == 0){
	$page_seq = $page_seq + 1;
}
$posts_num = 10; //한 페이지에 보여줄 게시물의 수
$page_num = ceil($total/$posts_num);  //전체 페이지 개수
$page_start = $posts_num * ($page_seq-1);  //$page_seq의 값에 따라 페이지가 구분된다. 할당안하면 0이 들어감.

$query = "SELECT *, (select count(phone) from $table_name_db p where phone like  o.phone) as phone_d   FROM $table_name_db o where idx is not null "; 
$query = $query . " $ev_query $ch_query $sh_query $br_query $ca_query order by idx desc limit $page_start, $posts_num";

$result = mysqli_query($connect, $query);
//페이징 관련 작업 끝 
?>

<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="../../assets/ico/favicon.png">

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="js/report.js"></script>

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
		<?menu_print("보고서");?>
	</div>
</div>
<div class="container">
	<div class="starter-template">
	  <br /><br />
	  <br /><br />
	  <h1><?=$config_title?> DB 페이지입니다</h1>
	<div>
<div>
	<form class="form-inline" role="form" style="margin-bottom:5px; ">
		<select style="width:200px;" id="en" class="form-control">
		<?
			echo "<option value=\"이벤트명\" $eventNameSelect >이벤트명</option>";
			printSelectDistinct($connect, $table_name_db, "event_name", $ev);
		?>
	</select>

	<!-- 지점별 --> 
	<select style="width:100px;" id="branchFromSelect" class="form-control">
	<?
	echo  "<option value=\"지점별\" $branchNameSelect>지점별</option>";
	printSelectDistinct($connect, $table_name_branch, "name", $br);
?>
	</select>

	<!-- 지점별 --> 
	<select style="width:100px;" id="categoryFromSelect" class="form-control">
	<?
	echo  "<option value=\"분류별\" $categoryFromSelect>분류별</option>";
	printSelectDistinct($connect, $table_name_db, "j_group", $ca);
?>
	</select>
	<select style="width:110px;" id="ch_list" class="form-control">
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
	<input type="textbox" id="sh_txt" value="<?echo $sh?>" class="form-control"  style="width:200px;" />
	<input type="button" id="sh_btn" class="btn btn-default" value="검색"/>
	<button type="button" id="excel_btn" class="btn btn-xs btn-default" >
		 <span class="glyphicon glyphicon-floppy-save"></span> 엑셀로 다운로드
	</button>
 </form>
 </div>

<!-- 항목 테이블 시작 --> 
 <table class="table table-bordered" style="font-size:11px">
	<tr>
	   <th style="width:50px;">번호</th>
	   <th style="width:150px;">분류</th>
	   <th style="width:100px;">이벤트명</th>
	   <th style="width:100px;">지점</th>
	   <th style="width:140px;">진료항목</th>
	   <th style="width:150px;">진료선택</th>
	   <th style="width:200px;">기본정보</th>
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
	   <td>
		<?echo $row['idx']; ?>
	   </td>

	   <td>
		<?echo $row['j_group']; ?>
	   </td>
	   <td><?echo $row['event_name']; ?></td>
	   
	   <td>
		<?echo $row['branch']; ?>
	   </td>

	   <td><?echo $row['event']?></td>
	   <td>
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
	   <textarea id="memo_<?echo $row[idx]?>" class="form-control " name="memo[10931]" cols="10" rows="5" ><? echo $row[memo]?></textarea>

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
<br />
	  <input type="hidden" name="no" value="10931">
	  <input type="button" value="수정" class="btn btn-warning btn-primary" id="memo_edit_<?echo $row[idx]?>" onclick="memo(this.id,$('#memo_<?echo $row[idx]?>').val(), <?echo $row[idx]?>)">
<br />
<br />
	  <input type="button" value="삭   제" class="btn btn-warning btn-xs btn-danger" id="db_del_<?echo $row[idx]?>" onclick="db_del(<?echo $row[idx]?>)">
<br />
<br />

<?
	$ch_class = "btn ";	
	$ch_value = "글 확인";
	if($row[ch]==1){
		$ch_class = $ch_class . "btn-link btn-xs disabled";
		$ch_value = "확인됨";

	}else{
		$ch_class = $ch_class . "btn-success btn-xs";
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
