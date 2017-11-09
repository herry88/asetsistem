<?php 
if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
    echo "<link href='http://fonts.googleapis.com/css?family=Creepster|Audiowide' rel='stylesheet' type='text/css'>
        <link href=\"../../css/error.css\" rel='stylesheet' type=\"text/css\" />
<p class=\"error-code\">
    404
</p>

<p class=\"not-found\">Not<br/>Found</p>

<div class=\"clear\"></div>
<div class=\"content\">
    The page your are looking for is not found.
    <br>
    <a href=\"index.php\">Go Back</a>
    
    <br>
    <br>
</div>";
}
else{
	 $aksi = "modul/mod_history/history.php";

	 $act = isset($_GET['act']) ? $_GET['act'] : '';

	 switch ($act) {
	 	
	 	default:
	 		//tampil data history
	 	echo "<div>
        		<ul class=\"breadcrumb\">
		            <li>
		                <a href=\"?module=beranda\">Home</a>
		            </li>
		            <li>
		                <a href=\"?module=history\">Data History</a>
		            </li>
		        </ul>
		    </div>";


		 //div row 
    echo "<div class=\"row\">
    <div class=\"box col-md-12\">
    <div class=\"box-inner\">
    <div class=\"box-header well\" data-original-title=\"\">
        <h2><i class=\"glyphicon glyphicon-folder-open\"></i>  Data History Aset</h2>
        <div class=\"box-icon\">
            <a href=\"#\" class=\"btn btn-setting btn-round btn-default\"><i class=\"glyphicon glyphicon-cog\"></i></a>
            <a href=\"#\" class=\"btn btn-minimize btn-round btn-default\"><i
                    class=\"glyphicon glyphicon-chevron-up\"></i></a>
            <a href=\"#\" class=\"btn btn-close btn-round btn-default\"><i class=\"glyphicon glyphicon-remove\"></i></a>
        </div>
    </div>
    <div class=\"box-content\">
   
    <table class=\"table table-striped table-bordered bootstrap-datatable datatable responsive\" id=\"history\">
    <thead>
    <tr>
        <th>No Aset</th>
        <th>Nama Aset</th>
        <th>Noreg</th>
        <th>PIC</th>
        <th>Area</th>
        <th>Customer</th>
        <th>Cluster</th>
        <th>Keterangan</th>
        <th>Status</th>
        <th>Tools</th>  
    </tr>
    </thead>";
   echo"</table>
        </div>
        </div>
        </div>
    </div>";
	 	break;
	 }
}