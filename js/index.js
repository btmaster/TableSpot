
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
			request.fail(function() {
				location.reload();
			});

			e.preventDefault();
	});
});

