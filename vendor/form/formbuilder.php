<?php

namespace form;

class formbuilder
{
    private $result;

    public function __construct($action = "", $method = "", $class = "")
    {
        $this->result .= "<form class='$class' method='$method' action='$action'>";
        return $this;
    }

    private function test($arg, $text)
    {
        return !empty($arg) && ($arg == $text) ? "$text=$text" : "";
    }

    public function label($for, string $text)
    {
        $this->result .= "<label type='$for'>$text</label>";
        return $this;
    }

    public function input($type, $id, $name, $placeholder = "", $value = "", $size = "", $class = "", $required = "")
    {
        $b = $this->test($required, 'required');
        $c = ($type == "submit") ? "" : ("placeholder=$placeholder");
        $this->result .= "<input type='$type' id ='$id' class='$class' name ='$name' size ='$size' $b $c value='$value'>";
        return $this;
    }

    public function checkradio($type, $id, $name, $value, $checked = "", $required = "", $class = "")
    {
        $b = $this->test($checked, 'checked');
        $c = $this->test($required, 'required');
        $this->result .= "<input type='$type' id ='$id' class='$class' name ='$name' value='$value'" . $b . $c . ">";
        return $this;
    }

    public function file($id, $name, array $accept, $required = "")
    {
        $b = $this->test($required, 'required');
        $result = [];
        foreach ($accept as $val) {
            array_push($result, $val);
        }

        $this->result .= "<input type='file' id ='$id' name ='$name' accept=" . implode(', ', $result) . $b . ">";
        return $this;
    }

    public function textarea($id, $name, $placeholder = "", $rows = "", $cols = "", $class = "", $required = "")
    {
        $b = $this->test($required, 'required');
        $this->result .= "<textarea id ='$id' class='$class' name ='$name' rows='$rows' cols='$cols' placeholder='$placeholder'" . $b . "></textarea>";
        return $this;
    }

    public function selectOpt($id, $name, array $option, $required = "")
    {
        $b = $this->test($required, 'required');
        $result = [];
        foreach ($option as $val) {
            array_push($result, "<option>" . $val . "</option>");
        }
        $this->result .= "<select id ='$id' name ='$name' $b >" . implode("", $result) . "</select>";
        return $this;
    }

    public function fieldset($type, $legend, array $array, $name)
    {
        $table = [];
        foreach ($array as $val) {
            array_push($table, "<input type='$type' id='$val' name='$name'>
            <label for='$val'>" . ucfirst($val) . "</label><br>");
        }
        $this->result .= "<fieldset><legend>" . $legend . "</legend>" . implode("", $table) . "</fieldset>";
        return $this;
    }

    public function button($class, $value)
    {
        $this->result .= "<button type='button' class='$class'>$value</button>";
        return $this;
    }

    public function generate()
    {
        return $this->result;
    }

    public function destruct()
    {
        return "</form>";
    }
}
