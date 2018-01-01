<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

   public function getdata($where)
   {      
      $this->db->select('*');
      $this->db->from('tb_user');
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

   private function build_tag_db($data,$id)
   {
      $table=array();
      if(!empty($data))       
      {
          $i=1;
          foreach ($data as $row) {
            $tmp=array();          
            $tmp[]=array($i++,array());                   
            $tmp[]=array($row['user_name'],array());
            $user_name='"'.$row['user_name'].'"';
                        
            $aksi= (($id=='admin') or ($row['user_name']==$id)) ? "<a onclick='user(1,$user_name)' href='javascript:void(0);'>Edit</a>":"";     
            $aksi.=(($id=='admin') and ($row['user_name']!=$id)) ? "<br><a onclick='deleteuser($user_name)' href='javascript:void(0);'>Delete</a>":""; 
 
            $tmp[]=array($aksi,array());    
            $table[]=$tmp;          
         }
      }
       if($id=='admin'){ 
        $tmp=array();
        $tmp[]=array('[No]',array());
        $tmp[]=array('[Admin Name]',array());
        $tmp[]=array("<a onclick='user(0)' href='javascript:void(0);'>Add</a><br>",array());
        $table[]=$tmp;
      }
      return $table;
   }


   public function getsettinguser($id)
   {
      $data = $this->getdata('');
      $tmp = $this->build_tag_db($data,$id); 
      return $tmp;
   }

   

   public function insertdata($data)
   {
     
     $tmp['user_name']=$data['user'];
     $tmp['user_pass']=md5($data['pass']);
     $tmp['tgl_input']=date('Y-m-d H:i:s');
     $this->db->insert('tb_user',$tmp);

   }

   public function updatedata($data)
   {
     
     $this->db->set('user_name',empty($data['user']) ? 'admin' : $data['user']);  
     $this->db->set('user_pass',md5($data['pass'])); 
     $this->db->where('user_name',$data['id']);
     $this->db->update('tb_user');
   }

   public function deletedata($id)
   {
     $this->db->where('user_name',$id);
     $this->db->delete('tb_user');
   }


   

}