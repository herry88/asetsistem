<?php
    if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
        echo "<link href=\"css/style_login.css\" type=\"text/css\" rel=\"stylesheet\">
                <p class=\"error-code\">
                         404
                </p>

<p class=\"not-found\">Not<br/>Found</p>

<div class=\"clear\"></div>
<div class=\"content\">
    Silahkan untuk login terlebih dahulu.
    <br>
    <a href=\"index.php\">Go Home</a>
    or
    <br>
    <br>
</div>";
}
else{
    echo "

    <!-- Modal POP Up -->   
    <div id=\"myModal\" class=\"modal fade\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
                <h4 class=\"modal-title\">Herry Prasetyo (2017)</h4>
            </div>
            <div class=\"modal-body\">
                <p><strong>Management Information System Asset</strong></p>
                    <img class=\"img-responsive\" src=\"img/prasetia.png\" alt=\"Herry Prasetyo\">
                 </div>
             </div>
        </div>
    </div>
<!-- END Modal POP Up --> 

    <div>
    <ul class=\"breadcrumb\">
        <li>
            <a href=\"?module=beranda\">Home</a>
        </li>
        <li>
            <a href=\"?module=beranda\">Dashboard</a>
        </li>
    </ul>
</div>

   <div class=\"row\">
    <div class=\"box col-md-12\">
        <div class=\"box-inner\">
            <div class=\"box-header well\">
                <h2><i class=\"glyphicon glyphicon-info-sign\"></i> Dashboard</h2>

                <div class=\"box-icon\">
                    <a href=\"#\" class=\"btn btn-setting btn-round btn-default\"><i
                            class=\"glyphicon glyphicon-cog\"></i></a>
                    <a href=\"#\" class=\"btn btn-minimize btn-round btn-default\"><i
                            class=\"glyphicon glyphicon-chevron-up\"></i></a>
                    <a href=\"#\" class=\"btn btn-close btn-round btn-default\"><i
                            class=\"glyphicon glyphicon-remove\"></i></a>
                </div>
            </div>
            <div class=\"box-content row\">
                <div class=\"col-lg-7 col-md-12\">
                    <b>Selamat Datang</b>, Sistem Informasi Manajemen Aset Anda Login Sebagai <font color='red'><strong>$_SESSION[namauser]</strong></font>
                </div><br><br>
                <div class=\"col-xs-3\">
			        <a data-toggle=\"tooltip\" class=\"well top-block\" href=\"?module=user\">
			            <i class=\"glyphicon glyphicon-user red\"></i>
			            <div>User Management</div>
			        </a>
    		</div>

    		<div class=\"col-xs-3\">
			        <a data-toggle=\"tooltip\" class=\"well top-block\" href=\"?module=mmodul\">
			            <i class=\"glyphicon glyphicon-folder-open green\"></i>
			            <div>Module Management</div>
			        </a>
    		</div>

    		<div class=\"col-xs-3\">
			        <a data-toggle=\"tooltip\" class=\"well top-block\" href=\"?module=aset\">
			            <i class=\"glyphicon  glyphicon-folder-close yellow\"></i>
			            <div>Asset Management</div>
			        </a>
            </div>
            
            <div class=\"col-xs-3\">
            <a data-toggle=\"tooltip\" class=\"well top-block\" href=\"?module=karyawan\">
                <i class=\"glyphicon glyphicon-book blue\"></i>
                <div>Employe Management</div>
            </a>
            </div>

            <div class=\"col-xs-3\">
            <a data-toggle=\"tooltip\" class=\"well top-block\" href=\"?module=karyawan\">
                <i class=\"glyphicon glyphicon-tree-deciduous green\"></i>
                <div>Tanda Terima</div>
            </a>
            </div>
            
            <div class=\"col-xs-3\">
            <a data-toggle=\"tooltip\" class=\"well top-block\" href=\"?module=history\">
                <i class=\"glyphicon glyphicon-lock white\"></i>
                <div>History Management</div>
            </a>
            </div>

            </div>
        </div>
    </div>
</div>";
}
?>

