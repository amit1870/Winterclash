<?php

include_once 'include/db_connect.php';
include_once 'include/functions.php';

sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="http://localhost/winterclash/css/bootstrap.css" rel="stylesheet">

	    <link href="http://localhost/winterclash/css/signin.css" rel="stylesheet">
	    <link href="http://localhost/winterclash/css/signup.css" rel="stylesheet">
	    <script type="text/JavaScript" src="http://localhost/winterclash/js/sha512.js"></script> 
        <script type="text/JavaScript" src="http://localhost/winterclash/js/forms.js"></script>
        <!--[if lt IE 9]>
	      <script src="http://localhost/winterclash/js/html5shiv.js"></script>
	      <script src="http://localhost/winterclash/js/respond.min.js"></script>
	    <![endif]-->
	</head>
	<body>
		<?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?>
		<div class="container">
			<div class="row">
		        <div class="col-md-3"></div>
		        <div class="col-md-4" style="top:150px">
		        	<form action="include/process_login.php" method="post" name="login_form" class="form-signin" role="form">
				        <input type="text" class="form-control" placeholder="Moblie/Email" name="player" autofocus>
				        <input type="password" class="form-control" placeholder="Password" name="passkey" >
				        <label class="checkbox">
				          <input type="checkbox" value="remember-me"> Remember me
				          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				          <a href="#">Forgot password</a>
				        </label>
				        <button class="btn btn-primary btn-block" onclick="formhash(this.form, this.form.passkey);" >Clash</button>
				        <p>You are currently logged <?php echo $logged ?>.</p>
				    </form>


		        </div>

        		<div class="col-md-5" style="top:110px">
        			<form method="post" action="include/register.inc.php"  name="signup_form" class="form-signup" role="form">
				        <input type="text" class="form-control" name="player" placeholder="Name">
				        <input type="text" class="form-control" name="handle" placeholder="Mobile/Email">
				        <input type="text" class="form-control" name="confirm" placeholder="Confirm Mobile/Email">
				        <input type="password" class="form-control" name="passkey" placeholder="New password" value="n0wL!nux">
				        <select name="birthday" class="birth">
				        	<option selected value="-1">Day</option>
				        	<option>1</option><option>2</option><option>3</option><option>4</option>
				        	<option>5</option><option>6</option><option>7</option><option>8</option>
				        	<option>9</option><option>10</option><option>11</option><option>12</option>
				        	<option>13</option><option>14</option><option>15</option><option>16</option>
				        	<option>17</option><option>18</option><option>19</option><option>20</option>
				        	<option>21</option><option>22</option><option>23</option><option>26</option>
				        	<option>27</option><option>28</option><option>29</option><option>30</option>
				        	<option>31</option>
				        </select>
				        <select name="birthmonth" class="birth">
				        	<option value="-1">Month</option>
				        	<option value="1">Jan</option><option value="2">Feb</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8">Aug</option><option value="9">Sep</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option>
				        </select>
				        <select name="birthyear" class="birth">
				        	<option>Year</option>
				        	<option>1950</option><option>1951</option><option>1952</option><option>1953</option><option>1954</option><option>1955</option><option>1956</option><option>1957</option><option>1958</option><option>1959</option><option>1960</option>

				        	<option>1961</option><option>1962</option><option>1963</option><option>1964</option><option>1965</option><option>1966</option><option>1967</option><option>1968</option><option>1969</option><option>1970</option>

				        	<option>1971</option><option>1972</option><option>1973</option><option>1974</option><option>1975</option><option>1976</option><option>1977</option><option>1978</option><option>1979</option><option>1980</option>

				        	<option>1981</option><option>1982</option><option>1983</option><option>1984</option><option>1985</option><option>1986</option><option>1987</option><option>1988</option><option>1989</option><option>1990</option>

				        	<option>1991</option><option>1992</option><option>1993</option><option>1994</option><option>1995</option><option>1996</option><option>1997</option><option>1998</option><option>1999</option><option>2000</option>

				        	<option>2001</option><option>2002</option><option>2003</option><option>2004</option><option>2005</option><option>2006</option><option>2007</option><option>2008</option><option>2009</option><option>2010</option>

				        	<option>2011</option><option>2012</option><option>2013</option><option>2014</option><option>2015</option><option>2016</option><option>2017</option><option>2018</option><option>2019</option><option>2020</option>
				        </select>
				        <hr></hr>
				        <input type="button" value="Signup" class="btn btn-success btn-block" onclick="return regformhash(this.form,this.form.player,this.form.handle,this.form.confirm,this.form.passkey,this.form.birthday,this.form.birthmonth,this.form.birthyear);" /> 
				    </form>


        		</div>
      		</div>
	      	

	    </div>
	</body>
</html>
