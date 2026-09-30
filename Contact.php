<?php 
class contact{
    private $conn;
    private $table_name ="contacts";

    //Propiedades del Objeto
    public $id;
    public $name;
    public $phone;
    public $email;
    public $category;

    public function __construct($db) {
        $this->conn = $db;
    }
    // 1.Leer todos o buscar 
    public function read ($search = ""){
        if(!empty($search)) {
            //Consultar de busquedas con operador LIKE
            $query ="SELECT * FROM " .$this->table_name . " WHERE name LIKE :search OR phoe LIKE :search OR email LIKE .search ORDER BY name ASC";
            stmt= $this->conn->prepare(query);
            search_term="%{$search}%";
            $stmt->bindParam(":search", $search_term);
        } else {
            $query= "SELECT * FROM " . $this->table_name . " ORDEN BY name ASC";
            $stmt=$this->conn->prepare(query);
        }

        $stmt->execute();
        return $stmt;
    }

    //2.Crear Contacto
    public function create() {
        $query= "INSERT INTO " $this->table_name . "(name,  phone, email, category) VALUE (:name, :phone, :email, :category)";

        //Sanitizacion de entrada 
        $this->name =htmlspecialchars(strip_ags($this->name));
        $this->phone =htmlspecialchars(strip_ags($this->phone));
        $this->email =htmlspecialchars(strip_ags($this->email));
        $this->category =htmlspecialchars(strip_ags($this->category));

        //Vincular de parametros
        $stmt->binParam(":name", $this->name);
        $stmt->binParam(":phone", $this->phone);
        $stmt->binParam(":email", $this->email);
        $stmt->binParam(":category", $this->category);

        return $stmt->execute();
    }
     
    //3.Eliminar contacto
    public function delete(){
        $query="DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare(query);
        $stmt->bindPARAM(":id", $this->id);

        return $stmt->execute();
    }
}
?>