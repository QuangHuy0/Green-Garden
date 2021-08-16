<?php
	class database
	{
		protected $conn = null;
		protected $host = 'localhost:3306';
		protected $user = 'root';
		protected $pass = '';
		protected $name = 'project_1';

		public function __construct()
		{
			$this->connect();
		}

		public function connect()
		{
			$this->conn= new mysqli(
				$this->host,
				$this->user,
				$this->pass,
				$this->name
			);
			if (!$this->conn) {
				echo "connection fail";
				exit();
			}
		}

		public function get($table,$condition=array())
		{
			$sql = "SELECT *FROM $table";
			if(!empty($condition)) {
				$sql.=" WHERE";
				foreach ($condition as $key => $value) {
					$sql.=" $key = '$value' AND";
				}
				$sql = trim($sql, "AND");
			}
			$query = mysqli_query($this->conn,$sql);
			$result = array();
			if ($query) {
				while ($row = mysqli_fetch_assoc($query)) {
					$result[] = $row;
				}
			}
			return $result;
		}

		public function insert($table,$data=array())
		{
			$key = array_keys($data);
			$fields = implode(",", $key);
			$value_str ='';
			foreach ($data as $key => $value) {
				$value_str.="'$value',";
			}
			$value_str = trim($value_str, ",");
			$sql = "INSERT INTO $table ($fields) VALUES ($value_str)";
			$query = mysqli_query($this->conn,$sql);
			return $query;
		}

		public function update($table,$data=array(),$condition=array())
		{
			$str = '';
			foreach ($data as $key => $value) {
				$str.="$key = '$value',";
			}
			$str = trim($str,",");
			$sql = "UPDATE $table SET $str WHERE ";
			foreach ($condition as $key => $value) {
				$sql.= "$key = '$value' AND";
			}
			$sql = trim($sql,'AND');
			$query = mysqli_query($this->conn,$sql);
			return $query;
		}

		public function delete($table,$condition=array())
		{
			$sql = " DELETE FROM $table WHERE ";
			foreach ($condition as $key => $value) {
				$sql.= "$key = '$value' AND";
			}
			$sql = trim($sql,'AND');
			$query = mysqli_query($this->conn,$sql);
			return $query;
		}

		public function get_like($table,$column,$value)
		{
			$sql = "SELECT * FROM $table ";
			$sql.="WHERE $column LIKE '%$value%'";
			$query=mysqli_query($this->conn,$sql);
			$result = array();
			if ($query) {
				while ($row = mysqli_fetch_assoc($query))
				{
					$result[] = $row;
				}
			}
			return $result;
		}

		public function get_dh($table1,$table2,$table3,$col1,$col2,$col3,$col4)
		{
			$sql = "SELECT * FROM $table1 ";
			$sql .= "INNER JOIN $table2 ON $table1.$col1=$table2.$col2 INNER JOIN $table3 ON $table1.$col3=$table3.$col4 ";
			$query = mysqli_query($this->conn,$sql);
			$result = array();

			if($query) {
				while ($row = mysqli_fetch_assoc($query)) {
					$result[] = $row;
				}
			}
			return $result;
		}

		public function get_like1($table1,$table2,$table3,$column,$value)
		{
			$sql = "SELECT * FROM $table1 INNER JOIN $table2 ON $table1.id_kh=$table2.id_kh INNER JOIN $table3 ON $table1.id_tinhtrang=$table3.id_tinhtrang ";
			$sql.="WHERE $column LIKE '%$value%'";
			$query=mysqli_query($this->conn,$sql);
			$result = array();
			if ($query) {
				while ($row = mysqli_fetch_assoc($query))
				{
					$result[] = $row;
				}
			}
			return $result;
		}

		public function get_1($table1,$table2,$col1,$col2,$condition=array())
		{
			$sql = "SELECT * FROM $table1 ";
			$sql .= "INNER JOIN $table2 ON $table1.$col1=$table2.$col2 ";
			if (!empty($condition)) {
				$sql.=" WHERE";
				foreach ($condition as $key => $value) {
					$sql.= " $key = '$value' AND";
				}
				$sql = trim($sql, "AND");
			}
			$query = mysqli_query($this->conn,$sql);
			$result = array();

			if($query) {
				while ($row = mysqli_fetch_assoc($query)) {
					$result[] = $row;
				}
			}
			return $result;
		}
	}
?>