
function show() 
{ 
	document.getElementById('phone').style.display = 'block'; 
	document.getElementById('lblphone').style.display = 'block';
}

function hide() 
{ 
	document.getElementById('phone').style.display = 'none'; 
	document.getElementById('lblphone').style.display = 'none';
}

$(document).ready(function()
{
	$("a.annuleren").on("click", function(e)
	{
			var clickedLink = $(this);
			var reservationId = clickedLink.data("id");

			var request = $.ajax
			({
				url: "ajax/Reservation.php",
				type:"POST",
				data:{reservationId : reservationId},
				dataType : "json",

			});
			request.done(function() {
				location.reload();
			});

			request.fail(function(jqXHR, textStatus) {
				alert( "Request failed: " + textStatus );
			});

			e.preventDefault();
	});

	$("a.delete").on("click", function(e)
	{
		var clickedLink = $(this);
		var reservationId = clickedLink.data("id");

		var request = $.ajax
		({
			url: "ajax/Reservation.php",
			type:"POST",
			data:{reservationId : reservationId},
			dataType : "json",

		});
		request.done(function() {
			location.reload();
		});

		request.fail(function(jqXHR, textStatus) {
			alert( "Request failed: " + textStatus );
		});

		e.preventDefault();
	});

	$("#place").on("change", function(e){
		if (confirm('If you change your placing, all the reservations will be canceled. Are you sure to change the placing?')) 
		{
		    var place = $(this).val();
		    var request = $.ajax
		    ({
		    	url:"ajax/Placing.php",
		    	type: "POST",
		    	data:{place : place},
		    	dataType: "json"
		    });

		    request.done(function() {
		    	location.reload();
		    });

		    request.fail(function(jqXHR, textStatus) {
		    	alert( "Request failed: " + textStatus );
		    });	
		}
		
	});

});

