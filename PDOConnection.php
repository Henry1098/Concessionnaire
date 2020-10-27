<?php


class PDOConnectionHelper{
    
    private $host;
    private $dbname;
    private $user;
    private $passwd;

    public function ___construct($host,$dbname,$user,$passwd)
    {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->user = $user;
        $this->passwd = $passwd;
        connectDB();
    }

    private function connectDB()
    {
        try{
            $conn = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname."",$this->user,$this->passwd);
           // echo "Connexion à la DB réussi";
        }catch(PDOException $e)
        {
            print "Erreur :".$e->getMessage();
        }
    

    } 
    
    

}
?>

?>