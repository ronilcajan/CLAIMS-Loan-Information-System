<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Claims_controller extends CI_Controller {

	public function index(){
<<<<<<< HEAD
		$this->load->view('templates/header');
		$this->load->view('login');
=======
		$data['title'] = 'Login';
		$this->load->view('templates/header');
		$this->load->view('login',$data);
>>>>>>> 01351c1b6fee4ecb4a86f84955f8d50f375c2566
		$this->load->view('templates/footer');
	}

	public function login(){
		$validator = array('success' => false, 'messages' => array());

		$login_data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);

		$data = $this->claims_model->login_user($login_data);

		if(!is_null($data)){
			$login_data = array(
				'username' => $data['username'],
				'password' => $data['password'],
<<<<<<< HEAD
				'usertype' => $data['user_type'],
=======
				'usertype' => $data['usertype'],
>>>>>>> 01351c1b6fee4ecb4a86f84955f8d50f375c2566
				'logged_in' => TRUE
			);

			$this->session->set_userdata($login_data);

			$validator['success'] = true;
			$validator['messages'] = 'dashboard';					

		}else{

			$validator['success'] = false;
<<<<<<< HEAD
			$validator['messages'] = 'Incorrect username or password. Please try again.';	
=======
			$validator['messages'] = 'Incorrect username/password combination';	
>>>>>>> 01351c1b6fee4ecb4a86f84955f8d50f375c2566
		}

		echo json_encode($validator);
		
	}

<<<<<<< HEAD
	public function error404(){

		$this->load->view('templates/header');
		$this->load->view('error404');
		$this->load->view('templates/footer');
	}

	//function to check if user is in session
    public function check_auth(){
        if(!$this->session->userdata('logged_in')){
            redirect(base_url());
        }
    }

	public function dashboard(){

		$this->check_auth('borrowers');

=======
	public function dashboard(){

>>>>>>> 01351c1b6fee4ecb4a86f84955f8d50f375c2566
		$this->load->view('templates/header');
		$this->load->view('dashboard');
		$this->load->view('templates/footer');
	}

	public function borrowers(){

<<<<<<< HEAD
		$this->check_auth('borrowers');
		
		//new clients query
		$clients['new_clients'] = $this->claims_model->get_new_clients();

		$this->load->view('templates/header');
		$this->load->view('borrowers', $clients);
		$this->load->view('templates/footer');
	}

	public function register_client()
	{
		$validator = array('success' => false, 'messages' => array());

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload',$config);

		if(!$this->upload->do_upload('client_img')){
			$validator['success'] = false;
			$validator['messages'] = 'Image not found';
		}else{
			$data = $this->upload->data();
			//Resize and Compress Image
			$config['image_library'] = 'gd2';
			$config['source_image'] = './uploads/'.$data['file_name'];
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = FALSE;
			$config['quality'] = '60%';
			$config['width'] = 600;
			$config['height'] = 400;
			$config['new_image'] = './uploads/'.$data['file_name'];

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			
			$account_no = $this->claims_model->get_account_id();

			$client_data = array(
				'account_no' => $account_no['account_no'] + 1,
				'client_img' => $data['file_name'],
				'mname' => $this->input->post('mname'),
				'gname' => $this->input->post('gname'),
				'lname' => $this->input->post('lname'),
				'email' => $this->input->post('email'),
				'number1' => $this->input->post('number1'),
				'number2' => $this->input->post('number2'),
				'purok_no' => $this->input->post('purok_no'),
				'barangay' => $this->input->post('barangay'),
				'city' => $this->input->post('city'),
				'postal_code' => $this->input->post('postal_code'),
				'birthdate' => $this->input->post('birthdate'),
				'gender' => $this->input->post('inlineRadioOptions'),
				'info' => $this->input->post('info')
			);

			$insert_data = $this->claims_model->insert_client($client_data);

			if($insert_data == true){
				$validator['success'] = true;
				$validator['messages'] = 'Client successfully added';
				$validator['link'] = 'client_profile';
			}else{

				$validator['success'] = false;
				$validator['messages'] = 'Something went wrong. Please contact the administrator';	
			}
		}

			echo json_encode($validator);
	}

	function logout(){
		$user_data = $this->session->all_userdata();
			foreach ($user_data as $key => $value) {
				if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
					$this->session->unset_userdata($key);
				}
			}
		$this->session->sess_destroy();
		redirect(base_url());
	}
=======
		$this->load->view('templates/header');
		$this->load->view('borrowers');
		$this->load->view('templates/footer');
	}
>>>>>>> 01351c1b6fee4ecb4a86f84955f8d50f375c2566
}
