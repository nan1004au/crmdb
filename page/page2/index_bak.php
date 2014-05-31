<?
include_once("../../config.php");
include_once("../../db.php");
include_once("../../include/page.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script src="http://code.jquery.com/ui/1.8.18/jquery-ui.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" type="text/css" media="all" />
	<script type="text/javascript" src="../../js/jquery.alphanumeric.js"></script>
	<script type="text/javascript" src="../../js/date.js"></script>
	<Script type="text/javascript" src="js/pop.js"></script> 
	<link rel="stylesheet" href="css/index.css" type="text/css" media="all" />
</head>
<body>
	<!-- 상단 고정되어 들어가는 부분 -->
	<div class="menu" id="gnb_wrp" style="height:100px;"> <!-- menu div start --> 
		<div id="tbt"style="height:110px;margin-bottom:0px;padding-bottom:10px"> <!-- tbt div start --> 
			<form action="../../form_pr.php" method="post" id="pop_form" name="form">
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
						<?}if( $ch_age == 'y'){?>
						<label style="width:150px;" for="age" class="col-lg-2 control-label"> 
							나이 :
						</label>
						<input id="age" name="age" style="margin-left:68px;width:200px" class="form-control" type="text" />
						<br />
						<?}if( $ch_phone == 'y'){?>
						<label style="width:150px;" for="age" class="col-lg-2 control-label">
							연락처 : 
						</label>
						<input id="phone" name="phone" style="margin-left:51px;width:200px"  type="text" />
						<br />
						<?}if( $ch_sex == 'y'){?>
						<label style="width:150px;" for="sex" class="col-lg-2 control-label">
							성별 :
						</label>
						<select style="margin-left:68px;width:200px" class="form-control"  name="sex">
							<option>남</option>
							<option>여</option>
						</select>
						<br />
						<?}?>
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
						<?}if( $ch_price == 'y'){?>
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
				<?if($ch_story == 'y'){?>
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
		<img src="../../page/img/<?echo $event_img_01?>" >
	</div>
</body>
</html>
