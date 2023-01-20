<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */


	public function admin_login()
	{
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');

		 if($this->form_validation->run())
		 {
			$Email = $this->input->post('email');
			$Password = $this->input->post('password');
			$this->load->model('main_model');
			$val = $this->main_model->can_login($Email,$Password);

			if($val->num_rows()>0)
			{
				$this->dashboard();
			}
			else
			{
				$this->session->set_flashdata('status','Invalied username or password !');

				redirect(base_url('index.php/main/login_page'));
			}
		 }
	}
	public function index()
	{
		$this->load->view('admin_login');	
	}

/**load index page of the dashboard and fetch client details */

	public function dashboard()
	{
		$this->load->model('main_model');	

		$fetch['values'] = $this->main_model->fetch();
		$this->load->view('index',$fetch);
	}

/* add_clients to database */

	public function add_client()
	{
		$this->load->view('add_client');
	}
	public function add_clients()
	{
		$this->form_validation->set_rules('cname','Client name','required');
		$this->form_validation->set_rules('cproject','Client project name','required');
		$this->form_validation->set_rules('aproject','About project','required');
		$this->form_validation->set_rules('ptheam','Project theams','required');
		$this->form_validation->set_rules('sdate','Start date','required');
		$this->form_validation->set_rules('edate','End date','required');
		$this->form_validation->set_rules('dname','Domain name','required');
		$this->form_validation->set_rules('dexpiry','Domain expairy date','required');
		$this->form_validation->set_rules('cuname','Cpanel username','required');
		$this->form_validation->set_rules('cpassword','Cpanel password','required');
		$this->form_validation->set_rules('duname','Database username','required');
		$this->form_validation->set_rules('dpassword','Database password','required');
		
		if($this->form_validation->run())
		{
			$Cname = $this->input->post('cname');
			$Cproject = $this->input->post('cproject');
			$Aproject = $this->input->post('aproject');
			$Ptheam = $this->input->post('ptheam');
			$Sdate = $this->input->post('sdate');
			$Edate = $this->input->post('edate');
			$Dname = $this->input->post('dname');
			$Dexpiry = $this->input->post('dexpiry');
			$Cuname = $this->input->post('cuname');
			$Cpassword = $this->input->post('cpassword');
			$Duname = $this->input->post('duname');
			$Dpassword = $this->input->post('dpassword');

			$Data = array(
				'client_name' =>$Cname,
				'client_project' =>$Cproject,
				'about_project' =>$Aproject,
				'project_theam' =>$Ptheam,
				'start_date' =>$Sdate,
				'end_date' =>$Edate,
				'domain_name' =>$Dname,
				'domain_expiry' =>$Dexpiry,
				'cuname' =>$Cuname,
				'cpassword' =>$Cpassword,
				'duname' =>$Duname,
				'dpassword' =>$Dpassword

			);
				$this->load->model('main_model');
				$this->main_model->insert($Data);

				redirect(base_url('index.php/main/Client_Details_Added'));
		}
		else
		{
			$this->add_client();
		}
	}
/** View_table display when client details added */

	public function Client_Details_Added()
	{
		$this->view_table();
	}


/** View added clients from database(view_table) */

	public function view_table()
	{
		$this->load->model('main_model');	

		$fetch['values'] = $this->main_model->fetch();
		$this->load->view('view_table',$fetch);
	}

/** select clients from view_table(select_client) */

	public function select_client()
	{
		
		$this->load->model('main_model');	

		$fetch['values'] = $this->main_model->fetch();
		$this->load->view('select_client',$fetch);
	}

/** View selected clients from view_table(selected_client) */

	public function selected_client()
	{
		if(isset($_POST['view_data_btn']))
		{
			if(!empty($this->input->post('view_data')))
			{
				$checked = $this->input->post('view_data');
				$checked_id = [];
				foreach($checked as $row)
				{
					array_push($checked_id,$row);
				}
				$this->load->model('main_model');
				$fetch['values'] = $this->main_model->select_data($checked_id);

				$this->load->view('selected_client',$fetch);
			}
			else
			{
				$this->session->set_flashdata('status','Select atleast any Client Details !');

				redirect(base_url('index.php/main/select_client'));
			}
		}
		else
		{
			isset($_POST['delete_all_btn']);
			if(!empty($this->input->post('view_data')))
			{
				$checked_delete = $this->input->post('view_data');
				$checked_delete_id = [];
				foreach($checked_delete as $row)
				{
					array_push($checked_delete_id,$row);
				}
				$this->load->model('main_model');
				$this->main_model->delete_selected_details($checked_delete_id);
				redirect(base_url('index.php/main/Client_Details_delete_all'));

			}
			else
			{
				$this->session->set_flashdata('status','Select atleast any Client Details !');

				redirect(base_url('index.php/main/select_client'));
			}
		}
	}
/** select_client display when client details deleted with an alert message */
	public function Client_Details_delete_all()
	{
		$this->select_client();
	}

/** select all clients from view_table(select_all_client) */

	public function select_all_client()
	{
		$this->load->model('main_model');	

		$fetch['values'] = $this->main_model->fetch();
		$this->load->view('select_all_client',$fetch);
	}

/** search clients from database(view_table) */

	public function search_client_view()
	{
		$search_data = $this->input->post('search_data');
		$select_field = $this->input->post('drop');

		$this->load->model('main_model');

		$data['result'] = $this->main_model->search($search_data,$select_field);
		$this->load->view('view_table',$data);
	}
	
/** search clients from database(select_client) */

	public function search_client_select()
	{
		$search_data = $this->input->post('search_data');
		$select_field = $this->input->post('drop');

		$this->load->model('main_model');

		$data['result'] = $this->main_model->search($search_data,$select_field);
		$this->load->view('select_client',$data);
	}

/** delete clients in database(view_table) */

	public function delete()
	{
		$id = $this->uri->segment(3);

		$this->load->model('main_model');
		$this->main_model->delete($id);

		redirect(base_url('index.php/main/Client_Details_deleted'));
	}
/** View_table display when client details deleted with an alert message */

	public function Client_Details_deleted()
	{
		$this->view_table();
	}


/** edit clients in database(view_table) */

	public function edit()
	{
		$id = $this->uri->segment(3);
		
		$this->load->model('main_model');

		$data['user'] = $this->main_model->get_id($id);
		$this->load->view('update_client',$data);
	}

/** update the edited client detais to database(view_table) */

	public function update_client()
	{
			$id = $this->uri->segment(3);

			$Cname = $this->input->post('cname');
			$Cproject = $this->input->post('cproject');
			$Aproject = $this->input->post('aproject');
			$Ptheam = $this->input->post('ptheam');
			$Sdate = $this->input->post('sdate');
			$Edate = $this->input->post('edate');
			$Dname = $this->input->post('dname');
			$Dexpiry = $this->input->post('dexpiry');
			$Cuname = $this->input->post('cuname');
			$Cpassword = $this->input->post('cpassword');
			$Duname = $this->input->post('duname');
			$Dpassword = $this->input->post('dpassword');

			$data = array(
				'client_name' =>$Cname,
				'client_project' =>$Cproject,
				'about_project' =>$Aproject,
				'project_theam' =>$Ptheam,
				'start_date' =>$Sdate,
				'end_date' =>$Edate,
				'domain_name' =>$Dname,
				'domain_expiry' =>$Dexpiry,
				'cuname' =>$Cuname,
				'cpassword' =>$Cpassword,
				'duname' =>$Duname,
				'dpassword' =>$Dpassword

			);
				$this->load->model('main_model');
				$this->main_model->update($id,$data);
		
				redirect(base_url('index.php/main/Client_Details_updated'));
	}

/** View_table display when client details added */

	public function Client_Details_updated()
	{
		$this->view_table();
	}



/** send a mail,about the domain expiring */

	public  function send()
	{
		$id = $this->uri->segment(3);	
		$res = $this->db->from("tb_client_details")->where("id",$id)->get();
		$row = $res->result();

		if($row[0]->status==0)
		{
			// Load PHPMailer library
			$this->load->library('phpmailer_lib');
				
			// PHPMailer object
			$mail = $this->phpmailer_lib->load();
			
			// SMTP configuration
			$mail->isSMTP();
			$mail->Host     = 'smtp.gmail.com';
			$mail->SMTPAuth = true;
			$mail->Username = '.....please fill from mail........';
			$mail->Password = '.....password......';
			$mail->SMTPSecure = 'ssl';
			$mail->Port     = 465;
			
			$mail->setFrom('....please fill to mail.....', 'Domain Expirig Alert !');
			$mail->addReplyTo('.....please fill to mail....', 'Domain Expirig Alert !');
			
			// Add a recipient
			$mail->addAddress('.....please fill to mail....');
			
			// Add cc or bcc 
			
			
			// Email subject
			$mail->Subject = $row[0]->domain_name;
			
			// Set email format to HTML
			$mail->isHTML(true);
			
			// Email body content
			$mailContent = 'your domain '.$row[0]->domain_name.' will expaire on '.$row[0]->domain_expiry;
			$mail->Body = $mailContent;
			
			// Send email
			if(!$mail->send())
			{
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			}
			else
			{
				$data = array(
					'status' =>1
				);
				$Query = $this->db->where('id',$id);
				$this->db->update('tb_client_details',$data);
				redirect(base_url('index.php/main/dashboard'));
	}
			}
		}
}
?>
