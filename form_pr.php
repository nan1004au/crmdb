<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>

<script type="text/javascript">

function closeWindow() {
if (typeof netscape != 'undefined' && typeof netscape.security !='undefined') {
try
{
	netscape.security.PrivilegeManager.enablePrivilege ('UniversalBrowserWrite');window.close();}catch(e){alert(e.description );}
}

else{ alert("넷스케이프가 아닙니다");}
}
</script>
</head>
<body>

<?
function c_num($str){
	$int2 = preg_replace("[^0-9]", "", $str);
	return $int2;
}
/* form 정보 
 * 이름 name
 * 나이 age 
 * 연락처 phone
 * 통화가능시간 time
 * 이벤트신청 event
 * 문의 etc
 */

include("config.php");
include("db.php");

$event_name = $_POST['event_name'];
$name= $_POST['name'];
$age = c_num($_POST['age']);
$phone = $_POST['phone'];
$time = $_POST['time'];
$event_list = $_POST['event'];
$etc = $_POST['etc'];
$prev_url= $_POST['prev_url'];
$user_agent= $_POST['user_agent'];
$sex = $_POST['sex'];
$branch = $_POST['branch'];
$r_date= $_POST['r_date'];
$j_category= $_POST['j_category'];
$event= $_POST['event_sel'];
$email= $_POST['email'];
$j_group= $_POST['j_group'];
$agree= $_POST['agree'];

echo $event . "::<br />";

$query = "insert into $table_name_db(name, age, phone, time, event, etc,sex,r_date,branch,email,j_category,j_group, agree, event_name, prev_url, user_agent) values('$name', $age, '$phone', '$time', '$event', '$etc','$sex','$r_date','$branch','$email','$j_category','$j_group','$agree' ,'$event_name', '$prev_url', '$user_agent') "; 

if(mysqli_query($connect, $query)){
	echo $query  ;
}else{
       echo 'Query is non-corrected : ' .mysql_error($connect);
}

echo "<script>location.replace('free.php');</script>";
?>

<?
include("db_close.php");
?>

</body>
</html>
