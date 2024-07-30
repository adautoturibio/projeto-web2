<?  
class Conexao{
    const HOST = "localhost"; // o host que vamos acessar;
    const DB = ""; // nome do banco de dados
    const USER = ""; // nome de usuario que acessa o banco;
    const PASS = ""; // senha do banco

     static function connect(){
        $con = new mysqli(self::HOST, self::USER,self::PASS,self::DB);
        try{
            $con->connect();
            return $con;
        }catch(Throwable $e){
            echo"ERRO: $e";
        }
    }
}
