<?php 
    class userorders_table
    {
        private $_dbh;
        private $_table_name = 'user_orders';
		 public function __construct()
        {
            $this->_dbh = new db_connection($this->_table_name);
        }
		
		
		
		public function retrieve_all_user_orders()
		{
			$query = "SELECT * from ".$this->_table_name." ";
            $result = $this->_dbh->query($query);
            $trans_data = array();
            while($row = mysqli_fetch_assoc($result))
            {
                $trans_data[] = $row;        
            }
            return $trans_data;
		}


        public function retrieve_all_pending_orders()
        {
            $query = "SELECT * from ".$this->_table_name." where status = 0";
            $result = $this->_dbh->query($query);
            $trans_data = array();
            while($row = mysqli_fetch_assoc($result))
            {
                $trans_data[] = $row;
            }
            return $trans_data;
        }



		
		
		public function retrieve_user_orders_by_id($user_orders_id)
		{
		   $query = "SELECT * from ".$this->_table_name." where id ='".$user_orders_id."'";
            $result = $this->_dbh->query($query);
		    $result_data = mysqli_fetch_assoc($result);
		    if($result_data['id'] and !empty($result_data['id']))
		    {
		        return $result_data;
		    }
		    return false;		    
		}

        public function retrieve_orders_by_user_id($user_orders_id)
        {
            $query = "SELECT * from ".$this->_table_name." where user_id ='".$user_orders_id."'";
            $result = $this->_dbh->query($query);
            $trans_data = array();
            while($row = mysqli_fetch_assoc($result))
            {
                $trans_data[] = $row;
            }
            return $trans_data;
        }


        public function add_new_data(array $summery_data)
        {
            if($summery_data)
            {
                return $this->_dbh->insert($summery_data);

            }
            return false;
        }

        public function update_data(array $user_data,$condition)
        {
            return $this->_dbh->update($user_data, $condition);
        }


        public function delete_data($productid)
    {
        $product_id = $productid;

        $query = "DELETE FROM ".$this->_table_name." 
					WHERE  
					id =".$product_id." ";

        $result = $this->_dbh->query($query);

        if($result)
        {
            return true;
        }
        return false;
    }



        public function approve($productid)
        {
            $product_id = $productid;

            $query = "update ".$this->_table_name." 
					set status = 1
					where  
					id =".$product_id." ";

            $result = $this->_dbh->query($query);

            if($result)
            {
                return true;
            }
            return false;
        }


		
		
		
		
		
		
	}
?>