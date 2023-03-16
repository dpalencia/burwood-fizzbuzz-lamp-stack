<?php
class FizzbuzzService {
    public $conn;

    function __construct() {
        $this->conn = mysqli_connect("mysql:3306", "lamp", $_ENV['MYSQL_ROOT_PASSWORD'], 'lamp');
    }
    function get_top_3() {
        $sql = "
            SELECT fizzbuzz_number, count 
            FROM numbers
            ORDER BY count DESC
            LIMIT 3;
        ";
        return $this->conn->query($sql);
    }

    function increment_number($number) {
        $sql = "
            INSERT INTO numbers
            (fizzbuzz_number, count) VALUES ({$number}, 1)
            ON DUPLICATE KEY
            UPDATE count = count + 1;
        ";
        $this->conn->query($sql);
    }
}
