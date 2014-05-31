<?
include_once("config.php");
include_once("db.php");
$id = $_GET['id'];
$query_event_form = "select * from $table_name_event_form where id like '$id'";
$query_event_list = "select * from $table_name_event_list where event_id like '$id'";
$result_event_form = mysqli_query($connect, $query_event_form);
$result_event_list = mysqli_query($connect, $query_event_list);
$row_form = mysqli_fetch_array($result_event_form);
$event_form_type = $row_form['form_type'];
$event_id  = $row_form['id'];
$event_title = $row_form['title'];
$event_img_01 = $row_form['img_hash_01'];
$event_img_02 = $row_form['img_hash_02'];
$j_group = $row_form['category']; // 분류 가져오기 


//체크박스 처리 
$ch_name = $row_form['ch_name'];
$ch_age = $row_form['ch_age'];
$ch_sex =$row_form['ch_sex'];
$ch_day =$row_form['ch_day'];
$ch_time = $row_form['ch_time'];
$ch_phone =$row_form['ch_phone'];
$ch_price =$row_form['ch_price'];
$ch_branch = $row_form['ch_branch'];
$ch_email =$row_form['ch_email'];
$ch_story =$row_form['ch_story'];
$ch_group =$row_form['ch_group'];
$ch_price =$row_form['ch_price'];

$two = false;
if($event_form_type== "중간폼"){
	$two = true;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="http://code.jquery.com/ui/1.8.18/jquery-ui.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" type="text/css" media="all" />
<script type="text/javascript" src="js/jquery.alphanumeric.js"></script>
<Script type="text/javascript" src="js/pop.js"></script> 


<script type="text/javascript">

$(function() {
		var dates = $( "#r_date" ).datepicker({
prevText: '이전 달',
nextText: '다음 달',
monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
dayNames: ['일','월','화','수','목','금','토'],
dayNamesShort: ['일','월','화','수','목','금','토'],
dayNamesMin: ['일','월','화','수','목','금','토'],
dateFormat: 'yy-mm-dd',
showMonthAfterYear: true,
yearSuffix: '년',
onSelect: function( selectedDate ) {
var option = this.id == "from" ? "minDate" : "maxDate",
instance = $( this ).data( "datepicker" ),
date = $.datepicker.parseDate(
	instance.settings.dateFormat ||
	$.datepicker._defaults.dateFormat,
	selectedDate, instance.settings );
dates.not( this ).datepicker( "option", option, date );
}
});
});



</script>


<style type="text/css">
	body,ul,ol,li,dl,dt,dd,p,h1,h2,h3,h4,h5,h6,input { margin:0; padding:0; }	
	p { margin:0 }
	.menu { 
		background:#FF9900;
		position:fixed;
		top:0;
		left:0;
		right:0;
		z-index:1030; 
		height:120px;
	}



#tbt{background-image:url(images/bgbg.jpg); color:#FFFFFF; font-weight:bold; padding-top:20px; padding-bottom:20px;}
#bottom{background-image:url(images/bgbg.jpg); color:#FFFFFF; font-weight:bold; padding-top:20px; padding-bottom:20px;}
#up_form_box {background-image:url(images/bgbg.jpg);} 
#up_form_box{
	margin-bottom:0px;
	margin-top:0px;
}
#bottom { margin-top : 0px; }
#time {width:150px;}
.txt-size {height:25px;}



ul,ol { list-style:none; }
#image{ margin:0 auto; 
width:100%; 
margin-top:225px;
		width:100%;
		background:#CCC}
#image img {width:800px;}

#left input, select {
	margin-bottom:3px;
}

#right input, select {
	margin-bottom:3px;
}

.btn_submit{
	margin-top:50px;
	-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
	-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
	box-shadow:inset 0px 1px 0px 0px #ffffff;
background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ededed), color-stop(1, #dfdfdf) );
background:-moz-linear-gradient( center top, #ededed 5%, #dfdfdf 100% );
filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ededed', endColorstr='#dfdfdf');
	   background-color:#ededed;
	   -webkit-border-top-left-radius:6px;
	   -moz-border-radius-topleft:6px;
	   border-top-left-radius:6px;
	   -webkit-border-top-right-radius:6px;
	   -moz-border-radius-topright:6px;
	   border-top-right-radius:6px;
	   -webkit-border-bottom-right-radius:6px;
	   -moz-border-radius-bottomright:6px;
	   border-bottom-right-radius:6px;
	   -webkit-border-bottom-left-radius:6px;
	   -moz-border-radius-bottomleft:6px;
	   border-bottom-left-radius:6px;
	   text-indent:0;
border:1px solid #dcdcdc;
display:inline-block;
color:#777777;
	  font-family:arial;
	  font-size:15px;
	  font-weight:bold;
	  font-style:normal;
height:50px;
	   line-height:50px;
width:100px;
	  text-decoration:none;
	  text-align:center;
	  text-shadow:1px 1px 0px #ffffff;
}
.classname:hover {
background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #dfdfdf), color-stop(1, #ededed) );
background:-moz-linear-gradient( center top, #dfdfdf 5%, #ededed 100% );
filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dfdfdf', endColorstr='#ededed');
	   background-color:#dfdfdf;
}.classname:active {
position:relative;
top:1px;
}
</style>

</head>
<body>
	<!-- 상단 고정되어 들어가는 부분 -->
	<div class="menu" id="gnb_wrp" style="height:100px;"> <!-- menu div start --> 
		<div id="tbt"style="height:110px;margin-bottom:0px;padding-bottom:10px"> <!-- tbt div start --> 
			<form action="form_pr.php" method="post" id="pop_form" name="form">

				<!-- 이부분은 꼭 넣어 주셔야 합니다. -->
				<input type="hidden" name="event_name" id="event_name" value="<?=$event_title?>" />
				<input type="hidden" name="prev_url" id="prev_url" value="" />
				<input type="hidden" name="user_agent" id="user_agent" value="컴퓨터" />
				<input type="hidden" name="j_group" id="j_group" value="<?=$j_group?>" />

				<div style="margin-left:20px;width:1200px" id="up_form_box"> <!-- form box star -->
					<div id="left" style="float:left;width:400px;"> <!-- left div start -->
						<?if( $row_form['ch_name'] == 'y'){?>
						<label style="width:150px;" for="name" class="col-lg-2 control-label">
							이름 :
						</label>
						<input id="name" style="margin-left:68px;width:200px" class="form-control" type="text" name="name" />
						<br />

						<? }if( $ch_time == 'y'){ ?>

						<label style="width:150px;" for="time" class="col-lg-2 control-label">
						통화가능시간 : 
						</label>
						<select style="width:200px" class="form-control" id="time" name="time">
							<option value="">::시간선택::</option>
							<option value="항시가능">항시가능</option>
							<option value="09시~10시">09시~10시</option>
							<option value="10시~11시">10시~11시</option>
							<option value="11시~12시">11시~12시</option>
							<option value="12시~13시">12시~13시</option>
							<option value="13시~14시">13시~14시</option>
							<option value="14시~15시">14시~15시</option>
							<option value="15시~16시">15시~16시</option>
							<option value="16시~17시">16시~17시</option>
							<option value="17시~18시">17시~18시</option>
							<option value="18시이후">18시이후</option>
						</select>
						<br />


						<?
						}

						if( $ch_age == 'y'){
						?>

						<label style="width:150px;" for="age" class="col-lg-2 control-label"> 
							나이 :
						</label>
						<input id="age" name="age" style="margin-left:68px;width:200px" class="form-control" type="text" />
						<br />


						<?
						}

						if( $ch_phone == 'y'){
						?>


						<label style="width:150px;" for="age" class="col-lg-2 control-label">
							연락처 : 
						</label>
						<input id="phone" name="phone" style="margin-left:51px;width:200px"  type="text" />
						<br />
						<?  }if( $ch_sex == 'y'){ ?>
						<label style="width:150px;" for="sex" class="col-lg-2 control-label">
							성별 :
						</label>
						<select style="margin-left:68px;width:200px" class="form-control"  name="sex">
							<option>남</option>
							<option>여</option>
						</select>
						<br />

						<?
						}
						?>

					</div><!--left div end -->
					<div id="right" style="float:left;width:400px;"> <!-- right div start -->
						<?  if( $ch_branch == 'y'){ ?>
						<label style="width:150px;" for="sex" class="col-lg-2 control-label">
							지점 :
						</label>
						<select style="margin-left:59px;width:200px" class="form-control"  name="branch">
							<?
								$query = "select * from $table_name_branch";
								$result_branch = mysqli_query($connect, $query);
								while($row_form = mysqli_fetch_array($result_branch))
								{
							?>
							<option value="<?=$row_form['name']?>"><?=$row_form['name']?></option>
							<?}?>
						</select>
						<br />
						<?  } if( $ch_day == 'y'){ ?>
						<label style="width:150px;" for="age" class="col-lg-2 control-label"> 
							날짜 :
						</label>
						<input id="r_date" name="r_date" style="margin-left:59px;width:200px" class="form-control" type="text" />
						<br />

						<?  } if( $ch_group== 'y'){ ?>
						
						<label style="width:150px;" for="sex" class="col-lg-2 control-label">
							진료과목 :
						</label>
						<select style="margin-left:25px;width:200px" class="form-control"  name="j_category">
							<?
								$query = "select * from $table_name_j_category";
								$result_branch = mysqli_query($connect, $query);
								while($row = mysqli_fetch_array($result_branch))
								{
							?>
							<option value="<?=$row['name']?>"><?=$row['name']?></option>
							<?}?>
						</select>
						<br />
						<?
						}
						if( $ch_price == 'y'){
						?>

						<label style="width:150px;" for="event" class="col-lg-2 control-label">
							이벤트 선택 : 
						</label>
						<select style="width:200px" class="form-control"  name="event_sel">
							<?while($row = mysqli_fetch_array($result_event_list)){ ?>
							<option value="<?echo $row['name']. " : ". $row['price']; ?>" >
							<?echo $row['name'] . " : " . $row['price']; ?>
							</option>
							<?}?>
						</select>
						<?}?>
					</div> <!-- right end -->
				</div> <!-- form box div end -->
				<div>
					<input type="submit" value="상담신청" class="btn_submit" />
				</div>
			</div> <!-- up-form-box end -->

			<div id="bottom" style="float:left;width:100%"> <!-- bottom div star --> 
				<?
				if( $ch_story == 'y'){
				?>
				<label style="width:50px;" for="etc" class="col-lg-2 control-label">
					사연/문의
				</label>
				<textarea style="width:650px" class="form-control" id="etc" rows="3" cols="100" name="etc"></textarea>
				<br />
				<?}?>
			</div> <!-- bottom div end --> 
		</div> <!-- tbt div end --> 
	</div> <!-- menu div end --> 

<!-- 컨텐츠가 들어가는 부분 --> 

	<div id="image" style="margin-top:100px">
		<img src="page/img/<?echo $event_img_01?>" >
	</div>
</body>
</html>
