<?php 
	include_once("Db.class.php");
	class Restaurant{
		private $m_sRestaurant;
		private $m_sUsername;
		private $m_sPassword;
		private $m_sPasswordcheck;
		private $m_sSalt="DeSaltZalHetHierIsSuperVeiligMakenSe";

		

		public function __set($p_sProperty, $p_vValue)
		{
			switch ($p_sProperty)
			{
				case "Restaurant":
				$this->m_sRestaurant = $p_vValue;
				break;

				case "Username":
				$this->m_sUsername = $p_vValue;
				break;

				case "Password":
				$this->m_sPassword = md5($p_vValue.$this->m_sSalt);
				break;

				case "Passwordcheck":
				if ($this->m_sPassword === md5($p_vValue.$this->m_sSalt))
				{
					$this->m_sPasswordcheck = md5($p_vValue.$this->m_sSalt);
					
				} else {
					throw new Exception("Wachtwoorden komen niet overeen");
				}
				break;
			}
		}

		public function __get($p_sProperty)
		{
			switch ($p_sProperty) {
				case "Restaurant":
				return $this->m_sRestaurant;
				break;

				case "UserName":
				return $this->m_sUsername;
				break;

				case "Password":
				return $this->m_sPassword;
				break;

				case "Passwordcheck":
				return $this->m_sPasswordcheck;
				break;
			}
		}

		public function Save()
		{
			$db = new Db();
			
			$sql = "insert INTO Restaurant (restaurant, username, password)
			VALUES(
					'".$this->m_sRestaurant."',
					'".$this->m_sUsername."',
					'".$this->m_sPasswordcheck."');";
			$db->conn->query($sql);
			header("Location:Index.php");
		}

		public function Login()
		{
			$db = new Db();
			$sql = "select * from Restaurant where username = 
			'".$this->m_sUsername."'
			and password ='".$this->m_sPassword."';";
			$login = $db->conn->query($sql);
			$numberofRows = $login->num_rows;

			if($numberofRows == 1)
			{
				header("Location: Home.php");
			} else {
				throw new Exception("Gebruiker en wachtwoord komen niet overeen");
				
			}

		}

	}






 ?>