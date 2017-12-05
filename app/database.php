<?php
/* database connection stuff here
 * 
 */
 $DB_HOST = "locahost";
 $DB_DATABASE = "cosc2";
 $DB_USER = "root";
 $DB_PASS= "";

 
function db_connect() {
    try {
        $dbh = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_DATABASE . ';charset=utf8', DB_USER, DB_PASS);
		//$dbh = new PDO("dblib:host=$hostname:$port;dbname=$dbname","$username","$pw");
        return $dbh;
    } catch (PDOException $e) {
        //We should set a global variable here so we know the DB is down
		echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    }
}
