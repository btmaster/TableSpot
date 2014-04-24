<?php 
	include_once('Db.class.php');
	class Reservation
	{
		private $m_dDate;
		private $m_iAmount;
		private $m_iCustomer;
		private $m_iTable;
		private $m_iRestaurant

		public function __set($p_sProperty, $p_vValue)
		{
			switch($p_sProperty)
			{
				case 'date':
				$this->m_dDate = $p_vValue;
				break;

				case 'amount':
				$this->m_iAmount = $p_vValue;
				break;

				case 'customer':
				$this->m_iCustomer = $p_vValue;
				break;

				case 'table':
				$this->m_iTable = $p_vValue;
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
				case 'date':
					return $this->m_dDate;
				break;

				case 'amount':
					return $this->m_iAmount;
				break;

				case 'customer':
					return $this->m_iCustomer;
				break;

				case 'table':
					return $this->m_iTable;
				break;

				case 'restaurant':
					return $this->m_iRestaurant;
				break;
			}
		}

		public function Save()
		{
			$db = new Db();
			$sql = "insert into reservations(Date, AmountPeople,FK_Customer_ID,FK_Table_ID,FK_Restaurant_ID) VALUES (
				'".$this->m_dDate."',
				'".$this->m_iAmount."',
				'".$this->m_iCustomer."',
				'".$this->m_iTable."',
				'".$this->m_iRestaurant."');";
			$db->conn->query($sql);
		}

	}



?>