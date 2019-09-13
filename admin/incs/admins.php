<?php
	class admins_table
	{
		private $_dbh;
		private $_table_name = 'admins';
		
		public function __construct()
		{
			$this->_dbh = new db_connection($this->_table_name);
		}


		
		public function is_user_registered($email)
		{
		    $query = "Select count(email) as total_count from ".$this->_table_name." where email ='".$email."'";
		    $result = $this->_dbh->query($query);
		    $result_data = mysqli_fetch_assoc($result);
		    if($result_data['total_count']>0)
		    {
		        return true;
		    }
		    return false;
		}


        public function is_user_exist($id)
        {
            $query = "Select count(id) as total_count from ".$this->_table_name." where id ='".$id."'";
            $result = $this->_dbh->query($query);
            $result_data = mysqli_fetch_assoc($result);
            if($result_data['total_count']>0)
            {
                return true;
            }
            return false;
        }

		
		
		public function retrieve_user_by_email($user_email)
		{
		    $query = "Select *,full_name from ".$this->_table_name." where email ='".$user_email."'";
		    $result = $this->_dbh->query($query);
		    $result_data = mysqli_fetch_assoc($result);
		    if($result_data['id'] and !empty($result_data['id']))
		    {
		        return $result_data;
		    }
		    return false;
		}
		
		public function retrieve_user($user_id)
		{
		   $query = "SELECT *,full_name from ".$this->_table_name." where id ='".$user_id."' ";
            $result = $this->_dbh->query($query);
		    $result_data = mysqli_fetch_assoc($result);
		    if($result_data['id'] and !empty($result_data['id']))
		    {
		        return $result_data;
		    }
		    return false;		    
		}






        public function retrieve_user_info($user_id)
		{
		   $query = "SELECT * from ".$this->_table_name." where id ='".$user_id."'";
            $result = $this->_dbh->query($query);
		    $result_data = mysqli_fetch_assoc($result);
		    if($result_data['id'] and !empty($result_data['id']))
		    {
		        return $result_data;
		    }
		    return false;		    
		}
		
		

		
		public function get_full_name($user_id)
		{
		    $query = "Select id,full_name AS FULL_NAME from ".$this->_table_name." where id ='".$user_id."'";
		    $result = $this->_dbh->query($query);
		    $result_data = mysqli_fetch_assoc($result);
		    if($result_data['FULL_NAME'] and !empty($result_data['FULL_NAME']))
		    {
		        return $result_data['FULL_NAME'];
		    }
		    return false;
		}

		public function verify_user($user_email,$user_password)
		{
			$user_data = $this->retrieve_user_by_email($user_email);
			if($user_data)
			{
				$password_string = hash('SHA256',$user_password);
				$user_password = hash('SHA256',$user_data['salt'].$password_string);
				if($user_password == $user_data['password'])
				{
					return $user_data['id'];
				}
			}
			return false;
		}
		

		
		
	}
?>
