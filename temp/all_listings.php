<html>

<head>
<meta http-equiv="Content-Type"
content="text/html; charset=iso-8859-1">
<meta name="GENERATOR" content="Microsoft FrontPage Express 2.0">
<title>PJ deHaas Properties</title>
</head>

<body bgcolor="#800000" link="#000000" vlink="#000000"
alink="#000000" topmargin="0">
<div align="center"><center>

<table border="0" cellspacing="1" width="750" bgcolor="#800000">
    <tr>
        <td><div align="center"><center><table border="0"
        cellspacing="1" width="750" bgcolor="#800000">
            <tr>
                <td bgcolor="#FFFFFF"><div align="center"><center><table
                border="0" cellspacing="1" width="750">
                    <tr>
                        <td width="200" bgcolor="#FFFFFF"><p
                        align="center"><img src="images/logo.jpg"
                        width="175" height="107"><br>
                        <em><strong>We Are Your Home Town Real
                        Estate Professionals!</strong></em></p>
                        </td>
                        <td width="550" bgcolor="#FFFFFF"><p align="left">
                        <img src="http://www.pjdehaasproperties.com/images/localarea/Panaramic_05.jpg" width="550" height="145"></p>
                        </td>
                    </tr>
                </table>
                </center></div></td>
            </tr>
            <tr>
                <td valign="top" bgcolor="#FFFFFF"><div
                align="center"><center><table border="0"
                cellpadding="0" cellspacing="0" width="750" height="100%"
                bgcolor="#800000">
                    <tr><td valign="top" width="150" bgcolor="#FFFFFF">
                        <table border="0" cellpadding="0" cellspacing="0" width="150" height="100%">
                        <tr><td valign="top" width="150" bgcolor="#FFFFFF">
                        <p align="center"><em><strong><br>
                        </strong></em><a href="http://www.pjdehaasproperties.com/index.htm"><em><strong>HOME</strong></em></a><em><strong><br>
                        </strong></em><a href="http://www.pjdehaasproperties.com/listings.htm"><em><strong>LISTINGS</strong></em></a><em><strong><br>
                        </strong></em><a href="http://www.pjdehaasproperties.com/agents.htm"><em><strong>AGENTS</strong></em></a><em><strong><br>
                        </strong></em><a href="http://www.pjdehaasproperties.com/localarea.htm"><em><strong>LOCAL
                        AREA</strong></em></a><em><strong><br>
                        </strong></em><a href="http://www.pjdehaasproperties.com/pictures.htm"><em><strong>PICTURES</strong></em></a><em><strong><br>
                        </strong></em><a href="http://www.pjdehaasproperties.com/contactus.htm"><em><strong>CONTACT
                        US</strong></em></a><em><strong><br>
                        </strong></em><a href="http://www.pjdehaasproperties.com/links.htm"><em><strong>LINKS</strong></em></a><br><br></p>
                        </td></tr>
                        <tr><td valign="top" width="150" height="100%">
<?
  print("<br><hr><i><center>Current Listings:<center></i><br>");

  $link_01 = mysql_connect("localhost", "tdehaas", "HywJ673fe5") or die(mysql_error());

  $db_01 = mysql_select_db('pjd') or die(mysql_error());

  $sql_01 = "SELECT listing_id, price, address, city
  			   FROM listings
              ORDER BY city, price DESC, address";

  $res_01 = mysql_query($sql_01) or die(mysql_error());

  while($row_01 = mysql_fetch_array($res_01)) {

    while( list($key_01, $value_01) = each($row_01)) {

      if($key_01 == "listing_id")
      { $link_01 = $value_01; }

      else if($key_01 == "address")
      { $address_01 = $value_01; }

      else if($key_01 == "city")
      { $city_01 = $value_01; }

      else if($key_01 == "price")
      { $price_01 = $value_01; }

      else {}

    }

  print("<font size='-1'><b><i>$$price_01</i></b><br><a href='listing.php?listing_num=$link_01'>$address_01,</a><br>$city_01</font><br><br>");

  }

?>
                        </td></tr>
                        </table>
                        </td>
                        <td width="600" bgcolor="#FFFFFF"><table
                        border="0" cellpadding="0"
                        cellspacing="0" width="600">
                            <tr>
                                <td align="center" width="600"><div
                                align="center"><center><table
                                border="0" cellpadding="0"
                                cellspacing="0" width="600">
  <?php

  $link = mysql_connect("localhost", "tdehaas", "HywJ673fe5") or die(mysql_error());

  $db = mysql_select_db('pjd') or die(mysql_error());

  $sql = "SELECT listing_id, status, price, address, city, description
  			FROM listings
           ORDER BY city, price, address, status";

  $res = mysql_query($sql) or die(mysql_error());

  //setup for city test
  $last_city = "city";

  while($row = mysql_fetch_array($res)) {

    while( list($key, $value) = each($row)) {

      if($key == "listing_id")
      { $link = $value; }

      else if($key == "address")
      { $address = $value; }

      else if($key == "city")
      { $city = $value; }

      else if($key == "price")
      { $price = $value; }

      else if($key == "description")
      { $description = $value; }

      else if($key == "status")
      { $status = $value; }

      else {}

    }

    if($city != $last_city) {
     print("<table border='0' cellspacing='0' width='600'  bgcolor='#800000' align='center'>
    			<tr>
    			<td bgcolor='#800000' align='center'>
    			<p align='center'><font color='#FFFFFF' size='+2'><b><i>$city</i></b></font></p></td></tr></table>
            <table border='0' cellspacing='0' width='600'  bgcolor='#800000' align='center'>
    			<tr>
    			<td bgcolor='#FFFFFF' align='center'>
    			<p align='center'><hr>");
     if($status == "SOLD" || $status == "NEW" || $status == "PENDING")
     { print("<font color='#800000'><b>$status!</b></font><br>"); }
     print("<b><i>$$price</i><br><a href='listing.php?listing_num=$link'>$address, $city</b></a><br>$description<br></p><hr></td></tr></table>");
    }

    else {
     print("<table border='0' cellspacing='0' width='600'  bgcolor='#800000' align='center'>
    			<tr>
    			<td bgcolor='#FFFFFF' align='center'>
    			<p align='center'>");
     if($status == "SOLD" || $status == "NEW" || $status == "PENDING")
     { print("<font color='#800000'><b>$status!</b></font><br>"); }
     print("<b><i>$$price</i><br><a href='listing.php?listing_num=$link'>$address, $city</b></a><br>$description<br></p><hr></td></tr></table>");
    }

    $last_city = $city;

  }

?>

                                </td>
                            </tr>
                        </table>
                        </td>
                    </tr>
                </table>
                </center></div></td>
            </tr>
            <tr>
                <td bgcolor="#FFFFFF"><div align="center"><center><table
                border="0" cellspacing="1" width="750">
                    <tr>
                        <td width="750" bgcolor="#FFFFFF">©2003
                        PJ deHaas Properties. </td>
                    </tr>
                </table>
                </center></div></td>
            </tr>
        </table>
        </center></div></td>
    </tr>
</table>
</center></div>
</body>
</html>