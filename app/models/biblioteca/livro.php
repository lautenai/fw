<?php
class Livro {
    
    public static $_table = 'biblioteca_items';

    public static function id()
    {
    	$db = new Database();
		$db->query('SELECT id FROM biblioteca_items');
		return $db->results();
    }

    public static function find(int $id)
    {
		$db = new Database();
		$db->query('SELECT * FROM biblioteca_items WHERE id = :id');
		$db->bind(':id', $id);
		return $db->result();
    }

    public static function all()
    {
    	$db = new Database();
		$db->query('SELECT * FROM biblioteca_items');
		return $db->results();
    }

    public static function paginate($limit, $offset)
    {
    	$db = new Database();
		/*$db->query('SELECT biblioteca_items.id, biblioteca_items.titulo,biblioteca_items.autores,escolas.nome as escola_nome FROM `biblioteca_items` INNER JOIN escolas ON biblioteca_items.escola_id = escolas.id ORDER BY `id` ASC LIMIT :limit OFFSET :offset');*/
		$db->query('
			SELECT 
				biblioteca_items.id, 
				biblioteca_items.titulo,
				biblioteca_items.autores
			FROM `biblioteca_items`
			ORDER BY `id` DESC 
			LIMIT :limit 
			OFFSET :offset
		');
		$db->bind(':limit', $limit);
		$db->bind(':offset', $offset);
		return $db->results();
    }

    public static function create(array $data)
    {
    	$db = new Database();
		$keys = array_keys($data);
		$db->query('INSERT INTO biblioteca_items (' . implode( ', ', $keys ) . ') VALUES (:' . implode( ', :', $keys ) . ')');
		foreach ($data as $key => $value) {
			$db->bind(':'.$key, $value);
		}
		return $db->execute();
    }

    public static function delete(int $id)
    {
		$db = new Database();
		$db->query('DELETE FROM biblioteca_items WHERE id = :id');
		$db->bind(':id', $id);
		return $db->execute();
    }

}