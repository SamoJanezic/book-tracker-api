<?php
class Database
{
    protected $connection = null;
    public function __construct()
    {
        try {
            $this->connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);

            if ( mysqli_connect_errno()) {
                throw new Exception("Could not connect to database.");
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public function select($query = "" , $params = [])
    {
        try {
            $stmt = $this->executeStatement( $query , $params );
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            return $result;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
        return false;
    }
    public function delete($query = "", $params = [])
    {
        try {
            $stmt = $this->executeStatement($query, $params);
            $stmt->close();
            return "Entry deleted successfully";
        } catch(Exception $e) {
            throw New Exception($e->getMessage());
        }
        return false;
    }
    public function insert($query = "", $params = [])
    {
        try {
            $stmt = $this->executeStatement($query, $params);
            $stmt->close();
            return 'Entry added successfully';
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public function update($query = "", $params = [])
    {
        try {
            $stmt = $this->executeStatement($query, $params);
            $stmt->close();
            return 'Entry updated successfully';
        } catch(Exception $e) {
            throw New Exception($e->getMessage());
        }
    }
    private function executeStatement($query = "" , $params = [])
    {
        try {
            // var_dump($query, $params);
            // die;
            $stmt = $this->connection->prepare( $query );
            if($stmt === false) {
                throw New Exception("Unable to do prepared statement: " . $query);
            }
            if( $params ) {
                // var_dump($params);
                // die;
                $stmt->bind_param(...$params);
            }
            $stmt->execute();
            return $stmt;
        } catch(Exception $e) {
            throw New Exception($e->getMessage());
        }
    }
}