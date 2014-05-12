<?php 
	include_once('Db.class.php');
	class Placing
	{
		private $m_sName;
		private $m_bActif;
		private $m_iRestaurant;

		public function __set($p_sProperty, $p_vValue)
		{
			switch($p_sProperty)
			{
				case 'name':
				$this->m_sName = $p_vValue;
				break;

				case 'actif':
				$this->m_bActif = 1;
				break;

				case 'restaurant':
				$this->m_iRestaurant = $p_vValue;
				break;
			}
		}

		public function __get($p_sProperty)
		{
			switch($p_sProperty)
			{
				case 'name':
					return $this->m_sName;
				break;

				case 'actif':
					return $this->m_bActif;
				break;

				case 'restaurant':
					return $this->m_iRestaurant;
				break;
			}
		}

		public function Save()
		{
			$db = new Db();
			$sql = "insert into placing(Name, Actif, FK_Restaurant_id) VALUES (
				'".$db->conn->real_escape_string($this->m_sName)."',
				'".$db->conn->real_escape_string($this->m_bActif)."',
				'".$db->conn->real_escape_string($this->m_iRestaurant)."');";
			$db->conn->query($sql);
		}

		public function GetPlace($FK_Restaurant_id)
		{
			$db = new Db();
			$sql = "SELECT * FROM placing WHERE FK_Restaurant_id = '" . $db->conn->real_escape_string($FK_Restaurant_id)."' AND Actif = 1;";
			$select = $db->conn->query($sql);			

			$numberofRows = $select->num_rows;

			if($numberofRows == 1)
			{
				while ($oneSelect = $select->fetch_assoc())
				{	
					return $oneSelect;
				}
			} else {
				throw new Exception("Didn't found a table");
			}
		}

		public function GetLatest()
		{
			$db = new Db();
			$sql = "SELECT * FROM placing ORDER BY ID_Placing DESC LIMIT 1;";
			$select = $db->conn->query($sql);
			
			$numberofRows = $select->num_rows;

			if($numberofRows == 1)
			{
				while ($oneSelect = $select->fetch_assoc())
				{	
					return $oneSelect;
				}
			}
		}

		public function GetAllRestaurant($FK_Restaurant_id)
		{
			$db = new Db();
			$sql = "SELECT * FROM placing WHERE FK_Restaurant_id = '" . $db->conn->real_escape_string($FK_Restaurant_id)."';";
			$select = $db ->conn->query($sql);
			return $select;
		}

		public function UpdateAll($FK_Restaurant_id)
		{
			$db = new Db();
			$sql = "UPDATE placing SET Actif = '0' WHERE FK_Restaurant_id = '" . $db->conn->real_escape_string($FK_Restaurant_id)."';";
			$db->conn->query($sql);
		}

		public function UpdateActive($id)
		{
			$db = new Db();
			$sql = "UPDATE placing SET Actif = '1' WHERE ID_Placing = '".$db->conn->real_escape_string($id)."';";
			$db->conn->query($sql);
		}



	}



?>