<?php 
	include_once('Db.class.php');
	class Tablespot
	{
		private $m_bStatus;
		private $m_tTime;
		private $m_dDate;
		private $m_iPlace;
		private $m_iPlacing;

		public function __set($p_sProperty, $p_vValue)
		{
			switch($p_sProperty)
			{
				case 'status':
				$this->m_bStatus = $p_vValue;
				break;

				case 'time':
				$this->m_tTime = $p_vValue;
				break;

				case 'date':
				$this->m_dDate = $p_vValue;
				break;

				case 'place':
				$this->m_iPlace = $p_vValue;
				break;

				case 'placing':
				$this->m_iPlacing = $p_vValue;
				break;
			}
		}

		public function __get($p_sProperty)
		{
			switch($p_sProperty)
			{
				case 'status':
				 	return $this->m_bStatus;
				break;

				case 'time':
					return $this->m_tTime;
				break;

				case 'date':
					return $this->m_dDate;
				break;

				case 'place':
					return $this->m_iPlace;
				break;

				case 'placing':
					return $this->m_iPlacing;
				break;
			}
		}

		public function Save()
		{
			$db = new Db();
			$sql = "insert into tablesspots(Status, Time, Date, Place, FK_Placing_ID) VALUES (
				'".$db->conn->real_escape_string($this->m_bStatus)."',
				'".$db->conn->real_escape_string($this->m_tTime)."',
				'".$db->conn->real_escape_string($this->m_dDate)."',
				'".$db->conn->real_escape_string($this->m_iPlace)."',
				'".$db->conn->real_escape_string($this->m_iPlacing)."');";
			$db->conn->query($sql);
		}


		public function GetAll()
		{
			$db = new Db();
			$sql = "Select * from TablesSpots";
		    return $db->conn->query($sql);
		}

		public function GetTable($id)
		{
			$db = new Db();
			$sql = "SELECT * FROM tablesspots WHERE ID_Table = '".$db->conn->real_escape_string($id)."'";
			$select = $db->conn->query($sql);
			$numberofRows = $select->num_rows;

			if($numberofRows === 1)
			{
				while ($oneSelect = $select->fetch_assoc())
				{	
					return $oneSelect;
				}
			}else {
				throw new Exception("Tafel niet gevonden");	
			}
		}

		public function GetTablePlace($FK_Placing_ID)
		{
			$db = new Db();
			$sql = "SELECT * FROM tablesspots WHERE FK_Placing_ID = '".$db->conn->real_escape_string($FK_Placing_ID)."'";
			$select = $db->conn->query($sql);

			return $select;	
		}

		public function GetTableFree($FK_Placing_ID, $amount)
		{
			$db = new Db();
			$sql = "SELECT * FROM tablesspots WHERE FK_Placing_ID = '".$db->conn->real_escape_string($FK_Placing_ID)."'AND Status = 0 AND Place >= '".$db->conn->real_escape_string($amount)."';";
			$select = $db->conn->query($sql);
			return $select;
		}

		public function Reservation($id)
		{
			$db = new Db();
			$sql = "UPDATE tablesspots SET
			Status = 1 WHERE ID_Table = '".$db->conn->real_escape_string($id)."';";
			$db->conn->query($sql);
		}

		public function Annulation($id)
		{
			$db = new Db();
			$sql = "UPDATE tablesspots SET
			Status = 0 WHERE ID_Table = '".$db->conn->real_escape_string($id)."';";			
			$db->conn->query($sql);
		}

	}



?>