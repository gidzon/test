<?php
namespace app;

class Bd
{

    private $host;
    private $dbName;
    private $user;
    private $pass;
    private $dbh;
    private $port;

    function __construct($host, $dbName, $user, $pass)
    {
        $this->host = $host;
        $this->dbName = $dbName;
        $this->user = $user;
        $this->pass = $pass;
    }

    public function connect()
    {
        
        try {
            $this->dbh = new \PDO("mysql:host={$this->host};dbname={$this->dbName}", $this->user, $this->pass);
        } catch(PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function insert(array $data)
    {
        try {
            $query = $this->dbh->prepare("INSERT INTO currency (name, rate) VALUES (:name, :rate)");
            $name = $data['name'][0];
            $rate = $data['rate'][0];
            $query->execute([':name' => $name, ':rate' => $rate]);
        } catch (\PDOException $th) {
            echo $th;
        }
    }

    public function select($column)
    {

        try {
            $sql = "SELECT name, rate FROM  {$column}";
            $sth = $this->dbh->prepare($sql);
            $sth->execute();
            return $sth->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $th) {
            echo $th;
        }
    }
}