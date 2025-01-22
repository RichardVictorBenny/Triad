<?php
namespace assignment;
class DatabaseTable {

    
    //default constructor to pass in table primary key , pdo ;
    public function __construct(public $pdo, public $table,public $primaryKey){

    
    }
    //find the tables in the database table , with possible order or limit
function find($orderBy= false,  $orderMethod= null,$limit= null)
    {
        $query = 'SELECT * FROM ' . $this->table;
        //if orderby is not empty it will add an order by clause
        if($orderBy){
            $query .= ' ORDER BY ' . $orderBy;
            if($orderMethod){
                $query .= ' ' . $orderMethod;
            }
        }
        if($limit){
            $query .= ' LIMIT ' . $limit;
        }
        $stmt=  $this->pdo->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    //find all tables
    function findAll()
    {
        $stmt=  $this->pdo->prepare('SELECT * FROM ' . $this->table);
        $stmt->execute();
        return $stmt->fetchAll();
        

    }   
    //insert into a table
    function insert( $value){
        $keys = array_keys($value);
        $values = implode(',', $keys);
        $valuesColons = implode(', :', $keys);
        
        $query = 'INSERT INTO ' . $this->table . ' (' . $values . ') VALUES (:' . $valuesColons . ')';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($value);

    }
    //deletes from a table
    function delete( $field, $value){
        $stmt = $this->pdo->prepare('DELETE FROM ' . $this->table . ' WHERE ' . $field . ' = :value');
        $criteria = [
            'value' => $value
        ];
        $stmt->execute($criteria);


    }
    //updates a table
    function update(  $value ){
        $keys = array_keys($value);
    
        $setClause = implode(', ', array_map(fn($key)=> "$key = :$key", $keys));
        

        $update= "UPDATE   $this->table    SET    $setClause   WHERE   $this->primaryKey= :primaryKey";
        $value['primaryKey'] = $value[$this->primaryKey];
        
        $stmt = $this->pdo->prepare($update);
        $stmt->execute($value);


    }
    //depending on if there is a value in the primary key it will insert or update the value
function save( $value ){
        if(empty($value[$this->primaryKey])){
            //if primary key is not set, insert
            unset($value[$this->primaryKey]);
        }
        try{
            $this->insert(  $value);
        }catch(\Exception $e){
            $this->update($value );
        }
        }
// used to search other tables where something happens 
    function search($foreignField, $foreignValue){
        
        $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $foreignField . ' = :value');
        $criteria = [
            'value' => $foreignValue
        ];
        $stmt->execute($criteria);

        return $stmt->fetchAll();
    }
    
    
}