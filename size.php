<?php


class size
{
    public $price;

    public function __construct($pizza_id, $size)
    {
        $db = connect::Connection();
        $stmt = $db->prepare("SELECT * FROM size WHERE pizza_id=? AND size=?");
        $stmt->bind_param("ii", $pizza_id, $size);
        $stmt->execute();

        $result = $stmt->get_result();

        $sizeArr = $result->fetch_array(MYSQLI_ASSOC);
        $this->price = $sizeArr['price'];
    }

    static function getAllSize()
    {
        $db = connect::Connection();
        $stmt = $db->prepare("SELECT DISTINCT size FROM size");
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_all();
    }


}