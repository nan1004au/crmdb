
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

		$('label').tooltip({
			showBody:"-"	
		});



		$('#btn-submit').click(function(){
				$('#db_form').submit();
		});

		$("#db_form").validate({
			onkeyup:false,
			onclick:false,
			onfocusout:false,
			showErrors:function(errorMap, errorList){
				if(!$.isEmptyObject(errorList)){
					alert(errorList[0].message);
				}
			},
			rules:{
				name:{required: true},
				phone:{required: true},
				branch:{required: true},
				agree:{required: true},
				age:{required:true, number:true},
			},
			messages: {
				agree: "개인정보 동의를 해부세요 ",
				name: "이름을 입력해 주세요",
				phone: "연락처를 입력해 주세요",
				branch: "지점 입력해 주세요",
				age: "나이를 숫자로 입력해 주세요"
			}

	});

	var dates = $( "#r_date" ).datepicker({
				prevText: '이전 달',
				nextText: '다음 달',
				monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
				monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
				dayNames: ['일','월','화','수','목','금','토'],
				dayNamesShort: ['일','월','화','수','목','금','토'],
				dayNamesMin: ['일','월','화','수','목','금','토'],
				dateFormat: 'yy-mm-dd',
				showMonthAfterYear: true,
				yearSuffix: '년',
				onSelect: function( selectedDate ) {
					var option = this.id == "from" ? "minDate" : "maxDate",
					instance = $( this ).data( "datepicker" ),
					date = $.datepicker.parseDate(
					instance.settings.dateFormat ||
					$.datepicker._defaults.dateFormat,
					selectedDate, instance.settings );
					dates.not( this ).datepicker( "option", option, date );
				}
			});

});

function NumInput(){
	if((event.keyCode<48)||(event.keyCode>57)){
		event.returnValue=false;
	}
}
