# Summary of PHP Basics

## Basics

- PHP Syntax and Tags
- PHP code is executed on the server.
- PHP scripts are enclosed in <?php and ?> tags.
- Short tags can be used but are not recommended: <? and ?>.
- Echo and Print are used to output data.

### PHP balise

```php
<?php 'contenu....'?>
```

### Variables

- Variables in PHP start with

```php
'$'
```

- Variable names must start with a letter or underscore and can only contain alphanumeric characters and underscores.

### Data Types

- PHP supports several data types:
  - String,
  - Integer,
  - Float,
  - Boolean,
  - Array,
  - Object,
  - NULL,
  - Resource.
  -
- The gettype() function can be used to get the type of a variable.

### Constants

- Constants are defined using the define() function.
- Constants are global and cannot be changed once set.

### Operators

```php
Arithmetic operators: +, -, *, /, %
Assignment operators: =, +=, -=, etc.
Comparison operators: ==, ===, !=, !==, >, <, >=, <=
Logical operators: &&, ||, !
GET & POST
```

### Superglobals

```php
$\_GET and $\_POST //are PHP superglobals used to collect form data.
```

#### GET Method

- Data sent using the GET method is visible in the URL.
  - (Suitable for non-sensitive data.)
    <br/>
- Limited amount of data can be sent (max URL length).

#### POST Method

- Data sent using the POST method is not visible in the URL.
  - (Suitable for sensitive data.)
    <br/>
- No limitations on the amount of data sent.
- Form Handling
- Forms in HTML can send data to a PHP script using either GET or POST method.
  - Example:

```html
<form method="post" action="process.php">
  Name: <input type="text" name="name" />
  <input type="submit" />
</form>
```

The submitted data can be accessed in PHP using

```php
 $_GET['name'] or $_POST['name'].
```

### PHP Data Objects (PDO)

#### Introduction

- PDO is a database access layer providing a uniform method of access to multiple databases. (PDO est une couche d'accès à la base de données offrant une méthode uniforme pour accéder à plusieurs bases de données.)
  <br/>
- PDO does not provide a database abstraction but a data-access abstraction.
  (PDO ne fournit pas une abstraction de base de données, mais une abstraction d'accès aux données.)

#### Connecting to a Database:

- Example connection to MySQL:
-

```php
$dsn = 'mysql:host=localhost;dbname=testdb';
$username = 'root';
$password = 'password';
$options = [];
try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
```

#### Executing Queries

- Queries can be executed using query(), exec(), and prepare() methods.
  - Example:
  -

```php
$stmt = $pdo->query('SELECT * FROM users');
while ($row = $stmt->fetch()) {
    echo $row['name'] . '<br>';
}
```

#### Prepared Statements

- Used to execute the same statement repeatedly with high efficiency.
- Helps prevent SQL injection attacks.
  - Example:

```php
$stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
$stmt->execute(['email' => $email]);
$user = $stmt->fetch();
```

### Object-Oriented Programming (OOP) in PHP

#### Basics

- PHP supports OOP and includes classes, objects, inheritance, interfaces, traits, and more.

#### Classes and Objects

- A class is a blueprint for objects. Objects are instances of classes.
  - Example:

```php
class Car {
    public $color;
    public $model;
    public function __construct($color, $model) {
        $this->color = $color;
        $this->model = $model;
    }
    public function message() {
        return "My car is a " . $this->color . " " . $this->model;
    }
}

$myCar = new Car("black", "Volvo");
echo $myCar->message();
```

#### Inheritance

- A class can inherit methods and properties from another class using the extends keyword.
  - Example:

```php
class ElectricCar extends Car {
public function batteryStatus() {
return "Battery is fully charged.";
}
}
```

### Access Modifiers

- Properties and methods can have access modifiers: public, protected, private.

#### Static Methods and Properties

- Declared with the static keyword and can be accessed without creating an instance of the class.
  Interfaces and Traits
  Interfaces allow you to specify what methods a class should implement.
  Traits are a mechanism for code reuse in single inheritance languages.
  Sessions
  Introduction
  Sessions are used to store data across multiple pages.
  A session is started with session_start().
  Session variables are set and accessed via the $_SESSION superglobal.
Starting a Session
Example:
php
Copy code
session_start();
$\_SESSION['username'] = 'JohnDoe';
  Accessing Session Data
  Example:
  php
  Copy code
  session_start();
  echo 'Welcome ' . $\_SESSION['username'];
  Destroying a Session
  A session can be destroyed using session_destroy().
