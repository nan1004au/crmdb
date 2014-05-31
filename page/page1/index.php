<!-- 꼭 들어가야 하는 부분 시작 --> 
<?
include_once("../../config.php");
include_once("../../db.php");
include_once("../../include/page.php");
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
<script type="text/javascript" src="../../js/date.js"></script>
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
					<?}?>
					<?if( $ch_agree == 'y'){?> <!-- 문의 사항 --> 
					<div style="width:700px;text-align:right;">
						<label style="width:150px; margin-left:10px"> 개인정보사용동의 <input type="checkbox" id="agree" name="agree" value="동의"></label>
					</div>
					<?}?>
					<div style="text-align:center">
						<input type="button" style="margin-right:200px;width:200px" value="무료상담신청" border="0" id="btn-submit" class="btn btn-primary btn-lg"/>
						</form>
						<br />
						<br />
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
