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
				case "Opening":
				$this->m_tOpening = $p_vValue;
				break;
				case "Closing":
				$this->m_tClosing = $p_vValue;
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
				case "Opening":
				return $this->m_tOpening;
				break;
				case "Closing":
				return $this->m_tClosing;
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