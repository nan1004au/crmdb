<?

$table_name_db = $mysql_table_start . "_db_client";
$table_name_member = $mysql_table_start . "_db_member";
$table_name_event_form = $mysql_table_start . "_db_event_form";
$table_name_event_list = $mysql_table_start . "_db_event_list";
$table_name_admin = $mysql_table_start . "_db_admin";
$table_name_branch = $mysql_table_start . "_db_branch";
$table_name_j_category= $mysql_table_start . "_db_j_category";
$table_name_member_branch= $mysql_table_start . "_db_member_branch";

$connect = mysqli_connect("localhost", $mysql_user, $mysql_pass);


if($connect){
	$db = mysqli_select_db($connect, $mysql_db);
	mysqli_query($connect, "SET NAMES UTF8");
mysqli_query($connect,"set session character_set_connection=utf8;");
mysqli_query($connect, "set session character_set_results=utf8;");
mysqli_query($connect, "set session character_set_client=utf8;");
}else{
	echo "Failed Mysql : " . mysqli_error();
}


