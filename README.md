# PHP Procedural Learning Repository

This repository was created to document everything I learn about procedural PHP.

---

## 📚 Table of Contents

1. [Running the Files](#running-the-files)
2. [Including and Requiring Files](#including-and-requiring-files)
3. [Variables](#variables)
4. [References (Pointers)](#references-pointers)
5. [Constants](#constants)
6. [Magic Constants](#magic-constants)
7. [Truthy and Falsy Values](#truthy-and-falsy-values)
8. [String Functions](#string-functions)
9. [Number Rounding](#number-rounding)
10. [Arrays](#arrays)
11. [Match Expression (Conditional)](#match-expression-conditional)
12. [Anonymous Functions](#anonymous-functions)
13. [Callbacks](#callbacks)
14. [Superglobals](#superglobals)
15. [Forms and File Uploads](#forms-and-file-uploads)
16. [Composer](#composer)
17. [Sanitizers and Validators](#sanitizers-and-validators)
18. [Strict Types](#strict-types)
19. [Argument Unpacking](#argument-unpacking)
20. [Filesystem Functions](#filesystem-functions)
21. [File Upload Notes](#file-upload-notes)

---

## Running the Files

There are two ways to run PHP files:

### 1. Starting the built-in PHP server

```bash
php -S localhost:3000 -t public
```

> `public` is the folder where the server will start.

### 2. Running via terminal

```bash
php filename.php
```

---

## Including and Requiring Files

```php
include './test.php';
echo $name;
```

```php
require './test.php';
echo $name;
```

### Differences

-   `include` gives a warning if the file is not found but continues execution.
-   `require` gives a fatal error and stops execution if the file is missing.

### `include_once`

Ensures the file is included only once, even if included multiple times in code.

### `require_once`

Same as `include_once`, but stops execution if the file has an error.

---

## Variables

There are 7 basic types:

### string

```php
gettype('aaa'); // returns: string
```

```php
$name = "Daniel";
$lastName = "Arrudas";
$fullName = "{$name} {$lastName}";
```

### integer

```php
gettype(5); // returns: integer
```

### float (double)

```php
gettype(12.32); // returns: double
```

### boolean

```php
gettype(true); // returns: boolean
```

> `true` outputs 1; `false` returns an empty string (null).

### array

```php
gettype(['aa', 12]); // returns: array
```

### object

```php
class Person {}
echo gettype(new Person()); // returns: object
```

### null

```php
gettype(null); // returns: NULL
```

### Variable Naming Conventions

-   `camelCase`: `myName`
-   `snake_case`: `my_name`

---

## References (Pointers)

Passing a variable by reference:

```php
$myName = 'dan';
$name = &$myName;
$myName = 'joao';
echo $myName;
echo $name;
// output: joaojoao
```

---

## Constants

Constants are usually written in uppercase.

### Defining Constants:

```php
if (true) {
    define("NAME", "dan");
}
echo NAME;
```

> `define()` works in conditional blocks; `const` does not. Constants are globally scoped.

---

## Magic Constants

```php
__FUNCTION__
__METHOD__
__LINE__
__FILE__
```

-   `__FUNCTION__`, `__METHOD__`: Return the name of the function/method.
-   `__LINE__`: Returns the current line number.
-   `__FILE__`: Returns the full path of the file.

### Other Useful Constants

-   `DIRECTORY_SEPARATOR`: Platform-independent directory separator (`/` or `\`).

### Check if a constant exists:

```php
if (defined('CONSTANT_NAME')) {}
```

```php
$consts = get_defined_constants(true);
var_dump($consts);
```

---

## Truthy and Falsy Values

```php
$name = "dan";
echo !!$name; // returns true
```

### Falsy Values

-   `null`
-   `0`, `0.0`
-   `"0"`, `""`
-   `[]`

### Truthy Values

Everything else.

---

## String Functions

```php
strlen();       // string length
substr();       // substring
str_contains(); // check if substring exists
```

---

## Number Rounding

```php
ceil();  // rounds up
floor(); // rounds down
```

---

## Arrays

### Add to end:

```php
array_push($array, $item);
```

Use `$array[] = $item;` for one item (faster).

### Add to beginning:

```php
array_unshift($array, $item);
```

### Associative Array:

```php
$person = ['name' => 'dan', 'age' => 20];
```

### Multidimensional Array:

```php
$person = [
    'name' => 'dan',
    'age' => 20,
    'documents' => [
        'cpf' => '112312321',
        'rg' => '31231'
    ]
];
```

---

## Match Expression (Conditional)

```php
$pessoa = "leo";
$returnValue = match ($pessoa) {
    "dan" => "This person is Daniel",
    "joao" => "This person is João",
    "caio", "leo" => "This person is Caio or Leo",
    default => "Person not found",
};
```

```php
$age = 18;
$output = match (true) {
    $age < 2 => "Baby",
    $age < 13 => "Child",
    $age <= 19 => "Teenager",
    $age >= 40 => "Old adult",
    $age > 19 => "Young adult",
};
```

### Differences from `switch`

-   Uses strict comparison (`===`)
-   Returns a value
-   More concise and safe

---

## Anonymous Functions

```php
function test($name) {
    $person = function() use ($name) {
        return $name;
    };
    return $person;
}
echo test("dan")();
```

---

## Callbacks

Functions passed as parameters:

```php
is_callable($callback);
call_user_func($callback);
```

---

## Superglobals

### `$_COOKIE`

-   Stores data in the user's browser.
-   Must be set before any output.

```php
setcookie('TestCookie', 'value', time() + 2*24*60*60);
echo $_COOKIE["TestCookie"];
```

-   To delete:

```php
setcookie('TestCookie', '', strtotime('-2 days'));
```

### `$_SESSION`

```php
session_start();
$_SESSION['username'] = 'Daniel';
```

To destroy:

```php
unset($_SESSION['key']);
session_destroy();
session_regenerate_id();
```

### `$_ENV`

Use `vlucas/phpdotenv` with Composer. `.env` example:

```
DATABASE=teste
HOST=localhost
PASSWORD=
USER=root
```

`.env.example` should show required keys without values.

### `$_FILES`

Handles file uploads via forms.

### `$_GET`

Retrieves values from the URL:

```php
http://localhost/?id=32&email=test@example.com
```

```php
var_dump($_GET);
```

### `$_POST`

Gets data from submitted forms via POST.

### `$_REQUEST`

Combines `$_GET`, `$_POST`, and `$_COOKIE`.

### `$_SERVER`

Provides info about the server and request:

```php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {}
```

---

## Forms and File Uploads

Use `enctype="multipart/form-data"` in the form:

```html
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file" required />
    <button type="submit">Upload</button>
</form>
```

```php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    var_dump($_FILES);
}
```

---

## Composer

```bash
composer init
composer install
composer require package/name
composer update
composer remove package/name
```

-   `vendor/` contains third-party dependencies.
-   `composer.lock` locks versions.
-   `autoload.php` is the loader file.

---

## Sanitizers and Validators

Use `filter_var()` and `filter_input()`:

```php
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
```

---

## Strict Types

Use `declare(strict_types=1);` to enforce type checking:

```php
function sum(int $a, int $b): int {
    return $a + $b;
}
```

Without `strict_types`, PHP would cast `'1'` to `1` automatically.

---

## Argument Unpacking

Unpacking arguments:

```php
function add($a, $b, $c) {
    return $a + $b + $c;
}
$operators = [2, 3];
echo add(1, ...$operators);
```

Packing arguments:

```php
function sum(...$numbers) {
    return array_sum($numbers);
}
echo sum(1, 2, 3);
```

---

## Filesystem Functions

```php
scandir(__DIR__); // lists files in current directory
mkdir('folder', recursive: true); // creates directories
rmdir('folder'); // removes directories
```

---

## File Upload Notes

Handling file uploads requires validation and error checks. See the commit: **"Add file upload form and handling logic; include error handling and MIME type validation"**

Also, check: [PHP Manual - File Uploads](https://www.php.net/manual/en/features.file-upload.php)

---

End of Guide.

---

> Prepared by Daniel Arrudas
