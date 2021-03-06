<?
include_once("../../config.php");
include_once("../../db.php");
include_once("../../include/page.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?include_once("../../include/head_include.php");?>
	<link rel="stylesheet" href="css/index.css" type="text/css" media="all" />
</head>

<body>
	<!-- 상단 고정되어 들어가는 부분 -->
	<div class="menu" id="gnb_wrp" style="height:100px;"> <!-- menu div start --> 
		<div id="tbt"> <!-- tbt div start --> 
			<div id="top_con"> <!-- top_con start -->
				<form action="../../form_pr.php" method="post" id="db_form" name="form">
				<!-- 이부분은 꼭 넣어 주셔야 합니다. -->
				<input type="hidden" name="event_name" id="event_name" value="<?=$event_title?>" />
				<input type="hidden" name="prev_url" id="prev_url" value="" />
				<input type="hidden" name="user_agent" id="user_agent" value="컴퓨터" />
				<input type="hidden" name="j_group" id="j_group" value="<?=$j_group?>" />

				<div id="up_form_box"> <!-- form box star -->
					<div id="top_left" > <!-- left div start -->

						<?if( $row_form['ch_name'] == 'y'){?>
						<div>
							<label for="name" class="col-lg-2 control-label">
								이름 :
							</label>

							<input id="name"  class="form-control" type="text" name="name" />
						</div>


						<? }if( $ch_time == 'y'){ ?>
						<div>
							<label for="time" class="col-lg-2 control-label">
								통화가능시간 : 
							</label>
							<select  class="form-control" id="time" name="time">
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
						</div>


						<?}if( $ch_age == 'y'){?>
						<div>
							<label  for="age" class="col-lg-2 control-label"> 
								나이 :
							</label>
							<input id="age" name="age"  class="form-control" type="text" />
						</div>



						<?}if( $ch_phone == 'y'){?>
						<div>
							<label for="age" class="col-lg-2 control-label">
								연락처 : 
							</label>
							<input id="phone" name="phone"  type="text" />
						</div>



						<?}if( $ch_sex == 'y'){?>
						<div>
							<label for="sex" class="col-lg-2 control-label">
								성별 :
							</label>
							<select class="form-control"  name="sex">
								<option>남</option>
								<option>여</option>
							</select>
						</div>
						<?}?>



					</div><!--left div end -->
					<div id="top_right" > <!-- right div start -->
						<?  if( $ch_branch == 'y'){ ?>
						<label for="sex" class="col-lg-2 control-label">
							지점 :
						</label>
						<select class="form-control"  name="branch">
								<option value="">지점 선택</option>
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
						<label for="age" class="col-lg-2 control-label"> 
							날짜 :
						</label>
						<input id="r_date" name="r_date" class="form-control" type="text" />
						<br />
						<?  } if( $ch_group== 'y'){ ?>
						<label for="sex" class="col-lg-2 control-label">
							진료과목 :
						</label>
						<select  class="form-control"  name="j_category">
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
						<label for="event" class="col-lg-2 control-label">
							이벤트 선택 : 
						</label>
						<select class="form-control"  name="event_sel">
							<?while($row = mysqli_fetch_array($result_event_list)){ ?>
								<option value="<?echo $row['name']. " : ". $row['price']; ?>" >
									<?echo $row['name'] . " : " . $row['price']; ?>
								</option>
							<?}?>
						</select>
						<?}?>
					</div> <!-- right end -->
				</div> <!-- form box div end -->
			</div> <!-- up-form-box end -->

			<div id="bottom" > <!-- bottom div star --> 
				<div id="bottom_con">
					<?if($ch_story == 'y'){?>
					 <div id="bottom_left">
						<label  for="etc"> 사연/문의 </label>
						<textarea id="etc" rows="3" name="etc"></textarea>
					</div>
					<?}?>
					 <div id="bottom_right">
						<?if( $ch_agree == 'y'){?> <!-- 문의 사항 --> 
						<div>
	<label style="width:150px; margin-left:10px" title="
						■ 개인정보의 수집 및 이용목적 -
회사는 수집한 개인정보를 다음의 목적을 위해 활용합니다.-
ο 서비스 제공에 관한 계약 이행 및 서비스 제공에 따른 콘텐츠 제공 -
ο 회원 관리 -
회원제 서비스 이용에 따른 본인확인 -
ο 마케팅 및 광고에 활용 -
접속 빈도 파악 또는 회원의 서비스 이용에 대한 통계-
■ 수집하는 개인정보 항목-
회사는 회원가입, 상담, 서비스 신청 등등을 위해 아래와 같은 개인정보를 수집하고 있습니다.-
ο 수집항목 : 이름 ,자택 전화번호 , 휴대전화번호 , 이메일 , 접속 로그 , 쿠키 , 접속 IP 정보-
ο 개인정보 수집방법 : 홈페이지(이벤트신청)-
■ 수집한 개인정보의 취급위탁-
회사는 서비스 이행을 위해 아래와 같이 개인정보를 위탁하고 있으며, -
관계 법령에 따라 위탁계약 시 개인정보가 안전하게 관리될 수 있도록 -
필요한 사항을 규정하고 있습니다.-
회사는 개인정보 위탁처리 기관 및 위탁업무 내용은 아래와 같습니다.-
수탁업체 : 메디컬디자인-
위탁업무 내용 : 회원관리-
위탁 개인정보 항목 : 이름, 주소, 전화번호, 이메일-
개인정보 보유 및 이용기간 : 위탁계약 종료시까지 -
■ 개인정보의 보유 및 이용기간-
원칙적으로, 개인정보 수집 및 이용목적이 달성된 후에는 해당 정보를 지체 없이 파기합니다. 단, 관계법령의 규정에 의하여 보존할 필요가 있는 경우 회사는 아래와 같이 관계법령에서 정한 일정한 기간 동안 회원정보를 보관합니다.-
ο 보존 항목 : 이름 , 로그인ID , 비밀번호 , 자택 전화번호 , 자택 주소 , 휴대전화번호 , 이메일 , 접속 로그 , 접속 IP 정보-
ο 보존 근거 : DB-
ο 보존 기간 : 홈페이지가 폐지가 될 때까지 보존-
그리고 관계법령의 규정에 의하여 보존할 필요가 있는 경우 회사는 아래와 같이 관계법령에서 정한 일정한 기간 동안 회원정보를 보관합니다.-
신용정보의 수집/처리 및 이용 등에 관한 기록 : 3년 (신용정보의 이용 및 보호에 관한 법률)-
-
						"> 
							개인정보사용동의 
							<input type="checkbox" id="agree" name="agree" value="동의">
						</label>

						 </div>
						<?}?>
						<input type="submit" value="상담신청"  class="btn_submit" />
					</div>
				</div> <!-- bottom_con div end --> 
			</div> <!-- bottom div end --> 
		</div> <!-- tbt div end --> 
	</div> <!-- menu div end --> 
	<!-- 컨텐츠가 들어가는 부분 --> 
	<div id="image">
		<img src="../../page/img/<?echo $event_img_01?>" >
	</div>
</body>
</html>
