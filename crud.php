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

    public function execute($query, $params = []) {
        $stmt = $this->dbh->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }
}

// Voorbeeldgebruik:
$db = new DB('database_name', 'localhost', 'username', 'password');

// Voorbeeld van het maken van een nieuwe rij (Create)
$data = ['username' => 'JohnDoe', 'email' => 'john@example.com', 'password' => 'secret'];
$db->execute("INSERT INTO users (" . implode(', ', array_keys($data)) . ") VALUES (" . rtrim(str_repeat('?,', count($data)), ',') . ")", array_values($data));

// Voorbeeld van het lezen van gegevens (Read)
$query = "SELECT username, email FROM users WHERE id = ?";
$result = $db->execute($query, [1]);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo $row['username'] . ' - ' . $row['email'] . '<br>';
}

// Voorbeeld van het bijwerken van gegevens (Update)
$data = ['email' => 'updated@example.com'];
$db->execute("UPDATE users SET email = ? WHERE id = ?", array_values($data));

// Voorbeeld van het verwijderen van een rij (Delete)
$query = "DELETE FROM users WHERE id = ?";
$db->execute($query, [1]);
