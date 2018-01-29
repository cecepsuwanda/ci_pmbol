<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Priode_model extends CI_Model {

   public function getdata($where)
   {      
      $this->db->select('*');
      $this->db->from('tb_priode');
      if(!empty($where)){
        $this->db->where($where);      
      }
        
      $this->query = $this->db->get();
      $hsl=array();
      if($this->query->num_rows()>0)
      {
        foreach($this->query->result_array() as $row)
        {
           $hsl[]=$row;
        }
      }
      return $hsl; 
   }

   
   private function build_tag_db($data,$arr_tbjdwl)
   {
      
      $table=array();
      if(!empty($data))       
      {         
          foreach ($data as $row) {
              $tmp=array(); 
              $tmp[]=array($row['thn'],array());         
              $rent=date("d M Y", strtotime($row['awal'])).' - '.date("d M Y", strtotime($row['akhir']));
              $tb_jdwl="<table><tr><td>Priode</td><td>:</td><td>$rent</td></tr>".$arr_tbjdwl[$row['thn']]['glmb'].'</table>';
              $tmp[]=array($tb_jdwl,array());     
              $tmp[]=array($arr_tbjdwl[$row['thn']]['usm'],array());     
              
              $bank = "<table><tr><td>Bayar</td><td>:</td><td>$row[byr]</td></tr>
                              <tr><td>Bank</td><td>:</td><td>$row[bank]</td></tr>
                              <tr><td>Rek</td><td>:</td><td>$row[rek]</td></tr>
                              <tr><td>a.n.</td><td>:</td><td>$row[an]</td></tr>
                      </table>";
              $tmp[]=array($bank,array());
              $tmp[]=array($row['aktif']==1 ?'True':'False',array());
              $tmp[]=array("<a onclick='priode(1,$row[thn])' href='javascript:void(0);'>Edit</a><br>
                            <a onclick='deletepriode($row[thn])' href='javascript:void(0);'>Delete</a>",array());              
          $table[]=$tmp;
         }      
      }
      $tmp=array();
      $tmp[]=array('[thn]',array());
      $tmp[]=array('[Pendaftaran]',array());
      $tmp[]=array('[Test & Wawancara]',array());
      $tmp[]=array('[Bank]',array());
      $tmp[]=array('[Aktif]',array());
      $tmp[]=array("<a onclick='priode(0)' href='javascript:void(0);'>Add</a><br>",array());
      $table[]=$tmp;

      return $table;
   }



   public function getsettingpriode($arr_tbjdwl)
   {
      $data = $this->getdata('');
      $tmp = $this->build_tag_db($data,$arr_tbjdwl); 
      return $tmp;
   }

   public function priode_aktif()
   {
     $priode=$this->getdata('aktif=1');
     $data['thn']=$priode[0]['thn'];
     $data['awal']=$priode[0]['awal'];
     $data['akhir']=$priode[0]['akhir'];
     return $data;
   }

   public function getrek()
   {
     $priode=$this->getdata('aktif=1');
     $data['bank']=$priode[0]['bank'];
     $data['an']=$priode[0]['an'];
     $data['rek']=$priode[0]['rek'];
     $data['byr']=$priode[0]['byr'];
     return $data;
   }   

   public function isbuka()
   {
    $tmp=$this->priode_aktif();
    $date = date('Y-m-d');
    return $date >= $tmp['awal'] && $date <= $tmp['akhir'];
   }

   public function isawal()
   {
    $tmp=$this->priode_aktif();
    $date = date('Y-m-d');
    return $date < $tmp['awal'];
   }

   public function istutup()
   {
    $tmp=$this->priode_aktif();
    $date = date('Y-m-d');
    return $date > $tmp['akhir'];
   }

   public function islogin()
   {
    $tmp=$this->priode_aktif();
    $date = date('Y-m-d');
    return $date < $tmp['akhir'];
   }

   public function insertdata($data)
   {
     if($data['aktif']==1)
     {
       $this->db->set('aktif',0);
       $this->db->update('tb_priode'); 
     }
     $this->db->insert('tb_priode',$data);
   }

   public function updatedata($data)
   {
     if($data['aktif']==1)
     {
       $this->db->set('aktif',0);
       $this->db->where('thn!=',$data['thn_old']);
       $this->db->update('tb_priode'); 
     }
     
     foreach ($data as $key => $value) {
      if($key!='thn_old'){ 
        $this->db->set($key,$value);  
      }
     }     
     
     $this->db->where('thn',$data['thn_old']);
     $this->db->update('tb_priode');
   }

   public function deletedata($thn)
   {
     $this->db->where('thn', $thn);
     $this->db->delete('tb_priode');
   }

}