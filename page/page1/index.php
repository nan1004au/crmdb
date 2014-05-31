<!-- 꼭 들어가야 하는 부분 시작 --> 
<?
include_once("../../config.php");
include_once("../../db.php");
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
$ch_story=$row_form['ch_story'];
$two = false;
if($event_form_type== "중간폼"){
	$two = true;
}
?>

<!-- 꼭 들어가야 하는 부분 끝 --> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- 꼭 들어가야 하는 부분 시작 --> 
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="http://code.jquery.com/ui/1.8.18/jquery-ui.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../../js/jquery.alphanumeric.js"></script>
<Script type="text/javascript" src="../../js/pop.js"></script> 
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
				dates.not( this ).datepicker( "option", option, date
				);
			}
		});
	});
</script>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" type="text/css" media="all" />
<!-- 꼭 들어가야 하는 부분 끝 --> 



<link href="../../dist/css/bootstrap.css" rel="stylesheet">
<link href="css/page.css" rel="stylesheet">

<!-- 꼭 들어가야 하는 부분 시작 --> 
<title><?=$event_title?></title>
<!-- 꼭 들어가야 하는 부분 시작 --> 

</head>
<body>
	<div id="align">
		<div id="content">
			<div class="form-group">
				<form action="../../form_pr.php" class="form-horizontal" method="post" id="pop_form" name="form">
					<!-- 꼭 들어가야 하는 부분 시작 --> 
					<input type="hidden" name="event_name" id="event_name" value="<?=$event_title?>" /> <!-- 이벤트명 --> 
					<input type="hidden" name="prev_url" id="prev_url" value="" /> <!-- 유입경로 --> 
					<input type="hidden" name="user_agent" id="user_agent" value="컴퓨터" /> <!-- 접속기기 --> 
					<input type="hidden" name="j_group" id="j_group" value="<?=$j_group?>" /> <!-- 분류 --> 
					<!-- 꼭 들어가야 하는 부분 끝 --> 



					<div style="text-align:center">
						<img id="top_img" src="../../page/img/<?echo $event_img_01?>" > <!-- 첫번째 첨 부 이미지 --> 
					</div>

					<div id="up_form_box"><!-- div up_form_box start !-->
						<div id="left" style="float:left;width:400px;"> <!-- div left start !-->
							<?if( $row_form['ch_name'] == 'y'){?> <!-- 이름 --> 
							<label style="width:150px;" for="name" class="col-lg-2 control-label">
								이름 :
							</label>
							<input id="name" style="width:200px" class="form-control input-sm" type="text" name="name" />
							<br />
							<?} if( $ch_time == 'y'){ ?> <!-- 통화가능 시간 --> 
							<label style="width:150px;" for="time" class="col-lg-2 control-label">
								통화가능시간 : 
							</label>

							<select style="width:200px" class="form-control input-sm" id="time" name="time">
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

							<?}if( $ch_age == 'y'){?> <!-- 나이 --> 
							<label style="width:150px;" for="age" class="col-lg-2 control-label"> 
								나이 :
							</label>
							<input id="age" name="age" style="width:200px" class="form-control input-sm" type="text" />
							<br />

							<?}if( $ch_phone == 'y'){ ?><!-- 연락처  --> 
							<label style="width:150px;" for="age" class="col-lg-2 control-label">
								연락처 :
							</label>
							<input id="phone" name="phone" style="width:200px" class="form-control input-sm" type="text" />
							<br />
							<?  } if( $ch_sex == 'y'){ ?><!-- 성별 --> 
							<label style="width:150px;" for="sex" class="col-lg-2 control-label">
								성별 :
							</label>
							<select style="width:200px" class="form-control input-sm"  name="sex">
								<option>남</option>
								<option>여</option>
							</select>
							<br />
							<?  } ?>
						</div><!-- div left end!-->

						<div id="right" style="float:left;width:400px;"><!-- div left start!-->
							<?   if( $ch_email== 'y'){ ?><!-- 이메일 --> 
							<label style="width:150px;" for="age" class="col-lg-2 control-label"> 
								이메일
							</label>
							<input id="email" name="email" style="width:200px" class="form-control input-sm" type="text" />
							<br />
							<?}if( $ch_branch == 'y'){ ?><!-- 지점 --> 
							<label style="width:150px;" for="branch" class="col-lg-2 control-label">
								지점 :
							</label>
							<select style="width:200px" class="form-control input-sm"  name="branch">

							<?  $query = "select * from $table_name_branch";
								$result_branch = mysqli_query($connect, $query);
								while($row_form = mysqli_fetch_array($result_branch))
								{ ?>
								<option value="<?=$row_form['name']?>"><?=$row_form['name']?></option>
							<?}?>
							</select>
							<br />
							<?  } if( $ch_day == 'y'){ ?> <!-- 날짜 --> 
							<label style="width:150px;" for="age" class="col-lg-2 control-label"> 
								날짜 :
							</label>
							<input id="r_date" name="r_date" style="width:200px" class="form-control input-sm" type="text" /> 
							<br />
							<?  } if( $ch_group== 'y'){ ?> <!-- 진료 과목 --> 
							<label style="width:150px;" for="sex" class="col-lg-2 control-label">
								진료과목 :
							</label>

							<select style="width:200px" class="form-control input-sm"  name="j_category"> 
								<?
								$query = "select * from $table_name_j_category";
								$result_j_category = mysqli_query($connect, $query);
								while($row_j_category = mysqli_fetch_array($result_j_category))
								{
								?>
								<option value="<?=$row_j_category['name']?>"><?=$row_j_category['name']?></option>
								<?}?>
							</select>
							<br />
							<?  } if( $ch_price == 'y'){ ?> <!-- 이벤트 종류와 가격 --> 
							<label style="width:150px;" for="event" class="col-lg-2 control-label">
								진료선택 : 
							</label>
							<select style="width:200px" class="form-control input-sm"  name="event_sel">
								<?while($row_event = mysqli_fetch_array($result_event_list)){ ?>
								<option value="<?echo $row_event['name']. " : ". $row_event['price']; ?>" >
								<?echo $row_event['name'] . " : " . $row_event['price']; ?>
								</option>
								<?  } ?> 
							</select>
							<?}?>
						</div> <!-- right end -->

					</div><!-- div up_form_box end!-->
				<div id="bottom" style="float:left;width:1000px;margin-top:10px"><!-- div bottom end!-->
					<?if( $ch_story == 'y'){?> <!-- 문의 사항 --> 
					<label style="width:150px;" for="etc" class="col-lg-2 control-label">
						기타문의
					</label>
					<textarea style="width:580px" class="form-control " id="etc" rows="3" cols="100" name="etc"></textarea>
					<br />
					<div style="width:700px;text-align:right;">
						<label style="width:150px; margin-left:10px"> 개인정보사용동의 <input type="checkbox" id="ch_agree" name="ch_agree" value="ch_agree"></label>
					</div>
					<div style="text-align:center">
						<input type="button" style="margin-right:200px;width:200px" value="무료상담신청" border="0" id="btn-submit" class="btn btn-primary btn-lg"/>
						</form>
						<br />
						<br />
						<?}?>
					</div> <!-- bottom end -->
				</div>
				<? if ( $two  == true){ ?>
				<div style="text-align:center">
					<img src="../../page/img/<?echo $event_img_02?>" > <!-- 두번째 첨부 이미지 --> 
				</div>
				<?}?>
			</div>
		</div>
	</div>
</body>
</html>
