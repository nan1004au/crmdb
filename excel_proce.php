<?
$ev = $_GET['ev'];
$ch = $_GET['ch'];
$sh = $_GET['sh'];
$br = $_GET['br'];


require_once 'PHPExcel_last/Classes/PHPExcel.php';
include("config.php");
include("db.php");

$ev_query = "";
$ch_query = "";
$sh_query = "";
$br_query = "";


if(isset($ev)){
	$ev_query = "and event_name like '$ev' ";
}

if(isset($br)){
	$br_query = "and branch like '$br' ";
}

if(isset($ca)){
	$ca_query = "and j_group like '$ca' ";
}


if(isset($ch)){
	if($ch == "check"){
		$ch_query = "and ch=1 ";
	}else if($ch == "no_check"){
		$ch_query = "and ch is NULL ";
	}
}


if(isset($sh)){
		$sh_query = "and (etc like '%$sh%' or event like '%$sh%' or phone like '%$sh%' or name like '%$sh%' or memo like '%$sh%' or prev_url like '$sh' or time like '%$sh%'  or j_group like '%$sh%'  or j_category like '%$sh%' or branch like '%$sh%' or email like '%$sh%')";
}



$query = "SELECT *, (select count(phone) from $table_name_db p where phone like  o.phone) as phone_d   FROM $table_name_db o where idx is not null $ev_query $br_query $ca_query $ch_query $sh_query  order by c_date";
$result = mysqli_query($connect, $query);
$objPHPExcel = new PHPExcel();

$sheet = $objPHPExcel->getActiveSheet();
$sheet->getDefaultStyle()->getFont()->setName('맑은 고딕');
$sheetIndex = $objPHPExcel->setActiveSheetIndex(0);

$sheetIndex->setCellValue('A1','오로라DB');
$sheetIndex->mergeCells('A1:S1');
$sheetIndex->getStyle('A1')->getFont()->setSize(20)->setBold(true);
$sheetIndex->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

//제목
$sheetIndex 
	->setCellValue('A2', '번호')
	->setCellValue('B2', '분류')
	->setCellValue('C2', '이벤트명')
	->setCellValue('D2', '지점')
	->setCellValue('E2', '진료항목')
	->setCellValue('F2', '진료선택')
	->setCellValue('G2', '이름')
	->setCellValue('H2', '나이')
	->setCellValue('I2', '연락처')
	->setCellValue('J2', '통화시간')
	->setCellValue('K2', '예약날짜')
	->setCellValue('L2', '성별')
	->setCellValue('M2', '이메일')
	->setCellValue('N2', '문의&사연')
	->setCellValue('O2', '메모')
	->setCellValue('P2', '유입기기')
	->setCellValue('Q2', '유입주소')
	->setCellValue('R2', '핸드폰중복')
	->setCellValue('S2', '접수일');
$sheetIndex->getStyle("A2:S2")->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
$sheetIndex->getStyle("A2:S2")->getFont()->setBold(true);
$sheetIndex->getStyle("A2:S2")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('4682b4');
$i =3;
while($row = mysqli_fetch_array($result)){
	$ph_d = "중복없음";
		if($row[phone_d] > 1 ){
			$ph_d = $row[phone_d] . "개 중복";
		}
	$dtime = new DateTime($row['c_date']);
	$phone = $row['phone'];
	if(strpos($row['phone'],"-") == false)	
	{
		
		$phone = substr($phone, 0, 3) . "-" .substr($phone, 3, 4)."-".substr($phone, 7) ; 
	}	
$sheetIndex 
	->setCellValue('A'. $i, $row['idx'])//번호 
	->setCellValue('B'. $i, $row['j_group'])//분류
	->setCellValue('C'. $i, $row['event_name'])//이벤트명
	->setCellValue('D'. $i, $row['branch'])//지점
	->setCellValue('E'. $i, $row['event'])//진료항목
	->setCellValue('F'. $i, $row['j_category'])//진료선택
	->setCellValue('G'. $i, $row['name'])//이름
	->setCellValue('H'. $i, $row['age'])//나이
	->setCellValue('I'. $i, $row['phone'])//연락처
	->setCellValue('J'. $i, $row['time'])//통화시간
	->setCellValue('K'. $i, $row['r_date'])//예약날짜
	->setCellValue('L'. $i, $row['sex'])//성별
	->setCellValue('M'. $i, $row['email'])//이메일
	->setCellValue('N'. $i, $row['etc'])//문의사연
	->setCellValue('O'. $i, $row['memo'])//메모
	->setCellValue('P'. $i, $row['user_agent'])//유입기기
	->setCellValue('Q'. $i, $row['prev_url'])//유입주소
	->setCellValue('R'. $i, $ph_d)//핸드폰중복
	->setCellValue('S'. $i, $dtime->format("y/m/d H:i:s"));//접수일

	$sheetIndex->getStyle("A$i:S$i")->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

$i++;

}
//---------------------------------------------------------------------

$sheetIndex->getColumnDimension('A')->setWidth(5);
$sheetIndex->getColumnDimension('B')->setWidth(10);
$sheetIndex->getColumnDimension('C')->setWidth(15);
$sheetIndex->getColumnDimension('D')->setWidth(10);
$sheetIndex->getColumnDimension('E')->setWidth(25);
$sheetIndex->getColumnDimension('F')->setWidth(10);
$sheetIndex->getColumnDimension('G')->setWidth(8);
$sheetIndex->getColumnDimension('H')->setWidth(10);
$sheetIndex->getColumnDimension('I')->setWidth(15);
$sheetIndex->getColumnDimension('J')->setWidth(15);
$sheetIndex->getColumnDimension('K')->setWidth(15);
$sheetIndex->getColumnDimension('L')->setWidth(5);
$sheetIndex->getColumnDimension('M')->setWidth(20);
$sheetIndex->getColumnDimension('N')->setWidth(20);
$sheetIndex->getColumnDimension('O')->setWidth(20);
$sheetIndex->getColumnDimension('P')->setWidth(10);
$sheetIndex->getColumnDimension('Q')->setWidth(20);
$sheetIndex->getColumnDimension('R')->setWidth(15);
$sheetIndex->getColumnDimension('S')->setWidth(20);


header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename=adb.xls');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');

exit;
?>
