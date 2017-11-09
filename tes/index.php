<html>
<head>
<title>Datatables</title>
	<link rel="stylesheet"  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">	
	<script src="https://code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script> 	
	<style>
	body {font-family: calibri;color:#4e7480;}
	</style>
</head>
<body>
<div class="container">
	<table id="contact-detail" class="display nowrap" cellspacing="0" width="100%">
	<thead>
		<tr>
		<th>no aset</th>
		<th>noreg</th>
		<th>pic</th>
		</tr>
	</thead>
	</table>
	</div>
</body>
<script>
$(document).ready(function() {
    $('#contact-detail').dataTable({
		"scrollX": true,
        "processing": true,
        "bserverSide": true,
        "ajax": "server.php"
    } );
} );
</script>
</html>