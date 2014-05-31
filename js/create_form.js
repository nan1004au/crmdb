price_count = 1;
form_select = '';

$(window).load(function(){
	ch_check_all();
	$('#span-price').hide();
		for(i=2;i<21;i++){
			$('#price_div_'+i).hide();
		}
});

$(document).ready(function(){
	$('#btn-price').click(function(){
		add_price();
	});

	$('.form_img').click(function(event){
		form_select =  event.target.id;
		$(event.target).css("border-style","dotted");	
		$(event.target).css("border-width","3px");	
		if(event.target.id == 'form_img_1' ){
			$('#form_img_2').css("border-width","0px");	
			$('#form_img_3').css("border-width","0px");	
			$('#form_img_4').css("border-width","0px");	
			$('#image_div_01').show();
			$('#image_div_02').hide();
			$('#form_type').val("일반");
			
		}

		if(event.target.id == 'form_img_2'){
			$('#form_img_1').css("border-width","0px");	
			$('#form_img_3').css("border-width","0px");	
			$('#form_img_4').css("border-width","0px");	
			$('#image_div_01').show();
			$('#image_div_02').hide();
			$('#form_type').val("상단고정");
		}
		
		if(event.target.id == 'form_img_3'){
			$('#form_img_1').css("border-width","0px");	
			$('#form_img_2').css("border-width","0px");	
			$('#form_img_4').css("border-width","0px");	
			$('#image_div_01').show();
			$('#image_div_02').show();
			$('#form_type').val("중간폼");
		}

		if(event.target.id == 'form_img_4'){
			$('#form_img_1').css("border-width","0px");	
			$('#form_img_2').css("border-width","0px");	
			$('#form_img_3').css("border-width","0px");	
			$('#image_div_01').show();
			$('#image_div_02').show();
			$('#form_type').val("자유");
		}
	});

	$('#event_id').change(function(){
			$("#event_id_check").html("test");
		});
	$('#cate').change(function(){
		if($('#cate').val() == '일반'){
			$('#ch_name').attr("checked",true);
			$('#ch_age').attr("checked",true);
			$('#ch_sex').attr("checked",true);
			$('#ch_day').attr("checked",true);
			$('#ch_time').attr("checked",true);
			$('#ch_phone').attr("checked",true);
			$('#ch_price').attr("checked",true);
			$('#ch_branch').attr("checked",true);
			$('#ch_email').attr("checked",true);
			$('#ch_story').attr("checked",true);
			$('#ch_group').attr("checked",true);
			$('#ch_agree').attr("checked",true);

		}else if($('#cate').val() == "체험단"){
			$('#ch_name').attr("checked",true);
			$('#ch_age').attr("checked",true);
			$('#ch_sex').attr("checked",true);
			$('#ch_day').attr("checked",false);
			$('#ch_time').attr("checked",false);
			$('#ch_phone').attr("checked",true);
			$('#ch_price').attr("checked",true);
			$('#ch_branch').attr("checked",false);
			$('#ch_email').attr("checked",false);
			$('#ch_story').attr("checked",true);
			$('#ch_group').attr("checked",false);
			$('#ch_agree').attr("checked",true);
		}else if($('#cate').val() == "사연"){
			$('#ch_name').attr("checked",true);
			$('#ch_age').attr("checked",true);
			$('#ch_sex').attr("checked",true);
			$('#ch_day').attr("checked",false);
			$('#ch_time').attr("checked",false);
			$('#ch_phone').attr("checked",true);
			$('#ch_price').attr("checked",true);
			$('#ch_branch').attr("checked",false);
			$('#ch_email').attr("checked",false);
			$('#ch_story').attr("checked",true);
			$('#ch_group').attr("checked",false);
			$('#ch_agree').attr("checked",true);
		}else if($('#cate').val() == "기타"){
			$('#ch_name').attr("checked",false);
			$('#ch_age').attr("checked",false);
			$('#ch_sex').attr("checked",false);
			$('#ch_day').attr("checked",false);
			$('#ch_time').attr("checked",false);
			$('#ch_time').attr("checked",false);
			$('#ch_phone').attr("checked",false);
			$('#ch_price').attr("checked",false);
			$('#ch_branch').attr("checked",false);
			$('#ch_email').attr("checked",false);
			$('#ch_story').attr("checked",false);
			$('#ch_group').attr("checked",false);
			$('#ch_agree').attr("checked",false);
		}
	});
});

function ch_check_all(){
	$('#ch_name').attr("checked",true);
	$('#ch_age').attr("checked",true);
	$('#ch_sex').attr("checked",true);
	$('#ch_day').attr("checked",true);
	$('#ch_time').attr("checked",true);
	$('#ch_phone').attr("checked",true);
	$('#ch_price').attr("checked",true);
	$('#ch_branch').attr("checked",true);
	$('#ch_email').attr("checked",true);
	$('#ch_story').attr("checked",true);
	$('#ch_group').attr("checked",true);
	$('#ch_agree').attr("checked",true);
}


function ch_togle(ch,yn){
	if(yn!='y'){
		$('#'+ch).attr("checked",false);
	}else{
		$('#'+ch).attr("checked",true);
	}
}

function add_price(){
	price_count++;
	if(price_count < 11){
		$('#price_div_'+price_count).show();
		$('#price_count').val(price_count);
	}else{
		$('#btn-price').hide();
		$('#span-price').show();

	}
}

function show_price(row_count){
	for(i=1;i<row_count;i++){
		add_price();
	}
}

function form_type_select(form_type_id){
		$("#form_type > option[value=" + form_type_id + "]").attr("selected", "ture");
		//$("#form_type > option[value=" + "page1" + "]").attr("selected", "ture");
		//alert(form_type_id);

/*

		$(form_type_id).css("border-style","dotted");	
		$(form_type_id).css("border-width","3px");	
		form_select = form_type_id; 

		if(form_type_id  == 'form_img_1' ){
			$('#form_img_2').css("border-width","0px");	
			$('#form_img_3').css("border-width","0px");	
			$('#form_img_4').css("border-width","0px");	
			$('#image_div_01').show();
			$('#image_div_02').hide();
			$('#form_type').val("일반");
			
		}

		if(form_type_id  == 'form_img_2'){
			$('#form_img_1').css("border-width","0px");	
			$('#form_img_3').css("border-width","0px");	
			$('#form_img_4').css("border-width","0px");	
			$('#image_div_01').show();
			$('#image_div_02').hide();
			$('#form_type').val("상단고정");
		}
		
		if(form_type_id == 'form_img_3'){
			$('#form_img_1').css("border-width","0px");	
			$('#form_img_2').css("border-width","0px");	
			$('#form_img_4').css("border-width","0px");	
			$('#image_div_01').show();
			$('#image_div_02').show();
			$('#form_type').val("중간폼");
		}

		if(form_type_id == 'form_img_4'){
			$('#form_img_1').css("border-width","0px");	
			$('#form_img_2').css("border-width","0px");	
			$('#form_img_3').css("border-width","0px");	
			$('#image_div_01').show();
			$('#image_div_02').show();
			$('#form_type').val("자유");
		}
*/
}


function data_edit(flag_, data_){
		$.ajax({   
			type: "GET",   
			url: "proce.php",   
			data: {flag : flag_, data : data_  }   
		}).done(function( msg ) {   
			if(flag_ == 'edit_company_name'){
				$('#h1_title').html(data_ + ' 설정 페이지입니다');
				$('title').html(data_ + ' DB');
			}

			alert("반영되었습니다");
			location.reload(true);
		});  
}

