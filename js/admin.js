$(document).ready(function(){
	$('#btn-company-name').click(function(){
		data_edit('edit_company_name', $('#text-company-edit').val());
	});

	$('#btn-user-pass').click(function(){
		if( $('#pass1').val() == $('#pass2').val() ) {
			data_edit('edit_now_user_password', $('#pass1').val());
		}else{
			alert("패스워드가 다릅니다 다시 입력해 주세요");
		}
	});

	$('#btn-branch-add').click(function(){
		data_edit('add_branch', $('#text-branch-add').val());
	});

	$('#btn-j-category-add').click(function(){
		data_edit('add_j_category', $('#text-j-category-add').val());
	});

	$('.btn-j-category-del').click(function(event){
		id =  event.target.id;
		var res = id.replace("btn-j-category-del-", ""); 
		data_edit('del_j_category', res);
	});

	$('.btn-branch-del').click(function(event){
		id =  event.target.id;
		var res = id.replace("btn-branch-del-", ""); 
		data_edit('del_branch', res);
	});
});
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

