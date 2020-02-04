<?php

namespace composant;

class formbuilder
{
    private $result;

    /**
     * Constructor of the forms by open and initialize the tag form
     *
     * @param string $action
     * @param string $method
     * @param string $class
     */

    public function __construct($action = "", $method = "", $class = "")
    {
        $this->result .= "<form class='$class' method='$method' action='$action' enctype='multipart/form-data'>";
        return $this;
    }

    /**
     * Test of required or checked if the argument and the text are right, if not, the required or the checked will be disabled 
     *
     * @param [type] $arg
     * @param [type] $text
     * @return void
     */

    private function test($arg, $text)
    {
        return !empty($arg) && ($arg == $text) ? "$text=$text" : "";
    }

    /**
     * Display one label, all of the parameters are needed
     *
     * @param [type] $for
     * @param string $text
     * @return self
     */

    public function label(string $for, string $text): self
    {
        $this->result .= "<label type='$for'>$text</label>";
        return $this;
    }

    /**
     * Display one input, only the name is required. If the type is empty, this value will be text by default.
     *
     * @param [type] $type
     * @param [type] $id
     * @param [type] $name
     * @param string $placeholder
     * @param string $value
     * @param string $size
     * @param string $class
     * @param string $required
     * @return self
     */

    public function input($name, $value = "", $type = "", $id = "", $class = "", $placeholder = "",  $size = "",  $required = ""): self
    {
        $b = $this->test($required, 'required');
        $c = ($type == "") ? "type='text'" : "type='$type'";
        $this->result .= "<input $c id ='$id' class='$class' name ='$name' size ='$size' $b placeholder='$placeholder' value='$value'>";
        return $this;
    }

    /**
     * Display one checkbox or one radio, they can be required or checked
     * 
     * @param [type] $type
     * @param [type] $id
     * @param [type] $name
     * @param [type] $value
     * @param string $checked
     * @param string $required
     * @param string $class
     * @return self
     */

    public function checkradio($type, $name, $value, $checked = "", $required = "", $id = "", $class = ""): self
    {
        $b = $this->test($checked, 'checked');
        $c = $this->test($required, 'required');
        $this->result .= "<input type='$type' id ='$id' class='$class' name ='$name' value='$value'" . $b . $c . ">";
        return $this;
    }

    /**
     * Display one field to allow the user to upload one file
     *
     * @param [type] $id
     * @param [type] $name
     * @param array $accept
     * @param string $required
     * @return self
     */

    public function file($name, array $accept, $required = "", $id = "", $class = ""): self
    {
        $b = $this->test($required, 'required');
        $result = [];
        foreach ($accept as $val) {
            array_push($result, $val);
        }
        $this->result .= "<input type='file' id ='$id' class='$class' name ='$name' accept=" . implode(', ', $result) . $b . ">";
        return $this;
    }

    /**
     * Display textarea, the id and the name are needed
     * 
     * @param [type] $id
     * @param [type] $name
     * @param string $placeholder
     * @param string $rows
     * @param string $cols
     * @param string $class
     * @param string $required
     * @return self
     */

    public function textarea($name, $placeholder = "", $rows = "", $cols = "", $required = "", $id = "", $class = ""): self
    {
        $b = $this->test($required, 'required');
        $this->result .= "<textarea id ='$id' class='$class' name ='$name' rows='$rows' cols='$cols' placeholder='$placeholder'" . $b . "></textarea>";
        return $this;
    }

    /**
     * Display one select with the given option array, keep in mind that the name of the option will be the same of the value
     *
     * @param [type] $name
     * @param array $option
     * @param string $required
     * @param string $id
     * @param string $class
     * @return self
     */

    public function selectOpt($name, array $option, $required = "", $id = "", $class = " "): self
    {
        $b = $this->test($required, 'required');
        $result = [];
        foreach ($option as $val) {
            array_push($result, "<option>" . $val . "</option>");
        }
        $this->result .= "<select id ='$id' name ='$name' $b class='$class' >" . implode("", $result) . "</select>";
        return $this;
    }

    /**
     * Start fieldset with legend
     *
     * @param [type] $legend
     * @param string $class
     * @param string $id
     * @return self
     */

    public function startFieldset($legend, $class = "", $id = ""): self
    {
        $this->result .= "<fieldset class='$class' id='$id'><legend>" . $legend . "</legend>";
        return $this;
    }

    /**
     * Undocuented function
     *
     * @return self
     */

    public function endFieldset(): self
    {
        $this->result .= "</fieldset>";
        return $this;
    }

    /**
     * Display one button
     *
     * @param [type] $class
     * @param [type] $value
     * @return self
     */

    public function button($value, $id = "", $class = ""): self
    {
        $this->result .= "<button type='button' id='$id' class='$class'>$value</button>";
        return $this;
    }


    /**
     * Generate the form. This method is needed in order to close the form tag
     *
     * @return void
     */

    public function generate()
    {
        $this->result .= "</form>";
        $temp = $this->result;
        $this->result = "";
        return $temp;
    }
}
