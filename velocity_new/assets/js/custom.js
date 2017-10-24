$('#select-all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    }else {
		$(':checkbox').each(function() {
            this.checked = false;                        
        });
	}
});

function show_popup(id) {

$("#"+id).css("top", "14%"); 	
$("#"+id).css("left", "15%");

$("#"+id).css("display", "block"); 	
$("#"+id).css("z-index", "99999"); 


$("#simplePopupBackground").addClass("simplePopupBackground");
$(".simplePopupBackground").css("display", "block"); 	
}


function close_overlay() {
$(".simplePopupBackground").css("display", "none");	
$(".simplePopup").css("display", "none");
}

function removeAddActive(add,remove,remove1,remove2) {  // this function call in dashboard_user.php page
	$("#"+add).addClass("active");
	$("#"+remove).removeClass("active");
	$("#"+remove1).removeClass("active");
	$("#"+remove2).removeClass("active");
}

function active_tab(tab_content,tab_name) {
	
	$(".tab-pane").removeClass("active");
	$("#"+tab_content).addClass("active");
	
	$(".tabs_form").removeClass("active");
	$("#"+tab_name).addClass("active");	
}

function show_edit_masters(hide,show) {
	$("#"+hide).hide();
	$("#"+show).show();
}

function check_name(val,id,error_dis) {
	
	if(val != '') {
		var re = /^[A-Za-z]+$/;
		if((re.test(val))) {
			
			}else{
					//alert('Please enter correct Name.');  
					$('#'+error_dis).show();
					$('#'+error_dis).empty();
					$('#'+error_dis).append('Please enter correct Name.');
					$('#'+id).val('');  
					setTimeout(function(){ $('#'+error_dis).hide(); },5000); 
			}
	}
		
}


function check_mobile(inputtxt) { 
		//alert(inputtxt);
		if(inputtxt !="" ) { 
			  var phoneno   = /^\d{10}$/;  
			  var phoneno1  = /^\d{12}$/;  
			  if((inputtxt.match(phoneno)) || (inputtxt.match(phoneno1))) 
					{  
				 		 return true;  
					}  
				  else  
					{  
					$('#error_mob').show();
					$('#mobile').val('');
					setTimeout(function(){ $('#error_mob').hide(); },5000);
					return false;  
					}  
		}
    
}


function validateEmail(email,id,error_dis) {
   if(email != '') { 
   var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
		if(email.match(mailformat))  
		{  
			//		
		}  
		else  
		{  
			//alert("You have entered an invalid email address!"); 
			$('#'+error_dis).show();
			$('#'+error_dis).empty();
			$('#'+error_dis).append('You have entered an invalid email address!');
			$('#'+id).val('');  
			setTimeout(function(){ $('#'+error_dis).hide(); },5000);
		}
	}		
}
