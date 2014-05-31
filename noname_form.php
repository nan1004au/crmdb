<?
$user_agent ="컴퓨터";
if(preg_match('/(iphone|lgtelecom|skt|mobile|Mobile|samsung|nokia| blackberri|android|Android|sony|phone|webos|palmos)/i', $_SERVER['HTTP_USER_AGENT']))
{
    $user_agent= '모바일' ;
}
echo "test" .$_SERVER['HTTP_USER_AGENT']. "<br />";
echo "user_agent" . $user_agent . "<br />";
$prev_url = $_SERVER['HTTP_REFERER'];

$event_name = "광고4";
?>


<html> 
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<STYLE type="text/css">
.bottom_border{
   border-bottom:1px solid black;
   border-right-width:0px;
   border-left-width:0px;
   border-top-width:0px;
   padding:10px;
}
body{
   font-size: 13px;
}
</STYLE>


</head>
<body>
<p style="text-align:center">
<img src="img.jpg" style="width:650px;margin-bottom:1px;" / >
<br />

<div style="background-color:#000000;width:600px;margin:0px;padding:10px;border-left-width:0px;border-right-width:0px;margin: auto; margin-left: expression(((document.body.clientWidth>800) ? ((document.body.clientWidth-800)/2) : 0) + "px"); ">
   <div style="text-align:center">
      <span style="font-size:23px;color:#FFFFFF;font-weight:bold;">지금 바로 신청하세요</span> <br />
      <span style="font-size:13px;color:#FFFFFF">소중한 고객님의 개인정보 보호를 위하여 상담에 관한 일체 내용을 남기지 않습니다. </span>
   </div>

</div>
<br />
<br />

<form action="form_pr.php" method="post" name="form">

<!-- 이부분은 꼭 넣어 주셔야 합니다. --!>
<input type="hidden" name="event_name", value="<?echo $event_name?>" />
<input type="hidden" name="prev_url", value="<?echo $prev_url?>" />
<input type="hidden" name="user_agent", value="<?echo $user_agent?>" />
<!-- 여기까지 --!>


   <table border="0" style=" border-collapse:collapse; margin:0px;padding:10px;border-left-width:0px;border-right-width:0px;margin: auto; margin-left: expression(((document.body.clientWidth>800) ? ((document.body.clientWidth-800)/2) : 0) + "px"); ">

      <tr>
	 <td class="bottom_border">* 이름</td>
	 <td class="bottom_border"> <input type="text" name="name" /></td>
      </tr>
      <tr>
	 <td class="bottom_border">나이</td>
	 <td class="bottom_border"><input type="text" name="age" /></td>
      </tr>
      <tr>
	 <td class="bottom_border">* 연락처</td>
	 <td class="bottom_border"><input type="text" name="phone" /></td>
      </tr>
      <tr>
	 <td class="bottom_border">통화가능시간</td>
	 <td class="bottom_border">
	    <select name="time">
	       <option value="">::시간선택::</option>
	       <option value="항시가능">항시가능</option>
	       <option value="09시~10시">09시~10시</option>
	       <option value="10시~11시">10시~11시</option>
	       <option value="11시~12시">11시~12시</option>
	       <option value="12시~13시">12시~13시</option>
	       <option value="13시~14시">13시~14시</option>
	       <option value="14시~15시">14시~15시</option>
	       <option value="15시~16시">15시~16시</option>
	       <option value="16시~17시">16시~17시</option>
	       <option value="17시~18시">17시~18시</option>
	       <option value="18시이후">18시이후</option>
	    </select>
	 </td>
      </tr>
      <tr>
	 <td class="bottom_border">*이벤트 신청<br />(중복체크가능)</td>
	 <td class="bottom_border">
	    <input type="checkbox" name="event[]" value="안면윤곽" />안면윤곽 
	    <input type="checkbox" name="event[]" value="지방흡입" />지방흡입
	    <input type="checkbox" name="event[]" value="지방이식" />지방이식
	    <input type="checkbox" name="event[]" value="가슴성형" />가슴성형
	    <input type="checkbox" name="event[]" value="눈성형" />눈성형
	    <br />
	    <input type="checkbox" name="event[]" value="모발이식" />모발이식
	    <input type="checkbox" name="event[]" value="보톡스" />보톡스
	    <input type="checkbox" name="event[]" value="필러" />필러
	    <input type="checkbox" name="event[]" value="필러" />필러
	    <input type="checkbox" name="event[]" value="코성형" />코성형
	 </td>
      </tr>
      <tr>
	 <td>기타문의</td>
	 <td><textarea rows="5" cols="50" name="etc"></textarea></td>
      </tr>
   </table>
   <div style="margin:0px;padding:10px;border-left-width:0px;border-right-width:0px;margin: auto; margin-left: expression(((document.body.clientWidth>800) ? ((document.body.clientWidth-800)/2) : 0) + "px"); ">
      <div style="text-align:center;">
	 <a href="javascript:document.form.submit();"><img src="free.png" border="0"></a> 
      </form>
   </div>
</div>
</p>
</body>
</html>
