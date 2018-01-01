<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>

</head>

<body>
     <table width="80%">
     	<tr>
     	  <td width="20%" ><img src="<?php echo base_url();?>assets/img/logo_unibba.png" style='width:60px;height:60px'></td>
       	  <td width="80%" ><center><h1><b>UNIVERSITAS BALE BANDUNG<br>PANITIA WISUDA</b></h1></center></td>
       	</tr>  
        <tr>
       	 <td colspan="2">
       	  <center>__________________________________________________________________________</center>
       	 </td> 
       	</tr>
       	<tr>
       	 <td colspan="2">
       	  <center><H2>FORMULIR PENDAFTARAN</H2></center>
       	 </td> 
       	</tr>
       	<tr>
       		<td colspan="2">
       			<table width="100%">
       				<tr>
       					<td>NIM</td><td>:</td><td><?php echo $nim; ?></td>
       				</tr>
       				<tr>
                <td>Nama</td><td>:</td><td><?php echo $nama; ?></td>
              </tr>
              <tr>
       					<td>Jenis Kelamin</td><td>:</td><td><?php echo $jk; ?></td>
       				</tr>
                    <tr>
       					<td>Tempat/Tanggal Lahir</td><td>:</td><td><?php echo $tmpt_lahir.'/'.$tgl_lahir; ?></td>
       				</tr>
       				<tr>
       					<td>Alamat</td><td>:</td><td><?php echo $alamat; ?></td>
       				</tr>
       				<tr>
       					<td>Nomor Handphone</td><td>:</td><td><?php echo $hp; ?></td>
       				</tr>
       				<tr>
       					<td>Tanggal Bayar Wisuda</td><td>:</td><td><?php echo $tgl_byr; ?></td>
       				</tr>
       				<tr>
                <td>Angkatan</td><td>:</td><td><?php echo $ang; ?></td>
              </tr>
              <tr>
       					<td>Program Studi</td><td>:</td><td><?php echo $prodi; ?></td>
       				</tr>
       				<tr>
       					<td>Fakultas</td><td>:</td><td><?php echo $fak; ?></td>
       				</tr>
       				<tr>
       					<td>Judul Skripsi</td><td>:</td><td><?php echo $jdl_skripsi; ?></td>
       				</tr>
       			</table>
       		</td>
       	</tr>
        <tr>
          <td colspan="2">
            <table width="100%">
              <tr>
                <td><center><img src="<?php echo $photo;?>" style='width:60px;height:60px'></center></td>
                <td><center>Tanda Tangan <br><br><br><br><?php echo $nama;?><br></center></td> 
              </tr>  
            </table>
          </td>
        </tr>
	 </table>
   <br>
   <br>
   <br>
   <br>
   <br>
   Keterangan:<br>
   Formulir ini dicetak dari aplikasi pendaftaran wisuda.
</body>	

</html>