<?php
//mutasi aset Herry Prasetyo
if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
    echo "<link href=\"../css/style_login.css\" type=\"text/css\" rel=\"stylesheet\">
    <p class=\"error-code\"> 404</p>
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
else {
        $aksi = "modul/mod_mutasi/aksi_mutasi.php";
        $act = isset($_GET['act']) ? $_GET['act'] : '';
        $tanggal = date('d-m-Y');

   switch($act){ 
        default:
            	//Tampil data mutasi
		echo "<div>
            <ul class=\"breadcrumb\">
                <li>
                    <a href=\"?module=beranda\">Home</a>
                </li>
                <li>
                    <a href=\"?module=mutasi\">Mutasi</a>
                </li>
            </ul>
            </div>";

            echo "<div class=\"row\">
            <div class=\"box col-md-12\">
            <div class=\"box-inner\">
            <div class=\"box-header well\" data-original-title=\"\">
                <h2><i class=\"glyphicon glyphicon-user\"></i> Data Mutasi Aset</h2>
        
                <div class=\"box-icon\">
                    <a href=\"#\" class=\"btn btn-setting btn-round btn-default\"><i class=\"glyphicon glyphicon-cog\"></i></a>
                    <a href=\"#\" class=\"btn btn-minimize btn-round btn-default\"><i
                            class=\"glyphicon glyphicon-chevron-up\"></i></a>
                    <a href=\"#\" class=\"btn btn-close btn-round btn-default\"><i class=\"glyphicon glyphicon-remove\"></i></a>
                </div>
            </div>
            <div class=\"box-content\">
            <table class=\"table table-striped table-bordered bootstrap-datatable datatable responsive\" id=-\"mutasi\">
            <thead>
            <tr>
                <th>No Aset</th>
                <th>Nama Aset</th>
                <th>PIC</th>
                <th>Noreg</th>
                <th>Area</th>
                <th>Customer</th>
                <th>Cluster</th>
                <th>Tgl. Pindah</th>
                <th>Keterangan</th>
                <th>Status</th>
            </tr>
            </thead>";
           echo"</table>
                </div>
                </div>
                </div>
            </div>";

        break;

        case "editmutasi":
        $tampil = "SELECT * FROM input_aset WHERE id_input='$_GET[id]'";
        $hasil  = mysqli_query($konek, $tampil);
        $r = mysqli_fetch_array($hasil);
            echo "<div>
            <ul class=\"breadcrumb\">
                <li>
                    <a href=\"?module=beranda\">Home</a>
                </li>
                <li>
                    <a href=\"?module=mutasi\">Halaman Mutasi</a>
                </li>
            </ul>
            </div>";
            
            echo "<div class=\"row\">
            <div class=\"box col-md-12\">
                <div class=\"box-inner\">
                    <div class=\"box-header well\" data-original-title=\"\">
                        <h2><i class=\"glyphicon glyphicon-edit\"></i> Form Mutasi</h2>
                        <div class=\"box-icon\"> 
                            <a href=\"#\" class=\"btn btn-minimize btn-round btn-default\"><i
                                    class=\"glyphicon glyphicon-chevron-up\"></i></a>
                            <a href=\"#\" class=\"btn btn-close btn-round btn-default\"><i
                                    class=\"glyphicon glyphicon-remove\"></i></a>
                        </div>
                    </div>
                    <div class=\"box-content\">
                        <form role=\"form\" method=\"POST\"  action=\"$aksi?module=mutasi&act=update\">
                        <input type=\"hidden\" name=\"id\" value=\"$r[id_input]\">
                            <div class=\"form-group \">
                                <label>No. Asset</label>
                                <input type=\"text\" class=\"form-control\"  name=\"no_aset\" placeholder=\"No. Aset\" value=\"$r[no_aset]\" readonly required>
                                <input type=\"hidden\" name=\"no_asetawal\" value=\"$r[no_aset]\">
                            </div>
                            
                            <div class=\"form-group\">
                                <label>Nama Asset</label>
                                <input type=\"text\" class=\"form-control \" name=\"nama_aset\"  placeholder=\"Nama Aset\" value=\"$r[nama_aset]\" required>
                                <input type=\"hidden\" name=\"nama_asetawal\" value=\"$r[nama_aset]\">
                            </div>
        
                <div class=\"row\">
                <div class=\"box col-md-12\">
                    <div class=\"box-inner\">
                        <div class=\"box-header well\" data-original-title=\"\">
                            <h2><i class=\"glyphicon glyphicon-user\"></i> Data PIC Baru</h2>
                        </div>
                        <div class=\"box-content\">
                            <table class=\"table\">
                                 <div class=\"form-group col-md-6\">
                        <label class=\"control-label\">Noreg</label>
                        <input type=\"text\" class=\"form-control\" name=\"noreg\" placeholder=\"Noreg\" id=\"noreg\" value=\"$r[noreg]\">
                        <input type=\"hidden\" name=\"noreg_awal\" value=\"$r[noreg]\">
                        </div>
                    
                    <div class=\"form-group col-md-6\">
                        <label>Nama Karyawan</label>
                        <input type=\"text\" class=\"form-control\"  name=\"karyawan\" placeholder=\"Nama Karyawan\" value=\"$r[pic]\">
                        <input type=\"hidden\" name=\"pic_awal\" value=\"$r[pic]\">
                    </div>
        
                    <div class=\"form-group col-md-6\">
                    <input type=\"hidden\" name=\"area_awal\" value=\"$r[area]\">
                                <label class=\"control-label\">Area</label>
                                <div >
                                    <select id=\"selectError\" name=\"area\" data-rel=\"chosen\">
                                    <option value=\"0\">-Pilih Data-</option>
                                    <option value=\"bali-lombok\">Bali-Lombok</option>
                                    <option value=\"bandung\">Bandung</option>
                                    <option value=\"baturaja\">Baturaja</option>
                                    <option value=\"office ho\">Office HO</option>
                                    <option value=\"bengkulu\">Bengkulu</option>
                                    <option value=\"jambi 2\">Jambi 2</option>
                                    <option value=\"jambi 3\">Jambi 3</option>
                                    <option value=\"jatim-lampung\">Jatim-Lampung</option>
                                    <option value=\"jawa barat\">Jawa Barat</option>
                                    <option value=\"kepulauan riau\">Kepulauan Riau</option>
                                    <option value=\"lebak bulus\">Lebak Bulus</option>
                                    <option value=\"maluku\">Maluku</option>
                                    <option value=\"mamuju-majene\">Mamuju Majene</option>
                                    <option value=\"manado\">Manado</option>
                                    <option value=\"mirah delima\">Mirah Delima</option>
                                    <option value=\"nias\">Nias</option>
                                    <option value=\"nusa tenggara timur\">Nusa Tenggara Timur/option>
                                    <option value=\"ruko cempaka mas\">Ruko Cempaka Mas</option>
                                    <option value=\"office makasar\">Office Makasar</option>
                                    <option value=\"office palembang\">Office Palembang</option>
                                    <option value=\"offive medan\">Office Medan</option>
                                    <option value=\"padang sidempuan\">Padang Sidempuan</option>
                                    <option value=\"palembang\">Palembang</option>
                                    <option value=\"papua\">Papua</option>
                                    <option value=\"prs-palopo,rante pao,soroako\">PRS-Palopo,Rante Pao,Soroako</option>
                                    <option value=\"pts-palopo,tangkerang,soroako\">PTS-Palopo,Tangkerang,Soroako</option>
                                    <option value=\"sulawesi barat\">Sulawesi Barat</option>
                                    <option value=\"sulawesi selatan 1\">Sulawesi Selatan 1</option>
                                    <option value=\"sulawesi selatan 2 (pbe-pinrang,bantaeng,enrekang)\">sulawesi selatan 2 (PBE-Pinrang,Bantaeng,Enrekang)</option>
                                    <option value=\"sulawesi tenggara\">sulawesi tenggara</option>
                                    <option value=\"sulawesi tengah\">Sulawesi Tengah</option>
                                    <option value=\"sumbagut (medan)\">Sumbagut (Medan)</option>
                                    <option value=\"surabaya-jatim\">Surabaya-Jatim</option>
                                </select>
                                </div>
                            </div>
                            
                            <div class=\" form-group col-md-6\">
                            <input type=\"hidden\" name=\"status_awal\" value=\"$r[status]\">
                            <label class=\"control-label\" >Kondisi Aset</label>
                            <div class=\"controls\">
                                <select id=\"selectError\" name=\"kondisi\" data-rel=\"chosen\">
                                <option value=\"0\">-Pilih Data-</option>
                                <option value=\"Dijual\">Dijual</option>
                                <option value=\"Hilang\">Hilang</option>
                                <option value=\"Rusak\">Rusak</option>
                                <option value=\"Masih Digunakan\">Masih Digunakan</option>
                                <option value=\"Stock HO\">Stock HO</option>
                                <option value=\"Stock Makasar\">Stock Makasar</option> 
                                <option value=\"Stock Medan\">Stock Medan</option>
                                <option value=\"Stock Palembang\">Stock Palembang</option>
                            </select>
                            </div>
                        </div>
                             <div class=\" form-group col-md-12\">
                             <input type=\"hidden\" name=\"customer_awal\" value=\"$r[customer]\">
                                <label class=\"control-label\" name=\"customer\">Customer</label>
                                <div class=\"controls\">
                                    <select id=\"selectError\" name=\"customer\" data-rel=\"chosen\">
                                    <option value=\"0\">-Pilih Data-</option>
                                    <option value=\"no customer\">no customer</option>
                                    <option value=\"tower bersama group\">Tower Bersama Group</option>
                                    <option value=\"telkomsel\">Telkomsel</option>
                                    <option value=\"daya mitra telekomunikasi\">Daya Mitra Telekomunikasi</option>
                                    <option value=\"telkom infra\">Telkom Infra</option>
                                    <option value=\"inti bangun sejahtera\">Inti Bangun Sejahtera</option> 
                                    <option value=\"menara seluler nusantara\">Menara Seluler Nusantara</option>
                                    <option value=\"bintang baja sinar cemerlang\">Bintang Baja Sinar Cemerlang</option>
                                </select>
                                </div>
                            </div>
                    <br><br>
        
                    <div class=\"form-group col-md-6\">
                        <label class=\"control-label\">Koordinator</label>
                        <input type=\"text\" class=\"form-control\" name=\"koordinator\" placeholder=\"Koordinator\" id=\"koordinator\" value=\"$r[koordinator]\">
                        <input type=\"hidden\" name=\"koordinator_awal\" value=\"$r[koordinator]\">
                    </div>
        
                     <div class=\"form-group col-md-6\">
                        <label class=\"control-label\">Departemen</label>
                        <input type=\"text\" class=\"form-control\" name=\"departemen\" placeholder=\"Departemen\" value=\"$r[departemen]\">
                        <input type=\"hidden\" name=\"departemen_awal\" value=\"$r[departemen]\">
                        
                        </div>
        
                    <div class=\"form-group col-md-6\">
                        <label class=\"control-label\">Cluster</label>
                        <input type=\"text\" class=\"form-control\" name=\"cluster\" placeholder=\"Cluster\">
                        <input type=\"hidden\" name=\"cluster_awal\" value=\"$r[cluster]\">
                        
                        </div>

                    <div class=\"form-group col-md-3\">
                        <label class=\"control-label\">Tgl. Terima</label>
                        <input type=\"text\" class=\"form-control\" name=\"tgl_terima\"   value=\"$r[tgl_terima]\" readonly>
                         
                        </div>
                    <div class=\"form-group col-md-3\">
                        <label class=\"control-label\">Tgl. Pindah</label>
                        <input type=\"text\" class=\"form-control\" name=\"tgl_pindah\"  id=\"datepickerpindah\" value=\"$tanggal\">
                    </div>  
        
                    <div class=\"form-group col-md-12\">
                        <label>Keterangan</label>
                        <textarea cols=\"10\" rows=\"15\" name=\"keterangan\" class=\"form-control\">$r[keterangan]</textarea>
                        <input type=\"hidden\" name=\"keterangan_awal\" value=\"$r[keterangan]\">
                        
                    </div>
                    
                            </table>
        
                        </div>
                    </div>
                </div>
                <!--/span-->
        </div><!--/row--> 
             
             
                    <button type=\"submit\" class=\"btn btn-default\">Save</button> | 
                    <button type=\"button\" class=\"btn btn-warning\" onclick=\"self.history.back()\">Cancel</button>
              
                </form>
          
                    </div>
                </div>
            </div>
            <!--/span-->
        
        </div><!--/row-->";
        break;
   }     
}