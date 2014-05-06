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
				'".$this->m_bStatus."',
				'".$this->m_tTime."',
				'".$this->m_dDate."',
				'".$this->m_iPlace."',
				'".$this->m_iPlacing."');";
			$db->conn->query($sql);
		}

		public function GetTable($FK_Placing_ID)
		{
			$db = new Db();
			$sql = "SELECT * FROM tablesspots WHERE FK_Placing_ID = '".$FK_Placing_ID."'";
			$select = $db->conn->query($sql);
			return $select;
		}

		public function GetTableFree($FK_Placing_ID)
		{
			$db = new Db();
			$sql = "SELECT * FROM tablesspots WHERE FK_Placing_ID = '".$FK_Placing_ID."'AND Status = 0;";
			$select = $db->conn->query($sql);
			return $select;
			
		}

		public function Reservation($id)
		{
			$db = new Db();
			$sql = "UPDATE tablesspots SET
			Status = 1 WHERE ID_Table = '".$id."'";
			$db ->conn->query($sql);
		}

	}



?>