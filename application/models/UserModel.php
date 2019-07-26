<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model
{
	
	public function save($data){
      if($this->db->insert('user',$data))
      {
      	return true;
      }
      else{
      	return false;
      }
    
	}

   public function all_user(){
       
       $users=$this->db->get('user');
        $user=$users->result_array();
        return $user;
   }

   
         public function get_data_by_id($id)
	      {
	            $data = $this->db->get_where('user',array('id'=>$id));
	            $data=$data->result_array();   
	            return $data[0];
	      }

	      public function update($data,$id){
	      	$res = $this->db->where('id',$id)->update('user',$data);
            if ($res) {
                     return true;
                      }
                 else{
                 	return false;
                 }     

	      }
	      public function delete_user_info($id){
	      	if($this->db->delete('user',array('id' =>$id ,))){
	      		return true;
	      	}
	      	else{
	      		return false;
	      	}

	      }








}
