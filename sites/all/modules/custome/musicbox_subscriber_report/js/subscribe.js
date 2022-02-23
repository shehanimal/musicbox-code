

function getPhone(suid, pack_id) {
   var subs_phone=prompt("Please enter your phone number to proceed","");
	if (subs_phone!=null && subs_phone!=""){
		window.location="/musicbox.lk/submiting_data/"+suid+"/"+pack_id+"/"+subs_phone;
	}
}
	
