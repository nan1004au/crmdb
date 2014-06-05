
$(document).ready(function(){

		$('.page_seq').click(function(event){
			//alert("asfd");
			id = event.target.id;
			var res = id.replace("page_seq_", ""); 
			//id.val("report.php?page_seq="+ res + create_query_string('','') );
			$(location).attr('href',"report.php?page_seq="+ res +"&"+ create_query_string('','') );
		});

		$('#sh_txt').focus();
		$('#excel_btn').click(function(){
			alert("excel_proce.php?idx=0&" + create_query_string('','') );
			$(location).attr('href',"excel_proce.php?idx=0&" + create_query_string('','') );
		});

		//이벤트명으로 필터 
		$('#en').change(function(){
			url = "report.php?" + create_query_string('ev', $('#en').val());
			$(location).attr('href',url);
		});

		//확인여부 
		$('#ch_list').change(function(){
			url = "report.php?" + create_query_string('ch', $('#ch_list').val());
			$(location).attr('href',url);
		});
	
		//지점별 
		$('#branchFromSelect').change(function(){
			url = "report.php?" + create_query_string('br', $('#branchFromSelect').val());
			$(location).attr('href',url);
		});
		
		//분류 
		$('#categoryFromSelect').change(function(){
			url = "report.php?" + create_query_string('ca', $('#categoryFromSelect').val());
			$(location).attr('href',url);
		});
	
		// 검색하는 부분 
		$('#sh_btn').click(function(){
			url = "report.php?" + create_query_string('sh', $('#sh_txt').val());
			$(location).attr('href',url);
		});

	$("#sh_txt").bind("keydown", function(e) {
		if (e.keyCode == 13) { // enter key
			if($('#sh_btn').val() != ""){
				url = "report.php?" + create_query_string('sh', $('#sh_txt').val());
				$(location).attr('href',url);
			}else{
				url = "report.php?" + create_query_string('sh', $('#sh_txt').val());
				$(location).attr('href',url);
			}
			return false
		}
	});


	});


function ch(str, nu){
	$.ajax({   
	type: "GET",   
	url: "proce.php",   
	data: {flag : "check", idx : nu }   
	}).done(function( msg ) {   
		$('#'+ str).val("확인됨")
		$('#'+ str).removeClass("btn-success")
		$('#'+ str).addClass("btn-link")
		$('#'+ str).addClass("disabled")
	});  
}

function memo(str,memo_str,nu){
	$.ajax(
			{   
type: "GET",   
url: "proce.php",   
data: {flag : "memo", memo : memo_str, idx : nu }   
}).done(function( msg ) {   
	alert("메모가 수정되었습니다");
	});  
}


function db_del(nu){
	$.ajax(
			{   
type: "GET",   
url: "proce.php",   
data: {flag : "db_delete", idx : nu }   
}).done(function( msg ) {   
	alert(msg + "삭제되었습니다");
	location.reload(true);
	});  
}


//URL의 GET 파라메터를 가지고 온다. 
function getParams(param_value) {
	// 파라미터가 담길 배열
	var param = new Array();
	// 현재 페이지의 url
	var url = decodeURIComponent(location.href);
	// url이 encodeURIComponent 로 인코딩 되었을때는 다시 디코딩 해준다.
	url = decodeURIComponent(url);
	var params;
	// url에서 '?' 문자 이후의 파라미터 문자열까지 자르기
	params = url.substring( url.indexOf('?')+1, url.length );
	// 파라미터 구분자("&") 로 분리
	params = params.split("&");
	// params 배열을 다시 "=" 구분자로 분리하여 param 배열에 key = value 로 담는다.
	var size = params.length;
	var key, value;
	for(var i=0 ; i < size ; i++) {
		key = params[i].split("=")[0];
		value = params[i].split("=")[1];
		param[key] = value;
	}
	return param[param_value];
}

function create_query_string(flag, value){
	checkValue = getParams('ch');
	eventValue= getParams('ev');
	searchValue = getParams('sh');
	branchValue = getParams('br');
	categoryValue = getParams('ca');

	checkQuery='';
	eventQuery='';
	searchQuery='';
	branchQuery='';
	categoryQuery='';

	eventDefaultText = '이벤트명';
	searchDefaultText = '';
	branchDefaultText = '지점별';
	checkDefaultText = '확인여부';
	categoryDefaultText = '분류별';

	if(value == eventDefaultText){
		eventQuery='';
	}else if(flag=='ev'){
		eventQuery = '&ev=' + value;
	}else if(typeof eventValue !='undefined' && value != ''){
		eventQuery = '&ev=' + eventValue;
	}else if(value == '' && typeof eventValue !='undefined'){
		eventQuery = '&ev=' + eventValue;
	}

	if(flag=='sh'){
		searchQuery = '&sh=' + value;
	}else if(typeof searchValue != 'undefined' && value!=''){
		SearchQuery = '&sh=' + searchValue;
	}else if(value == '' && typeof searchValue != 'undefined'){
		SearchQuery = '&sh=' + searchValue;
	}

	if(value == checkDefaultText){
		checkQuery='';
	}else if(flag=='ch'){
		checkQuery = '&ch=' + value;
	}else if(typeof checkValue != 'undefined' && value != ''){
		checkQuery = '&ch=' + checkValue;
	}else if(value == '' && typeof checkValue != 'undefined'){
		checkQuery = '&ch=' + checkValue;
	}

	if(value == branchDefaultText){
		branchQuery='';
	}else if(flag=='br'){
		branchQuery = '&br=' + value;
	}else if(typeof branchValue!= 'undefined' && value != ''){ 
		branchQuery = '&br=' + branchValue;
	}else if(value == '' && typeof branchValue!= 'undefined' ){
		branchQuery= '&br=' + branchValue;
	}

	if(value == categoryDefaultText){
		categoryQuery='';
	}else if(flag == 'ca'){
		categoryQuery = '&ca=' + value;
	}else if(typeof categoryValue != 'undefined' && value != '' ){
		categoryQuery = '&ca=' + categoryValue;
	}else if(value == '' && typeof categoryValue != 'undefined'){
		categoryQuery= '&ca=' + categoryValue;
	}

	queryString = checkQuery + eventQuery + 
					searchQuery + branchQuery + categoryQuery;
	queryString = queryString.substring(1,queryString.length);

	return queryString;
}
