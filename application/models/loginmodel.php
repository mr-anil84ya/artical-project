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
}

?>