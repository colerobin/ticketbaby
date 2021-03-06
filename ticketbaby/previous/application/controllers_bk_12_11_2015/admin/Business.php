<?php
class Business extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('business_model');
        }

        public function index()
        {
                $data['title'] = 'Business Ads';

                #CodeIgniter's input class to get all post values
                #$formValues = $this->input->post(NULL, TRUE);
                #Returning views as data
                #$string = $this->load->view('myfile', '', true);

                $this->load->library('pagination');
                $config['base_url']     =       base_url() . 'admin/business/';
                $config['total_rows']   =       $this->business_model->record_count();
                $config['per_page']     =       10;
                $config["uri_segment"] = 3;             

                $config['full_tag_open'] = "<ul class='pagination'>";
                $config['full_tag_close'] ="</ul>";
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
                $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
                $config['next_tag_open'] = "<li>";
                $config['next_tagl_close'] = "</li>";
                $config['prev_tag_open'] = "<li>";
                $config['prev_tagl_close'] = "</li>";
                $config['first_tag_open'] = "<li>";
                $config['first_tagl_close'] = "</li>";
                $config['last_tag_open'] = "<li>";
                $config['last_tagl_close'] = "</li>";

                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

                $data['business_ads'] = $this->business_model->get_business_ads(FALSE,$config["per_page"],$page);

                $data['pagination_link'] = $this->pagination->create_links();

                $this->load->view('templates/admin/header', $data);
                $this->load->view('admin/business/index', $data);
                $this->load->view('templates/admin/footer');
        }

        public function create()
        {
                $data['pages'] = $this->business_model->get_business_ads();
                $data['title'] = 'New Business Ads';

                $this->load->view('templates/admin/header', $data);
                $this->load->view('admin/business/index', $data);
                $this->load->view('templates/admin/footer');
        }

        public function view($slug = NULL)
        {
              
                $data['business_ads_item'] = $this->business_model->get_business_ads($slug);

                if (empty($data['business_ads_item']))
                {
                        show_404();
                }

                $data['title'] = $data['business_ads_item']['title'];

                $this->load->view('templates/admin/header', $data);
                $this->load->view('admin/business/view', $data);
                $this->load->view('templates/admin/footer');
        }
}