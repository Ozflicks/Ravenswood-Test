<html>

<head>
<meta http-equiv="Content-Type"
content="text/html; charset=iso-8859-1">
<meta name="GENERATOR" content="Microsoft FrontPage Express 2.0">
<title>PJ deHaas Properties (661)-724-2592</title>
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
                cellpadding="0" cellspacing="0" width="750"
                bgcolor="#800000">
                    <tr>
                        <td valign="top" width="150" bgcolor="#FFFFFF">
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
                        </strong></em><a href="http://www.pjdehaasproperties.com/links.htm"><em><strong>LINKS</strong></em></a><br></p>
                        </td></tr>
                        <tr><td valign="top" width="150" height="100%">
<?
  $link = mysql_connect("localhost", "tdehaas", "HywJ673fe5") or die(mysql_error());

  $db = mysql_select_db('pjd') or die(mysql_error());

  $sql = "SELECT city
  			FROM listings
           WHERE listing_id = $listing_num";

  $res = mysql_query($sql) or die(mysql_error());

  while($row = mysql_fetch_array($res)) {

    while( list($key, $value) = each($row)) {

      $key_city = $value;
    }
  }

  print("<br><hr><center>Other listings in<br><b><i>$key_city</i></b><center><br>");

  $link_01 = mysql_connect("localhost", "tdehaas", "HywJ673fe5") or die(mysql_error());

  $db_01 = mysql_select_db('pjd') or die(mysql_error());

  $sql_01 = "SELECT listing_id, price, address, city
  			   FROM listings
              ORDER BY RAND() LIMIT 50";

  $res_01 = mysql_query($sql_01) or die(mysql_error());

  $j=0;

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

     if($city_01 == $key_city && $j<10)
     { print("<font size='-1'><b><i>$$price_01</i></b><br><a href='listing.php?listing_num=$link_01'>$address_01</a></font><br><br>");
       $j++;}

  }

  print("<hr><i>to view all listings</i><br><b><a href='http://www.pjdehaasproperties.com/listings.htm'>click here</a></b>");
?>
                        </td></tr>
                        </table>
                        </td>
                        <td width="600" bgcolor="#FFFFFF">

<?php

  //print($listing_num); //FOR DEBUGGING

  $link_02 = mysql_connect("localhost", "tdehaas", "HywJ673fe5") or die(mysql_error());

  $db_02 = mysql_select_db('pjd') or die(mysql_error());

  $sql_02 = "SELECT listing_id, address, city, state, zipcode, price, bedrooms, bathrooms, sq_ft, lot_size, yr_built, description, status, agent
  			FROM listings
           WHERE listing_id = $listing_num";

  $res_02 = mysql_query($sql_02) or die(mysql_error());

  while($row_02 = mysql_fetch_array($res_02)) {

    $i=0;

    while( list($key_02, $value_02) = each($row_02)) {

      if(is_string($value_02))
        { $listing[$i] = $value_02; }
      else
        { $listing[$i] = "N/A"; }
      //print("$i : $listing[$i]<br>");  //FOR DEBUGGING
      $i++;

    }
  }

  //setup for pictures of listings
  $picture_big = "images/listings/picture_big.JPG";
  $picture_small = "images/listings/picture_small.JPG";
  $picture_01 = "images/listings/".$listing[02]."_01.JPG";
  $picture_02 = "images/listings/".$listing[02]."_02.JPG";
  $picture_03 = "images/listings/".$listing[02]."_03.JPG";
  $picture_04 = "images/listings/".$listing[02]."_04.JPG";
  //{print("$picture_01");} //FOR DEBUGGING
  //{print("$picture_02");} //FOR DEBUGGING
  //{print("$picture_03");} //FOR DEBUGGING
  //{print("$picture_04");} //FOR DEBUGGING
  ?>

                        <table
                        border="0" cellpadding="0"
                        cellspacing="0" width="600">
                            <tr>
                                <td align="center" width="600"><font size="+2"><em><strong><? print("$$listing[10]");?></strong></em></font>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top" width="600">
                                <? if (file_exists($picture_01))
                                	{print("<img src='".$picture_01."' width='550' height='379'>");}
                                   else
                                    {print("<img src='".$picture_big."' width='550' height='379'>");}
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" width="600"><h2><em><strong><? print("$listing[2], $listing[4]");?></strong></em></h2>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" width="600"><table
                                border="0" cellpadding="0"
                                cellspacing="0" width="600">
                                    <tr>
                                        <td width="120"><hr><p
                                        align="center"><i>Bedrooms</i><br><? print("$listing[12]");?></p><hr><br>
                                        </td>
                                        <td width="120"><hr><p
                                        align="center"><i>Bathrooms</i><br><? print("$listing[14]");?></p><hr><br>
                                        </td>
                                        <td width="120"><hr><p
                                        align="center"><i>Sq. Ft.</i><br><? print("$listing[16]");?></p><hr><br>
                                        </td>
                                        <td width="120"><hr><p
                                        align="center"><i>Lot Size</i><br><? print("$listing[18]");?></p><hr><br>
                                        </td>
                                        <td width="120"><hr><p
                                        align="center"><i>Year Built</i><br><? print("$listing[20]");?></p><hr><br>
                                        </td>
                                    </tr>
                                </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" width="600"><? print("$listing[22]");?>
                                <br><br></td>
                            </tr>
                            <tr>
                                <td align="center" width="600"><table
                                border="0" width="600">
                                    <tr>
                                        <td align="center" width="200">
                                        <? if (file_exists($picture_02))
                                        	{print("<img src='".$picture_02."' width='180' height='124'>");}
                                           else
                                    		{print("<img src='".$picture_small."' width='180' height='124'>");}?>
                                        </td><td align="center" width="200">
                                        <? if (file_exists($picture_03))
                                        	{print("<img src='".$picture_03."' width='180' height='124'>");}
                                           else
                                    		{print("<img src='".$picture_small."' width='180' height='124'>");}?>
                                        </td><td align="center" width="200">
                                        <? if (file_exists($picture_04))
                                        	{print("<img src='".$picture_04."' width='180' height='124'>");}
                                           else
                                    		{print("<img src='".$picture_small."' width='180' height='124'>");}?>
                                        </td>
                                    </tr>
                                </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" width="600">

<?

  if(is_string($listing[26]) && $listing[26] != "N/A") {
    $sql2 = "SELECT name, office
  	           FROM agents
              WHERE agent_id = $listing[26]";

    $res2 = mysql_query($sql2) or die(mysql_error());

    while($row2 = mysql_fetch_array($res2)) {

    $i=0;

      while( list($key2, $value2) = each($row2)) {

        if(is_string($value2))
          { $agent[$i] = $value2; }
        $i++;
      }
    }

    $sql3 = "SELECT telephone
  	           FROM offices
              WHERE office_id = $agent[2]";

    $res3 = mysql_query($sql3) or die(mysql_error());

    while($row3 = mysql_fetch_array($res3)) {

    $i=0;

      while( list($key3, $value3) = each($row3)) {

        if(is_string($value3))
          { $office[$i] = $value3; }
        $i++;
      }
    }

    print("For more information please call <i>$agent[0]</i> at $office[0]");
  }

  else
    { print("For more information please call the main offices of PJ deHaas Properties at (661)724-2592"); }

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