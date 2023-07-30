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
        $this->load->library('pagination');
        $config=[
            'base_url'=>base_url('admin/welcome'),
            'per_page'=>3,
            'total_rows'=>$this->loginmodel->num_rows(),
            'full_tag_open'=>"<ul class='pagination'>",
            'full_tag_close'=>"</ul>",
            'next_tag_open'=>"<li>",
            'next_tag_close'=>"</li>",
            'prev_tag_open'=>"<li>",
            'prev_tag_close'=>"</li>",
            'num_tag_open'=>"<li>",
            'num_tag_close'=>"</li>",
            'cur_tag_open'=>"<li class='active'>",
            'cur_tag_close'=>"</li>"
        ];
        $this->pagination->initialize($config);
        $articles=$this->loginmodel->articalList($config['per_page'],$this->uri->segment(5));
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

    public function editarticle($id)
    {
        $this->load->model('loginmodel');
        $rt=$this->loginmodel->find_article($id);
        $this->load->view('admin/edit_article',['article'=>$rt]);
      
    }
    public function updatearticle($articleid)
    {
        // print_r($this->input->post());
        // exit;
      if($this->form_validation->run('add_article_rules'))
      {
        $post=$this->input->post();
        // $articleid=$post['article_id'];
        // unset($articleid);
        $this->load->model('loginmodel');
        if($this->loginmodel->update_article($articleid,$post))
        {
            // echo "Inserted";
            $this->session->set_flashdata('added_msg','Article Edit Success!');
            return redirect('admin/welcome');
        }
        else
        {
            // echo "Not Inserted";
            $this->session->set_flashdata('added_msg','Article Not Edit Please Try Again!');
            return redirect('admin/welcome');
        }      
      }  
      else
      {
          $this->load->view('admin/editarticle');
      }

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