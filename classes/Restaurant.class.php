<?php 
	include_once("Db.class.php");

	class Restaurant{

		private $m_sEmail;
		private $m_sName;
		private $m_sCategorie;
		private $m_sDiscription;
		private $m_iSelectedId;
		private $m_igeslotenMaandag;
		private $m_iOpeningMaandag;
		private $m_iClosingMaandag; 
		private $m_igeslotenDinsdag;
		private $m_iOpeningDinsdag;
		private $m_iClosingDinsdag;
		private $m_igeslotenWoensdag;
		private $m_iOpeningWoensdag;
		private $m_iClosingWoensdag;
		private $m_igeslotenDonderdag;
		private $m_iOpeningDonderdag;
		private $m_iClosingDonderdag;
		private $m_igeslotenVrijdag;
		private $m_iOpeningVrijdag;
		private $m_iClosingVrijdag;
		private $m_igeslotenZaterdag;
		private $m_iOpeningZaterdag;
		private $m_iClosingZaterdag;
		private $m_igeslotenZondag;
		private $m_iOpeningZondag;
		private $m_iClosingZondag;


		public function __set($p_sProperty, $p_vValue)
		{
			switch ($p_sProperty)
			{
				case "Email":
				$this->m_sEmail = $p_vValue;
				break;
				case "Name":
				 $this->m_sName = $p_vValue;
				break;
				case "Categorie":
				$this->m_sCategorie = $p_vValue;
				break;
				case "Discription":
				$this->m_sDiscription = $p_vValue;
				break;
				/* dagen */	
					/* maandag */
				case "geslotenMaandag":
				
					if ($p_vValue == "1") 
					{
					$this->m_igeslotenMaandag = $p_vValue;
					
					}
					else
					{

						$this->m_igeslotenMaandag = 0;
						
					}
				break;	
	
				case 'Openingmaandag':
					if($this->m_igeslotenMaandag == "0")
					{
					$this->m_iOpeningMaandag = $p_vValue;
					}

				break;

				case 'ClosingMaandag':
					if($this->m_igeslotenMaandag == "0")
					{
					$this->m_iClosingMaandag = $p_vValue;
					
					}
				break;
					/* Disndag */
				case "geslotenDinsdag":
					if ($p_vValue == "1") 
					{
					$this->m_igeslotenDinsdag = $p_vValue;
					
					}
					else
					{
						$this->m_igeslotenDinsdag = 0;
						
					}
				break;	
				
				case 'OpeningDinsdag':
					if($this->m_igeslotenDinsdag == "0")
					{
					$this->m_iOpeningDinsdag = $p_vValue;
					
					}
				break;
				case 'ClosingDinsdag':
					if($this->m_igeslotenDinsdag == "0")
					{
					$this->m_iClosingDinsdag = $p_vValue;
					
					}
				break;
					/* Woensdag */
				case "geslotenWoensdag":
					if ($p_vValue == "1") 
					{
					$this->m_igeslotenWoensdag = $p_vValue;
					
					}
					else
					{
						$this->m_igeslotenWoensdag = 0;
						
					}
				break;

				case 'OpeningWoensdag':
					if($this->m_igeslotenWoensdag == "0")
					{
					$this->m_iOpeningWoensdag = $p_vValue;
					
					}
				break;
				case 'ClosingWoensdag':
					if($this->m_igeslotenWoensdag == "0")
					{
					$this->m_iClosingWoensdag = $p_vValue;
					
					}	
				break;
					/* Donderdag */
				case "geslotenDonderdag":
					if ($p_vValue == "1") 
					{
					$this->m_igeslotenDonderdag = $p_vValue;
					
					}
					else
					{
						$this->m_igeslotenDonderdag = 0;
						
					}	
				break;

				case 'OpeningDonderdag':
					if($this->m_igeslotenDonderdag == "0")
					{
					$this->m_iOpeningDonderdag = $p_vValue;
					
					}
				break;

				case 'ClosingDonderdag':
					if($this->m_igeslotenDonderdag == "0")
					{
					$this->m_iClosingDonderdag = $p_vValue;
					
					}
				break;
					/*Vrijdag */
				case "geslotenVrijdag":
					if ($p_vValue == "1") 
					{
					$this->m_igeslotenVrijdag = $p_vValue;
					
					}
					else
					{
						$this->m_igeslotenVrijdag = 0;
						
					}	
				break;

				case 'OpeningVrijdag':
					if($this->m_igeslotenVrijdag == "0")
					{
					$this->m_iOpeningVrijdag = $p_vValue;
					
					}
				break;

				case 'ClosingVrijdag':
					if($this->m_igeslotenVrijdag == "0")
					{
					$this->m_iClosingVrijdag = $p_vValue;
					
					}
				break;	
					/* Zaterdag */
				case "geslotenZaterdag":
					if ($p_vValue == "1") 
					{
					$this->m_igeslotenZaterdag = $p_vValue;
					
					}
					else
					{
						$this->m_igeslotenZaterdag = 0;
						
					}
				break;

				case 'OpeningZaterdag':
					if($this->m_igeslotenZaterdag == "0")
					{
					$this->m_iOpeningZaterdag = $p_vValue;
					
					}
				break;

				case 'ClosingZaterdag':
					if($this->m_igeslotenZaterdag == "0")
					{
					$this->m_iClosingZaterdag = $p_vValue;
				
					}
				break;
					/* Zondag */
				case "geslotenZondag":
					if ($p_vValue == "1") 
					{
					$this->m_igeslotenZondag = $p_vValue;
					
					}
					else
					{
						$this->m_igeslotenZondag = 0;
						
					}
				break;
	
				case 'OpeningZondag':
					if($this->m_igeslotenZondag == "0")
					{
					$this->m_iOpeningZondag = $p_vValue;
					
					}
				break;

				case 'ClosingZondag':
					if($this->m_igeslotenZondag === 0)
					{
					$this->m_iClosingZondag = $p_vValue;
					}
				break;													
				case "SelectedId":
				$this->m_iSelectedId = $p_vValue;
				break;
			}
		}

		public function __get($p_sProperty)
		{
			switch ($p_sProperty) {
				case "Email":
				return $this->m_sEmail;
				break;
				case "Name":
				return $this->m_sName;
				break;
				case "Categorie":
				return $this->m_sCategorie;
				break;
				case "Discription":
				return $this->m_sDiscription;
				break;
				/* dagen */
				/* Maandag*/
				case "geslotenMaandag":
				return $this->m_igeslotenMaandag;
				break;
				case "OpeningMaandag":
				return $this->m_iOpeningmaandag;
				break;
				case "ClosingMaandag":
				return $this->m_iClosingMaandag;
				break;
				/* Dinsdag*/
				case "geslotenDinsdag":
				return $this->m_igeslotenDinsdag;
				break;
				case "OpeningDinsdag":
				return $this->m_iOpeningDinsdag;
				break;
				case "ClosingDinsdag":
				return $this->m_iClosingDinsdag;
				break;
				/* Woensdag*/
				case "geslotenWoensdag":
				return $this->m_igeslotenWoensdag;
				break;
				case "OpeningWoensdag":
				return $this->m_iOpeningWoensdag;
				break;
				case "ClosingWoensdag":
				return $this->m_iClosingWoensdag;
				break;
				/* Donderdag*/
				case "geslotenDonderdag":
				return $this->m_igeslotenDonderdag;
				break;
				case "OpeningDonderdag":
				return $this->m_iOpeningDonderdag;
				break;
				case "ClosingDonderdag":
				return $this->m_iClosingDonderdag;
				break;
				/* Vrijdag*/
				case "geslotenVrijdag":
				return $this->m_igeslotenVrijdag;
				break;
				case "OpeningVrijdag":
				return $this->m_iOpeningVrijdag;
				break;
				case "ClosingVrijdag":
				return $this->m_iClosingVrijdag;
				break;
				/* Zaterdag*/
				case "geslotenZaterdag":
				return $this->m_igeslotenZaterdag;
				break;
				case "OpeningZaterdag":
				return $this->m_iOpeningZaterdag;
				break;
				case "ClosingZaterdag":
				return $this->m_iClosingZaterdag;
				break;
				/* Zondag */
				case "geslotenZondag":
				return $this->m_igeslotenZondag;
				break;
				case "OpeningZondag":
				return $this->m_iOpeningZondag;
				break;
				case "ClosingZondag":
				return $this->m_iClosingZondag;
				break;
				case "SelectedId":
				return $this->m_iSelectedId;
				break;
			}
		}

		public function SaveRestaurant()
		{
			if (1<2)
			{
				$db = new Db();
				/* restaurant id ophalen */
				$sql = "select ID_Keeper from restaurant_keeper where Email = '".$db->conn->real_escape_string($this->m_sEmail)."'";
				$result = $db->conn->query($sql);
				$row = mysqli_fetch_array($result);
				$FK_Keeper_ID = $row[0];

				$sql = "insert into restaurants(Name, Discription, Categorie, FK_Keeper_ID) VALUES (
					'".$db->conn->real_escape_string($this->m_sName)."',
					'".$db->conn->real_escape_string($this->m_sDiscription)."',
					'".$db->conn->real_escape_string($this->m_sCategorie)."',
					'".$FK_Keeper_ID."');";
				$db->conn->query($sql);

				/* laatste restaurant halen */
			$sql = "select * from restaurants ORDER BY ID_Restaurant DESC LIMIT 1;";
			$select = $db->conn->query($sql);
			
			$numberofRows = $select->num_rows;

			if($numberofRows == 1)
			{
				while ($oneSelect = $select->fetch_assoc())
				{	
					$restaurants_id = $oneSelect;
				}
			}

				/*dagen*/
				/* maandag */
				
				$sql = "insert into openinghours ( Dag, OpenHour, CloseHour, Status, FK_restaurants_ID) VALUES (
					'Monday',
					'". $db->conn->real_escape_string($this->m_iOpeningMaandag) ."',
					'". $db->conn->real_escape_string($this->m_iClosingMaandag) ."',
					'". $db->conn->real_escape_string($this->m_igeslotenMaandag) ."',
					'".$restaurants_id['ID_Restaurant']."');";
					//throw new Exception($sql);
					
					$db->conn->query($sql);

				/* dinsdag */
				$sql = "insert into openinghours ( Dag, OpenHour, CloseHour, Status, FK_restaurants_ID) VALUES (
					'Tuesday',
					'". $db->conn->real_escape_string($this->m_iOpeningDinsdag) ."',
					'". $db->conn->real_escape_string($this->m_iClosingDinsdag) ."',
					'". $db->conn->real_escape_string($this->m_igeslotenDinsdag) ."',
					'".$restaurants_id['ID_Restaurant']."');";

					$db->conn->query($sql);
					
				/* Woensdag */
				$sql = "insert into openinghours ( Dag, OpenHour, CloseHour, Status, FK_restaurants_ID) VALUES (
					'Wednesday',
					'". $db->conn->real_escape_string($this->m_iOpeningWoensdag) ."',
					'". $db->conn->real_escape_string($this->m_iClosingWoensdag) ."',
					'". $db->conn->real_escape_string($this->m_igeslotenWoensdag) ."',
					'".$restaurants_id['ID_Restaurant']."');";

					$db->conn->query($sql);
					
				/* Donderdag */
				$sql = "insert into openinghours ( Dag, OpenHour, CloseHour, Status, FK_restaurants_ID) VALUES (
					'Thursday',
					'". $db->conn->real_escape_string($this->m_iOpeningDonderdag) ."',
					'". $db->conn->real_escape_string($this->m_iClosingDonderdag) ."',
					'". $db->conn->real_escape_string($this->m_igeslotenDonderdag) ."',
					'".$restaurants_id['ID_Restaurant']."');";

					$db->conn->query($sql);
					
				/* Vrijdag */
				$sql = "insert into openinghours ( Dag, OpenHour, CloseHour, Status, FK_restaurants_ID) VALUES (
					'Friday',
					'". $db->conn->real_escape_string($this->m_iOpeningVrijdag) ."',
					'". $db->conn->real_escape_string($this->m_iClosingVrijdag) ."',
					'". $db->conn->real_escape_string($this->m_igeslotenVrijdag) ."',
					'".$restaurants_id['ID_Restaurant']."');";

					$db->conn->query($sql);
					
				/* Zaterdag */
				$sql = "insert into openinghours ( Dag, OpenHour, CloseHour, Status, FK_restaurants_ID) VALUES (
					'Saturday',
					'". $db->conn->real_escape_string($this->m_iOpeningZaterdag) ."',
					'". $db->conn->real_escape_string($this->m_iClosingZaterdag) ."',
					'". $db->conn->real_escape_string($this->m_igeslotenZaterdag) ."',
					'".$restaurants_id['ID_Restaurant']."');";

					$db->conn->query($sql);
					
				/* Zondag */
				$sql = "insert into openinghours ( Dag, OpenHour, CloseHour, Status, FK_restaurants_ID) VALUES (
					'Sunday',
					'". $db->conn->real_escape_string($this->m_iOpeningZondag) ."',
					'". $db->conn->real_escape_string($this->m_iClosingZondag) ."',
					'". $db->conn->real_escape_string($this->m_igeslotenZondag) ."',
					'".$restaurants_id['ID_Restaurant']."');";

					$db->conn->query($sql);
					
			} else {
				throw new Exception("Openingsuur moet voor het sluitingsuur zijn");
			}
				

			
		}

		public function GetAllRestaurants()
		{
			$db = new Db();
			$sql = "Select * from restaurants";
    		return $db->conn->query($sql);
		}

		public function GetRestaurantEigen($keeper)
		{
			$db = new Db();
			$sql = "Select * from restaurants where FK_Keeper_ID = '".$keeper."';";
			return $db->conn->query($sql);
		}

		
		
		public function GetRestaurant($id)
		{
			$db = new Db();
			$sql = "Select * from restaurants where ID_Restaurant = " . $db->conn->real_escape_string($id) . ";";
			$select = $db->conn->query($sql);

			while($oneSelect = $select->fetch_assoc())
			{
				return $oneSelect;
			}
			return $select;
		}

		public function GetTitle()
		{
			$db = new Db();
			$sql = "Select Name from restaurants where ID_Restaurant = '" . $db->conn->real_escape_string($this->m_iSelectedId) . "' ";
    		$res = $db->conn->query($sql);
    		$row = mysqli_fetch_array($res);
			return $title = $row[0];
		}

		public function GetAllClosing($restaurant)
		{
			$db = new Db();
			$sql = "SELECT * FROM openinghours WHERE FK_restaurants_ID = '" . $db->conn->real_escape_string($restaurant) . "'";
			$select = $db->conn->query($sql);
			return $select;
		}
		

	}






 ?>