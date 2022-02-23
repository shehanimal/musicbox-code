

function getPhone(cnid) {
   var email=prompt("Please enter email","");
	if (email!=null && email!=""){
		window.location="/applicant/emailcv/"+cnid+"/"+email;
	}
}
	
