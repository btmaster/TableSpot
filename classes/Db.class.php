<?php
	class Db
	{
		private $m_sHost = "localhost";
		private $m_sUser = "root";
		private $m_sPassword = "test";
		private $m_sDatabase = "tablespot";
		public $conn;


		public function __construct()
		{
			$this->conn = new mysqli($this->m_sHost, $this->m_sUser, $this->m_sPassword, $this->m_sDatabase);
		}
	}
?>