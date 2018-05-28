LinkShorter
===========

![ScreenShot](http://i.imgur.com/bnP1pmB.png)

This is an simple model to build one LinkShorter. In this case i use sql to store the link's, it dont store 2 equal link's. If you type one link that its already on the database the page will give you the link dat have stored before for that specific page.

### DEMO
Check out the script working on [http://UR1.PT](http://ur1.pt)

## Install
1. Clone the repo;
2. Change the `classes/Shorter.php` file so it can connect to your DB;
3. Make the proper tables on your DB;

## DB Table
```sql
CREATE TABLE IF NOT EXISTS shortlinks (
  id int(11) NOT NULL AUTO_INCREMENT,
  code varchar(10) NOT NULL,
  url text NOT NULL,
  created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=0;
```
