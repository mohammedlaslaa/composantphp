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
- [TODO](../TODO.md)
- [Contributing](../CONTRIBUTING.md)
- [Authors](#authors)
- [Acknowledgments](#acknowledgement)

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

## 🔧 Running the tests <a name = "tests"></a>

Explain how to run the automated tests for this system.

### Break down into end to end tests

Explain what these tests test and why

```
Give an example
```

### And coding style tests

Explain what these tests test and why

```
Give an example
```

## 🎈 Usage <a name="usage"></a>

Add notes about how to use the system.

## 🚀 Deployment <a name = "deployment"></a>

Add additional notes about how to deploy this on a live system.

## ⛏️ Built Using <a name = "built_using"></a>

- [MongoDB](https://www.mongodb.com/) - Database
- [Express](https://expressjs.com/) - Server Framework
- [VueJs](https://vuejs.org/) - Web Framework
- [NodeJs](https://nodejs.org/en/) - Server Environment

## ✍️ Authors <a name = "authors"></a>

- [@kylelobo](https://github.com/kylelobo) - Idea & Initial work

See also the list of [contributors](https://github.com/kylelobo/The-Documentation-Compendium/contributors) who participated in this project.

## 🎉 Acknowledgements <a name = "acknowledgement"></a>

- Hat tip to anyone whose code was used
- Inspiration
- References
