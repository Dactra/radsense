<?php


include 'config.php';

//drop admin table if exists
$admin_drop= "DROP TABLE IF EXISTS `admin`";
if (mysqli_query($conn, $admin_drop)) {

echo "<h2>Preparing Installation</h2>
          <div>
              <div>
                  <p>Preparing Database!</p>
              </div>
          </div>";


} else {
   echo "Error: " . $table_admin . "<br>" . mysqli_error($conn);
}



// Create admin table
$table_admin = "CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4";


if (mysqli_query($conn, $table_admin)) {

echo "<h2>Table admin Created!</h2>
          <div>
              <div>
                  <p>Table admin added successfully!</p>
              </div>
          </div>";


} else {
   echo "Error: " . $table_admin . "<br>" . mysqli_error($conn);
}




// Create nas table
$table_nas = "CREATE TABLE IF NOT EXISTS `nas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nasname` varchar(128) NOT NULL,
  `shortname` varchar(32) DEFAULT NULL,
  `type` varchar(30) DEFAULT 'other',
  `ports` int(5) DEFAULT NULL,
  `secret` varchar(60) NOT NULL DEFAULT 'secret',
  `server` varchar(64) DEFAULT NULL,
  `community` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT 'RADIUS Client',
  PRIMARY KEY (`id`),
  KEY `nasname` (`nasname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";


if (mysqli_query($conn, $table_nas)) {

echo "<h2>Table nas Created!</h2>
          <div>
              <div>
                  <p>Table nas added successfully!</p>
              </div>
          </div>";



} else {
   echo "Error: " . $table_nas . "<br>" . mysqli_error($conn);
}





//create table radacct
$table_radacct = "CREATE TABLE IF NOT EXISTS `radacct` (
  `radacctid` bigint(21) NOT NULL AUTO_INCREMENT,
  `acctsessionid` varchar(64) NOT NULL DEFAULT '',
  `acctuniqueid` varchar(32) NOT NULL DEFAULT '',
  `username` varchar(64) NOT NULL DEFAULT '',
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `realm` varchar(64) DEFAULT '',
  `nasipaddress` varchar(15) NOT NULL DEFAULT '',
  `nasportid` varchar(15) DEFAULT NULL,
  `nasporttype` varchar(32) DEFAULT NULL,
  `acctstarttime` datetime DEFAULT NULL,
  `acctupdatetime` datetime DEFAULT NULL,
  `acctstoptime` datetime DEFAULT NULL,
  `acctinterval` int(12) DEFAULT NULL,
  `acctsessiontime` int(12) unsigned DEFAULT NULL,
  `acctauthentic` varchar(32) DEFAULT NULL,
  `connectinfo_start` varchar(50) DEFAULT NULL,
  `connectinfo_stop` varchar(50) DEFAULT NULL,
  `acctinputoctets` bigint(20) DEFAULT NULL,
  `acctoutputoctets` bigint(20) DEFAULT NULL,
  `calledstationid` varchar(50) NOT NULL DEFAULT '',
  `callingstationid` varchar(50) NOT NULL DEFAULT '',
  `acctterminatecause` varchar(32) NOT NULL DEFAULT '',
  `servicetype` varchar(32) DEFAULT NULL,
  `framedprotocol` varchar(32) DEFAULT NULL,
  `framedipaddress` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`radacctid`),
  UNIQUE KEY `acctuniqueid` (`acctuniqueid`),
  KEY `username` (`username`),
  KEY `framedipaddress` (`framedipaddress`),
  KEY `acctsessionid` (`acctsessionid`),
  KEY `acctsessiontime` (`acctsessiontime`),
  KEY `acctstarttime` (`acctstarttime`),
  KEY `acctinterval` (`acctinterval`),
  KEY `acctstoptime` (`acctstoptime`),
  KEY `nasipaddress` (`nasipaddress`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";


if (mysqli_query($conn, $table_radacct)) {

echo "<h2>Table radacct Created!</h2>
          <div>
              <div>
                  <p>Table radacct added successfully!</p>
              </div>
          </div>";



} else {
   echo "Error: " . $table_radacct . "<br>" . mysqli_error($conn);
}






//create table radcheck
$table_radcheck = "CREATE TABLE IF NOT EXISTS`radcheck` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '==',
  `value` varchar(253) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `username` (`username`(32))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";


if (mysqli_query($conn, $table_radcheck)) {

echo "<h2>Table radcheck Created!</h2>
          <div>
              <div>
                  <p>Table radcheck added successfully!</p>
              </div>
          </div>";



} else {
   echo "Error: " . $table_radcheck . "<br>" . mysqli_error($conn);
}






//create table radgroupcheck
$table_radgroupcheck = "CREATE TABLE IF NOT EXISTS `radgroupcheck` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '==',
  `value` varchar(253) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `groupname` (`groupname`(32))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";


if (mysqli_query($conn, $table_radgroupcheck)) {

echo "<h2>Table radgroupcheck Created!</h2>
          <div>
              <div>
                  <p>Table radgroupcheck added successfully!</p>
              </div>
          </div>";



} else {
   echo "Error: " . $table_radgroupcheck . "<br>" . mysqli_error($conn);
}






//create table radgroupreply
$table_radgroupreply = "CREATE TABLE IF NOT EXISTS `radgroupreply` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '=',
  `value` varchar(253) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `groupname` (`groupname`(32))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";


if (mysqli_query($conn, $table_radgroupreply)) {

echo "<h2>Table radgroupreply Created!</h2>
          <div>
              <div>
                  <p>Table radgroupreply added successfully!</p>
              </div>
          </div>";



} else {
   echo "Error: " . $table_radgroupreply . "<br>" . mysqli_error($conn);
}




//create table radpostauth
$table_radpostauth = "CREATE TABLE IF NOT EXISTS `radpostauth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '',
  `pass` varchar(64) NOT NULL DEFAULT '',
  `reply` varchar(32) NOT NULL DEFAULT '',
  `authdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";


if (mysqli_query($conn, $table_radpostauth)) {

echo "<h2>Table radpostauth Created!</h2>
             <div>
              <div>
                  <p>Table radpostauth added successfully!</p>
              </div>
          </div>";



} else {
   echo "Error: " . $table_radpostauth . "<br>" . mysqli_error($conn);
}




//create table radreply
$table_radreply = "CREATE TABLE IF NOT EXISTS `radreply` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '=',
  `value` varchar(253) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `username` (`username`(32))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";


if (mysqli_query($conn, $table_radreply)) {

echo "<h2>Table radreply Created!</h2>
            <div>
              <div>
                  <p>Table radreply added successfully!</p>
              </div>
          </div>";



} else {
   echo "Error: " . $table_radreply . "<br>" . mysqli_error($conn);
}




//create table radusergroup
$table_radusergroup = "CREATE TABLE IF NOT EXISTS `radusergroup` (
  `username` varchar(64) NOT NULL DEFAULT '',
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `priority` int(11) NOT NULL DEFAULT '1',
  KEY `username` (`username`(32))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";


if (mysqli_query($conn, $table_radusergroup)) {

echo "<h2>Table radusergroup Created!</h2>
              <div>
                  <p>Table radusergroup added successfully!</p>
              </div>
          </div>";



} else {
   echo "Error: " . $table_radusergroup . "<br>" . mysqli_error($conn);
}



//create user admin
$create_admin = "INSERT INTO `admin` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3',NULL)";


if (mysqli_query($conn, $create_admin)) {

echo "<h2>User admin Created!</h2>
              <div>
                  <p>User: admin Password: admin</p>
              </div>
          </div>";

          $status='$status="installed";';
          file_put_contents("installed.txt", $status);

} else {
   echo "Error: " . $create_admin . "<br>" . mysqli_error($conn);
}



?>
