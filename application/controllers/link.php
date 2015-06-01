<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Link extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {
		$this->load->view('welcome_message');
		$link1   = $this->input->post('link');
		  
		  if (isset($_POST['submit'])) { 
              // check to make sure the url will always start with http:// or https://
                 if (substr($link1, 0, 7) == "http://") {
                    $link = $link1;
                  } 
                 else {
                    $link = 'http://'.$link1;
                 }

                 if (substr($link1, 0, 8) == "https://") {
                    $link = $link1;
                 }
                     
                     if (!empty($link1)) {
                     	  
                    $data = array('link'  => $link);
                    $this->load->model('UrlModel'); 	   
                    $id   = $this->UrlModel->add_link($data);
                    $id2  = $id;
                    
                        $codeset   = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
                        $base      = strlen($codeset);
                        $converted = "";

                              while ($id > 0) {
                                $converted  = substr($codeset, ($id % $base), 1) . $converted;
                                $id         = floor($id/$base);
                              }
                      echo "your Short URL is : <h2><a href='".$link."'>dookan.net/url/link/ul/".$converted."</a></h2>";
                    
                    $updates = array('short_code' => $converted);
                    $this->UrlModel->update_link($updates,$id2);          
                     
                     } 
                     else {
                     	echo "<div class='dev1'>Please insert your Link </div> ";
                     }
		  }

	}

	public function ul() {
    $id = $this->uri->uri_string();
    $id = explode("/", $id);
        if ($id[3] == null) {
        	header("Location: http://dookan.net/url/");
    	
        } 
        else 
        {
        $newid = $id[3];
        $this->load->model('UrlModel'); 	   
        $this->UrlModel->getdate($newid);	

        }
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */