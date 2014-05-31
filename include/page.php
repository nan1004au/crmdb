<?
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
$ch_agree=$row_form['ch_agree'];

$two = false;
if($event_form_type== "중간폼"){
	$two = true;
}
?>
