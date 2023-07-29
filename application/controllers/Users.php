<?php
class Users extends MY_controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('id'))
        return redirect('admin/register');
    }
    public function index()
    {
        $this->load->helper('html');
        $this->load->model('loginmodel');
        $article=$this->loginmodel->artical_List(); 
        $this->load->view('users/articalList',['article'=>$article]);
    //    $this->load->view('Users/articalList');
    }
    public function register()
    {
        $this->load->view('admin/register');
    }
   
    public function sendemail()
    {
        $this->form_validation->set_rules('username','Username','required|alpha');
        $this->form_validation->set_rules('password','Password','required|max_length[12]');
        $this->form_validation->set_rules('firstname','First Name','required|alpha');
        $this->form_validation->set_rules('lastname','Last Name','required|alpha');
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
        if($this->form_validation->run())
        {
            $post=$this->input->post();
            $this->load->model('loginmodel');
            if($this->loginmodel->add_user($post))
            {
                $this->session->set_flashdata('added_user','Registration Successfully!');
                $this->session->set_flashdata('user_class','alert-success');
            }
            else
            {
                $this->session->set_flashdata('added_user','User Not Register Please Try Again!');
                $this->session->set_flashdata('user_class','alert-danger');
            }
           
            return redirect('users/register');
            
            // $this->load->library('email');
            // $this->email->from(set_value('email'),set_value('fname'));
            // $this->email->to("anilmery21@gmail.com");
            // $this->email->subject("Registration Greetings...");
            // $this->email->message("Thank You For Registration!");
            // $this->email->set_newline("/r/n");
            // $this->email->send();
            // if(!$this->email->send())
            // {
            //     show_error($this->email->print_debugger());
            // }
            // else
            // {
            //     echo "your email has been send!";
            // }
        }
        else
        {
            $this->load->view('admin/register');
        }
        
        

    }

}
?>