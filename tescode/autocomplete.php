<!DOCTYPE html>
<html>
<head>
	<title>Autocomplete</title>

	 	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	  	<link rel="stylesheet" href="/resources/demos/style.css">
 	 	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<!-- Autocomplete me -->    
        <script>
               $(function(){
                     $("#noreg").autocomplete({
                    source :"auto1.php",
                    minLength:2, 
                    select:function(event, data){
                        $('input[name=karyawan]'). val(data.item.nama_lengkap); 
                        $('input[name=departemen]').val(data.item.departemen);
                    }    
                });
               });
        </script>
</head>
<body>
	<label>Noreg</label>
	<input type="text" name="noreg" id="noreg"><br><br>
	<label>Karyawan</label>
	<input type="text" name="karyawan" readonly>
</body>
</html>