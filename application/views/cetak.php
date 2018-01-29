<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
   <head>
      <style type="text/css">
        #kartu_ujian {margin: auto; width : 600px; background-color: rgb(255, 255, 230);border-style: solid;border-width: 1px;}  
        #ket {background-color: rgb(215, 220, 230); width : 595px;}
      </style>
  </head>

<body>
     <div id='kartu_ujian'>
    
        <table width = '595px'>   
            <tr>
               <td width='80'>
                    <img src='<?php echo base_url();?>assets/img/logo_unibba.png' style='width:40px;height:40px'>         
               </td>
              <td>
                  <font size='2'><b>UNIVERSITAS BALE BANDUNG<br>PENERIMAAN MAHASISWA BARU <?php echo $TA; ?> </b></font>
              </td>
              <td>
                  <b><font size='1'>Nomor Ujian</font><br>USM<?php echo $nousm;?> </b>
              </td>
           </tr>
           <tr>
               <td colspan='3'>
                   <center>__________________________________________________________________________</center>
               </td>
           </tr>
           <tr>
              <td colspan='3'>
                  <center><b>KARTU TANDA PESERTA UJIAN</b></center><br>
              </td>
          </tr>
      </table>
    
             <table width='595px'>
               <tr>
                  <td >
                      <img src='<?php echo base_url();?>assets/photo/<?php echo $photo;?>' style='width:150px;height:200px'>
                 </td>
                 <td>           
                      <table>             
                         <tr>
                            <td>
                                 <font size='1'><b>Nama Lengkap</b></font>
                            </td>
                            <td>
                                  <b>:</b>
                            </td>
                            <td>
                                <b><font size='1'><?php echo $nama; ?></font></b>
                            </td>
                         </tr>
                         <tr>
                             <td>
                                  <font size='1'><b>Nomor Pendaftaran</b></font>
                             </td>
                             <td>
                                  <b>:</b>
                             </td>
                             <td>
                                  <b><font size='1'><?php echo $id_peserta; ?></font></b>
                            </td>
                         </tr>
                        <tr>
                            <td>
                                 <font size='1'><b>Program Studi</b></font>
                            </td>
                            <td>
                                 <b>:</b>
                            </td>
                                <td>
                                   <b><font size='1'><?php echo $nm_prodi; ?></font></b>
                                </td>
                        </tr>
                      </table>
                        <br>
                          <font size='1'>
                              <b>Tanggal ujian</b><br>
                                     <?php echo $tgl_usm; ?><br>
                                    <br>
                                    <br>
                              <b>Lokasi ujian</b><br>
                                 Gedung III UNIBBA<br>
                                 Jl. R.A.A. Wiranatakusumah No. 7 Baleendah
                          </font>   
                </td>
                <td>
                    <table border='1'>
                         <tr>
                             <th><font size='1'><b>Waktu</b></font></th>
                             <th><font size='1'><b>Materi</b></font></th>
                             <th><font size='1'><b>Ttd pengawas</b></font></th>
                         </tr>
                         <tr>
                             <td><font size='1'>09:00-11:00</font></td>
                             <td><font size='1'>Test Tulis</font></td>
                             <td><font size='1'></font></td>
                        </tr>
                        <tr>
                             <td><font size='1'>13:00-14:00</font></td>
                             <td><font size='1'>Wawancara</font></td>
                             <td><font size='1'></font></td>
                        </tr>
                     </table>
                    
                </td>
      
          </tr>
          <tr>    
          <td colspan='3'>
                <div id='ket'>
                      <font size='1'>Cetaklah kartu ujian ini menggunakan printer berwarna.<br>
                                     Ketika ujian, Anda membawa : kartu tanda peserta ujian, dan perlengkapan tulis (pensil 2B, penghapus, rautan, ballpoint)
                      </font>
                </div>
          </td>
          </tr>
      </table>
    </div>
</body>	

</html>