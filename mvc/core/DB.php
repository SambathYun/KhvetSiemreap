<?php
class DB
{

    public $con;
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "khvetsiemreapdb";
    

    function __construct()
    {
        $this->con = new mysqli($this->servername, $this->username, $this->password);
        mysqli_select_db($this->con, $this->dbname);
        mysqli_query($this->con, "SET NAMES 'utf8'");
    }
    // public $con;
    // function __construct(){
    //     $this->con = mysqli_connect("localhost", "root", "");
    //     mysqli_select_db($this->con,"khvetsiemreapdb");
    //     mysqli_query($this->con, "SET NAMES 'utf8'");
    // }




}
