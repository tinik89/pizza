<?php


class sauce
{
    public $name;
    public $price;

    public function __construct($id)
    {
        $db = connect::Connection();
        $stmt = $db->prepare("SELECT * FROM sauce WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();

        $sauceArr = $result->fetch_array(MYSQLI_ASSOC);
        $this->name = $sauceArr['name'];
        $this->price = $sauceArr['price'];
    }

    public static function getAllSauce()
    {
        $db = connect::Connection();
        $stmt = $db->prepare("SELECT * FROM sauce");
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}