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
        $aksi = "modul/mod_tandaterima/aksi_tandaterima.php";
        $act = isset($_GET['act']) ? $_GET['act'] :'';

        $tanggal = date('d/m/Y');
		echo "<div>
            <ul class=\"breadcrumb\">
                <li>
                    <a href=\"?module=beranda\">Home</a>
                </li>
                <li>
                    <a href=\"?module=tandaterima\">Transaksi Aset</a>
                </li>
            </ul>
             </div>";    
            echo "<div class=\"row\">
            <div class=\"box col-md-12\">
                <div class=\"box-inner\">
                    <div class=\"box-header well\" data-original-title=\"\">
                        <h2><i class=\"glyphicon glyphicon-edit\"></i> Data Transaksi</h2>
                        <div class=\"box-icon\"> 
                            <a href=\"#\" class=\"btn btn-minimize btn-round btn-default\"><i
                                    class=\"glyphicon glyphicon-chevron-up\"></i></a>
                            <a href=\"#\" class=\"btn btn-close btn-round btn-default\"><i
                                    class=\"glyphicon glyphicon-remove\"></i></a>
                        </div>
                    </div>
                    <div class=\"box-content\">
                        <form role=\"form\" method=\"POST\"  action=\"$aksi?module=tandaterima&act=input\">
                      
                            <div class=\"form-group col-md-6\">
                                <label>No. Tanda Terima</label>
                                <input type=\"text\" class=\"form-control\"  name=\"no_tandaterima\" placeholder=\"No. Aset\" >
                               
                            </div>
                            
                            <div class=\"form-group col-md-6\">
                                <label>Tgl. Kirim Barang</label>
                                <input type=\"text\" class=\"form-control \" name=\"tgl_kirim\" value=\"$tanggal\" id=\"datepicker\">
                               
                            </div>
                            <div class=\"form-group col-md-6\">
                                <label>Noreg</label>
                                <input type=\"text\" class=\"form-control \" name=\"noreg\"  placeholder=\"Noreg\" id=\"noreg\">
                            </div>
        
                            <div class=\"form-group col-md-6\">
                            <label>Nama Karyawan</label>
                            <input type=\"text\" class=\"form-control \" name=\"karyawan\"  placeholder=\"Nama Karyawan\" >
                           
                            </div>

                            <div class=\"form-group col-md-6\">
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

                            <div class=\"form-group col-md-6\">
                            <label>Cluster</label>
                            <input type=\"text\" class=\"form-control \" name=\"cluster\"  placeholder=\"Cluster\" >
                            </div>

                            <div class=\"form-group col-md-6\">
                            <label>Koordinator</label>
                            <input type=\"text\" class=\"form-control \" name=\"koordinator\"  placeholder=\"Koordinator\" id=\"koordinator\" >
                            </div>
                <div class=\"row\">
                <div class=\"box col-md-12\">
                    <div class=\"box-inner\">
                        <div class=\"box-header well\" data-original-title=\"\">
                            <h2><i class=\"glyphicon glyphicon-user\"></i> Input Barang</h2>
                        </div>
                        <div class=\"box-content\">
                            <table class=\"table\">
                                 <div class=\"form-group col-md-6\">
                        <label class=\"control-label\">No. Aset</label>
                        <input type=\"text\" class=\"form-control\" name=\"no_aset\" placeholder=\"No Aset\" id=\"noaset\">
                      
                        </div>
                    
                    <div class=\"form-group col-md-6\">
                        <label>Nama. Aset</label>
                        <input type=\"text\" class=\"form-control\"  name=\"nama_aset\" placeholder=\"Nama Aset\" >
                    </div>
                    <br><br>
        
                    <div class=\"form-group col-md-6\">
                        <label class=\"control-label\">Merk</label>
                        <input type=\"text\" class=\"form-control\" name=\"merk\" placeholder=\"Merk\">
                    </div>

                    <div class=\"form-group col-md-6\">
                    <label class=\"control-label\">Type</label>
                    <input type=\"text\" class=\"form-control\" name=\"type\" placeholder=\"Type\">
                    </div>

                    <div class=\"form-group col-md-6\">
                    <label class=\"control-label\">Warna</label>
                    <input type=\"text\" class=\"form-control\" name=\"warna\" placeholder=\"Warna\">
                    </div>

                    <div class=\"form-group col-md-6\">
                    <label class=\"control-label\">Serial Number</label>
                    <input type=\"text\" class=\"form-control\" name=\"serial_number\" placeholder=\"Serial Number\">
                    </div>

                    <div class=\"form-group col-md-6\">
                        <label class=\"control-label\">No. Proposal</label>
                     <input type=\"text\" class=\"form-control\" name=\"no_proposal\" placeholder=\"No. Proposal\">
                    </div>

                    <div class=\"form-group col-md-12\">
                        <label>Keterangan</label>
                        <textarea cols=\"10\" rows=\"15\" name=\"keterangan\" class=\"form-control\"></textarea>
                    </div>
                            </table>
                        </div>
                    </div>
                </div>
                <!--/span-->
        </div><!--/row--> 
                    <button type=\"submit\" name=\"btnadd\" class=\"btn btn-success\">Add</button> 
                    </div>
                </div>
            </div>
            <!--/span-->
            
       
        </div><!--/row-->";

        //table
        echo " <div class=\"row\">
        <div class=\"box col-md-12\">
            <div class=\"box-inner\">
                <div class=\"box-header well\" data-original-title=\"\">
                    <h2>Daftar Barang</h2>

                    <div class=\"box-icon\">
                        <a href=\"#\" class=\"btn btn-setting btn-round btn-default\"><i
                                class=\"glyphicon glyphicon-cog\"></i></a>
                        <a href=\"#\" class=\"btn btn-minimize btn-round btn-default\"><i
                                class=\"glyphicon glyphicon-chevron-up\"></i></a>
                        <a href=\"#\" class=\"btn btn-close btn-round btn-default\"><i
                                class=\"glyphicon glyphicon-remove\"></i></a>
                    </div>
                </div>
                <div class=\"box-content\">
                    <table class=\"table table-bordered table-striped table-condensed\">
                        <thead>
                        <tr>
                            <th>No Aset</th>
                            <th>Nama</th>
                            <th>Merk</th>
                            <th>Type</th>
                            <th>Warna</th>
                            <th>Serial Number</th>
                            <th>Nomor Proposal</th>
                            <th>Tools</th>
                        </tr>
                        </thead>
                        <tbody>";
            //tampil data dari tmp aset
            $tmp = "SELECT tmp_tandaterima .*, input_aset.nama_aset FROM tmp_tandaterima, input_aset
                           WHERE tmp_tandaterima.no_aset = input_aset.no_aset AND 
                           tmp_tandaterima.username= '$_SESSION[namauser]' ORDER BY id   ";
            
            $query = mysqli_query($konek, $tmp);
            while($r = mysqli_fetch_array($query)){
                $id =  $r['id'];
                echo "<tr>
                        <td>$r[no_aset]</td>
                        <td>$r[nama_aset]</td>
                        <td>$r[merk]</td>
                        <td>$r[type]</td>
                        <td>$r[warna]</td>
                        <td>$r[serial_number]</td>
                        <td>$r[no_proposal]</td>
                        <td><a href=\"$aksi?module=tandaterima&act=delete&id=$id\" target=\"_self\">Batal</a></td>
                </tr>";
            }               

            echo"      <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                       </tr>
                       
                        </tbody>
                    </table>
                    <input type=\"submit\" class=\"btn btn-primary right\" name=\"btnsimpan\" value=\"Save All\">
                </div>
                </form>
            </div>
        </div>
    </div><!--/span-->";
   }     
