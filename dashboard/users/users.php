<?php
session_start();
class Users
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function Register($name,   $email, $phone, $password)
    {
        if (isset($name) && isset($email) && isset($phone) && isset($password)) {
            $sqll = "SELECT * FROM users WHERE email=$email";
            $resultt =  $this->db->con->query($sqll);
            if ($resultt->num_rows > 0) {
                echo "<script>alert('the email already exist')</script>";
            } else {
                $this->db->con->query("INSERT INTO users(name, email,phone,password) VALUES($name,   $email,$phone,$password)");
                header("Refresh:0");
                $sqlll = "SELECT * FROM users WHERE email=$email AND password=$password";
                $resulttt =  $this->db->con->query($sqlll);
                if ($resulttt->num_rows > 0) {
                    $row = mysqli_fetch_assoc($resulttt);
                    setcookie('id', $row['id'], time() + (86400 * 30), "/");
                    setcookie('username', $row['name'], time() + (86400 * 30), "/");

                    if (isset($_COOKIE['id']) && isset($_COOKIE['name'])) {
                        $_SESSION['user_id'] = $_COOKIE['id'];
                        $_SESSION['username'] = $_COOKIE['name'];
                    } else {
                        $_SESSION['user_id'] = $row['id'];
                        $_SESSION['username'] = $row['name'];
                    }


                    header("Location: index.php");
                }
            }
        }
    }
    public function addUser($name,  $email, $phone, $password)
    {
        if (isset($name) && isset($email) && isset($phone) && isset($password)) {
            $sqll = "SELECT * FROM users WHERE email=$email";
            $resultt =  $this->db->con->query($sqll);
            if ($resultt->num_rows > 0) {
                echo "<script>alert('the phone already exist')</script>";
            } else {
                $this->db->con->query("INSERT INTO users(name, email,phone,password) VALUES($name,   $email,$phone,$password)");

            }
        }
    }
    public function signIn($email, $password)
    {
        if ($this->db->con != null) {
            if (isset($email) && isset($password)) {
                $sql = "SELECT * FROM users WHERE email=$email AND password=$password";
                $result =  $this->db->con->query($sql);
                if ($result->num_rows > 0) {
                    $row = mysqli_fetch_assoc($result);

                    setcookie('id', $row['id'], time() + (86400 * 30), "/");
                    setcookie('username', $row['name'], time() + (86400 * 30), "/");

                    if (isset($_COOKIE['id']) && isset($_COOKIE['name'])) {
                        $_SESSION['user_id'] = $_COOKIE['id'];
                        $_SESSION['username'] = $_COOKIE['name'];
                    } else {
                        $_SESSION['user_id'] = $row['id'];
                        $_SESSION['username'] = $row['name'];
                    }

                    header("Location: index.php");

                    // header("Location: dashboard/dashboard.php");
                } else {
                    echo "<script>alert('Woops! email or Password is Wrong.')</script>";
                }
            }
        }
    }
    public function forgetPassword($phone, $email, $name, $governorate)
    {
        if ($this->db->con != null) {
            if (isset($phone) && isset($email) && isset($name) && isset($governorate)) {
                $sql = "SELECT * FROM users WHERE phone=$phone AND email=$email AND name=$name AND governorate=$governorate";
                $result =  $this->db->con->query($sql);
                if ($result->num_rows > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['username'] = $row['name'];
                    header("Location: updatePassword.php");

                    // header("Location: dashboard/dashboard.php");
                } else {
                    echo "<script>alert('Woops! something is Wrong.')</script>";
                }
            }
        }
    }
    public function getData()
    {
        $result = $this->db->con->query("SELECT * FROM users");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function deleteUser($item_id = null)
    {
        if ($item_id != null) {

            $this->db->con->query("DELETE FROM users WHERE id={$item_id}");
        }
    }
    public function updateUser($item_id = null, $name,  $email, $phone)
    {
        if ($item_id != null) {
            $this->db->con->query("UPDATE users SET name={$name}, email={$email}, phone={$phone}  WHERE id={$item_id}");
        }
    }
    public function updateUserPassword($item_id = null, $password)
    {
        if ($item_id != null) {
            $this->db->con->query("UPDATE users SET password={$password} WHERE id={$item_id}");
            header("Location: index.php");
        }
    }
    public function updateUserPassword2($item_id = null, $password)
    {
        if ($item_id != null) {
            $this->db->con->query("UPDATE users SET password={$password} WHERE id={$item_id}");
        }
    }
}
