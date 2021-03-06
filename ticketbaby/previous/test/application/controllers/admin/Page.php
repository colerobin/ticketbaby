<?php
class Page extends CI_Controller {

        public function __construct()
        {
                parent::__construct();

                $this->load->library("adminauthex");
				$this->load->library('autoembed');

                if( ! $this->adminauthex->logged_in())
                {
                    redirect('admin', 'admin/login');
                    exit;
                }
                
                $this->load->model('page_model');
				$this->load->model('advertisement_video_model');
				$this->load->model('cms_category_model');
				$this->load->library("ckeditor");
        }

        public function index()
        {   

                $data['title'] = 'CMS archive';

                #CodeIgniter's input class to get all post values
                #$formValues = $this->input->post(NULL, TRUE);
                #Returning views as data
                #$string = $this->load->view('myfile', '', true);

                $this->load->library('pagination');
                $config['base_url']     =       base_url() .  ($this->config->item('index_page') ? $this->config->item('index_page') . "/" : "")  . '/admin/page/';

                $config['total_rows']   =       $this->page_model->record_count();
                $config['per_page']     =       10;
                $config["uri_segment"]  =       3;             

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

                $data['pages'] = $this->page_model->get_pages(FALSE,$config["per_page"],$page);

                $data['pagination_link'] = $this->pagination->create_links();

                $data['page_start'] = $page;

                $this->load->view('templates/admin/header', $data);
                $this->load->view('admin/cms/index', $data);
                $this->load->view('templates/admin/footer');
        }

        public function edit()
        {
                $cms_id         = ($this->input->get('cms_id')) ? $this->input->get('cms_id') : 0;
                $page_start     = ($this->input->get('page_start')) ? $this->input->get('page_start') : 0;
				$data['cmsCategories'] = $this->cms_category_model->getCmsCategories();


                if ( $this->input->server('REQUEST_METHOD') == 'POST' ) {
                         #CodeIgniter's input class to get all post values
                        $formValues = $this->input->post(NULL, TRUE);  
                        $RESPONSE   = $this->page_model->createUpdatePage ($formValues);
                        $this->session->set_flashdata('flash_server_response', $RESPONSE);
                        redirect(base_url() . "index.php/admin/page/" . $page_start);
                }

                if ( !isset($cms_id) || $cms_id < 1 ) {
                        $data['title']      = 'Add Page';
                }else{
                        $data['title']      = 'Edit Page'; 
                        $data['cms_id']   	= $cms_id;   
                        $data['page_start'] = $page_start;

                        $data['page_details']       =  $this->page_model->get_page_by_id ($cms_id);

                        if ( !isset($data['page_details']) || sizeof($data['page_details']) < 1 ) {
                                redirect(base_url() . "index.php/admin/page/");
                        }
                }
          

                $this->load->view('templates/admin/header', $data);
                $this->load->view('admin/cms/edit', $data);
                $this->load->view('templates/admin/footer');
        }
		
		/*CHANGE ADVERTISEMENT VIDEO(START)//ARI*/
		
		public function changeadvertisementvideo(){
			
			$data['advertisement_video'] = $this->advertisement_video_model->get_advertisement_video('advertisement_video');
			
			if ( $this->input->server('REQUEST_METHOD') == 'POST' ) {
						
					
					 $url = $_POST['video_url'];
					 $url = $this->check_url($url);
					 $formValues = $this->input->post(NULL, TRUE);
					if (!$this->autoembed->parseUrl($url)) { 
						// No embeddable video found (or supported)
						echo "<div style='color:red'>Please check the video link</div>";
						
					} else {
					
					$this->autoembed->setParam('wmode','transparent');
					$this->autoembed->setParam('autoplay','false');
					$iframe_code =  $this->autoembed->getEmbedCode();
					$iframeSrc = simplexml_load_string($iframe_code);
					$iframeurl = $iframeSrc['src'];
					
					
					/*INSERT ADVERTISEMENT VIDEO TO DATABASE*/
					$this->data = array(
															'field' => $_POST['field'],
															'video_url' =>'"'.$iframeurl.'"'
					);
					
					$RESPONSE   = $this->advertisement_video_model->changeAdvertisementVideo ($this->data);
					
					$this->session->set_flashdata('flash_server_response', $RESPONSE);
                    redirect(base_url() . "index.php/admin/page/changeadvertisementvideo",'refresh');
					/*INSERT ADVERTISEMENT VIDEO TO DATABASE*/		
					
					exit;
					
					}
					
					
					
			}
			
			$this->load->view('templates/admin/header', $data);
			$this->load->view('admin/cms/changeAdvertisementVideo', $data);
			$this->load->view('templates/admin/footer');
		
		}
		/*CHANGE ADVERTISEMENT VIDEO(END)//ARI*/
		
		
		public function check_url($value)
		{
			$value = trim($value);
			if (get_magic_quotes_gpc()) 
			{
				$value = stripslashes($value);
			}
			$value = strtr($value, array_flip(get_html_translation_table(HTML_ENTITIES)));
			$value = strip_tags($value);
			$value = htmlspecialchars($value);
			return $value;
		}

}