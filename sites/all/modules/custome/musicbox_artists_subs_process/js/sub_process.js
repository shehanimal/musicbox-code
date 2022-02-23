


function checkAvailability() {
	$("#loaderIcon").show();
	jQuery.ajax({
	url: "musicbox.lk/check_number",
	data:'username='+$("#username").val(),
	type: "POST",
	success:function(data){
		$("#user-availability-status").html(data);
		$("#loaderIcon").hide();
	},
	error:function (){}
	});
}
