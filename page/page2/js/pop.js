$(document).ready(function(){
		// Mobile여부를 구분하기 위함
		var uAgent = navigator.userAgent.toLowerCase();  
		// 아래는 모바일 장치들의 모바일 페이지 접속을위한 스크립트
		var mobilePhones = new Array('iphone', 'ipod', 'ipad', 'android', 'blackberry', 'windows ce','nokia', 'webos', 'opera mini', 'sonyericsson', 'opera mobi', 'iemobile');

		for(var i = 0; i < mobilePhones.length; i++)
		{
			if (uAgent.indexOf(mobilePhones[i]) != -1)
			{
				$('#user_agent').val('모바일');
			}
		}

		$('#prev_url').val(document.referrer);


		$('#btn-submit').click(function(){
			if(form_check()){
			$('#pop_form').submit();
			}

			});

		/*
		   $("#age").keydown(function(){
		   NumInput();
		   });
		 */
});

function NumInput(){
	if((event.keyCode<48)||(event.keyCode>57)){
		event.returnValue=false;
	}
}

function form_check(){
	if($('#name').val() == ""){
		alert("이름을 입력해 주세요");
		return false;
	}else if($('#age').val() == ""){
		alert("나이를 입력해 주세요");
		return false;
	}else if($('#time').val() == ""){
		alert("통화가능 시간을를 입력해 주세요");
		return false;
	}else if($('#phone').val() == ""){
		alert("전화번호를 입력해 주세요");
		return false;
	}
	return true;
}
