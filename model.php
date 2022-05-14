<?php
// database connection-
class Model
{
    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'crudoops';
    private $conn;

    function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            echo "connection failed";
        } else {
            return $this->conn;
        }
    }
    // function define for insert records-
    public function insertRecords($post)
    {
        $name = $post['name'];
        $email = $post['email'];
        $sql = "INSERT INTO users (name,email) VALUES ('$name','$email')";
        $result = $this->conn->query($sql);
        if ($result) {
            header('location:index.php?msg=ins');
        } else {
            echo "error" . $sql . "br" . $this->conn->error;
        }
    }
    public function displayRecord(){
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $data = $row;
            }
            return $data;
        }
    }
}