<?
$ev = $_GET['ev'];
$ch = $_GET['ch'];
$sh = $_GET['sh'];
$br = $_GET['br'];
$ca = $_GET['ca'];
$page_seq = $_GET['page_seq'];

$ev_query = "";
$ch_query = "";
$sh_query = "";
$br_query = "";
//------------------------------ 아이디 관련 

$id_branch = $_SESSION["branch"];
$id_branch_query = "";
if($id_branch != "관리자"){
	$id_branch_query = " and branch like '%$id_branch%'";
}

//------------------------------ 셀렉트문 출력용 
$eventNameSelect = "";
$branchNameSelect  = "";
if(isset($ev)){
	$ev_query = "and event_name like '$ev' ";
}else {
	$eventNameSelect = " selected=\"selected\" ";
}

if(isset($br)){
	$br_query = "and branch like '$br' ";
}else {
	$branchNameSelect =  " selected=\"selected\" ";
}

if(isset($ca)){
	$ca_query = "and j_group like '$ca' ";
}else {
	$categoryNameSelect =  " selected=\"selected\" ";
}


if(isset($ch)){
	if($ch == "check"){
		$ch_query = "and ch=1 ";
	}else if($ch == "no_check"){
		$ch_query = "and ch is NULL ";
	}
}

// 검색이 설정되어 있을 경우 
if(isset($sh)){
		$sh_query = "and (etc like '%$sh%' or event like '%$sh%' or phone like '%$sh%' or name like '%$sh%' or memo like '%$sh%' or prev_url like '$sh' or time like '%$sh%'  or j_group like '%$sh%'  or j_category like '%$sh%' or branch like '%$sh%' or email like '%$sh%')";
}

$event_name = mysqli_query($connect, "select Distinct(event_name) from $table_name_db ");
//$title_query = "SELECT * FROM $table_name_db where idx is not null ($ev_query $ch_query $sh_query $br_query $ca_query) $id_branch_query order by idx desc";
//$result = mysqli_query($connect, $title_query); 
//$total = mysqli_num_rows($result);


//페이징과 관련된 작업 
if($page_seq == 0){
	$page_seq = $page_seq + 1;
}
$posts_num = 10; //한 페이지에 보여줄 게시물의 수
$page_num = ceil($total/$posts_num);  //전체 페이지 개수
$page_start = $posts_num * ($page_seq-1);  //$page_seq의 값에 따라 페이지가 구분된다. 할당안하면 0이 들어감.

$query = "SELECT *, (select count(phone) from $table_name_db p where phone like  o.phone) as phone_d   FROM $table_name_db o where idx is not null "; 
$query = $query . " $ev_query $ch_query $sh_query $br_query $ca_query $id_branch_query order by idx desc limit $page_start, $posts_num";

$result = mysqli_query($connect, $query);
//페이징 관련 작업 끝 

?>
