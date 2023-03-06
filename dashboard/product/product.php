<?php

class Product
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function getData()
    {
        $result = $this->db->con->query("SELECT * FROM products");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function getLimitedData()
    {
        $result = $this->db->con->query("SELECT * FROM products LIMIT 3");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function getRecentedData()
    {
        $result = $this->db->con->query("SELECT * FROM products ORDER BY id DESC LIMIT 3");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function getProduct($item_id = null)
    {
        if (isset($item_id)) {
            $result = $this->db->con->query("SELECT * FROM products WHERE id={$item_id}  ");

            $resultArray = array();
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultArray[] = $item;
            }
            return $resultArray;
        }
    }

    public function addProduct($title, $description, $price, $image, $brand)
    {
        function img($imgg)
        {
            if (isset($imgg) && $imgg["error"] == 0) {
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png", "rar" => "application/rar", "pdf" => "application/pdf");
                $filename = rand(0, 1000) . $imgg["name"];
                $filetype = $imgg["type"];
                $filesize = $imgg["size"];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
                $maxsize = 5 * 1024 * 1024;
                if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
                if (in_array($filetype, $allowed)) {
                    if (file_exists("../../uploads/products/" . $filename)) {
                        echo $filename . " is already exists.";
                    } else {
                        $result = move_uploaded_file($imgg["tmp_name"], "../../uploads/products/" . $filename);
                    }
                } else {
                    echo "Error: There was a problem uploading your file. Please try again.";
                }
                if ($result) {
                    return "'" . $filename . "'";
                } else {
                    echo "Error: " . $imgg["error"];
                }
            }
        }
        $image = img($image);

        if (isset($title) && isset($price) && isset($description) && isset($image)) {
            $this->db->con->query("INSERT INTO products(title, description,price, image, brand) VALUES($title, $description,$price, $image, $brand)");
        }
    }

    public function deleteProduct($item_id = null)
    {
        if ($item_id != null) {
            $result = $this->db->con->query("DELETE FROM products WHERE id={$item_id}");
            return $result;
        }
    }
    public function updateProduct($item_id = null, $title, $description, $price, $image, $brand)
    {
        if ($item_id != null) {
            if (isset($image) && $image['name']) {
                function img($imgg)
                {
                    if (isset($imgg) && $imgg["error"] == 0) {
                        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png", "rar" => "application/rar", "pdf" => "application/pdf");
                        $filename = rand(0, 1000) . $imgg["name"];
                        $filetype = $imgg["type"];
                        $filesize = $imgg["size"];
                        $ext = pathinfo($filename, PATHINFO_EXTENSION);
                        if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
                        $maxsize = 5 * 1024 * 1024;
                        if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
                        if (in_array($filetype, $allowed)) {
                            if (file_exists("../../uploads/products/" . $filename)) {
                                echo $filename . " is already exists.";
                            } else {
                                $result = move_uploaded_file($imgg["tmp_name"], "../../uploads/products/" . $filename);
                            }
                        } else {
                            echo "Error: There was a problem uploading your file. Please try again.";
                        }
                        if ($result) {
                            return "'" . $filename . "'";
                        } else {
                            echo "Error: " . $imgg["error"];
                        }
                    }
                }
                $image = img($image);
                $this->db->con->query("UPDATE products SET title ={$title},description={$description},price={$price},image={$image},brand={$brand} WHERE id={$item_id}");
            } else {
                $this->db->con->query("UPDATE products SET title ={$title},description={$description},price={$price},brand={$brand} WHERE id={$item_id}");
            }
        }
    }
}
