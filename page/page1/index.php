<?
include_once("../../config.php");
include_once("../../db.php");
include_once("../../include/page.php");
?>


<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
<!-- 꼭 들어가야 하는 부분 시작 --> 
<?include_once("../../include/head_include.php");?>
<link href="../../dist/css/bootstrap.css" rel="stylesheet">
<link href="css/page.css" rel="stylesheet">


<style>
	#tooltip2 {
	position: absolute;
	z-index: 3000;
	border: 1px solid #111;
	background-color: #eee;
	padding: 5px;
	opacity: 0.85;
	font-size:9px;
	width:400px;
	margin:0 auto;
}

#tooltip h3, #tooltip div { margin: 0; }
</style>
</head>
<body>
<div id="align">
	<div id="content">
				<form action="../../form_pr.php" class="" method="post" id="db_form" name="form">
					<!-- 꼭 들어가야 하는 부분 시작 --> 
					<input type="hidden" name="event_name" id="event_name" value="<?=$event_title?>" /> <!-- 이벤트명 --> 
					<input type="hidden" name="prev_url" id="prev_url" value="" /> <!-- 유입경로 --> 
					<input type="hidden" name="user_agent" id="user_agent" value="컴퓨터" /> <!-- 접속기기 --> 
					<input type="hidden" name="j_group" id="j_group" value="<?=$j_group?>" /> <!-- 분류 --> 
					<!-- 꼭 들어가야 하는 부분 끝 --> 

					<div id="img_div">
						<img id="top_img" src="../../page/img/<?echo $event_img_01?>" > <!-- 첫번째 첨 부 이미지 --> 
					</div>


					<div id="up_form_box"><!-- div up_form_box start !-->
						<div id="left"> <!-- div left start !-->
							<?if( $row_form['ch_name'] == 'y'){?> <!-- 이름 --> 
							<label style="width:150px;" for="name" class="">
								이름 :
							</label>
							<input id="name" style="width:200px" class="" type="text" name="name" />
							<br />
							<?} if( $ch_time == 'y'){ ?> <!-- 통화가능 시간 --> 
							<label style="width:150px;" for="time" class="">
								통화가능시간 : 
							</label>

							<select style="width:200px" class="" id="time" name="time">
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
							<label style="width:150px;" for="age" class=""> 
								나이 :
							</label>
							<input id="age" name="age" style="width:200px" class="" type="text" />
							<br />

							<?}if( $ch_phone == 'y'){ ?><!-- 연락처  --> 
							<label style="width:150px;" for="age" class="">
								연락처 :
							</label>
							<input id="phone" name="phone" style="width:200px" class="" type="text" />
							<br />
							<?  } if( $ch_sex == 'y'){ ?><!-- 성별 --> 
							<label style="width:150px;" for="sex" class="">
								성별 :
							</label>
							<select style="width:200px" class=""  name="sex">
								<option>남</option>
								<option>여</option>
							</select>
							<br />
							<?  } ?>
						</div><!-- div left end!-->

						<div id="right" ><!-- div left start!-->
							<?   if( $ch_email== 'y'){ ?><!-- 이메일 --> 
							<label style="width:150px;" for="age" class=""> 
								이메일
							</label>
							<input id="email" name="email" style="width:200px" class="" type="text" />
							<br />
							<?}if( $ch_branch == 'y'){ ?><!-- 지점 --> 
							<label style="width:150px;" for="branch" class="">
								지점 :
							</label>
							<select style="width:200px" class="" id="branch"  name="branch">
								<option value="">지점 선택</option>

							<?  $query = "select * from $table_name_branch";
								$result_branch = mysqli_query($connect, $query);
								while($row_form = mysqli_fetch_array($result_branch))
								{ ?>
								<option value="<?=$row_form['name']?>"><?=$row_form['name']?></option>
							<?}?>
							</select>
							<br />
							<?  } if( $ch_day == 'y'){ ?> <!-- 날짜 --> 
							<label style="width:150px;" for="age" class=""> 
								날짜 :
							</label>
							<input id="r_date" name="r_date" style="width:200px" class="" type="text" /> 
							<br />
							<?  } if( $ch_group== 'y'){ ?> <!-- 진료 과목 --> 
							<label style="width:150px;" for="sex" class="">
								진료과목 :
							</label>

							<select style="width:200px" class=""  name="j_category"> 
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
							<label style="width:150px;" for="event" class="">
								진료선택 : 
							</label>
							<select style="width:200px" class=""  name="event_sel">
								<?while($row_event = mysqli_fetch_array($result_event_list)){ ?>
								<option value="<?echo $row_event['name']. " : ". $row_event['price']; ?>" >
								<?echo $row_event['name'] . " : " . $row_event['price']; ?>
								</option>
								<?  } ?> 
							</select>
							<?}?>
						</div> <!-- right end -->

				<div id="bottom" style=""><!-- div bottom end!-->
					<?if( $ch_story == 'y'){?> <!-- 문의 사항 --> 
					<label style="width:150px;" for="etc" class="">
						기타문의
					</label>
					<textarea style="width:595px" class="" id="etc" rows="3" cols="100" name="etc"></textarea>
					<br />
					<?}?>

					<?if( $ch_agree == 'y'){?> <!-- 문의 사항 --> 
					<div style="width:700px;text-align:right;">
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
						"> 개인정보사용동의 <input type="checkbox" id="agree" name="agree" value="동의"></label>
					</div>
					<?}?>
					<div style="text-align:center">
						<input type="button" style="" value="무료상담신청" border="0" id="btn-submit" class="btn btn-primary btn-lg"/>
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
</body>
</html>
