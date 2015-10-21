<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Apps extends CI_Controller {

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
            $this->load->model('apps_model');
            $this->form_validation->set_error_delimiters('<p class="errmsg">', '</p>');
            date_default_timezone_set('Asia/Singapore');
            
            $this->is_logged_in();
    }

    private function is_logged_in()
	{
            $is_logged_in = $this->session->userdata('is_logged_in');
            if(!isset($is_logged_in) || $is_logged_in != true)
            {
                    redirect('main');
                    die();
            }
	}
        
    public function index() {
        if($this->session->userdata('is_logged_in') == false) redirect ('main');
        $data['fullurl'] = base_url();
        $data['metaTitle'] = $this->config->item('project_name');
        $this->load->view('apps/apps_index', $data);
    }

    public function calendar () {
        $data['fullurl'] = base_url();
        $data['metaTitle'] = $this->config->item('project_name');
        
        $data['searchQuery'] = $searchQuery = $this->input->post('searchQuery');
        $config = array(
                        array('field' => 'searchQuery', 'label' => 'Search Query Required', 'rules' => 'trim|required')
        );
        $this->form_validation->set_rules($config);

        if(isset($_POST['search'])) 
        {
//                $data['searchQuery'] 
        }
        else if(isset($_POST['clear']))
        {
/*                $sessionData = array(
                                'search_query' => ''
                );
 * */
            $data['searchQuery'] = '';
        }

        //$data['tasks_data'] = $this->site_model->getProjectData($data);
        
        $this->load->view('apps/apps_calendar', $data);
    }
    
    public function project_tracking () {
        $data['fullurl'] = base_url();
        $data['metaTitle'] = $this->config->item('project_name');
        
        $data['searchQuery'] = $searchQuery = $this->input->post('searchQuery');
        $config = array(
                        array('field' => 'searchQuery', 'label' => 'Search Query Required', 'rules' => 'trim|required')
        );
        $this->form_validation->set_rules($config);

        if(isset($_POST['search'])) 
        {
//                $data['searchQuery'] 
        }
        else if(isset($_POST['clear']))
        {
/*                $sessionData = array(
                                'search_query' => ''
                );
 * */
            $data['searchQuery'] = '';
        }

        $data['tasks_data'] = $this->apps_model->getProjectData($data);
        
        $this->load->view('apps/apps_project_tracking', $data);
    }

        public function jtrac () {
        $data['fullurl'] = base_url();
        $data['metaTitle'] = $this->config->item('project_name');
        
        $data['searchQuery'] = $searchQuery = $this->input->post('searchQuery');
        $config = array(
                        array('field' => 'searchQuery', 'label' => 'Search Query Required', 'rules' => 'trim|required')
        );
        $this->form_validation->set_rules($config);

        if(isset($_POST['search'])) 
        {
//                $data['searchQuery'] 
        }
        else if(isset($_POST['clear']))
        {
/*                $sessionData = array(
                                'search_query' => ''
                );
 * */
            $data['searchQuery'] = '';
        }

        $data['jtrac_data'] = $this->apps_model->getProjectData($data);
        
        $this->load->view('apps/apps_jtrac', $data);
    }
    
    public function get_jtrac_ticket_data()
        {
            $whereClause = trim($this->uri->segment(3));
            //header('Content-Type: application/x-json; charset=utf-8');
            //echo( json_encode($this->apps_model->getJtracTicketData($whereClause)));
            echo( $this->apps_model->getJtracTicketData($whereClause));
        }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */