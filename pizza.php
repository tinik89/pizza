<?php
require_once "pizzaAbstract.php";
require_once "connect.php";


class pizza extends pizzaAbstract
{
    public function __construct($id)
    {
        $db = connect::Connection();
        $stmt = $db->prepare("SELECT * FROM pizza WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();

       $pizzaArr = $result->fetch_array(MYSQLI_ASSOC);
       $this->name = $pizzaArr['name'];
    }
    static function getAllPizza()
    {
        // TODO: Implement getAllPizza() method.
        $db = connect::Connection();
        $stmt = $db->prepare("SELECT * FROM pizza");
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

}