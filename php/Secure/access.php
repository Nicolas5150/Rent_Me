<?php
// Access functions
// Declare class to access this php file
class access{
    // Global connection variables
    var $serverHost = null;
    var $username = null;
    var $password = null;
    var $dbName = null;
    var $connection = null;
    var $result = null;

    // Construction function for class
    function __construct($dbhost, $dbuser, $dbpass, $dbname){
        // Use oop procedure to declare instance of global variables
        $this->serverHost = $dbhost;
        $this->username = $dbuser;
        $this->password = $dbpass;
        $this->dbName = $dbname;
    }

    // Connection to server function
    public function connect(){
        // This will store our connection to the database as a var called connection
        $this->connection = new mysqli($this->serverHost, $this->username, $this->password, $this->dbName);

        if(mysqli_connect_errno()){
            echo"Could not connect to the database";
        }
        else {
            // Allow all languages
            $this->connection->set_charset("utf8");
        }
    }

    // Dissonnection to server function
    public function dissconnect(){
        if($this->connection != null) {
            $this->connection->close();
        }
    }

    // Insert user detial to the database
    public function registerUser($email, $password) {
        // INSERT INTO users SET   This is SQL syntax and "users" in the table name
        $sql ="INSERT INTO Rent_Me SET username =?, password=?, tablename=?";
        // Store query result in statement var
        $statement = $this->connection->prepare($sql);

        //Check for statment
        if(!$statement){
            throw new Exception($statement->error);
        }
        // Bind as strings with all 2 variables - prepairing
        // clean email for table name (which has certian parameters)
        $tableName = "T_".$email;
        $statement->bind_param("sss", $email, $password, $tableName);

        $returnValue = $statement->execute();

        // Create a new table in the database corresponding to the new user created.
        // This will be how the users table can reach its corresponding user table (relation)
        // WILL NEED TO CLEAN EMAIL TO ALLOW IT TO BE A TABLE NAME
        $sql = "CREATE TABLE $tableName (
          id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          username VARCHAR(60) NOT NULL,
          password VARCHAR(60) NOT NULL,
          bookcount VARCHAR(60) NOT NULL,
          address VARCHAR(100) NOT NULL
        )";


        // If the new table is created properly return true to the call.
        if ($this->connection->query($sql) === TRUE) {

          // INSERT INTO this new table data from the registered users table
          // This is SQL syntax and "users" in the table name
          $sql ="INSERT INTO $tableName SET username =?, password=?";
          // Store query result in statement var
          $statement = $this->connection->prepare($sql);
          $statement->bind_param("ss", $email, $password);
          $returnValue = $statement->execute();


          //Check for statment
          if(!$statement){
              throw new Exception($statement->error);
          }

          //echo "Table MyGuests created successfully";
          return $returnValue;
        }

        else
          // echo "Error creating table: " . $this->connection->error;
          return false;
    }

    // Select user data via email in database
    public function getUser($email){
        $returnArray = null;
        // Select INTO users SET   This is SQL syntax and "users" in the table name
        // http://php.net/manual/en/function.mysql-fetch-array.php
        $sql = "SELECT * FROM Rent_Me WHERE username='".$email."'";
        // Assign result from $sql into $result var
        $result = $this->connection->query($sql);

        // If at least one result is returned from the database
        if($result != null && mysqli_num_rows($result) >= 1)
        {
            // Store all selected data in result to the $row var
            $row = $result->fetch_array(MYSQLI_ASSOC);

            if(!empty($row))
            {
                $returnArray = $row;
            }
        }
        return $returnArray;
    }

    // Select all content from the books table that holds all books.
    public function getAllBooks(){

      $sql = "SELECT * FROM Rent_Me_Books";
      // Create the query to send to the database gathering all data from it.
      $result = $this->connection->query($sql);

      // Declare an array that will hold all the contacts (from each row).
      $booksData = array();
      $i = 0;
      while($row = mysqli_fetch_assoc($result)) {
        $booksData[$i] = $row;
        $i++;
      }

      // Return the array that contains all the books with its respected data.
      return $booksData;
    }

    // Select all from the users table that is the same genere as requested.
    public function getGenere($genere){
        $returnArray = null;
        $sql = "SELECT * FROM Rent_Me_Books WHERE tag='".$genere."'";
        // Create the query to send to the database gathering all data from it.
        $result = $this->connection->query($sql);

        // Declare an array that will hold all the contacts (from each row).
        $booksData = array();
        $i = 0;
        while($row = mysqli_fetch_assoc($result)) {
          $booksData[$i] = $row;
          $i++;
        }

        // Return the array that contains all the books with its respected data.
        return $booksData;
    }

    // Select all from the users table that is the same genere as requested.
    public function selectBook($title){
        $returnArray = null;
        $sql = "SELECT * FROM Rent_Me_Books WHERE title='".$title."'";
        // Create the query to send to the database gathering all data from it.
        $result = $this->connection->query($sql);

        // Declare an array that will hold all the contacts (from each row).
        $booksData = array();
        $i = 0;
        while($row = mysqli_fetch_assoc($result)) {
          $booksData[$i] = $row;
          $i++;
        }

        // Return the array that contains all the books with its respected data.
        return $booksData;
    }
}
?>
