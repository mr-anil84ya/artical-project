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
        $q=$this->db->select()
                ->from('articles')
                ->where(['user_id'=>$id])
                ->get();
                return $q->result();
              
    }
    public function artical_List()
    {
        $q=$this->db->select()
                    ->from('articles')
                    ->get();
                return $q->result();
              
    }
    public function add_articles($array)
    {
        return $this->db->insert('articles',$array);
    }
    public function add_user($array)
    {
        return $this->db->insert('users',$array);
    }
    public function delete_article($id)
    {
        return $this->db->delete('articles',['id'=>$id]);
    }
}

?>