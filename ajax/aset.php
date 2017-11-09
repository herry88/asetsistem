<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {
    
    require 'ssp.class.php';
    
    // nama table
    $table = 'input_aset';

    // Table's primary key
    $primaryKey = 'id_input';

    // Array of database columns which should be read and sent back to DataTables.
    // The `db` parameter represents the column name in the database, while the `dt`
    // parameter represents the DataTables column identifier. In this case simple
    // indexes

    
    $columns = array(
        array('db' => 'noreg', 'dt' => 'noreg'),
        array('db' => 'no_aset', 'dt' => 'no_aset'),
        array('db' => 'pic', 'dt' => 'pic'),
        array('db' => 'nama_aset', 'dt' => 'nama_aset'),
        array('db' => 'area', 'dt' =>'area'),
        array('db' => 'tgl_terima','dt'=>'tgl_terima'),
        array(
            'db' => 'id_input',
            'dt' => 'tools',
            'formatter' => function( $d ) {
                return '<a href="media.php?module=mutasi&act=editmutasi&id='.$d.'">Mutasi</a>|<a href="media.php?module=aset&act=editaset&id=' . $d . '">Edit</a> | <a href="modul/mod_aset/aksi_aset.php?module=aset&act=hapus&id='.$d.'">Delete</a>';
            }
        )
    );

    // SQL server connection information
    $sql_details = array(
        'user' => 'root',
        'pass' => '',
        'db' => 'db_aset',
        'host' => 'localhost'
    );


    echo json_encode(
            SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
    );
} else {
    echo '<script>window.location="404.html"</script>';
}
?>