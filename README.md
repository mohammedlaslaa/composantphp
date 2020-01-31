<p align="center">
  <a href="" rel="noopener">
 <img width=200px height=200px src="https://i.imgur.com/6wj0hh6.jpg" alt="Project logo"></a>
</p>

<h3 align="center">PHP Form Builder</h3>

<div align="center">

[![Status](https://img.shields.io/badge/status-active-success.svg)]()
[![GitHub Issues](https://img.shields.io/github/issues/kylelobo/The-Documentation-Compendium.svg)](https://github.com/kylelobo/The-Documentation-Compendium/issues)
[![GitHub Pull Requests](https://img.shields.io/github/issues-pr/kylelobo/The-Documentation-Compendium.svg)](https://github.com/kylelobo/The-Documentation-Compendium/pulls)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](/LICENSE)

</div>

---

<p align="center"> This form builder comes from an idea in order to make the developers life more easier.
    <br> 
</p>

## 📝 Table of Contents

- [About](#about)
- [Getting Started](#getting_started)
- [Deployment](#deployment)
- [Usage](#usage)
- [Built Using](#built_using)
- [Authors](#authors)

## 🧐 About <a name = "about"></a>

Build one form in HTML is quite simple. But what else about build many forms.

The form builder is a simple class which will save you a lot of time.

## 🏁 Getting Started <a name = "getting_started"></a>

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See [deployment](#deployment) for notes on how to deploy the project on a live system.

### Prerequisites

You just need to be able to run PHP files on your machines, if that is the case, let's go forward !

Just copy all of these folders. I put in the folder an exemple of how to call the form builder whith a namespace, instantiate this, and make the tags of a form.

```
require_once('./vendor/form/formbuilder.php');

use form\formbuilder as myform;

$form1 = new myform();

echo $form1->label('name', 'Nom')

You'll find all of possibilities in the index.php.
```

### Installing

I consider that you know how to put one class in your development environment and how to call this. If it's not the case, please go read the documenttaion of PHP. After that, please follow, these steps.

Step 1 - Require the class formbuilder :

```
<?php

require_once('./vendor/form/formbuilder.php');

```

Step 2 - Use the namespace of the formbuilder like this example :

```
use form\formbuilder as nameofmyform;

```

Step 3 - Call the class formbuilder by the nameofmyform :

```
$form1 = new myform();

```

Step 4 - Your are now able to use your first form builder ! :

```
echo $form1->label('name', 'Name')

```

## 🎈 Usage <a name="usage"></a>

- By default, you have to call new myform() in a variable to instantiate the form builder. This method will open the tag of your form.

Then if you think that you have finished with your form, you have to declare the generate method in order to close your form.

- First know that the attributes provided are as follows:

* `action: empty, submit to current URL`
* `method: by default get if empty`
* `class: empty by default`
* `id: empty by default`
* `name: empty by default`
* `for: string required`
* `type: type or text by default`
* `value: string or none`
* `placeholder: text or none`
* `size: number or none`
* `required: required or none`
* `checked: checked or none`

- By this formbuilder, you can display easily a form tags with these attributes please call these methods :

First, please refer to the previous section to see what are the needed attributes for all of the method.

Let's says we have an instance of our myform in a variable like this with the action, method and class :

```
$form1 = new myform('action.php', 'post', 'class');

```

To display a label please call the label method :

```
echo $form1->label('for', 'textlabel')

```

To display a input please call the input method, note that the required is not needed :

```
echo $form1->input('name', 'value', 'type', 'id', 'class', 'placeholder', 20, 'required')

```

To display a select option please call the selectOpt method :

```
echo $form1->selectOpt('selectid',  ['option1', 'option2', 'option3'], $required = 'required', 'id', 'form-control form-control-lg')

```

To display a textarea tag please call the textarea method :

```
echo $form1->textarea('txtarea', 'txtclass', 10, 20, 'required', 'id', 'class')

```

To display a checkbox or a radio button tag please call the chekradio method :

```
echo $form1->checkradio('radio', 'name', 'My_radio', 'checked', 'required', 'id', 'class') // The first argument is radio or checkbox

```

To display a input file to allow the user to send a file, you have to call the file method :

```
echo $form1->file('file',  ['image/png', 'image/jpeg'], 'id', 'class') // the second argument is an array of the accepts files

```

To display a fieldset with option, call the file method :

```
echo $form1->fieldset('radio', 'List of film', ['Horror', 'Thriller', 'Comedy'], 'film', true)

// the third argument is a list of the content to display and the last is the order to display the label and the input, if it's true the input will be display before the label

```

To display a button, please call the button method :

```
echo $form1->button( 'value', 'id', 'class')

```

To close the form and display it, please call the generate method :

```
echo $form1->generate();

```

You can also chaining all of these methods using the Fluent pattern like this :

(Please keep in mind, that you have the choice to use whatever methods you want)

```
        $form1 = new myform();
        echo $form1->label('for', 'textlabel')
        ->input('name', 'value', 'type', 'id', 'class', 'placeholder', 20, 'required')
        ->selectOpt('selectid',  ['option1', 'option2', 'option3'], $required = 'required', 'id', 'form-control form-control-lg')
        ->textarea('txtarea', 'txtclass', 10, 20, 'required', 'id', 'class')
        ->checkradio('radio', 'name', 'My_radio', 'checked', 'required', 'id', 'class')
        ->file('file',  ['image/png', 'image/jpeg'], 'id', 'class')
        ->fieldset('radio', 'List of film', ['Horror', 'Thriller', 'Comedy'], 'film', true)
        ->button( 'value', 'id', 'class')
        ->generate();
```

## ⛏️ Built Using <a name = "built_using"></a>

- [PHP] - Server Environment

## ✍️ Authors <a name = "authors"></a>

- [@mohammedlaslaa](https://github.com/mohammedlaslaa) - Idea & Initial work
