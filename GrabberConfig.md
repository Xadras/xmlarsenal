As a "normal" user you will probably rely on the DataGrabbers included in the release package. You can check out the available grabbers in "classes/dataGrabbers". Currently there is only one grabber available (for Trinity/Mangos).

To use the grabber simply open one of the grabber files (see [Config](Config.md) for how to link grabbers to the arsenal) and edit the database connection. For "Mangos3\_1\_PVPRealmDataGrabber.class.php" this would be lines 344 and 345:

```
$this->dbconn = mysql_connect("host", "username", "pass", true) or die(get_class($this).": no connection to database."); 
@mysql_select_db("pvp_char", $this->dbconn) or die (get_class($this).": not able to select specified database.");
```

<br />
Just below (lines 359/360) ist the database setup for the login-database:
```
$logindb = mysql_connect("host", "username", "pw", true) or die(get_class($this).": no connection to login database.");
@mysql_select_db("logon", $logindb) or die (get_class($this).": not able to select specified database in login db.");
```


Input the data of your realm database to lines 344 and 45 and the data of your account-database (may be the same on many installations) into lines 359 and 360. You're done :)