<?php 
	include_once("Db.class.php");
	class Menu{
		private $m_sName;
		private $m_sDescription;
		private $m_iRestaurant;

		public function __set($p_sProperty, $p_vValue)
		{
			switch ($p_sProperty) {
				case 'name':
				$this->m_sName = $p_vValue;
				break;
				
				case 'description':
				$this->m_sDescription = $p_vValue;
				break;

				case 'restaurant':
				$this->m_iRestaurant = $p_vValue;
				break;
			}
		}

		public function __get($p_sProperty)
		{
			switch ($p_sProperty) {
				case 'name':
					return $this->m_sName;
				break;

				case 'description':
					return $this->m_sDescription;
				break;

				case 'restaurant':
					return $this->m_iRestaurant;
				break;
			}
		}

		public function Save()
		{
			$db = new Db();
			$sql = "INSERT INTO menu (Name, Discription, FK_Restaurants_ID) VALUES(
				'".$db->conn->real_escape_string($this->m_sName)."',
				'".$db->conn->real_escape_string($this->m_sDescription)."',
				'".$db->conn->real_escape_string($this->m_iRestaurant)."');";
			
			$db->conn->query($sql);
			//header("Location: Home.php");

		}

		public function GetLatest($restaurant)
		{
			$db = new Db();
			$sql = "SELECT * FROM menu WHERE FK_Restaurants_ID = '".$db->conn->real_escape_string($restaurant)."' ORDER BY ID_Menu DESC LIMIT 1;";
			$select = $db->conn->query($sql);
			//throw new Exception($sql);
			
			
			if (empty($select))
			{
				return "no menu";
			} else {
				$numberofRows = $select->num_rows;

				if($numberofRows == 1)
				{
					while ($oneSelect = $select->fetch_assoc())
					{	
						return $oneSelect;
					}
				}
			}
		}
	}


?>