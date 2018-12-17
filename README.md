# propellerhead
Developer Technical Test
## Synopsis

The project is available to run on the internet at http://162.13.124.64/Rack01/PropellerHead

The project uses PHP, Javascript, JQuery with Ajax, and a MySQL database to store the data. The structure of the database is showm below.

mysql> show tables;
+-----------------+
| Tables_in_phead |
+-----------------+
| customerNotes   |
| customers       |
| statusTypes     |
+-----------------+

mysql> describe customerNotes;
+------------------+---------+------+-----+---------+----------------+
| Field            | Type    | Null | Key | Default | Extra          |
+------------------+---------+------+-----+---------+----------------+
| customerNotes_id | int(11) | NO   | PRI | NULL    | auto_increment |
| customers_id     | int(11) | NO   |     | NULL    |                |
| note             | text    | NO   |     | NULL    |                |
+------------------+---------+------+-----+---------+----------------+


mysql> describe customerNotes;
+------------------+---------+------+-----+---------+----------------+
| Field            | Type    | Null | Key | Default | Extra          |
+------------------+---------+------+-----+---------+----------------+
| customerNotes_id | int(11) | NO   | PRI | NULL    | auto_increment |
| customers_id     | int(11) | NO   |     | NULL    |                |
| note             | text    | NO   |     | NULL    |                |
+------------------+---------+------+-----+---------+----------------+


mysql> describe statusTypes;
+-------------+---------+------+-----+---------+-------+
| Field       | Type    | Null | Key | Default | Extra |
+-------------+---------+------+-----+---------+-------+
| status_id   | int(11) | NO   | PRI | NULL    |       |
| status_text | text    | NO   |     | NULL    |       |
+-------------+---------+------+-----+---------+-------+

The project is divided into Model, View, Controller. The latter also includes all the serverside ajax functions, and the clientside javascript including the jquery library.

The initial file (index.php) loads the controller, which then loads the init file. The View is loaded from the main.php file in the view, which then loads the other elements.

Most of the action is performed from the JQuery functions in main.js. The #content division is used to display the current HTML.

There remain a few things not implemented. I have not implemented:

	- sorting the Customer List
	- filtering the Customer List
	- editing existing notes
	- changing the status of a customer

None of these would take very long, but I thought it important to get the project submitted now.


## Tests

There are currently no test procedures. However, the following workflow has been tested.

On launching (162.13.124.64/Rack01/PropellerHead) the application starts showing a list of all the customers in the database. 

1) Add Customer

Click on Add Customer, choose the Status (Prospective, Current, Non-active) and the information you want to give (starting with the name and perhaps including contact details)

When finished click on Create and you will be returned to the initial Customer List with the new customer. Note that the date and ID have been populated automatically.

Alternatively click Cancel to return to the initial Customer List without adding the new customer.

2) View Customer

Click on one of the element in the Customer List (they are highlighted when the mouse is over them) to show full information of this customer including any notes that have been added.

Click Back to return to the Customer List or Add Note for Action 3 below

3) Add Note

Click Add Note and a new text area appears. Enter the text required (newlines are not allowed here in this version) Click Save Note and the note will be added to the database and the Customer Information redisplayed (including the new note). Or click Cancel to return to the Customer Information without saving.
