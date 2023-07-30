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
    public function articalList($limit,$offset)
    {
        // $this->load->library('session');
        $id=$this->session->userdata('id'); 
        $q=$this->db->select()
                ->from('articles')
                ->where(['user_id'=>$id])
                ->limit($limit,$offset)
                ->get();
                return $q->result();      
    }
    public function num_rows()
    {
        // $this->load->library('session');
        $id=$this->session->userdata('id'); 
        $q=$this->db->select()
                ->from('articles')
                ->where(['user_id'=>$id])
                ->get();
                return $q->num_rows();      
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
    public function find_article($articleid)
    {
        $q=$this->db->select(['article_title','article_body','id'])
                ->where('id',$articleid)
                ->get('articles');
                return $q->row();    

    }
    public function update_article($articleid,Array $article)
    {
        return $this->db->where('id',$articleid)
                        ->update('articles',$article);

    }
}

?>