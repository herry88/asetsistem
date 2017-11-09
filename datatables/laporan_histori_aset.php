<?php
//include_once "../library/inc.seslogin.php"; 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Laporan Histori Aset</title>        
        <style type="text/css">                       
            @import "media/css/demo_table_jui.css";
           
            @import "extras/TableTools/media/css/TableTools.css";
        </style>      

        <script src="media/js/jquery.js"></script>
        <script src="media/js/jquery.dataTables.js"></script>
        <script src="extras/TableTools/media/js/ZeroClipboard.js"></script>
        <script src="extras/TableTools/media/js/TableTools.js"></script>
        <script type="text/javascript">
          $(document).ready(function(){
				    oTable = $('#contoh').dataTable({      
					     "bJQueryUI": true,
					     "sPaginationType": "full_numbers",
					     "sDom": 'T<"clear">lfrtip',
               "oTableTools": {
                  "sSwfPath": "extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
              },
               "oLanguage": {
						      "sLengthMenu": "Tampilan _MENU_ data",
						      "sSearch": "Cari: ", 
						      "sZeroRecords": "Tidak ditemukan data yang sesuai",
						      "sInfo": "_START_ sampai _END_ dari _TOTAL_ data",
						      "sInfoEmpty": "0 hingga 0 dari 0 entri",
						      "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
						      "oPaginate": {
						          "sFirst": "Awal",
						          "sLast": "Akhir", 
						          "sPrevious": "Balik", 
						          "sNext": "Lanjut"
					       }
				      }
				    });
          })    
        </script>
    </head>
    <body>
            <table id="contoh" class="display">
                <thead>
                    <tr>
                        <th>No</th>
						<th>Noreg</th>
						<th>PIC</th>
						<th>No Aset</th>
						<th>Nama Aset</th>
						<th>Area</th>
						<th>Customer</th>
						<th>Cluster</th>
						<th>Koordinator</th>
						<th>Tanggal Terima</th>
						<th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //$konek = mysqli_connect("localhost","root","098f6bcd4621d373cade4e832627b4f6","backup_syntax");
					$konek = mysqli_connect("localhost","root","","db_aset");
                    $query  = "SELECT * FROM histori_aset ORDER BY id_histori";
                    $tampil = mysqli_query($konek, $query);

					          $no = 1;
                    while ($r = mysqli_fetch_array($tampil)) {
                      echo "<tr>
                            <td width=\"10\">$no</td>
                            <td>$r[noreg]</td>
                            <td>$r[pic]</td>
							<td>$r[no_aset]</td>
							<td>$r[nama_aset]</td>
							<td>$r[area]</td>
							<td>$r[customer]</td>
							<td>$r[cluster]</td>
							<td>$r[koordinator]</td>
							<td>$r[tgl_terima]</td>
							<td>$r[keterangan]</td>
                            </tr>";
                      $no++;
                    }                    
                    ?>
                </tbody>
            </table>
    </body>
</html>
