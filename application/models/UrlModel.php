<?php
class UrlModel extends CI_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    public function add_link($data){

      $this->db->set('date', 'NOW()', FALSE); 	   
      $this->db->insert('url_shortener', $data); 

      $query  = $this->db->query('SELECT max(id) as maxid FROM url_shortener');
      $row    = $query->row();
      $max_id = $row->maxid; 
      return $max_id;
    }

    public function update_link($updates,$id2){
    	
    	$this->db->where('id', $id2);
        $this->db->update('url_shortener', $updates); 
    }

    public function getdate($newid){
   
      $query      = $this->db->get_where('url_shortener', array('short_code' => $newid));
       	
    	$row        = $query->row();
    	$short_code = @$row->link;
    	
    	if ($short_code != null) {

    		header("Location: ".$short_code." ");
    	}
       else {
       	echo "this link doesnt exist!"; 
       	die();
       }
    	
    }
}
?>