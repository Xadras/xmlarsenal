arsenaldata.sqlite3 is the main "data"-file of the whole project. It contains all language-specific strings and infos about items, factions, achievements and so on.

**Since [r349](https://code.google.com/p/xmlarsenal/source/detail?r=349) arsenaldata.sqlite3 is not the only possibility. You can use any PEAR MDB2 database plus the arsenaldata.sql.gz**

<br />
## Structure ##

The main tables are
  * achievementcategory
  * achievementcriteria
  * achievements
  * glyphs
  * itemenchantments
  * itemsdata
  * itemsets
  * randomproperties
  * talents
  * talenttabs
  * titles

Additionally there are tables like achievementcategory\_de\_de, achievementcategory\_en\_gb and so on. These tables contain the language-specific strings. The arsenal can use any language possible as long as there are all tables with the language suffix.

<br />
## Contents ##


The contents of arsenaldata.sqlite3 is mainly extracted from WoW dbc-files by my own php dbc parser. However the data about items is not inside the dbcs and therefore must be downloaded from the blizz arsenal and allakhazam.com websites.

<br />
## readArsenalDBCs.php ##

This php-file is responsible for reading DBC data into the arsenaldata.sqlite3. It can be re-used in every version of the game as long as the dbc structure does not change in the datafields that needs to be extracted (i.e. the "ordering" of colums inside the dbc).