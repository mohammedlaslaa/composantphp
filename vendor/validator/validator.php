<?php

namespace composant;

class validator
{
    private $result;
    private $errors = [];


    /**
     * Test the length of an input
     *
     * @param [type] $totest
     * @param [type] $condition
     * @param [type] $message
     * @return self
     */

    public function testInputLength($totest, $condition, $message):self
    {
        if (strlen($totest) < $condition) {
            array_push($this->errors, $message);
        }
        return $this;
    }

    /**
     * Validate the format of an email
     *
     * @param [type] $totest
     * @param [type] $message
     * @return self
     */

    public function testMail($totest, $message):self
    {
        if (preg_match("/^[a-z]*([.]|\w)[a-z]*\d*[@][a-z]*[.]\w{2,5}/", $totest) == 0) {
            array_push($this->errors, $message);
        }
        return $this;
    }

    /**
     * Test the password if it match with the regex predefined (Minimum une lettre majuscule, minimum un caractère spécial et minimum un chiffre)
     *
     * @param [type] $totest
     * @param [type] $message
     * @return self
     */

    public function testPassword($totest, $message):self
    {
        if (preg_match("/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[#$%^&*()+=!?\-';,.\/{}|:<>?~]).{8,20})/", $totest) == 0) {
            array_push($this->errors, $message);
        }
        return $this;
    }

    /**
     * Test the input if it match with the regex entered
     *
     * @param [type] $totest
     * @param [type] $reg
     * @param [type] $message
     * @return self
     */

    public function inputMatchRegex($totest, $regex, $message):self
    {
        if (preg_match($regex, $totest) == 0) {
            array_push($this->errors, $message);
        }
        return $this;
    }

    /**
     * Validate the url format provided by the users
     *
     * @param [type] $totest
     * @param [type] $message
     * @return self
     */

    public function validUrl($totest, $message):self
    {
        if (!filter_var($totest, FILTER_VALIDATE_URL)) {
            array_push($this->errors, $message);
        }
        return $this;
    }

    /**
     * Validate the typemime of a file provided
     *
     * @param [type] $totest
     * @param array $listmime
     * @param [type] $message
     * @return self
     */

    public function validTypeMime($totest, array $listmime, $message):self
    {
        foreach ($listmime as $val) {
            if (isset($_POST[$totest])) {
                $mime = mime_content_type($_FILES[$totest]["tmp_name"]);
                if ($val == $mime) {
                    return $this;
                }
            }
        }
        array_push($this->errors, $message);
        return $this;
    }

    /**
     * Validate the date format
     *
     * @param [type] $totest
     * @param [type] $message
     * @param [type] $message2
     * @return self
     */

    public function testDate($totest, $message, $message2):self
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

    /**
     * Launch the test
     *
     * @return boolean
     */

    public function isValid()
    {
        if (count($this->errors) == 0) {
            echo "<p class='text-white bg-secondary'>Nickel !!!!!</p>";
        } else {
            echo "<p class='d-inline-block rounded p-2 text-white bg-danger'>" . implode(" / ", $this->errors) . "</p>";
        }
    }
}
