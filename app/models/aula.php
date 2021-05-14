<?php
class Aula extends Model {
    
    public static $_table = 'pedagogico_aulas';

    /*public static function id()
    {
    	$db = new Database();
		$db->query('SELECT id FROM pedagogico_aulas');
		return $db->results();
    }*/

    public static function find(int $id)
    {
		$db = new Database();
		$db->query('SELECT * FROM pedagogico_aulas WHERE id = :id');
		$db->bind(':id', $id);
		return $db->result();
    }

    public static function all()
    {
    	$db = new Database();
		$db->query('SELECT * FROM pedagogico_aulas');
		return $db->results();
    }

    /*public static function create(array $data)
    {
    	$db = new Database();
		$db->query('INSERT INTO pedagogico_aulas () VALUES ();');
		return $db->results();
    }*/

    public static function paginate($limit, $offset)
    {
    	$db = new Database();
		/*
		$db->query('
			SELECT 
				pedagogico_aulas.id, 
				pedagogico_aulas.competencias,
				pedagogico_aulas.inicio,
				pedagogico_aulas.fim,
				escolas.nome as escola_nome,
				turmas.nome as turma_nome,
				disciplinas.nome as disciplina_nome
			FROM `pedagogico_aulas` 
			INNER JOIN escolas ON pedagogico_aulas.escola_id = escolas.id 
			INNER JOIN turmas ON pedagogico_aulas.turma_id = turmas.id 
			INNER JOIN disciplinas ON pedagogico_aulas.disciplina_id = disciplinas.id 
			ORDER BY `id` ASC 
			LIMIT :limit 
			OFFSET :offset'
		);
		*/

		
		$db->query('
			SELECT 
				pedagogico_aulas.id, 
				pedagogico_aulas.competencias,
				pedagogico_aulas.inicio,
				pedagogico_aulas.fim,
				escolas.nome as escola_nome,
				turmas.nome as turma_nome,
				disciplinas.nome as disciplina_nome
			FROM pedagogico_aulas
			INNER JOIN escolas ON pedagogico_aulas.escola_id = escolas.id 
			INNER JOIN turmas ON pedagogico_aulas.turma_id = turmas.id 
			INNER JOIN disciplinas ON pedagogico_aulas.disciplina_id = disciplinas.id 
			WHERE pedagogico_aulas.id > :offset
			ORDER BY `id` ASC
			LIMIT :limit
		');
		
		$db->bind(':limit', $limit);
		$db->bind(':offset', $offset);
		return $db->results();
    }

}