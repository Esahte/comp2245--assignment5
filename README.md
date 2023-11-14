# comp2245--assignment5

This is Assignment 5 for Esahtengang on PHP and MySQL

## Overview of the Application

The application is structured as follows:

### HTML Document

The HTML document forms the structure of the web page.
It contains a search field for entering a country name, and two
buttons: “Lookup” and “Lookup Cities.” When a button is clicked, it triggers an event.

### JavaScript/jQuery

The JavaScript file, with the help of jQuery, listens for ‘click’ or ‘keypress’ events on the buttons.
When an event is
detected, it reads the value from the search field and sends an AJAX request to the world.php file.
The AJAX request
includes the country name and a lookup parameter indicating whether to return country or city information.

### PHP

The world.php file receives the AJAX request and reads the parameters.
It connects to the MySQL database and prepares an
SQL query based on the parameters.
If the lookup parameter is ‘cities,’ it selects all cities in the specified country.
Otherwise, it selects all countries with a name like the specified country.
The results of the query are then outputted
in an HTML table.

### Back to JavaScript/jQuery

Once the PHP file has processed the request and generated a response, the response is sent back to the JavaScript file.
The JavaScript file then inserts the response (an HTML table) into the ‘result’ div on the web page.

