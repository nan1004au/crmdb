<?php
session_start();
$flag = $_REQUEST['flag'];
include("config.php");
include("db.php");

if($flag == "check") { //확인하기 처리 
	$idx = $_GET['idx'];
	$query = "update $table_name_db set ch=1 where idx= $idx"; 
	echo "check";

	if(mysqli_query($connect , $query)){
	}else{
		echo 'Query is non-corrected : ' .mysqli_error();
	}
}else if($flag=="db_delete"){ //메모 수정 처리 
	$idx = $_GET['idx'];
	$query = "delete from $table_name_db  where idx= $idx"; 
	if(!mysqli_query($connect , $query)){
		echo 'Query is non-corrected : ' .mysqli_error();
	}
}else if($flag=="memo"){ //메모 수정 처리 
	$idx = $_GET['idx'];
	$memo = $HTTP_GET_VARS['memo'];
	$query = "update $table_name_db set memo='$memo' where idx= $idx"; 

	if(mysqli_query($connect , $query)){
	}else{
		echo 'Query is non-corrected : ' .mysqli_error();
	}
}else if($flag=="login"){//로그인 처리 
	$user_id = $_GET['user_id'];
	$pass = $_GET['pass'];
	$pass_c = md5($pass);
	$query = "select * from $table_name_member where user_id like '$user_id' and pass = '$pass_c'";
	$result = mysqli_query($connect , $query);
	$count=mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	$title = $row['company_name'];
	if($count == 1){
		$_SESSION["user_id"]   =  $user_id;
		$_SESSION["title"]   =  $title;
		echo "ok";
	}else{
		echo "error : ";
	}
}else if($flag=="join"){//로그인 처리 
	$user_id = $_GET['user_id'];
	$pass = $_GET['pass'];
	$pass_c = md5($pass);
	echo $user_id ."::".$pass;
	$query = "insert into $table_name_member(user_id,pass) values('$user_id', '$pass_c')";
	$result = mysqli_query($connect , $query);
	echo "<br />" . $query . ":::";
}else if($flag=="logout"){//로그아웃
	session_destroy();
	echo "logout";

}
else if($flag=="event_create"){ // 폼만들기 
	$save_dir = "page/img/";
	$dir = "page/img/";

	$form_type=$_POST['form_type'];
	$category=$_POST['cate'];
	$price_count = $_POST['price_count'];
	$event_title = $_POST['event_title'];
	$event_id = $_POST['event_id'];
	$event_img = $_FILES['event_img']['name'];
	$event_comment = $_POST['event_comment'];

	
	//체크박스 처리 
	$ch_name = $_POST['ch_name'] ? 'y' : 'n'; //이름
	$ch_age = $_POST['ch_age'] ? 'y' : 'n'; //나이
	$ch_sex = $_POST['ch_sex'] ? 'y' : 'n'; //성별
	$ch_day = $_POST['ch_day'] ? 'y' : 'n'; //날짜
	$ch_time = $_POST['ch_time'] ? 'y' : 'n'; //시간
	$ch_phone = $_POST['ch_phone'] ? 'y' : 'n'; //연락처
	$ch_price = $_POST['ch_price'] ? 'y' : 'n'; //가격
	$ch_branch = $_POST['ch_branch'] ? 'y' : 'n'; //지점
	$ch_email = $_POST['ch_email'] ? 'y' : 'n'; //이메일
	$ch_story = $_POST['ch_story'] ? 'y' : 'n'; //사연 문의 
	$ch_group = $_POST['ch_group'] ? 'y' : 'n'; //진료선택
	$ch_agree = $_POST['ch_agree'] ? 'y' : 'n'; //진료선택

	echo "price_count : " . $price_count . "<br />";
	echo "form_type : " . $form_type . "<br />";
	echo "cate : " . $cate . "<br />";
	echo "name : " . $ch_name . "<br />";
	echo "age : " . $ch_age . "<br />";
	echo "sex : " . $ch_sex . "<br />";
	echo "day : " . $ch_day . "<br />";
	echo "time : ". $ch_time . "<br />";
	echo "phone : ". $ch_phone . "<br />";
	echo "price : ". $ch_price . "<br />";
	echo "branch : ". $ch_branch . "<br />";
	echo "email : ". $ch_email . "<br />";
	echo "story : ". $ch_story . "<br />";
	echo "group : ". $ch_group. "<br />";
	echo "agree: ". $ch_agree. "<br />";
	$file_hash_01 = "";
	$file_hash_02 = "";
	if($_FILES['event_img_01']['name']){
		echo "image 01 : " . $_FILES['event_img_01']['name'] . "<br />";
		$file_hash_01 = time().'_'.$_FILES['event_img_01']['name'];
		$ext = substr($_FILES['event_img_01']['name'], strrpos($_FILES['event_img_01']['name'], ".") + 1); 
		$upfile = $dir.$file_hash_01;
		move_uploaded_file($_FILES['event_img_01']['tmp_name'],$upfile);
	}

	if($_FILES['event_img_02']['name']){
		echo "image 02 : " . $_FILES['event_img_02']['name'] . "<br />";
		$file_hash_02 = time().'_'.$_FILES['event_img_02']['name'];
		$ext = substr($_FILES['event_img_02']['name'], strrpos($_FILES['event_img_02']['name'], ".") + 1); 
		$upfile = $dir.$file_hash_02;
		move_uploaded_file($_FILES['event_img_02']['tmp_name'],$upfile);
	}

	$col ="id, title, comment, img_hash_01, img_hash_02,form_type,category,ch_name,ch_age,ch_sex,ch_day,ch_time,ch_phone,ch_price,ch_branch,ch_email,ch_story, ch_group, ch_agree";

	$query = "insert into $table_name_event_form($col) \n value('$event_id','$event_title', '$event_comment' , '$file_hash_01' ,'$file_hash_02' ,'$form_type','$category','$ch_name','$ch_age','$ch_sex','$ch_day','$ch_time','$ch_phone','$ch_price','$ch_branch','$ch_email','$ch_story','$ch_group', '$ch_agree')";
	echo $query . "<br />";
	if(!mysqli_query($connect,$query)){
		echo "$query  : " . mysqli_error($connect);
	}
	echo "<br />";

	echo $query . "<br />";

	for($i=0;$i< $price_count + 1;$i++) 
	{	
		$event_name = $_POST['event' .$i.'_name'];
		$event_price = $_POST['event'.$i.'_price'];

		if(strlen($event_price) > 1){
			
			$query = "insert into $table_name_event_list(event_id,name, price) value('$event_id','$event_name', '$event_price')";
			echo "$i $query <br />";
			if(!mysqli_query($connect , $query)){
				echo "$query  : " .mysqli_error($connect);
			}
		}
	}
	header("Location: manage_form.php");

}
else if($flag == "form_edit"){
	$save_dir = "page/img/";
	$dir = "page/img/";


	$event_id = $_POST['event_id'];
	$query = "select * from $table_name_event_form where id like '$event_id'";
	$result = mysqli_query($connect, $query);
	$row = mysqli_fetch_array($result);


	$form_type=$_POST['form_type'];
	$category=$_POST['cate'];
	$price_count = $_POST['price_count'];
	$event_title = $_POST['event_title'];
	$event_img_01 = $_FILES['event_img_01']['name'];
	$event_img_02 = $_FILES['event_img_01']['name'];
	$event_comment = $_POST['event_comment'];

	
	//체크박스 처리 
	$ch_name = $_POST['ch_name'] ? 'y' : 'n'; //이름
	$ch_age = $_POST['ch_age'] ? 'y' : 'n'; //나이
	$ch_sex = $_POST['ch_sex'] ? 'y' : 'n'; //성별
	$ch_day = $_POST['ch_day'] ? 'y' : 'n'; //날짜
	$ch_time = $_POST['ch_time'] ? 'y' : 'n'; //시간
	$ch_phone = $_POST['ch_phone'] ? 'y' : 'n'; //연락처
	$ch_price = $_POST['ch_price'] ? 'y' : 'n'; //가격
	$ch_branch = $_POST['ch_branch'] ? 'y' : 'n'; //지점
	$ch_email = $_POST['ch_email'] ? 'y' : 'n'; //이메일
	$ch_story = $_POST['ch_story'] ? 'y' : 'n'; //사연 문의 
	$ch_group = $_POST['ch_group'] ? 'y' : 'n'; //진료선택
	$ch_agree= $_POST['ch_agree'] ? 'y' : 'n'; //진료선택



	$file_hash_01 = "";
	$file_hash_02 = "";


		if($_FILES['event_img_01']['name']){
			@unlink("page/img/" . $row['img_hash_01']);
			$file_hash_01 = time().'_'.$_FILES['event_img_01']['name'];
			$upfile = $dir.$file_hash_01;
			move_uploaded_file($_FILES['event_img_01']['tmp_name'],$upfile);
			$event_img_01 = $file_hash_01;
		}else{
			$event_img_01 = $row['img_hash_01'];	
		}


		if($_FILES['event_img_02']['name']){
			@unlink("page/img/" . $row['img_hash_02']);
			$file_hash_02 = time().'_'.$_FILES['event_img_02']['name'];
			$upfile = $dir.$file_hash_02;
			move_uploaded_file($_FILES['event_img_02']['tmp_name'],$upfile);
			$event_img_02 = $file_hash_02;
		}else{
			$event_img_02 = $row['img_hash_02'];	
		}


	$query = "update $table_name_event_form set id='$event_id', title='$event_title', comment='$event_comment', img_hash_01='$event_img_01', img_hash_02='$event_img_02', form_type='$form_type',category = '$category', ch_name = '$ch_name',ch_age='$ch_age',ch_sex='$ch_sex',ch_day='$ch_day',ch_time='$ch_time',ch_phone='$ch_phone',ch_price='$ch_price', ch_branch='$ch_branch', ch_email='$ch_email', ch_story='$ch_story', ch_group='$ch_group', ch_agree='$ch_agree' where id like '" . $event_id . "'"; 

	if(!mysqli_query($connect , $query)){
		echo "$query  : " .mysqli_error($connect);
	}



	$event_id = $_POST['event_id'];
	$query = "select * from $table_name_event_list where event_id like '$event_id'";
	$result_event = mysqli_query($connect, $query);
	$row_count = mysqli_num_rows($result_event);
	echo $row_count . "<br />";
	
	for($i=1;$i< $price_count + 1;$i++) 
	{	
		$event_name = $_POST['event' .$i.'_name'];
		$event_price = $_POST['event'.$i.'_price'];

		$row = mysqli_fetch_array($result_event);

		if($row_count >= $i)
		{
			$query = "update $table_name_event_list set price = '" . $event_price . "',name ='". $event_name . "' where idx =" . $row['idx'];
			echo "update $query <br />";
			if(!mysqli_query($connect , $query)){
				echo "$query  : " .mysqli_error($connect);
			}

		}else if(strlen($event_price) > 1){
			$query = "insert into $table_name_event_list(event_id,name, price) value('$event_id','$event_name', '$event_price')";
			echo "$i $query <br />";
			if(!mysqli_query($connect , $query)){
				echo "$query  : " .mysqli_error($connect);
			}
		}
	}

	header("Location: manage_form.php");

}
else if($flag == "form_delete"){
	$event_id = $_GET['event_id'];

	//첨부파일 삭제 
	$query = "select * from $table_name_event_form where id like '$event_id'";
	$result = mysqli_query($connect, $query);
	$row = mysqli_fetch_array($result);
	@unlink("page/img/" . $row['img_hash_01']);
	@unlink("page/img/" . $row['img_hash_02']);
	//폼삭제 
	$result = mysqli_query($connect, $query);
	$query = "delete from $table_name_event_form where id like '$event_id'";
	// 폼 세부목록 
	$result = mysqli_query($connect, $query);
	$query = "delete from $table_name_event_list where event_id like '$event_id'";
	$result = mysqli_query($connect, $query);
	header("Location: manage_form.php");

}
else if($flag=="event_id_check"){ // 폼만들기 
	$event_id  = $_GET['event_id'];
	$query = "select * from $table_name_event_form where $event_id";
	$result = mysqli_query($connect, $query);
	$rows = mysqli_num_rows($result);
	echo $rows == 0 ? "check" : "no check";
}

else if($flag == "edit_company_name"){
	$data = $_GET['data'];
	$query = " update $table_name_member  set company_name = '$data' where user_id like '".$_SESSION["user_id"]."'" ;
	$result = mysqli_query($connect, $query);
	$_SESSION["title"]=$data;
}

else if($flag == "edit_now_user_password"){
	$data = $_GET['data'];
	$pass_c = md5($data);
	$query = " update $table_name_member  set pass='$pass_c' where user_id like '".$_SESSION["user_id"]."'" ;
	$result = mysqli_query($connect, $query);
	echo $query;
}

else if($flag == "add_branch"){
	$data = $_GET['data'];
	$query = "insert into $table_name_branch(name) value('$data')" ;
	$result = mysqli_query($connect, $query);
	echo $query;
}

else if($flag == "add_j_category"){
	$data = $_GET['data'];
	$query = "insert into $table_name_j_category(name) value('$data')" ;
	$result = mysqli_query($connect, $query);
	echo $query;
}

else if($flag == "del_j_category"){
	$data = $_GET['data'];
	$query = "delete from  $table_name_j_category where idx=$data" ;
	$result = mysqli_query($connect, $query);
	echo $query;
}
else if($flag == "del_branch"){
	$data = $_GET['data'];
	$query = "delete from  $table_name_branch where idx=$data" ;
	$result = mysqli_query($connect, $query);
	echo $query;
}
else if($flag == "member_add"){
	$user_id = $_GET['member_add_id'];
	$pass = $_GET['member_add_pass'];
	$pass_c = md5($pass);
	$branch= $_GET['member_add_branch'];
	if(user_id_duplication_check($user_id)){
		$query = "insert into $table_name_member(user_id,pass,branch) values('$user_id', '$pass_c', '$branch')";
		mysqli_query($connect , $query);
		echo "ok";
	}


}else if ($flag == "del_member"){
	$data = $_GET['data'];
	$query = "delete from  $table_name_member where idx=$data" ;
	$result = mysqli_query($connect, $query);
	echo $query;
}

else if($flag == "edit_member_branch"){
	$data1 = $_GET['data1'];
	$data2 = $_GET['data2'];
	$query = " update $table_name_member  set branch='$data2' where user_id like '".$data1 ."'" ;
	$result = mysqli_query($connect, $query);
	echo $query;
}

else if($flag == "edit_member_pass"){
	$pass1 = $_POST['pass1'];
	$pass_c = md5($pass1);
	$user_id = $_POST['user_id'];
	$query = " update $table_name_member  set pass='$pass_c' where user_id like '".$user_id."'" ;
	$result = mysqli_query($connect, $query);
	echo "<script>alert('변경되었습니다'); self.opener = self ; self.close() ;</script>";
}

function user_id_duplication_check($user_id){
	global $table_name_member;
	global $connect;
	$query = "select * from $table_name_member where user_id like '$user_id'";
	$result = mysqli_query($connect , $query);
	$count=mysqli_num_rows($result);
	if($count >  0){
		return false;
	}else{
		return true;
	}

}


include("db_close.php");

?>
