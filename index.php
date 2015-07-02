<! DOCTYPE html>
<html>
    <head>
        <title>PrimeBlocks</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css" rel = "stylesheet">
        <link href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel = "stylesheet">
    </head>
    <body>
        <div class = "navbar navbar-inverse navbar-static-top">
            <div class = "container">
                <a href="http://primeblocks.com" class="navbar-brand">PrimeBlocks</a>
                <button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
                    <span class = "icon-bar"></span>
                    <span class = "icon-bar"></span>
                    <span class = "icon-bar"></span>
                </button>
                <div class = "collapse navbar-collapse navHeaderCollapse">
                    <ul class = "nav navbar-nav navbar-right">
                    </ul>
                </div>
            </div>
        </div>
        <div class = "container text-center">
            <div id = "jumbotron" class = "jumbotron">
                <h2>Prime Blocks</h2>
                <p>Paycoin Prime Controller Monitor. Monitoring prime controller activity on the paycoin blockchain</p>
            </div>
        </div>
	<h5><center> This page only contains the last 1000 blocks. Click <a href="http://www.primeblocks.com/full/">Here</a> for a full dump <center></h5>
        <div class = "container">
            <div class ="panel panel-primary">
                <div class= "panel-heading">
                    <div id="custom-search-input">
                        <div class="input-group col-md-12">
                            <input type="text" id="search" class=" search-query form-control" placeholder="Search for a Prime controller" />
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                        </div>
                     </div>
                </div>
		<?php
		   $dbLink = mysql_connect('localhost', 'YOURMYSQLUSERNAME', 'YOURMYSQLPASSWORD');
		   mysql_select_db('primeblocks', $dbLink);
		   $sql = "SELECT ID, Height, TXID, Pubkey, Stake_Rate, Key_Number, Output, Address FROM blocksnew ORDER BY ID DESC LIMIT 1000";
		   $result = mysql_query($sql) or die(mysql_error());
		?>
		<table id="table" class="text-center table table-striped table-bordered table-condensed table-hover">
		   <thead>
		      <tr>
		         <th><center>Height</center></th>
			 <th><center>TXID</center></th>
			 <th><center>Key ID</center></th>
			 <th><center>Output</center></th>
		      </tr>
		   </thead>
		   <tbody>
		   <?php
		   while($row = mysql_fetch_array($result)) {
    		      echo "<tr>";
    		         echo "<td>" . $row['Height'] . "</td>";
    			 echo "<td><a href='https://chainz.cryptoid.info/xpy/tx.dws?{$row['TXID']} '>" . $row['TXID'] . "</a></td>";
    			 echo "<td>" . $row['Stake_Rate'] . ":" . $row['Key_Number'] . "</td>";
    			 echo "<td><a href='https://chainz.cryptoid.info/xpy/address.dws?{$row['Address']} '>" . $row['Output'] . "</a></td>";
    		      echo "</tr>";
		   }
		   ?>
		   </tbody>
		</table>
	    </div>
        </div>        
    <div class = "navbar navbar-default navbar-fixed-bottom">
        <div class= "container">
            <p class = "navbar-text pull-left">Built By Mullick And Cryptsy Staff</p>
            <a href = "https://www.cryptsy.com/" class = "navbar-btn btn-primary btn pull-right">Cryptsy</a>
        </div>
    </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
  </body>
</html>
