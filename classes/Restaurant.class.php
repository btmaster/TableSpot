<?php 
	include_once("Db.class.php");

	class Restaurant{

		private $m_sEmail;
		private $m_sName;
		private $m_sCategorie;
		private $m_sDiscription;
		private $m_tOpening;
		private $m_tClosing;
		private $m_iSelectedId;
		private $m_igeslotenMaandag;
		private $m_iOpeningmaandag;
		private $m_iClosingMaandag; 

geslotenDinsdag
OpeningDinsdag
ClosingDinsdag
geslotenWoensdag
OpeningWoensdag
ClosingWoensdag
geslotenDonderdag
OpeningDonderdag
ClosingDonderdag
geslotenVrijdag
OpeningVrijdag
ClosingVrijdag
geslotenZaterdag
OpeningZaterdag
ClosingZaterdag
geslotenZondag
OpeningZondag
ClosingZondag


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
					break;
					}
					else
					{
						$this->m_igeslotenMaandag = 0;
						break;
					}	
					case 'Openingmaandag':
					if($het is->m_igeslotenMaandag === "0")
					{
					$this->m_iOpeningmaandag = $p_vValue;
					break;
					}
					case 'ClosingMaandag':
					if($het is->m_igeslotenMaandag === "0")
					{
					$this->m_iClosingMaandag = $p_vValue;
					break;
					}
					/* Disndag */
				case "geslotenDinsdag":
					if ($p_vValue == "1") 
					{
					$this->m_igeslotenDinsdag = $p_vValue;
					break;
					}
					else
					{
						$this->m_igeslotenDinsdag = 0;
						break;
					}	
					case 'OpeningDinsdag':
					if($het is->m_igeslotenDinsdag === "0")
					{
					$this->m_iOpeningDinsdag = $p_vValue;
					break;
					}
					case 'ClosingDinsdag':
					if($het is->m_igeslotenDinsdag === "0")
					{
					$this->m_iClosingDinsdag = $p_vValue;
					break;
					}
					/* Woensdag */
				case "geslotenWoensdag":
					if ($p_vValue == "1") 
					{
					$this->m_igeslotenWoensdag = $p_vValue;
					break;
					}
					else
					{
						$this->m_igeslotenWoensdag = 0;
						break;
					}	
					case 'OpeningWoensdag':
					if($het is->m_igeslotenWoensdag === "0")
					{
					$this->m_iOpeningWoensdag = $p_vValue;
					break;
					}
					case 'ClosingWoensdag':
					if($het is->m_igeslotenWoensdag === "0")
					{
					$this->m_iClosingWoensdag = $p_vValue;
					break;
					}	
					/* Donderdag */
				case "geslotenDonderdag":
					if ($p_vValue == "1") 
					{
					$this->m_igeslotenDonderdag = $p_vValue;
					break;
					}
					else
					{
						$this->m_igeslotenDonderdag = 0;
						break;
					}	
					case 'OpeningDonderdag':
					if($het is->m_igeslotenDonderdag === "0")
					{
					$this->m_iOpeningDonderdag = $p_vValue;
					break;
					}
					case 'ClosingDonderdag':
					if($het is->m_igeslotenDonderdag === "0")
					{
					$this->m_iClosingDonderdag = $p_vValue;
					break;
					}
					/*Vrijdag */
				case "geslotenVrijdag":
					if ($p_vValue == "1") 
					{
					$this->m_igeslotenVrijdag = $p_vValue;
					break;
					}
					else
					{
						$this->m_igeslotenVrijdag = 0;
						break;
					}	
					case 'OpeningVrijdag':
					if($het is->m_igeslotenVrijdag === "0")
					{
					$this->m_iOpeningVrijdag = $p_vValue;
					break;
					}
					case 'ClosingVrijdag':
					if($het is->m_igeslotenVrijdag === "0")
					{
					$this->m_iClosingVrijdag = $p_vValue;
					break;
					}	
					/* Zaterdag */
				case "geslotenZaterdag":
					if ($p_vValue == "1") 
					{
					$this->m_igeslotenZaterdag = $p_vValue;
					break;
					}
					else
					{
						$this->m_igeslotenZaterdag = 0;
						break;
					}	
					case 'OpeningZaterdag':
					if($het is->m_igeslotenZaterdag === "0")
					{
					$this->m_iOpeningZaterdag = $p_vValue;
					break;
					}
					case 'ClosingZaterdag':
					if($het is->m_igeslotenZaterdag === "0")
					{
					$this->m_iClosingZaterdag = $p_vValue;
					break;
					}
					/* Zondag */
				case "geslotenZondag":
					if ($p_vValue == "1") 
					{
					$this->m_igeslotenZondag = $p_vValue;
					break;
					}
					else
					{
						$this->m_igeslotenZondag = 0;
						break;
					}	
					case 'OpeningZondag':
					if($het is->m_igeslotenZondag === "0")
					{
					$this->m_iOpeningZondag = $p_vValue;
					break;
					}
					case 'ClosingZondag':
					if($het is->m_igeslotenZondag === "0")
					{
					$this->m_iClosingZondag = $p_vValue;
					break;
					}												
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
				case "Openingmaandag":
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
			if ($this->m_tOpening<$this->m_tClosing)
			{
				$db = new Db();
				/* restaurant id ophalen */
				$sql = "select ID_Keeper from restaurant_keeper where Email = '".$this->m_sEmail."'";
				$result = $db->conn->query($sql);
				$row = mysqli_fetch_array($result);
				$FK_Keeper_ID = $row[0];

				$sql = "insert into restaurants(Name, Discription, Categorie, Opening, Closing, FK_Keeper_ID) VALUES (
					'".$this->m_sName."',
					'".$this->m_sDiscription."',
					'".$this->m_sCategorie."',
					'".$this->m_tOpening."',
					'".$this->m_tClosing."',
					'".$FK_Keeper_ID."');";
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

		
		
		public function GetRestaurant($id)
		{
			$db = new Db();
			$sql = "Select * from restaurants where ID_Restaurant = " . $id . ";";
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
			$sql = "Select Name from restaurants where ID_Restaurant = '" . $this->m_iSelectedId . "' ";
    		$res = $db->conn->query($sql);
    		$row = mysqli_fetch_array($res);
			return $title = $row[0];
		}

	}






 ?>