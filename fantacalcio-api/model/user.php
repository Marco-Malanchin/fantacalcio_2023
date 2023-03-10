<?php

require __DIR__ . "/base.php";
require __DIR__ . " /../common/errorHandler.php";

set_exception_handler("errorHandler::handleException");
set_error_handler("errorHandler::handleError");

class User extends BaseController
{
    public function getUser($id)
    {
        $sql = sprintf(
            "SELECT nickname, email
            FROM user
            WHERE id = %d;",
            $this->conn->real_escape_string($id)
        );

        $result = $this->conn->query($sql);

        $this->SendOutput($result, JSON_OK);
    }

    public function getArchiveUser(){
        $sql = "select u.id ,u.name, u.surname, u.email
                from `user` u
                where u.active=1;"; 
        
        $result = $this->conn->query($sql);
        
        $this->SendOutput($result, JSON_OK);
    }

    protected function getUserFromEmail($email)
    {

        $sql = sprintf(
            "SELECT id
        FROM `user` 
        WHERE email = '%s' ",
            $this->conn->real_escape_string($email)
        );

        $result = $this->conn->query($sql);

        return $result;
    }

    public function getLastUserIdFromNameAndSur($name, $surname)
    {
        $sql = sprintf(
            "SELECT id
        FROM `user`
        ORDER BY id DESC
        WHERE name = '%s' and surname = '%s'
        LIMIT 1",
            $this->conn->real_escape_string($name),
            $this->conn->real_escape_string($surname)
        );

        $result = $this->conn->query($sql);
    }


    public function deleteUser($id)
    {
        $sql = sprintf(
            "UPDATE user 
            SET active = 0 
            WHERE id = %d",
            $this->conn->real_escape_string($id)
        );

        $result = $this->conn->query($sql);
        return $result;
    }
    public function login($email, $password)
    {
        $sql = sprintf("SELECT email, password, id
        FROM `user`
        where 1=1 ");
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            if ($this->conn->real_escape_string($email) == $this->conn->real_escape_string($row["email"]) && $this->conn->real_escape_string($password) == $this->conn->real_escape_string($row["password"])) {
                return $this->conn->real_escape_string($row["id"]);
            }
        }

        return false;
    }

    public function changePassword($email, $password, $newPassword)
    {
        if ($this->login($email, $password) == false) {
            return false;
        }

        $sql = sprintf(
            "UPDATE user 
            SET password = '%s'
            WHERE email = '%s' AND password = '%s'",
            $this->conn->real_escape_string($newPassword),
            $this->conn->real_escape_string($email),
            $this->conn->real_escape_string($password)
        );

        $result = $this->conn->query($sql);

        return $result;
    }
    public function registration($nickname, $email, $password)
    {

        $sql = sprintf(
            "INSERT INTO user ( nickname,email, password)
        VALUES ('%s', '%s', '%s')",
             $this->conn->real_escape_string($nickname),
            $this->conn->real_escape_string($email),
            $this->conn->real_escape_string($password)
        );

        $result = $this->conn->query($sql);
        return $result;
    }

}
?>