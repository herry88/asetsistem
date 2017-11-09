<?php
//belajarOOP
    class mutasi{
        private $id_mutasi;
        private $noreg;
        private $pic;
        private $no_asset;
        private $nama_asset;
        private $customer;
        private $cluster;
        private $departement;
        private $koordinator;
        private $tanggal_terima;
        private $tanggal_pindah;
        private $keterangan;
        private $status;
        private $connection_string;
        
        function __construct(){
            $this->connection_string = mysqli_connect("localhost","root","","db_aset");
        }

        public function setNoreg($noreg){
            $this->noreg = $noreg;
        }

        public function setIdMutasi($id_mutasi){
            $this->id_mutasi = $id_mutasi;
        }

        public function setPic($pic){
            $this->pic = $pic;
        }

        public function insert(){
            $query = "insert into 
                        mutasi_aset (id_mutasi, noreg, pic_awal) 
                        values (%d, %s, '%s')";
            $query_exec = sprintf($query, $this->id_mutasi, $this->noreg, $this->pic);
            mysqli_query($this->connection_string, $query_exec);
        }

    }
?>