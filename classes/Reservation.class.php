<?php 
	include_once('Db.class.php');
	class Reservation
	{
		private $m_tTime;
		private $m_dDate;
		private $m_iAmount;
		private $m_iCustomer;
		private $m_iTable;
		private $m_iRestaurant;
		private $m_iSelectedId;

		public function __set($p_sProperty, $p_vValue)
		{
			switch($p_sProperty)
			{
				case 'time':
				$this->m_tTime = $p_vValue;
				break;

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
				
				case 'SelectedId':
				$this->m_iSelectedId = $p_vValue;
				break;
			}
		}

		public function __get($p_sProperty)
		{
			switch($p_sProperty)
			{
				case 'time':
					return $this->m_tTime;
				break;

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

				case 'SelectedId':
					return $this->m_iSelectedId;
					break;
			}
		}

		public function Save()
		{
			include_once('Tablespot.class.php');
			include_once('Restaurant.class.php');
			$tablespot = new Tablespot();
			$restaurant = new Restaurant();
			$activetablespot = $tablespot->getTable($this->m_iTable);
			$restaurantId = $restaurant->getRestaurant($this->m_iRestaurant);
			
			if ($this->m_iAmount > $activetablespot['Place'])
			{
				throw new Exception("Er zijn aan deze tafel niet genoeg plaatsen voor het aantal personen");	
			} else {
				$day = date('l', strtotime($this->m_dDate));
				$allClosing = $restaurant->GetAllClosing($this->m_iRestaurant);
				//throw new Exception($day);
				if($this->m_dDate < date("Y-m-d"))
				{
					throw new Exception("You can't make a reservation in the past.");
				} else {
					while ($oneClosing = $allClosing->fetch_assoc())
					{ 
							if(($day == $oneClosing['Dag']))
							{
								if($oneClosing['Status'] == 1)
								{
									throw new Exception("The restaurant is closed on " . $oneClosing['Dag'] . ".");	
								}

								if($this->m_tTime < $oneClosing['OpenHour'] OR $this->m_tTime > $oneClosing['CloseHour'])
								{
									throw new Exception("You can only make reservations between " . $oneClosing['OpenHour'] . " and " . $oneClosing['CloseHour']);
								}

							}	 
							
					}	


					$db = new Db();
					$sql = "INSERT INTO reservations(Date,Time, AmountPeople,FK_Customer_ID,FK_Table_ID,FK_Restaurant_ID) VALUES (
						'".$db->conn->real_escape_string($this->m_dDate)."',
						'".$db->conn->real_escape_string($this->m_tTime)."',
						'".$db->conn->real_escape_string($this->m_iAmount)."',
						'".$db->conn->real_escape_string($this->m_iCustomer)."',
						'".$db->conn->real_escape_string($this->m_iTable)."',
						'".$db->conn->real_escape_string($this->m_iRestaurant)."');";
					$db->conn->query($sql);
					header("Location: Overview.php");
				}
				
			}
		}

		public function Delete($id)
		{
			$db = new Db();
			$sql = "DELETE FROM reservations WHERE ID_Resevation = '".$db->conn->real_escape_string($id)."';";
			$db->conn->query($sql);
		}

		public function DeleteAll($restaurant)
		{
			$db = new Db();
			$sql = "DELETE FROM reservations WHERE FK_Restaurant_ID ='".$db->conn->real_escape_string($restaurant)."';";
			$db->conn->query($sql);
		}

		public function SelectOne($id)
		{
			$db = new Db();
			$sql = "SELECT * FROM reservations WHERE ID_Resevation = '".$db->conn->real_escape_string($id)."';";
			//throw new Exception($sql);
			
			$select = $db->conn->query($sql);
			$numberofRows = $select->num_rows;

			if($numberofRows === 1)
			{
				while ($oneSelect = $select->fetch_assoc())
				{	
					return $oneSelect;
				}
			}else {
				throw new Exception("Reservatie niet gevonden");	
			}
		}

		public function SelectReservaties($customer)
		{
			$db = new Db();
			$sql = "SELECT * FROM reservations WHERE FK_Customer_ID = " . $db->conn->real_escape_string($customer) . ";";
			$select = $db->conn->query($sql);
			return $select;
		}

		public function GetAllReservations($restaurant)
		{
			$db = new Db();
			$sql = "Select * from reservations where FK_Restaurant_ID = '" . $db->conn->real_escape_string($restaurant) . "';";
		    return $db->conn->query($sql);
		}

		public function GetAllTables($tables)
		{
			$db = new Db();
			$sql = "Select * from reservations where FK_Table_ID = '" . $db->conn->real_escape_string($tables) . "';";			
		    return $db->conn->query($sql);
		}
	}



?>