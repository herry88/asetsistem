<!DOCTYPE html>
<html>
    <head>
        <title>Laporan Aset</title>        
        <style type="text/css">                       
            @import "media/css/demo_table_jui.css";
            @import "media/themes/sunny/jquery-ui-1.8.4.custom.css";
            @import "extras/TableTools/media/css/TableTools.css";
        </style>      
	<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">
        <script src="media/js/jquery.js"></script>
        <script src="media/js/jquery.dataTables.js"></script>
        <script src="extras/TableTools/media/js/ZeroClipboard.js"></script>
        <script src="extras/TableTools/media/js/TableTools.js"></script>
        <script type="text/javascript">
          $(document).ready(function(){
				    oTable = $('#contoh').dataTable({      
					     "bJQueryUI": true,
						 "sScrollX" :"100%",
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
            <table id="contoh" class="display nowrap">
                <thead>
                    <tr>
                        <th>No</th>
						<th>Noreg</th>
                        <th>Pic</th>
                        <th>Departemen</th>
						<th>Nomor Aset</th>
						<th>Nama Aset</th>
						<th>Jenis Aset</th>
						<th>Merk</th>
						<th>Type</th>
						<th>Serial Number</th>
						<th>Warna</th>
						<th>Harga Proposal</th>
						<th>Harga Real</th>
						<th>Kondisi Aset</th>
						<th>Tanggal Terima PIC</th>
						<th>Area</th>
						<th>Customer</th>
						<th>Cluster</th>
						<th>Koordinator</th>
						<th>Nomor Proposal</th>
						<th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $konek = mysqli_connect("localhost","root","098f6bcd4621d373cade4e832627b4f6","backup_syntax");
                    $query  = "SELECT * FROM input_aset ORDER BY id_input";
                    $tampil = mysqli_query($konek, $query);

					          $no = 1;
                    while ($r = mysqli_fetch_array($tampil)) {
                      echo "<tr>
                            <td width=\"10\">$no</td>
                            <td>$r[noreg]</td>
                            <td>$r[pic]</td>
							<td>$r[departemen]</td>
							<td>$r[no_aset]</td>
							<td>$r[nama_aset]</td>
							<td>$r[jenis_aset]</td>
							<td>$r[merk]</td>
							<td>$r[type]</td>
							<td>$r[serial_number]</td>
							<td>$r[warna]</td>
							<td>$r[harga]</td>
							<td>$r[harga_real]</td>
							<td>$r[status]</td>
							<td>$r[tgl_terima]</td>
							<td>$r[area]</td>
							<td>$r[customer]</td>
							<td>$r[cluster]</td>
							<td>$r[koordinator]</td>
							<td>$r[nomor_proposal]</td>
							<td>$r[keterangan]</td>
                            </tr>";
                      $no++;
                    }                    
                    ?>
                </tbody>
            </table>
    </body>
</html>
