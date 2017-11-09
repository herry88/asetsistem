<?php
    session_start();
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
?>

    <!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <title>SIMSET </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Magang guru 2017">
    <meta name="author" content="Herry Prasetyo">
      <!-- The fav icon -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">


    <link href="css/charisma-app.css" rel="stylesheet">
    <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="bower_components/jquery/jquery.min.js"></script>

    

    <!-- My modal Pop Up Herry -->
    
    <script type="text/javascript">
        $(document).ready(function(){
            $("#myModal").modal('show');
        });
    </script>

     <link  type="text/css" href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.css'>
        <link type="text/css" href='https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css'>
     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <style>
          .ui-autocomplete {
            max-height: 100px;
            overflow-y: auto;
            /* prevent horizontal scrollbar */
            overflow-x: hidden;
          }
          /* IE 6 doesn't support max-height
           * we use height instead, but this forces the menu to always be this tall
           */
          * html .ui-autocomplete {
            height: 100px;
          }
  </style>
      <!--<link rel="stylesheet" href="/resources/demos/style.css">-->
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   
    <!-- Datapicker -->
        <script>
              $( function() {
                $( "#datepicker" ).datepicker({
                  changeMonth: true,
                  changeYear: true
                });
              } );
        </script>

         <!-- Datapicker -->
         <script>
              $( function() {
                $( "#datepickerpindah" ).datepicker({
                  changeMonth: true,
                  changeYear: true
                });
              } );
        </script>

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

        <!-- auto complete aku -->
        <script>
            $(function(){
                $("#koordinator").autocomplete({
                    source : "auto2.php",
                    minLength:2, 
                    select:function(event, data){
                        $('input[name=koordinator]').val(data.item.nama_lengkap);
                    }
                });
            });
        </script>

        <script>
            $(function(){
                $("#noaset").autocomplete({
                    source : "auto3.php",
                    minLength:2,
                    select:function(even, data){
                        $('input[name=no_aset]').val(data.item.no_aset);
                        $('input[name=nama_aset]').val(data.item.nama_aset);
                        $('input[name=noreg]').val(data.item.noreg);
                        $('input[name=pic]').val(data.item.pic);
                        $('input[name=warna]').val(data.item.warna);
                        $('input[name=serial_number]').val(data.item.serial_number);
                        $('input[name=type]').val(data.item.type); 
                        $('input[name=no_proposal]').val(data.item.nomor_proposal);
                        $('input[name=merk]').val(data.item.merk);
                        $('input[name=departemen]').val(data.item.departemen);
                        $('input[name=area]').val(data.item.area);
                        $('input[name=koordinator_awal]').val(data.item.koordinator);
                        $('input[name=tgl_terima]').val(data.item.tgl_terima);   
                    }
                });
            });
        </script>    

    <script>
    function previewFiles() {

      var preview = document.querySelector('#preview');
      var files   = document.querySelector('input[type=file]').files;

      function readAndPreview(file) {

        // Make sure `file.name` matches our extensions criteria
        if ( /\.(jpe?g|png|gif)$/i.test(file.name) ) {
          var reader = new FileReader();

          reader.addEventListener("load", function () {
            var image = new Image();
            image.height = 200;
            image.width  = 200;
            image.title = file.name;
            image.src = this.result;
            preview.appendChild( image );
          }, false);

          reader.readAsDataURL(file);
        }

      }

      if (files) {
        [].forEach.call(files, readAndPreview);
      }

    }
    </script>
   
</head>

<body>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="?module=beranda"> <img alt="Charisma Logo" src="img/logo20.png" class="hidden-xs"/>
                <span>SIMSET</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"><?=  $_SESSION['namauser'];  ?></span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

            <!-- theme selector starts -->
            <div class="btn-group pull-right theme-container animated tada">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-tint"></i><span
                        class="hidden-sm hidden-xs"> Change Theme / Skin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="themes">
                    <li><a data-value="classic" href="#"><i class="whitespace"></i> Classic</a></li>
                    <li><a data-value="cerulean" href="#"><i class="whitespace"></i> Cerulean</a></li>
                    <li><a data-value="cyborg" href="#"><i class="whitespace"></i> Cyborg</a></li>
                    <li><a data-value="simplex" href="#"><i class="whitespace"></i> Simplex</a></li>
                    <li><a data-value="darkly" href="#"><i class="whitespace"></i> Darkly</a></li>
                    <li><a data-value="lumen" href="#"><i class="whitespace"></i> Lumen</a></li>
                    <li><a data-value="slate" href="#"><i class="whitespace"></i> Slate</a></li>
                    <li><a data-value="spacelab" href="#"><i class="whitespace"></i> Spacelab</a></li>
                    <li><a data-value="united" href="#"><i class="whitespace"></i> United</a></li>
                </ul>
            </div>
            <!-- theme selector ends -->
        </div>
    </div>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">MENU</li>
                        <li><a class="ajax-link" href="?module=beranda"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
                        </li>
                        <!-- memanggil fungsi menu -->
                            <?php include "menu.php"; ?>
                        
                        <li><a href="logout.php"><i class="glyphicon glyphicon-lock"></i><span>Logout</span></a>
                        </li>
                    </ul>
                 
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->

     

<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
     <?php include "content.php"; ?>



    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->
    <hr>
    <!--
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Settings</h3>
                </div>
                <div class="modal-body">
                    <p>Here settings can be configured...</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                </div>
            </div>
        </div>
    </div>
-->
    <footer class="row">
        <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="#" target="_blank">Herry Prasetyo</a> <?php echo date("Y"); ?></p>

        <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a
                href="#">Magang PT. Prasetia Dwidharma</a></p>
    </footer>

</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='bower_components/moment/min/moment.min.js'></script>
<script src='bower_components/fullcalendar/dist/fullcalendar.min.js'></script>

<!-- data table plugin -->
<script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js'></script>
<!-- Ajax aset -->
<script>
            $(document).ready(function () {
                $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };
 
                var t = $('#aset').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": 'ajax/aset.php',
                    "columns": [
                        {"data":"noreg"},
                        {"data":"no_aset"},
                        {"data":"pic"},
                        {"data": "nama_aset"},
                        {"data":"area"},
                        {"data":"tgl_terima"},
                        {"data": "tools"}
                    ],
                    "order" : [[0, "desc"]]
                });
            });
        </script>
<!-- end ajax aset -->

<!-- Ajax karyawan -->
<script>
            $(document).ready(function () {
                $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };
 
                var t = $('#karyawan').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": 'ajax/karyawan.php',
                    "columns": [
                        {"data":"noreg"},
                        {"data":"departemen"},
                        {"data":"nama_lengkap"},
                        {"data": "direktorat"}
                    ],
                    "order" : [[0, "desc"]]
                });
            });
        </script>
<!-- end ajax karyawan -->

<!-- Ajax history -->
<script>
            $(document).ready(function () {
                $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };
 
                var t = $('#history').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": 'ajax/history.php',
                    "columns": [
                        {"data":"no_aset"},
                        {"data": "nama_aset"},
                        {"data":"pic"},
                        {"data":"noreg"},
                        {"data":"area"},
                        {"data": "customer"},
                        {"data":"cluster"},
                        {"data":"keterangan"},
                        {"data":"status"},
                        {"data": "tools"}
                    ],
                    "order" : [[0, "desc"]]
                });
            });
        </script>
<!-- end ajax history -->
<!-- select or dropdown enhancer -->
<script src="bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="js/charisma.js"></script>
</body>
</html>
<?php } ?>