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
			$sql = "INSERT INTO menu (Name, Discription, FK_Restaurants_ID) VALUES
				'".$this->m_sName."',
				'".$this->m_sDescription."',
				'".$this->m_iRestaurant."';";
			$db->conn->query($sql);
		}
	}


?>