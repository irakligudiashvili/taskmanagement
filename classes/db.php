<?php

class DB {
    protected $host = "localhost";
    protected $uname = "root";
    protected $pwd = "";
    protected $db = "taskmanagement";
    protected $conn = "";
    protected $pdo = "";
    public $email = "";

    public function db_connect(){
        try {
            $conn = new PDO("mysql:host=$this->host;dbname=$this->db", $this->uname, $this->pwd);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
            echo "Connected successfully";
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
    }

    public function registerUser($userData){
        $conn = $this->db_connect();

        $pass = password_hash($userData["password"], PASSWORD_BCRYPT);

        $stmt = $conn->prepare("INSERT INTO users (department_id, authority_id, name, surname, gender, email, password, img)
        VALUES(:department_id, :authority_id, :name, :surname, :gender, :email, :password, :img)");

        $stmt->bindParam(':department_id', $userData["department"]);
        $stmt->bindParam(':authority_id', $userData["rank"]);
        $stmt->bindParam(':name', $userData["name"]);
        $stmt->bindParam(':surname', $userData["surname"]);
        $stmt->bindParam(':gender', $userData["gender"]);
        $stmt->bindParam(':email', $userData["email"]);
        $stmt->bindParam(':password', $pass);
        $stmt->bindParam(':img', $userData["img"]);

        try{
            var_dump($stmt->execute());
        }catch (PDOException $e){
            var_dump($e->getMessage());
        }

        header("location: ../index.php");
    }

    public function loginUser($userData){
        $conn = $this->db_connect();
        $this->email = $userData["email"];

        $stmt = $conn->prepare("SELECT id, department_id, authority_id, name, surname, gender, email, password FROM users WHERE email='$this->email'");
        $stmt->execute();

        if($stmt->rowCount() === 1){
            $user = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $user = $stmt->fetch();

            if(password_verify($userData["password"],$user["password"])){
                $this->saveUserData($user["id"],$user["name"], $user["surname"], $user["email"]);
            }

        }

    }

    public function saveUserData($userID, $userName, $userSurname, $userEmail){
        $keySting = time().$userID.$userName.$userSurname.$userEmail;
        $authKey = md5($keySting);

        $this->setAuthKeySession($authKey, $userID);
        $this->insertAuthKey($authKey,$userID);
    }

    public function setAuthKeySession($authKey, $userID){
        $_SESSION["user"] = [];
        $_SESSION["user"]["id"] = $userID;
        $_SESSION["user"]["authKey"] = $authKey;
    }

    public function insertAuthKey($authKey, $userID){
        $conn = $this->db_connect();

        $sql = "UPDATE users SET verify_key='$authKey' WHERE id=$userID limit 1";

        $stmt = $conn->prepare($sql);

        $stmt->execute();

        $conn = null;
    }

    public function checkUserAuth(){
        $userID = $_SESSION["user"]["id"];
        $sessionAuthKey = $_SESSION["user"]["authKey"];

        $conn = $this->db_connect();

        $stmt = $conn->prepare("SELECT id, verify_key FROM users WHERE id='$userID'");
        $stmt->execute();

        if($stmt->rowCount() === 1){
            $user = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $user = $stmt->fetch();

            if($user["verify_key"]===$sessionAuthKey && $userID === $user["id"]){
                return true;
            }else{
                return false;
            } 
        }

    }

    public function logout(){
        $userID = $_SESSION["user"]["id"];
        $sessionAuthKey = $_SESSION["user"]["AuthKey"];

        $conn = $this->db_connect();

        $stmt = $conn->prepare("UPDATE users SET verify_key = 'NULL' WHERE id='$userID'");
        $stmt->execute();
    }

    public function getUserList(){
        $conn = $this->db_connect();

        $stmt = $conn->prepare("SELECT department_id, authority_id, name, surname, gender, email FROM users");
        $stmt->execute();

        $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res = $stmt->fetchAll();

        return $res;
    }

    public function getIT(){
        $conn = $this->db_connect();

        $stmt = $conn->prepare("SELECT id, authority_id, department_id, name, surname, gender, email FROM users WHERE department_id=1");
        $stmt->execute();

        $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res = $stmt->fetchAll();

        return $res;
    }

    public function getDeveloper(){
        $conn = $this->db_connect();

        $stmt = $conn->prepare("SELECT id, authority_id, department_id, name, surname, gender, email FROM users WHERE department_id=2");
        $stmt->execute();

        $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res = $stmt->fetchAll();

        return $res;
    }

    public function getMarketing(){
        $conn = $this->db_connect();

        $stmt = $conn->prepare("SELECT id, authority_id, department_id, name, surname, gender, email FROM users WHERE department_id=3");
        $stmt->execute();

        $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res = $stmt->fetchAll();

        return $res;
    }

    public function getAccounting(){
        $conn = $this->db_connect();

        $stmt = $conn->prepare("SELECT id, authority_id, department_id, name, surname, gender, email FROM users WHERE department_id=4");
        $stmt->execute();

        $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res = $stmt->fetchAll();

        return $res;
    }

    public function getCurrentuser($key){
        $conn = $this->db_connect();

        $stmt = $conn->prepare("SELECT id, department_id, authority_id, name, surname, gender, email, created_at, img FROM users WHERE verify_key='$key'");
        $stmt->execute();

        $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res = $stmt->fetchAll();

        return $res;
    }

    public function updatePFP($img, $key){
        $conn = $this->db_connect();

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE users SET img='$img' WHERE verify_key='$key'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

    public function addTask($userData, $department){
        $conn = $this->db_connect();

        $stmt = $conn->prepare("INSERT INTO tasks (name, description, assigned_to, assigned_by, deadline, department_id)
        VALUES(:name, :description, :assigned_to, :assigned_by, :deadline, :department_id)");

        $stmt->bindParam(':name', $userData["taskName"]);
        $stmt->bindParam(':description', $userData["taskDesc"]);
        $stmt->bindParam(':assigned_to', $userData["taskEmployee"]);
        $stmt->bindParam(':assigned_by', $userData["assignedBy"]);
        $stmt->bindParam(':deadline', $userData["deadline"]);
        $stmt->bindParam(':department_id', $department);

        try{
            var_dump($stmt->execute());
        }catch (PDOException $e){
            var_dump($e->getMessage());
        }

        header("location: ../addTask.php");
    }

    public function getTask($user){
        $conn = $this->db_connect();

        $stmt = $conn->prepare("SELECT id, name, description, assigned_to, assigned_by, created_at, deadline, completed, completed_date, link FROM tasks WHERE assigned_to='$user'");
        $stmt->execute();

        $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res = $stmt->fetchAll();

        return $res;
    }

    public function getName($id){
        $conn = $this->db_connect();

        $stmt = $conn->prepare("SELECT name, surname FROM users WHERE id='$id'");
        $stmt->execute();

        $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res = $stmt->fetchAll();

        return $res;
    }

    public function getUserTask($email){
        $conn = $this->db_connect();

        $stmt = $conn->prepare("SELECT tasks.id, tasks.completed, tasks.link, tasks.assigned_to, tasks.assigned_by, tasks.name, tasks.description, tasks.deadline, users.email, users.name, users.surname FROM tasks INNER JOIN users ON tasks.assigned_to=users.id WHERE users.email = '$email';");
        $stmt->execute();

        $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res = $stmt->fetchAll();

        return $res;
    }

    public function updateUser($userData, $email){
        $conn = $this->db_connect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE users SET name='$userData[name]', surname='$userData[surname]', email='$userData[email]', gender='$userData[gender]', department_id='$userData[department]', authority_id='$userData[rank]' WHERE email='$email'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        header("Location: ../department.php");
    }

    public function resetPassword($email){
        $conn = $this->db_connect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $pass = password_hash('123', PASSWORD_BCRYPT);

        $sql = "UPDATE users SET password='$pass' WHERE email='$email'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

    public function completeTask($userData){
        $conn = $this->db_connect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE tasks SET completed='1', link='$userData[link]', completed_date='$userData[time]' WHERE id='$userData[id]'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

    public function getCompletedTasks(){
        $conn = $this->db_connect();
        
        $stmt = $conn->prepare("SELECT * FROM tasks WHERE completed='1'");
        $stmt->execute();

        $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res = $stmt->fetchAll();

        return $res;
    }

    public function getCompletedTasksIT(){
        $conn = $this->db_connect();
        
        $stmt = $conn->prepare("SELECT * FROM tasks WHERE completed='1' AND department_id='1'");
        $stmt->execute();

        $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res = $stmt->fetchAll();

        return $res;
    }

    public function getCompletedTasksDeveloper(){
        $conn = $this->db_connect();
        
        $stmt = $conn->prepare("SELECT * FROM tasks WHERE completed='1' AND department_id='2'");
        $stmt->execute();

        $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res = $stmt->fetchAll();

        return $res;
    }

    public function getCompletedTasksMarketing(){
        $conn = $this->db_connect();
        
        $stmt = $conn->prepare("SELECT * FROM tasks WHERE completed='1' AND department_id='3'");
        $stmt->execute();

        $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res = $stmt->fetchAll();

        return $res;
    }

    public function getCompletedTasksAccounting(){
        $conn = $this->db_connect();
        
        $stmt = $conn->prepare("SELECT * FROM tasks WHERE completed='1' AND department_id='4'");
        $stmt->execute();

        $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res = $stmt->fetchAll();

        return $res;
    }

    public function getCompletedTasksSpec($id){
        $conn = $this->db_connect();
        
        $stmt = $conn->prepare("SELECT * FROM tasks WHERE completed='1' AND id='$id'");
        $stmt->execute();

        $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res = $stmt->fetchAll();

        return $res;
    }

    public function changePassword($userData,$id){
        $conn = $this->db_connect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $pass = password_hash($userData["password"], PASSWORD_BCRYPT);

        $sql = "UPDATE users SET password='$pass' WHERE id='$id'";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

    public function deleteUser($email){
        $conn = $this->db_connect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM users WHERE email='$email'";
        $conn->exec($sql);
    }

    public function getTaskName($id){
        $conn = $this->db_connect();

        $stmt = $conn->prepare("SELECT name FROM tasks WHERE id='$id'");
        $stmt->execute();

        $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res = $stmt->fetchAll();

        return $res;
    }

    public function getDepartment($id){
        $conn = $this->db_connect();

        $stmt = $conn->prepare("SELECT department_id FROM users WHERE id='$id'");
        $stmt->execute();

        $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res = $stmt->fetchAll();

        return $res;
    }
}