<?php 
	include_once('Db.class.php');
	class Customer
	{
		private $m_sFirstname;
		private $m_sLastname;
		private $m_iPhone;
		private $m_sEmail;
		private $m_sPassword;
		private $m_sPasswordcheck;
		private $m_sSalt="DeSaltZalHetHierIsSuperVeiligMakenSe";

		public function __set($p_sProperty, $p_vValue)
		{
			switch ($p_sProperty)
			{
				case "Firstname":
				$this->m_sFirstname = $p_vValue;
				break;

				case "Lastname":
				$this->m_sLastname = $p_vValue;
				break;

				case "Phone":
				$this->m_iPhone = $p_vValue;
				break;

				case "Email":
				$this->m_sEmail = $p_vValue;
				break;

				case "Password":
				$this->m_sPassword = md5($p_vValue.$this->m_sSalt);
				break;

				case "Passwordcheck":
				$this->m_sPasswordcheck = md5($p_vValue.$this->m_sSalt);
				break;
			}
		}

		public function __get($p_sProperty)
		{
			switch($p_sProperty)
			{
				case 'Firstname':
					return $this->m_sFirstname;
				break;

				case 'Lastname':
					return $this->m_sLastname;
				break;

				case 'Phone':
					return $this->m_iPhone;
				break;

				case 'Email':
					return $this->m_sEmail;
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
			if ($this->m_sPassword === $this->m_sPasswordcheck)
			{
				$db = new Db();
			
				$sql = "insert INTO customers (Email, Password, Firstname, Lastname, Phone)
				VALUES(
					'".$this->m_sEmail."',
					'".$this->m_sPasswordcheck."',
					'".$this->m_sFirstname."',
					'".$this->m_sLastname."',
					'".$this->m_iPhone."');";
				$db->conn->query($sql);
				header("Location:Index.php");
			} else
			{
				throw new Exception("Wachtwoorden komen niet overeen");
				
			}
		}

		public function Select($email)
		{
			$db = new Db();
			$sql = "SELECT * FROM customers WHERE Email = '".$email."';";
			$select = $db->conn->query($sql);
			$numberofRows = $select->num_rows;
			
			if($numberofRows === 1)
			{
				while ($oneSelect = $select->fetch_assoc())
				{	
					return $oneSelect;
				}
			} else {
				throw new Exception("Client not found");	
			}
			
		}

		public function SelectOne($id)
		{
			$db = new Db();
			$sql = "SELECT * FROM customers WHERE ID_Customer = '".$id."';";
			$select = $db->conn->query($sql);
			$numberofRows = $select->num_rows;
			
			if($numberofRows === 1)
			{
				while ($oneSelect = $select->fetch_assoc())
				{	
					return $oneSelect;
				}
			} else {
				throw new Exception("Client not found");	
			}
		}
	}
 ?>