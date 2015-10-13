<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	public function index()
	{
		$this->load->view("site");
	}

	public function upload()
	{
		if ( ! empty($_FILES))
		{
			$config['upload_path'] = "./assets/uploads";
			$config['allowed_types'] = 'gif|jpg|png|mp4|ogv';

			$this->load->library('upload', $config);
			if (! $this->upload->do_upload("file")) {
				echo "File cannot be uploaded";
			}
		}

		$this->listFiles();
	}

	private function listFiles()
	{
		$this->load->helper('file');
		$files = get_filenames("./assets/uploads");
		echo json_encode($files);
	}

}