<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Glmb_model extends CI_Model {

   public function getdata($where)
   {      
      $this->db->select('*');
      $this->db->from('tb_glmb');
      if(!empty($where)){
        $this->db->where($where);      
      }
        
      $this->db->order_by('thn,glmb');

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

  public function getglmbjdwl($thn)
  {
    $data = $this->getdata('thn='.$thn);
    
    $jdwl=array();
    if(!empty($data)){
      foreach($data as $row) {       
       $jdwl[$row['glmb']]=array('awal'=>$row['awal'],'akhir'=>$row['akhir'],'ujian'=>$row['ujian']);
      }
    }

    return $jdwl;
  }

  
  public function build_tag_db($data)
   {
      $tb = array();
      foreach ($data as $key=>$row) {
        $tmp=array();        
        $tmp[]=array($key,array());
        $priode=date("d M Y", strtotime($row['awal'])).' - '.date("d M Y", strtotime($row['akhir']));
        $tmp[]=array($priode,array());
        $ujian=date("d M Y", strtotime($row['ujian']));
        $tmp[]=array($ujian,array()); 
        $tb[]=$tmp;
      }
      return $tb;
   }


  public function getallglmbjdwl()
   {
      $data = $this->getdata('');

      $jdwl=array();
      if(!empty($data)){  
        foreach ($data as $row) {
          $jdwl[$row['thn']][]=array('glmb'=>$row['glmb'],'awal'=>$row['awal'],'akhir'=>$row['akhir'],'ujian'=>$row['ujian']);
        }
       }     
      return $jdwl;
   }

  public function alltotb($data)
   {
      
      $arr_tb=array();
      if(!empty($data)){  
        foreach ($data as $key=>$glmb) {
               $tb_priode='';
               $tb_usm='';
           foreach ($glmb as $row) {
               $tb_priode.='<tr>';
               $tmp=date("d M Y", strtotime($row['awal'])).' - '.date("d M Y", strtotime($row['akhir']));
               $tb_priode.="<td>Gel. $row[glmb]</td><td>:</td><td>$tmp</td>";
               $tb_priode.='</tr>';

               $tb_usm.='<tr>';
               $tmp=date("d M Y", strtotime($row['ujian']));
               $tb_usm.="<td>USM $row[glmb]</td><td>:</td><td>$tmp</td>";
               $tb_usm.='</tr>';
           }
          $arr_tb[$key]['glmb']=$tb_priode;
          $arr_tb[$key]['usm']='<table>'.$tb_usm.'</table>';     
        }
       }     
      return $arr_tb;
   }   

  public function updatedata($data)
  {
    foreach ($data as $key=>$row) {
       $this->db->set('thn',$row['thn']);
       $this->db->set('glmb',$key);
       $this->db->set('awal',$row['awal']);
       $this->db->set('akhir',$row['akhir']);
       $this->db->set('ujian',$row['ujian']);  
       $this->db->where(array('thn'=>$row['thn_old'],'glmb'=>$key));
       $this->db->update('tb_glmb');
     }     
  }

  public function insertdata($data)
  {
     
     foreach ($data as $key=>$row) {
       $tmp = array();
       $tmp['thn']=$row['thn'];
       $tmp['glmb']=$key;
       $tmp['awal']=$row['awal'];
       $tmp['akhir']=$row['akhir'];
       $tmp['ujian']=$row['ujian'];    
       $this->db->insert('tb_glmb',$tmp);
     }     
  }

  public function deletedata($thn)
  {
      $this->db->where('thn', $thn);
      $this->db->delete('tb_glmb');         
  } 
  

}