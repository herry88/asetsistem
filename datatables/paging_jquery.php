<!DOCTYPE html>
<html>
    <head>
        <title>Plugin dataTables</title>        
        <style type="text/css">                       
            @import "media/css/demo_table_jui.css";
            @import "media/themes/smoothness/jquery-ui-1.8.4.custom.css";
        </style>      

        <script src="media/js/jquery.js"></script>
        <script src="media/js/jquery.dataTables.js"></script>
        <script type="text/javascript">
          $(document).ready(function(){
				    oTable = $('#contoh').dataTable({
					     "bJQueryUI": true,
					     "sPaginationType": "full_numbers"
				    });
          })    
        </script>
    </head>
    <body>
            <table id="contoh" class="display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Aset</th>
                        <th>Koordinator</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once "../library/inc.connection.php";
					include_once "../library/inc.library.php";
                    $query  = "SELECT * FROM histori_aset ORDER BY id_histori";
                    $tampil = mysql_query($query, $koneksidb);

					          $no = 1;
                    while ($r = mysql_fetch_array($tampil)) {
                      echo "<tr>
                            <td width=\"10\">$no</td>
                            <td>$r[nama_aset]</td>
                            <td>$r[koordinator]</td>
                            </tr>";
                      $no++;
                    }                    
                    ?>
                </tbody>
            </table>
    </body>
</html>
