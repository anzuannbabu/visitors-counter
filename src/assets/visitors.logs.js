$(function(){
	var client = new ClientJS(); // Create A New Client Object

	var url = $('#base_url').val()+"/api/visitorsLog";
	
	var data = {
		browserId: client.getFingerprint(),
		browserName: client.getBrowser(),
		browserVersion: client.getBrowserVersion(),
		userAgent: client.getUserAgent(),
		os: client.getOS(),
		osVersion: client.getOSVersion(),
	};


	$.ajax({
		type: "POST",
		url: url,
		data: data,
		dataType: 'json',
		success: function(response){
			//console.log(response);
			var visitors = response;
			$('#today').html(visitors.today);
			$('#yesterday').html(visitors.yesterday);
			$('#week').html(visitors.thisWeek);
			$('#month').html(visitors.thisMonth);
			$('#all').html(visitors.all);
		},
		error: function(err,msg){
			console.log(err,msg);
		}
	});


});