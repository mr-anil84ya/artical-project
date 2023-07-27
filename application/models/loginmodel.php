<?php 
class loginmodel extends CI_Model
{
    public function isvalidate($uname,$pass)
    {
        //true
        $q=$this->db->where(['username'=>$uname,'password'=>$pass])
                ->get('users');
        if($q->num_rows())
        {
            return $q->row()->id;
        }
        else
        {
            return false;
        }
    }
    public function articalList()
    {
        // $this->load->library('session');
        $id=$this->session->userdata('id'); 
        $q=$this->db->select('article_title')
                ->from('articles')
                ->where(['user_id'=>$id])
                ->get();
                return $q->result();
              
    }
}

?>