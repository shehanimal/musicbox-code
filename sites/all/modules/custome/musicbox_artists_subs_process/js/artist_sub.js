

function getPhone(suid, pack_id) {
   
   /* declare an checkbox array */
	var chkArray = [];
	
	/* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
	$(".checkbox-btn:checked").each(function() {
		chkArray.push($(this).val());
	});
	
	/* we join the array separated by the comma */
	var selected;
	selected = chkArray.join(',') ;
	
	/* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
	if(selected.length > 0){
		document.getElementById("demo").innerHTML = selected;	
		document.getElementById("demo").innerHTML = window.location.href + selected;
	}else{
		alert("Please at least one of the checkbox");	
	}
   
   
   var subs_phone=prompt("Please enter your phone number to proceed","");
   
       if(isNaN(subs_phone)||subs_phone.indexOf(" ")!=-1)
           {
              alert("Enter numeric value")
              return false; 
           }
           if (subs_phone.length>10)
           {
                alert("enter 10 characters");
                return false;
           }
           if (subs_phone.charAt(0)!="0")
           {
                alert("it should start with 0 ");
                return false
           }
		   if (subs_phone.charAt(1)!="7")
           {
                alert("phone number should start with 07********");
                return false
           }
		       if (subs_phone.length<10)
           {
                alert("enter 10 characters");
                return false;
           }

          
   
   
	if (subs_phone!=null && subs_phone!=""){
		window.location="/musicbox.lk/submiting_data/"+suid+"/"+pack_id+"/"+subs_phone+"/"+selected;
	}
	
}

function Validate()
        {
            var x = document.form1.txtPhone.value;
            var y = document.form1.txtMobile.value;
           if(isNaN(x)||x.indexOf(" ")!=-1)
           {
              alert("Enter numeric value")
              return false; 
           }
           if (x.length>8)
           {
                alert("enter 8 characters");
                return false;
           }
           if (x.charAt(0)!="2")
           {
                alert("it should start with 2 ");
                return false
           }

           if(isNaN(y)||y.indexOf(" ")!=-1)
           {
              alert("Enter numeric value")
              return false; 
           }
           if (y.length>10)
           {
                alert("enter 10 characters");
                return false;
           }
           if (y.charAt(0)!="9")
           {
                alert("it should start with 9 ");
                return false
           }
        }
		




	
