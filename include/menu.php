<?
function menu_print( $active_menu) {

$home= "";
$report= "";
$analysis= "";
$manage_form= "";
$admin= "";
$create_form= "";

if($active_menu== "홈"){
	$home = 'class="active"';
}else if($active_menu== "보고서"){
	$report= 'class="active"';
}else if($active_menu == "분석"){
	$analysis= 'class="active"';
}else if($active_menu == "폼관리"){
	$manage_form= 'class="active"';
}else if($active_menu== "설정"){
	$admin= 'class="active"';
}else if($active_menu== "폼생성"){
	$create_form= 'class="active"';
}
echo "
		<div class=\"collapse navbar-collapse\">
		<ul class=\"nav navbar-nav\">
		<li $home  ><a href=\"report.php\">홈</a></li>
		<li $report><a href=\"report.php\">보고서</a></li>
		<li $analysis><a href=\"#analysis.php\">분석</a></li>
		<li $create_form><a href=\"create_form.php\">폼생성</a></li>
		<li $manage_form><a href=\"manage_form.php\">폼관리</a></li>
		<li $admin><a href=\"admin.php\">설정</a></li>
		</ul>

		<ul class=\"nav navbar-nav navbar-right\">
		<!-- <li><a href=\"#about\" id=\"logout_txt\">로그아웃</a></li> --!>
		<li><br /><input type=\"button\" id=\"logout_txt\" class=\"btn btn-xs\" value=\"로그아웃\" /></li> 
		</ul>
		</div><!--/.nav-collapse -->
";
}
?>
