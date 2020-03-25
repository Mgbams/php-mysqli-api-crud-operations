# PHP CRUD-API operations using Mysqli

STEPS
* Create your database using mysql
* Create your database file. Here i called mine bdd.php
* Put your database connection in your file.
* Create another file for your CRUD opeerations. Here i used myapi.php
* Require your database file in your CRUD operations file and also add a header and a $method variable
which would hold the request method used.
__myapi.php__

```
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];
```
* Create your switch condition and pass it a parameter of the $method which holds the type of http request
* Make a case for each request method without forgetting to end each with a break
* Create functions for each CRUD operations. In my case i created, getData(), postData(), deleteData() and
finally putData().
* Remember to include your database connection file in each of your functions so you can access
your database for each function. I did this using

```
include "bdd.php";
```
* Call your functions in their corresponding positions in the switch statements.
* The data you get for the put(), post() and delete() functions should be retrieved using this format below
```
 $data = json_decode(file_get_contents('php://input'), true);  // true means you can convert data to array
```
**NOTE**: You can read more on this on php website
* You can use __postman__ to check the success of your functions by entering the url of your xampp server
and linking it to the file that contains your CRUD operations. In my own case my localhost url was

```
localhost:800//mysqliapi/myapi.php
```
From the above url, __mysqliapi__ is my application folder name which is located in htdocs of xampp while __myapi.php__
is the file that contains my CRUD operations.

* You can select the method you want to try from __postman__.
**Remember**: To Post, delete or Update data you need to make sure to do the following

* Click on __Body__ below the url and method tab.
* Click on __Raw__ and select __JSON__ format below the tab that contains __Body__.
* Then enter your data in between the curly braces and make sure they are in quotes. e.g for a post,
i might have something like this.
```
{
"nom": "The King from Africa",
"phone": "123456778"
}
```

Enjoy.
