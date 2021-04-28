<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout
{
    
    var $obj;
    var $layout;
    
	function __construct($layout = "") {	
        $this->obj =& get_instance();
		
		/************************* Created by Debdeep for new server ************************/
		//$this->obj->session->write_userdata();
		/************************* Created by Debdeep for new server ************************/

        $this->layout = $layout;
		
    }

    function setLayout($layout)
    {
      $this->layout = $layout;
    }
    
    function view($view, $data=null, $return=false)
    {
		
		/************************* Created by Debdeep for new server ************************/
		//$this->obj->session->write_userdata();
		/************************* Created by Debdeep for new server ************************/
		
		$loadedData = array();
        $loadedData['content_for_layout'] = $this->obj->load->view($view,$data,true);
        
        if($return)
        {
            $output = $this->obj->load->view($this->layout, $loadedData, true);
            return $output;
        }
        else
        {
            $this->obj->load->view($this->layout, $loadedData, false);
        }
    }
	
	
	function multiple_view($view_arr = array(), $data_arr= array(), $return=false)
    {
		
		$loadedData = array();
		foreach($view_arr as $key => $view)
		{
			$data = null;
			
			if(isset($data_arr[$key]))
			{
				$data = $data_arr[$key];
			}
			
			if($view <> "")
			{
				$loadedData['content_for_layout_'.$key] = $this->obj->load->view($view,$data,true);
			}
		}
        
        if($return)
        {
            $output = $this->obj->load->view($this->layout, $loadedData, true);
            return $output;
        }
        else
        {
            $this->obj->load->view($this->layout, $loadedData, false);
        }
    }
    
    /**
     * Used to load cached view from public folder outside application, and normal view from application/views 
     * if the any view starts with public/... it loades from the cache else from the normal view
     * @param array $view_arr
     * @param array $data_arr
     * @param boolean $return
     * @return void
     */
    function multiple_view_cached($view_arr = array(), $data_arr= array(), $return=false)
    {
		$loadedData = array();
		foreach($view_arr as $key => $view)
		{
			$data = null;
			
			if(isset($data_arr[$key]))
			{
				$data = $data_arr[$key];
			}
			
			if($view <> "")
			{
                $view_path_arr = explode('/', $view);
                if ($view_path_arr[0] == 'public') {
                    $loadedData['content_for_layout_'.$key] = $this->obj->load->cached_view($view,$data,true);
                } else {
                    $loadedData['content_for_layout_'.$key] = $this->obj->load->view($view,$data,true);
                }
				
			}
		}
        
        if($return)
        {
            $output = $this->obj->load->view($this->layout, $loadedData, true);
            return $output;
        }
        else
        {
            $this->obj->load->view($this->layout, $loadedData, false);
        }
    }
}
?>
