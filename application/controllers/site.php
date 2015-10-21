<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site extends CI_Controller {

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
            $this->load->model('site_model');
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
        $this->load->view('site/site_index', $data);
    }

    public function project_tracking () {
        $data['fullurl'] = base_url();
        
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

        $data['tasks_data'] = $this->site_model->getProjectData($data);
        
        $this->load->view('site/site_project_tracking', $data);
    }
    
    public function get_site_data() {
         $whereClause = trim($this->uri->segment(3));
         echo($this->site_model->getSiteData($whereClause));
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */