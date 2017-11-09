<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {
    
    require 'ssp.class.php';
    
    // nama table
    $table = 'tbl_karyawan_all';

    // Table's primary key
    $primaryKey = 'noreg';

    // Array of database columns which should be read and sent back to DataTables.
    // The `db` parameter represents the column name in the database, while the `dt`
    // parameter represents the DataTables column identifier. In this case simple
    // indexes

    
    $columns = array(
        array('db' => 'noreg', 'dt' => 'noreg'),
        array('db' => 'departemen', 'dt' => 'departemen'),
        array('db' => 'nama_lengkap', 'dt' => 'nama_lengkap'),
        array('db' => 'direktorat', 'dt' => 'direktorat')
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