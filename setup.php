<?

include("config.php");
include("db.php");

$flag = $_GET['flag'];
if($flag == 'setup'){
}

$table_name_db = $mysql_table_start . "_db_client";
$client_query = "create table $table_name_db( idx int(10) not null auto_increment , name varchar(50) not null, age int, phone varchar(20) not null, time varchar(20), event varchar(200), etc varchar(300), memo varchar(300), ch tinyint(2), event_idx int, event_name varchar(30), prev_url varchar(255), user_agent varchar(20), ip_address varchar(20), c_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, primary key (idx) )";
$table_name_ = "db_member";
$table_name_member = $mysql_table_start . "_db_member";

$member_query  = "create table $table_name_member( idx int(10) not null auto_increment, user_id char(15) not null, pass varchar(32) not null, primary key(idx))";

$table_name_event_form = $mysql_table_start . "_db_event_form";
$event_form_query = "create table $table_name_event_form ( idx int(10) not null auto_increment , id varchar(50) not null, title varchar(50) not null, comment varchar(1000), img_hash varchar(1000), c_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, primary key (idx))"; 

$table_name_event_list = $mysql_table_start . "_db_event_list";
$event_form_list ="create table $table_name_event_list( idx int(10) not null auto_increment , event_id varchar(50) not null, name varchar(50) not null, price varchar(50) not null, primary key (idx)) ";

echo "$event_form_list<br />";

mysqli_query($connect,$client_query );
mysqli_query($connect,$member_query );
mysqli_query($connect,$event_form_query);
mysqli_query($connect,$event_form_list);
echo "<h1>설정이 안료 되었습니다</h1>"
?>
