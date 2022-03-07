<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth_controller extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('auth/signin');
		} else {
			//validatiion success
			$this->_login();
		}
	}

	//Create Account
	public function registration()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[app_user.email]', ['is_unique' => 'This Email has already registered!']);
		$this->form_validation->set_rules(
			'password',
			'Password',
			'required|trim|min_length[3]',
			['min_length' => 'Password too short!']
		);


		if ($this->form_validation->run() == false) {
			$this->load->view('auth/createAccount');
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'default.svg',
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				// 'role_id' => 2,
				// 'is_active' => 1,
				'date_created' => time()
			];

			$this->auth_model->insert_user($data, 'app_user');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Your Account has been created. Please Sign in</div>');
			// $this->db->insert('app_user', $data);
			redirect('auth_controller/index');
		}
	}

	//Reset Password
	public function resetPassword()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

		if ($this->form_validation->run() == false) {
			$this->load->view('auth/resetPassword');
		} else {
			echo "Reset pass";
		}
	}

	// Login
	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('app_user', ['email' => $email])->row_array();
		// var_dump($user);
		// die;

		//users registered
		if ($user) {
			// if users is active
			if ($user['is_active'] == 1) {
				//check password
				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						//'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);

					// redirect('user_controller');
					redirect('dashboard_controller');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password !</div>');
					redirect('auth_controller/index');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This account has not been activated !</div>');
				redirect('auth_controller/index');
			}
		} else {
			//users not registered
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered !</div>');
			redirect('auth_controller/index');
		}

		// if ($this->auth_model->login_user($email, $password)) {
		// 	redirect('dashboard_controller/index');
		// } else {
		// 	$this->session->set_flashdata('error', 'Email atau Password salah');
		// 	redirect('auth_controller');
		// }
	}

	// Log out
	public function signout()
	{
		$this->load->view('auth/thankyou');
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		// $this->session->unset_userdata('is_login');
		$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">You have been logged out</div>');
		redirect('auth_controller/signout');
	}
	// end logout

	//profile
	public function profile()
	{
		$data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['header'] = "Profile";
		$data['subheader'] = "Welcome, " . $data['user']['name'];
		// $data['linkback'] = site_url('software_controller/index');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar2', $data);
		$this->load->view('profile', $data);
	}

	//notification
	public function notification()
	{
		$data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['header'] = "Notification";
		$data['subheader'] = "Welcome, " . $data['user']['name'];
		$data['profile'] = site_url('dashboard_controller/profile');
		$data['linkback'] = site_url('software_controller/index');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar2', $data);
		$this->load->view('notifikasi', $data);
	}
}
