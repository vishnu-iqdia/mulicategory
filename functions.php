<?php

	function create_link(){
		
		return mysqli_connect("localhost", "root", "", "sampledb");
	}	
 	
 	function add_category($link, $data)
 	{
 		extract($data);
 		$cname = mysqli_real_escape_string($link, $cname);
 		if($cname === '') return false;
		$sql = "INSERT INTO categories (cname, parent_id)
				VALUES ('$cname', '$parent_id')";

		return ($link->query($sql)) ? true : false;
		
 	}

 	function load($link, $param, $level)
 	{
 		switch($param)
 		{
 			case 'category':
 				$response_data = array();
 				$sql = "SELECT * FROM categories";
 				$condition = '';
 				if($level === 'l1')
 					$condition = " where parent_id=0"; 
 				$sql .= $condition;
				$result = $link->query($sql);
				if ($result->num_rows > 0)
				{
    				
    				while($row = $result->fetch_assoc())
    				{
    					$response_data[] = $row;
    			 	}
				} 
				else 
				{
    				$response_data[0]['id'] = 0;
    				$response_data[0]['cname'] = 'no results';
				}
				return $response_data;
 				break;
 		}
 	}

 	function display($data)
 	{
 		echo '<pre>';
 		print_r($data);
 		echo '</pre>';
 	}