<?php
class Database
{
    public $pdo;
    public $table;

    public function __construct($pdo, $table){
        $this->pdo = $pdo;
        $this->table = $table;

    }
    function Find($field, $value)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' = :value';
        $stmt = $this->pdo->prepare($query);
        $criteria = ['value' => $value];
        $stmt->execute($criteria);
        $jokes = $stmt->fetchAll();
        return $jokes;
    }

    function FindAll()
    {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $jokes = $stmt->fetchAll();
        return $jokes;
    }

    /* value needs to have all the values to be added. */
    function Insert($record)
    {
        $keys = array_keys($record);
        $insertCols = implode(', ', $keys);
        $insertValues = implode(', :', $keys);
        $stmt = $this->pdo->prepare('INSERT INTO ' . $this->table . '(' . $insertCols . ') 
    VALUES (:' . $insertValues . ')');
        $stmt->execute($record);
    }

    function DeleteValue($field, $value)
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE ' . $field . ' = :value';
        $stmt = $this->pdo->prepare($query);
        $criteria = ['value' => $value];
        $stmt->execute($criteria);
    }

    /* record needs to have all the values to be added. */
    function Update($record, $primaryKey)
    {
        $params = [];
        foreach ($record as $key => $value) {
            $params[] = $key . ' = :' . $key;
        }
        $query = 'UPDATE ' . $this->table . ' SET ' . implode(' ,', $params) . ' WHERE (' . $primaryKey . ' = :primaryKey)';
        $stmt = $this->pdo->prepare($query);
        $record['primaryKey'] = $record['id'];
        $stmt->execute($record);

    }

    function Save($record, $primaryKey)
    {
        if (empty($record[$primaryKey])) {
            unset($record[$primaryKey]);
        }
        try {
            $this->Insert($record);
        } catch (Exception $exception) {
            $this->Update($record, 'id');
        }
    }
}