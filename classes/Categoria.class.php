<?php
class Categoria
{
	private $id;
	private $nome = 'Nenhuma';
	private $data_criaco;
	private $user_id;
	
	private $db;
	private $table = 'lc_categoria';
	
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
		echo $stmt->execute();
	}
	
	public function delete()
	{
		$query = "DELETE FROM {$this->table} WHERE id=:id";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':id', $this->id);
		return $stmt->execute();
	}

	private function getAttributes()
	{
		$attr = get_object_vars($this);
		unset($attr['db']);
		unset($attr['table']);
		return $attr;
	}
	
	// Métodos globais pensar em refatorar no futuro
	
	public function getTotal( $tipo = 'receita', $anoMes = false )
	{
		$condicao = '';
		if( $anoMes ){
			$condicao = "AND MONTH(data_vencimento) = :mes"
			. " AND YEAR(data_vencimento) = :ano"; 
		}
		$tipos = array( 'despesa' => 0, 'receita' => 1);
		$query = "SELECT SUM(valor) as total FROM {$this->table} WHERE tipo = :tipo {$condicao}";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':tipo', $tipos[$tipo]);
		
		if( $condicao ){
			list($ano, $mes) = explode('-', $anoMes);
			$stmt->bindParam(':ano', $ano);
			$stmt->bindParam(':mes', $mes);
		}
		if( $stmt->execute() ){
			$response = $stmt->fetchObject();
			return $response->total;
		}
	}
	
	
	public function getMovimentos( $anoMes = false )
	{
		$condicao = '';
		if( $anoMes ){
			$condicao = "WHERE MONTH(data_vencimento) = :mes"
			. " AND YEAR(data_vencimento) = :ano";
		}
		
		$query = "SELECT * FROM {$this->table} {$condicao}";
		$stmt = $this->db->prepare($query);
		
		if( $condicao ){
			list($ano, $mes) = explode('-', $anoMes);
			$stmt->bindParam(':ano', $ano);
			$stmt->bindParam(':mes', $mes);
		}
		
		if( $stmt->execute() ){
			return $stmt->fetchAll(PDO::FETCH_CLASS, 'stdClass');
		}
	}
}	