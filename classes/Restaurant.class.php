<?php 
	include_once("Db.class.php");

	class Restaurant{

		private $m_sEmail;
		private $m_sName;
		private $m_sCategorie;
		private $m_sDiscription;
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
				case "SelectedId":
				return $this->m_iSelectedId;
				break;
			}
		}

		public function SaveRestaurant()
		{
				$db = new Db();
				/* restaurant id ophalen */
				$sql = "select ID_Keeper from restaurant_keeper where Email = '".$this->m_sEmail."'";
				$result = $db->conn->query($sql);
				$row = mysqli_fetch_array($result);
				$FK_Keeper_ID = $row[0];

				$sql = "insert into restaurants(Name, Discription, Categorie, FK_Keeper_ID) VALUES (
					'".$this->m_sName."',
					'".$this->m_sDiscription."',
					'".$this->m_sCategorie."',
					'".$FK_Keeper_ID."');";
				$db->conn->query($sql);

			
		}
		public function GetAllRestaurants()
		{
			$db = new Db();
			$sql = "Select * from restaurants";
    		return $db->conn->query($sql);
		}
		public function GetAllfreespots()
		{
			$db = new Db();
			$sql = "Select * from TablesSpots";
    		return $db->conn->query($sql);
		}
		public function GetAllReservations()
		{
			$db = new Db();
			$sql = "Select * from reservations where FK_Restaurant_ID = '" . $this->m_iSelectedId . "' ";
    		return $db->conn->query($sql);
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