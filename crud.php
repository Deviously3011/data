class DB {
    private $dbh;
    
    public function __construct($db, $host = "localhost", $user = "root", $pass = "") {
        try {
            $this->dbh = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function executeCRUD($operation, $table, $data = [], $condition = "") {
        switch ($operation) {
            case 'create':
                $fields = implode(', ', array_keys($data));
                $placeholders = rtrim(str_repeat('?,', count($data)), ',');
                $sql = "INSERT INTO $table ($fields) VALUES ($placeholders)";
                $params = array_values($data);
                break;
                
            case 'read':
                $fields = !empty($data) ? implode(', ', $data) : '*';
                $sql = "SELECT $fields FROM $table";
                $params = [];
                if (!empty($condition)) {
                    $sql .= " WHERE $condition";
                }
                break;
                
            case 'update':
                $setValues = implode(' = ?, ', array_keys($data)) . ' = ?';
                $sql = "UPDATE $table SET $setValues WHERE $condition";
                $params = array_merge(array_values($data), [$condition]);
                break;
                
            case 'delete':
                $sql = "DELETE FROM $table WHERE $condition";
                $params = [$condition];
                break;
                
            default:
                return false;
        }
        
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            die("Error executing query: " . $e->getMessage());
        }
    }
}
