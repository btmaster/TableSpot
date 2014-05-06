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
				$this->m_bActif = $p_vValue;
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
				'".$this->m_sName."',
				'".$this->m_bActif."',
				'".$this->m_iRestaurant."');";
			$db->conn->query($sql);
		}

		public function GetPlace($FK_Restaurant_id)
		{
			$db = new Db();
			$sql = "SELECT * FROM placing WHERE FK_Restaurant_id = '" . $FK_Restaurant_id."' AND Actif = 1;";
			$select = $db->conn->query($sql);
			$numberofRows = $select->num_rows;

			if($numberofRows === 1)
			{
				while ($oneselect = $select->fetch_assoc())
				{
					return $oneselect;
				}
			}
		}

	}



?>