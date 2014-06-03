
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

	$('.btn-member-del').click(function(event){
		id =  event.target.id;
		var res = id.replace("btn-member-del-", ""); 
		data_edit('del_member', res);
	}); 

	$('.btn-member-edit-branch').click(function(event){
		id =  event.target.id;
		var res = id.replace("btn-member-edit-branch-", ""); 
		var data1 = $("#label-member-id-" + res).text(); 
		var data2 = $("#select-member-branch-" + res).val(); 
		data_edit2('edit_member_branch',data1, data2 );
	}); 

	$('#btn-member-add').click(function(){
		member_id = $('#member_add_id').val();
		member_pass1= $('#member_add_pass_1').val();
		member_pass2= $('#member_add_pass_2').val();
		member_branch= $('#member_add_branch  option:selected').val();

		if(member_branch == ""){
			alert("아이디를 입력해 주세요");
			return false;
		}
		if(member_pass1 == member_pass2){
			$.ajax({   
				type: "GET",   
				url: "proce.php",   
				data: {flag : 'member_add', member_add_id: member_id, member_add_pass: member_pass1, member_add_branch:member_branch}   
			}).done(function( msg ) {   
				if(msg == 'ok'){
					alert("멤버가 추가되었습니다");
					location.reload(true);
				}else{
					alert("이미 있는 아이디입니다");
				}
			}); 
		}else{
			alert("비밀번호가 다릅니다");
		}
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

function data_edit2(flag_, data1_, data2_){
		$.ajax({   
			type: "GET",   
			url: "proce.php",   
			data: {flag : flag_, data1 : data1_ , data2 : data2_ }   
		}).done(function( msg ) {   
			alert("반영되었습니다");
			location.reload(true);
		});  
}
