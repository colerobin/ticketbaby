<?php
class Event extends CI_Controller {

        public function __construct()
        {
                parent::__construct();

                $this->load->library("adminauthex");

                if( ! $this->adminauthex->logged_in())
                {
                    redirect('admin', 'admin/login');
                    exit;
                }

                $this->load->model('event_model');
        }

        public function index()
        {   

                $data['title'] = 'Event archive';

                #CodeIgniter's input class to get all post values
                #$formValues = $this->input->post(NULL, TRUE);
                #Returning views as data
                #$string = $this->load->view('myfile', '', true);
				$event_name		=	$this->input->get('event_name');
				
				$data['event_name']		=	$event_name;
                $this->load->library('pagination');
                $config['base_url']     =       base_url() .  ($this->config->item('index_page') ? $this->config->item('index_page') . "/" : "")  . '/admin/event/';

                $config['total_rows']   =       $this->event_model->record_count($event_name);
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

                $data['events'] = $this->event_model->get_events($config["per_page"],$page,$event_name);
				//print_r($data['events']);die;
                $data['pagination_link'] = $this->pagination->create_links();

                $data['page_start'] = $page;

                $this->load->view('templates/admin/header', $data);
                $this->load->view('admin/event/index', $data);
                $this->load->view('templates/admin/footer');
        }

        public function edit()
        {
                $event_id     = ($this->input->get('id')) ? $this->input->get('id') : 0;
                $page_start   = ($this->input->get('page_start')) ? $this->input->get('page_start') : 0;


                if ( $this->input->server('REQUEST_METHOD') == 'POST' ) {
                         #CodeIgniter's input class to get all post values
                        $formValues = $this->input->post(NULL, TRUE);  
                        $RESPONSE   = $this->event_model->createUpdateEvent ($formValues);
                        $this->session->set_flashdata('flash_server_response', $RESPONSE);
                        redirect(base_url() . "index.php/admin/event/" . $page_start);
                }


                if ( !isset($event_id) || $event_id < 1 ) {
                        $data['title']      = 'Add Event';
                }else{
                        $data['title']      = 'Edit Event'; 
                        $data['event_id']   = $event_id;   
                        $data['page_start'] = $page_start;

                        $data['event_details']              =  $this->event_model->get_event_by_id ($event_id);
                        $data['event_additional_charge']    =  $this->event_model->get_additional_charge_by_id ($event_id);

                        if ( !isset($data['event_details']) || sizeof($data['event_details']) < 1 ) {
                                redirect(base_url() . "index.php/admin/event/");
                        }
                }


                $this->load->model('category_model');
                $category_tree = array();
                $this->category_model->get_category_tree($category_tree, 0, 0);
                $data['category_tree'] = $category_tree;
          

                $this->load->view('templates/admin/header', $data);
                $this->load->view('admin/event/edit', $data);
                $this->load->view('templates/admin/footer');
        }


        public function promote() {

                $id               = ($this->input->get('id')) ? $this->input->get('id') : 0;
                $per_page         = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

              
                if ( $this->input->server('REQUEST_METHOD') == 'POST' ) {
                         #CodeIgniter's input class to get all post values
                        $formValues = $this->input->post(NULL, TRUE);  
                        $RESPONSE   = $this->event_model->createUpdatePromoteEvent ($formValues);
                        $this->session->set_flashdata('flash_server_response', $RESPONSE);
                        if ( $RESPONSE["success"] == false ) {
                            $this->session->set_flashdata('flash_client_request', $formValues);
                        }               
                        redirect(base_url() . "index.php/admin/event/promote?" . "per_page=" . $per_page);
                }


                if ( $id > 0 ) {
                    $formValues   = $this->event_model->get_promote_event_by_id($id);
                    $this->session->set_flashdata('flash_client_request', $formValues);
                }

                $data['title'] = 'Promote event';

                #CodeIgniter's input class to get all post values
                #$formValues = $this->input->post(NULL, TRUE);
                #Returning views as data
                #$string = $this->load->view('myfile', '', true);

                $this->load->library('pagination');
                $config['base_url']     =       base_url() .  ($this->config->item('index_page') ? $this->config->item('index_page') . "/" : "")  . '/admin/event/promote';

                $config['total_rows']   =       $this->event_model->promote_event_record_count();
                $config['per_page']     =       10;
                $config["uri_segment"]  =       3;     
                $config['page_query_string'] = TRUE;        

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

                $data['promote_event_lists'] = $this->event_model->get_promote_events($config["per_page"],$per_page);

                $data['pagination_link'] = $this->pagination->create_links();


                $data['id']               = $id;
                $data['per_page']         = $per_page;



                $this->load->view('templates/admin/header', $data);
                $this->load->view('admin/event/promote', $data);
                $this->load->view('templates/admin/footer');

        }



        public function promote_delete()
        {
                $id                     = ($this->input->get('id')) ? $this->input->get('id') : 0;
                $per_page               = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

                if ( $id > 0 ) {
                    $RESPONSE   = $this->event_model->deletePromoteEvent($id);
                    $this->session->set_flashdata('flash_server_response', $RESPONSE);
                }

                redirect(base_url() . "index.php/admin/event/promote");
        }
		public function booking($id)
        {			
			$event_id				=	$id;
			   
			if ($this->input->post('confirm'))
			{	//print_r($this->input->post());die;
			 		 
				$event_id				= $id;
				$first_name 			= $this->input->post('first_name');
				$last_name 				= $this->input->post('last_name');
				$email 					= $this->input->post('email');
				$address 				= $this->input->post('address');
				$area					= $this->input->post('area');
				$city 					= $this->input->post('city');
				$post_code 				= $this->input->post('post_code');
				$country 				= $this->input->post('country');
				$mobile_number 			= $this->input->post('mobile_number');

				$admin_session 			= 	$this->session->userdata('admin_session');
				$admin_id				=	$admin_session['id'];
					
				$quantity_value 		= 	$this->input->post('quantity');
				$price 					= 	$this->input->post('unit_price');
				$form_data				=	$this->input->post();
				
				$amount			=	0;
				foreach( $quantity_value as $key => $value )
				{
					if( empty( $value ) )
					{
					   unset( $quantity_value[$key] );
					   unset( $price[$key] );
					}else{
							 $amount	+=	$price[$key]*$value;
					}
					
				}
				// Get Additional charge
				$this->db->select('*');
				$this->db->from('event_additional_charges');
				$this->db->where('event_id', $event_id);
				$query 					= 	$this->db->get();
				$result_array 			= 	$query->result_array();
				//print_r($result_array);die;
				$total_charge			=	0;
				foreach($result_array as $row){
					$total_charge	+= $row['additional_charge'];
				}
				//	echo $amount;die;
				$total_amount			=	$amount+$total_charge;
				//	print_r($total_amount);
					
				$order_id	=	$this->event_model->booking_admin($price,$quantity_value,array(
					 'admin_id'					=> $admin_id,	 
					 'first_name'				=> $first_name,
					 'last_name'				=> $last_name,
					 'email'					=> $email,
				 	 'address'					=> $address,
					 'area'						=> $area,
					 'city'						=> $city,
					 'post_code'				=> $post_code,
					 'amount'					=> $amount,
					 'total_amount'				=> $total_amount,
			 		 'mobile_number'      		=> $mobile_number,
					 'date'      				=> date('Y-m-d H:i:s')
					 ));
					 
				//echo $order_id;die('cont');
				if($order_id){
				
					
				
				foreach( $quantity_value as $key => $value )
					{
						if( empty( $value ) )
						{
						   unset( $quantity_value[$key] );
						   unset( $price[$key] );
						}else{
							$total	=	$price[$key]*$value;
							
							for($k=0; $k< $value; $k++){
								$order_event_data = array(
									'order_id' 			=> $order_id,
									'event_id' 			=> $event_id,
									'ticket_section_id' => $form_data['ticket_section_section_id'][$key],
									'ticket_class_id' 	=> $form_data['ticket_class_id'][$key]
								);
								
								$this->db->insert('order_event_details', $order_event_data);
								
								// order details seat 
								if ( $form_data["ticket_section_name"][$k] == "table" ) {
									$order_seat_data = array(
										'order_id' 			=> $order_id,
										'event_id' 			=> $event_id,
										'ticket_class_id' 	=> $form_data['ticket_class_id'][$key],
										'table_number' 		=> $form_data['choose-table-number'][$key],
										'seat_number' 		=> $k+1
									);
									$this->db->insert('order_seat_details', $order_seat_data);
								}else{
									
										
										$this->db->select('max(seat_number) as current_seat_number');
										$this->db->from('order_seat_details');
										$this->db->where('event_id', $event_id);
										$this->db->where('ticket_class_id', $form_data['ticket_class_id'][$key]);
										$this->db->where('table_number', $form_data['choose-table-number'][$key]);
										$query 			= $this->db->get();
										$row_array 		= $query->row_array();
										$starting_seat 	= $row_array["current_seat_number"] + 1;

										
											$data = array(
												'order_id' 			=> $order_id,
												'event_id' 			=> $event_id,
												'ticket_class_id' 	=> $form_data['ticket_class_id'][$key],
												'table_number' 		=> $form_data['choose-table-number'][$key],
												'seat_number' 		=> ($starting_seat + $k)
											);
											$this->db->insert('order_seat_details', $data);
								}			
								}
							}
						}
					//print_r($order_event_data);die('test');
					redirect("admin/event/success/{$order_id}");	
				}else{
					redirect("admin/event/booking/{$event_id}");	
				}
			}else{
			$data['event_seats']            = $this->event_model->get_event_seats($event_id);
                
				$data['show_left_panel_cart']   = 'TRUE';
                $data['siteKey']                = $siteKey;
                $data["cart_captcha_session"] = $this->session->userdata('cart_captcha_session'); 
                $data['current_view']           = 'EVENTDETAIL';


                /* Update session cart */
                $cart_event = $this->session->userdata('cart_event');
                if ( $cart_event["id"] != $event_id) {
                    $this->session->unset_userdata('cart_session');
                    $this->session->unset_userdata('cart_additional_session');   
                    $this->session->unset_userdata('cart_captcha_session');
                    $this->session->unset_userdata('cart_user_session');
                }
                $this->session->set_userdata('cart_event', $data['event']);

				
                $array = array();
                foreach($data['event_seats']  as $k=>$row) {
				$occupied_seat_numbers = $this->event_model->get_event_seats_booked ($row['event_id'], $row['ticket_class_id']);
                $data['event_seats'][$k]['occupied_seat_numbers'] = $occupied_seat_numbers;
                $missing_seat_numbers  = $this->event_model->get_event_missing_seats($row['event_id'], $row['ticket_class_id']);
                $data['event_seats'][$k]['missing_seat_numbers']  = $missing_seat_numbers;
                }
				
				
				//print_r($data);die;
				$this->load->view('templates/admin/header', $data);
                $this->load->view("admin/event/booking", $data);
                $this->load->view('templates/admin/footer');
			}
				
		}
		
		public function success($order_id=null){
			if($order_id){
				// Get Additional charge
				/*$this->db->select('*');
				$this->db->from('order_seat_details');
				$this->db->where('order_id', $order_id);
				$query 				= 	$this->db->get();
				$result_array 			= 	$query->result_array();
				
				$total_charge		=	0;
				foreach($result_array as $row){
					$total_charge	+= $row['additional_charge'];
				}*/
				
				$data['order_id']	=	$order_id;
				
				$this->load->view('templates/admin/header', $data);
                $this->load->view('admin/event/success', $data);
                $this->load->view('templates/admin/footer');
			}else{
				redirect("admin/event");	
			}
		}
		
        public function order($id)
		{
		$data['id']=$id;
		$this->load->view('templates/header', $data);
                $this->load->view('admin/event/order', $data);
                $this->load->view('templates/footer');
		}
		
		

}