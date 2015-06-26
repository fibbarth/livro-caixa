<?php
class Usuario
{
	private $id;
	private $nome;
	private $email;
	private $data_criacao;
	
	private $db;
	private $table = 'lc_usuario';
	
	public function __construct($db = false)
	{
		$this->db = $db;
	}
	public function load()
	{
		$query = "SELECT * FROM {$this->table} WHERE id = :id";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':id', $this->id, PDO::PARAM_INT); 
		if( $stmt->execute() ){
			$response = $stmt->fetchObject();
			if( is_object($response) ){
				foreach( $response as $key => $value ){
					$this->$key = $value;
				}
			}
		}
	}
	
	public function __set($name, $value)
	{
		$this->$name = $value;
	}
	
	public function __get($name)
	{
		return $this->$name;
	}
	
	public function save()
	{
		$attr = $this->getAttributes();
		if( $this->id > 0 )
		{
			$this->update($attr);
		}else{
			$this->insert($attr);
		}
	}
	
	private function update($attr)
	{
		foreach( array_keys($attr) as $v)
		{
			if( $v === 'id' ){
				continue;
			}
			$fields[] = "`{$v}`=:{$v}";
		}
		$fields = implode(', ', $fields);
		$query = "UPDATE {$this->table} SET {$fields} WHERE id = :id";
		$stmt = $this->db->prepare($query);
		foreach( array_keys($attr) as $v )
		{
			$stmt->bindParam(':'.$v, $this->$v);
		}
		
		return $stmt->execute();
	}
	
	private function insert($attr)
	{
		$fields = sprintf( "`%s`", implode('`,`', array_keys($attr)));
		$values = sprintf( ":%s", implode(', :', array_keys($attr)));
		
		$query = "INSERT INTO {$this->table} ({$fields}) VALUES ({$values}) ";
		$stmt = $this->db->prepare($query);
		foreach( array_keys($attr) as $v ){
			if( 'data_criacao' == $v ){
				$this->$v = date('Y-m-d H:i:s');
			}
			$stmt->bindParam(':'.$v, $this->$v);
		}
		return $stmt->execute();
	}
	
	public function delete()
	{
		$query = "DELETE FROM {$this->table} WHERE id=:id";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':id', $this->id);
		return $stmt->execute();
	}
	
	public function setUserLogin($email, $password)
	{
		$query = "SELECT id FROM {$this->table} WHERE email=:email AND password=:password";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $password);
		$stmt->execute();
		$response = $stmt->fetchObject();
		$this->id = $response->id;
		$this->load();
		
		return true;
	}
	private function getAttributes()
	{
		$attr = get_object_vars($this);
		unset($attr['db']);
		unset($attr['table']);
		return $attr;
	}
}	