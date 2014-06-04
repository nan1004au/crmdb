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
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/admin.js"></script>
		<script language="javascript"> 
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
		<link href="css/admin.css" rel="stylesheet">
			<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
			<!--[if lt IE 9]>
			<script src="../../assets/js/html5shiv.js"></script>
			<script src="../../assets/js/respond.min.js"></script>
			<![endif]-->
		</head>
		<body>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<a class="navbar-brand" href="#"><?=$config_title?> DB</a>
				</div>
				<?menu_print("설정");?>
				</div>
			</div>
		<div class="container">
			<div class="starter-template">
				<br /><br />
				<br /><br />
				<br /><br />
				<h1 id="h1_title" ><?=$config_title?> 설정  페이지입니다</h1>
				<div class="form-group" id="admin_form">

					<label for="exampleInputEmail1">회사명</label>
					<div class = "form-inline bottom">
						<input type="text"  style="width:300px;" value="<?=$config_title?>" class="form-control" name="text-company-edit"  id="text-company-edit" placeholder="이벤트  아이디을 입력해 주세요">
						<button  type="button" id="btn-company-name"  class="btn btn-default">회사명 수정 </button>
					</div>

					<label for="exampleInputEmail1">관리자 비밀번호 </label>
					<div class = "form-inline">
						<input type="password" id="pass1" style="width:100px;" class="form-control" placeholder="비밀번호를 입력해 주세요" id="pass"> 
						<input type="password" id="pass2" style="width:100px;" class="form-control" placeholder="비밀번호를 입력해 주세요" id="pass">
						<button  type="button" id="btn-user-pass"  class="btn btn-default">비밀번호  수정 </button>
					</div>


					<label for="exampleInputEmail1">아이디</label>
					<table class="table table-bordered" style="font-size:11px;width:500px">
					<tr>
						 <th>순번</th>
						 <th>아이디</th>
						 <th>지점</th>
						 <th>기능</th>
					</tr>
					<?
					$query = "select * from $table_name_member";
					$i=1;
					$result_member= mysqli_query($connect, $query);
					while($row_member= mysqli_fetch_array($result_member))
					{
						echo "<tr>";
						echo "<td>" . $i . "</td>";
						echo "<td><label id=\"label-member-id-" .  $row_member['idx'] ."\">" . $row_member['user_id'] . "</label></td>";
						echo "<td>";

							$query = "select * from $table_name_branch";
							$result_member_branch= mysqli_query($connect, $query);
						?>
						<select id="select-member-branch-<?=$row_member['idx']?>" class="form-control input-sm" style="display:inline;width:120px" name="">
						<?
						while($row_member_branch = mysqli_fetch_array($result_member_branch)){
							if($row_member_branch['name'] == $row_member['branch']){
								$selected = " selected ";
							}
							echo '<option value="'. $row_member_branch['name'] . '"'.$selected .' >' . $row_member_branch['name'] . '</option>';
							$selected = "";
						}
						?>
						</td>

						</select>
	
						<td>
							<a href="#" class="btn-member-pass" id="btn-member-pass-<?=$row_member['idx']?>" >비밀번호변경</a>  /
							<a href="#" class="btn-member-edit-branch" id="btn-member-edit-branch-<?=$row_member['idx']?>" >지점관리</a>  /
							<a href="#" class="btn-member-del" id="btn-member-del-<?=$row_member['idx']?>" >삭제</a> 
							
						</td>
					<?
						echo "</tr>";
						$i++;
					}?>
					</table>

					<label for="exampleInputEmail1">아이디추가</label>
					<div class = "form-inline">
						<input type="text"  style="width:120px" class="form-control" name="text-branch-add"  id="member_add_id" placeholder=" 아이디 입력">
						<input type="password"  style="width:100px" class="form-control" name="text-branch-add"  id="member_add_pass_1" placeholder="비밀번호">
						<input type="password"  style="width:100px" class="form-control" name="text-branch-add"  id="member_add_pass_2" placeholder="비밀번호">
						<?
							$query = "select * from $table_name_branch";
							$result_member_branch= mysqli_query($connect, $query);
						?>
						<select id="member_add_branch" class="form-control" style="display:inline;width:120px" name="">
						<?
						while($row_member_branch = mysqli_fetch_array($result_member_branch)){
							echo '<option value="'. $row_member_branch['name'] . '">' . $row_member_branch['name'] . '</option>';
						}
						?>

						</select>
						<button  type="button" id="btn-member-add" class="btn btn-default">아이디추가 </button>
					</div>




					<label for="exampleInputEmail1">지점</label>
					<table class="table table-bordered" style="font-size:11px;width:400px">
					<tr>
						 <th>순번</th>
						 <th>지점명</th>
						 <th>기능</th>
					</tr>
					<?
					$query = "select * from $table_name_branch";
					$i=1;
					$result_branch= mysqli_query($connect, $query);
					while($row_branch = mysqli_fetch_array($result_branch))
					{
						echo "<tr>";
						echo "<td>" . $i . "</td>";
						echo "<td>" . $row_branch['name'] . "</td>";
					?>
						<td><a href="#" class="btn-branch-del" id="btn-branch-del-<?=$row_branch['idx']?>" >삭제</a>  </td>
					<?
						echo "</tr>";
						$i++;
					}?>
					</table>

					<label for="exampleInputEmail1">지점추가</label>
					<div class = "form-inline">
						<input type="text"  style="width:300px" class="form-control" name="text-branch-add"  id="text-branch-add" placeholder="이벤트  아이디을 입력해 주세요">
						<button  type="submit" id="btn-branch-add" class="btn btn-default">지점추가 </button>
					</div>

					<label for="exampleInputEmail1">진료과목</label>
					 <table class="table table-bordered" style="font-size:11px;width:400px">
						 <tr>
							 <th>순번</th>
							 <th>진료과목</th>
							 <th>기능</th>
						 </tr>
					<?
					$query = "select * from $table_name_j_category";
					$i=1;
					$result_j_category = mysqli_query($connect, $query);
					while($row_j_category = mysqli_fetch_array($result_j_category))
					{
					echo "<tr>";
					echo "<td>" . $i . "</td>";
					echo "<td>" . $row_j_category['name'] . "</td>";
					?>
						<td><a href="#" class="btn-j-category-del" id="btn-j-category-del-<?=$row_j_category['idx']?>" >삭제</a>  </td>
					<?
					echo "</tr>";
					$i++;
					}?>
					</table>

					<label for="exampleInputEmail1">진료과목 추가</label>
					<div class = "form-inline">
						<input type="text"  style="width:300px" class="form-control" name="text-j-category-add"  id="text-j-category-add" placeholder="이벤트  아이디을 입력해 주세요">
						<button  type="submit"  id="btn-j-category-add" class="btn btn-default">진료과목 추가 </button>
					</div>
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
