<!DOCTYPE html>
<html>
<head>
	<title>booj Code Test</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="../../images/favicon.png">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  	<script>
	  	$.ajaxSetup({
		  headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  }
		});
  		
		$(function () {
			$( "#sortable" ).sortable({
				axis: 'y',
				update: function (event, ui) {
					var data = $(this).sortable('serialize');
					$.ajax({
						data: data,
						type: 'POST',
						url: 'books/reorder'
					});
				}
			});
			$( "#sortable" ).disableSelection();
		});
	</script>
</head>
<body>


<div class="container">
    @yield('content')
</div>


</body>
</html>