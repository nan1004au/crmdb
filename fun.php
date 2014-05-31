
<?
function printSelectDistinct($connect, $tableName, $rowName, $selected){
	$query= "select Distinct($rowName) from $tableName";
	$result = mysqli_query($connect, $query);
	$SelectFlag  = "";
	while($row = mysqli_fetch_array($result)){
		$SelectFlag= "";
		if($selected== $row[$rowName]){
			$SelectFlag= " selected=\"selected\" ";
		}
		echo '<option value="'. $row[$rowName].'"' .$SelectFlag . '>' . $row[$rowName] ."</option>";
	}

}
?>

