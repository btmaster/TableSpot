
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

function getTable()
{
	var amountval = $("#amount").val();
	var dateval = $("#date").val();
	var timeval = $("#time").val();
	var request = $.ajax
		({
			url: "ajax/Reservation.php",
			type:"POST",
			data:{amountval : amountval, dateval : dateval, timeval : timeval},
			dataType : "json",

		});
	request.done(function(msg) {
			var update ='';
			//alert(msg.tables[0][1]);
			for (var i = 0; i < msg.tables.length; i++)
			{
				update += "Free table:<br/>" + "<a href='Reservation.php?id=" + msg.tables[i][0] + "&amount=" + amountval + "&date=" + dateval + "&time=" + timeval +"' class='reservationlink'>Aantal personen: " + msg.tables[i][4] + "</a><br/><br/>";
			}

			if(msg.tables.length == 0)
			{
				update = "There are no free tables available now.";
			}

			$("#tafels").html(update);
			//update(msg);
		});



}

$(document).ready(function()
{
	getTable('');
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
			request.done(function(msg) {
				location.reload();
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


		e.preventDefault();
	});

	$(".search").on("keyup", function(e)
	{
		getTable('knop');
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

		}
		
	});

	$("#maakAan").on("click", function(e)
	{
		document.getElementById('maak').style.display = 'none'; 
		document.getElementById('form').style.display = 'block';
		e.preventDefault();
	});

	$("#aanmaken").on("click", function(e)
	{
		document.getElementById('maak').style.display = 'block'; 
		document.getElementById('form').style.display = 'none';
	});

	$("#maakGerecht").on("click", function(e)
	{
		var gerecht = $("#gerecht").val();
		var prijs = $("#prijs").val();
		var request = $.ajax
		({
			url:"ajax/Gerecht.php",
			type: "POST",
			data:{gerecht : gerecht, prijs : prijs},
			dataType: "json"
		});

		request.done(function(msg) {
			var update = '';
			update = "<p>" + msg.gerecht + " : €" + msg.prijs;
			$("#gerecht").val('');
			$("#prijs").val('');
			$("#lijstgerechten").prepend(update);
			$("#lijstgerechten").first().slideDown();
			
		}); 

		e.preventDefault();
	});
	
});

