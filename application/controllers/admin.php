<?php
class admin extends MY_controller
{
    public function __construct()
    {
        parent::__construct();
        if(! $this->session->userdata('id'))
        return redirect('login');
    }
    
   
    public function welcome()
    {        
        $this->load->model('loginmodel');
        $articles=$this->loginmodel->articalList();
        $this->load->view('admin/dashboard',['articles'=>$articles]);
    }
    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->set_flashdata('log_out','User Logouted!');
        return redirect('login');
        
    }
   
    public function adduser()
    {
        $this->load->view('admin/add_article');
    }
    public function delarticles()
    {
        $id=$this->input->post('id');
        $this->load->model('loginmodel');
        if($this->loginmodel->delete_article($id))
        {
            $this->session->set_flashdata('delete_article','Article Delete Successfully!');
            $this->session->set_flashdata('delete_class','alert-info');
        }
        else
        {
            $this->session->set_flashdata('delete_user','Article Not Delete.. Please Try Again!');
            $this->session->set_flashdata('delete_class','alert-danger');
        }
        return redirect('admin/welcome');
        

    }
    public function userValidation()
    {
        if($this->form_validation->run('add_article_rules'))
        {
            // $this->session->set_flashdata('add_title','Article Added Success!');
            $post=$this->input->post();
            $this->load->model('loginmodel');
            if($this->loginmodel->add_articles($post))
            {
                // echo "Inserted";
                $this->session->set_flashdata('added_msg','Article added Success!');
                return redirect('admin/welcome');
            }
            else
            {
                // echo "Not Inserted";
                $this->session->set_flashdata('added_msg','Article Not added Please Try Again!');
                return redirect('admin/welcome');
            }       
        }
        else
        {
            $this->load->view('admin/add_article');
        }
    }
   
}
?>