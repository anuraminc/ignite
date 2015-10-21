<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    
    function __construct()
    {
            parent::__construct();
            $this->load->model('main_model');
            $this->form_validation->set_error_delimiters('<p class="errmsg">', '</p>');
            date_default_timezone_set('Asia/Singapore');
            
            //$this->is_logged_in();
    }

    public function index() {
        $data['fullurl'] = base_url();
        $data['metaTitle'] = $this->config->item('project_name');
        
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($is_logged_in) && $is_logged_in == true) {
            redirect('site');
        }
        
        $this->load->view('main/main_login', $data);
    }

    public function login() {
        $data['metaTitle'] = $this->config->item('project_name'). ' : Login';
        $data['fullurl'] = base_url();

        if (isset($_POST['submit'])) {
            // Get post form value
            $datafield = array(
                'uname' => strtolower($this->input->post('uname')),
                'ucode' => sha1($this->input->post('ucode'))
            );

            $config = array(
                array('field' => 'uname', 'label' => 'User ID', 'rules' => 'trim|required'),
                array('field' => 'ucode', 'label' => 'Password', 'rules' => 'trim|required')
            );

            $this->form_validation->set_rules($config);

            $data['error'] = '';

            if ($this->form_validation->run() == TRUE) {
                $sessionData = array(
                    'uname' => $_POST['uname'],
                    'ucode' => sha1($_POST['ucode'])
                );

                $this->session->set_userdata($sessionData);

                $result = $this->main_model->loginCheck($datafield);


                if (@$result->status == 'active') {
                    $sessionData = array(
                        'userid' => $result->userid,
                        'username' => $result->username,
                        'is_logged_in' => true,
                        'accessObj' => $this->main_model->getAccessObj($result->userid)
                    );

                    $this->session->set_userdata($sessionData);
                    $this->main_model->successLogin($datafield['uname']);
                    redirect('site');
                }
                /*
                  elseif(@$result->staff_status == 'new')
                  {

                  $sessionData = array(
                  'first_staff_id' => $result->staff_id,
                  'first_staff_email' => $result->staff_email,
                  );

                  $this->session->set_userdata($sessionData);
                  redirect('main/change_user_password');
                  }
                 * */ else {
                    $data['error'] = 'Login failed. Try again.';
                }
            }
        }

        $this->load->view('main/main_login', $data);
    }

    public function logout() {
        $sessionData = array(
                        'userid' => '',
                        'username' => '',
                        'is_logged_in' => false,
                        'accessObj' => ''
                    );
        $this->session->set_userdata($sessionData);
        $this->session->sess_destroy();
        $this->index();
    }

    private function is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');

        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('main');
            die();
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */