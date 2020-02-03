<?php

namespace composant;

class validator
{
    private $result;
    private $errors = [];

    public function testInputLength($totest, $condition, $message)
    {
        if (strlen($totest) < $condition) {
            array_push($this->errors, $message);
        }
        return $this;
    }

    public function testMail($totest, $message)
    {
        if (preg_match("/^[a-z]*([.]|\w)[a-z]*\d*[@][a-z]*[.]\w{2,5}/", $totest) == 0) {
            array_push($this->errors, $message);
        }
        return $this;
    }

    public function testPassword($totest, $message)
    {
        if (preg_match("/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[#$%^&*()+=!?\-';,.\/{}|:<>?~]).{8,20})/", $totest) == 0) {
            array_push($this->errors, $message);
        }
        return $this;
    }

    public function inputMatchRegex($totest, $reg, $message)
    {
        if (preg_match($reg, $totest) == 0) {
            array_push($this->errors, $message);
        }
        return $this;
    }

    public function validUrl($totest, $message)
    {
        if (!filter_var($totest, FILTER_VALIDATE_URL)) {
            array_push($this->errors, $message);
        }
        return $this;
    }

    public function validTypeMime($totest, array $listmime, $filetoregister, $message)
    {
        $mime = mime_content_type($_FILES[$totest]["tmp_name"]);
        foreach($listmime as $val){
            if ($val == $mime ) {
                $name = basename($_FILES[$totest]["name"]);
                move_uploaded_file($_FILES[$totest]["tmp_name"], "$filetoregister/$name");
                return $this;
            }
        }
        array_push($this->errors, $message);
        return $this;
    }

    public function testDate($totest, $message, $message2)
    {
        if (strpos($totest, '-') !== false) {
            $test_arr = explode("-", $totest);
            if (strlen($test_arr[0]) > 2 || $test_arr[0] > 31 || strlen($test_arr[1]) > 2 || $test_arr[1] > 12 || strlen($test_arr[1]) > 4) {
                array_push($this->errors, $message);
            }
        } else {
            array_push($this->errors, $message2);
        }
        return $this;
    }


    public function isValid()
    {
        if (count($this->errors) == 0) {
            echo "<p class='text-white bg-secondary'>Nickel !!!!!</p>";
        } else {
            echo "<p class='d-inline-block rounded p-2 text-white bg-danger'>" . implode(" / ", $this->errors) . "</p>";
        }
    }
}
