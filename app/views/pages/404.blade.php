<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style type="text/css">
		/*
		HTML 5 Template Name: 
		File: 404 - 10 CSS
		Author: OS Templates
		Author URI: http://www.os-templates.com/
		Licence: <a href="http://www.os-templates.com/template-terms">Website Template Licence</a>
		*/

		#fof{display:block; position:relative; width:100%; height:450px; background:url("{{asset('public/backend')}}/images/404.png") top center no-repeat; line-height:1.6em; text-align:center;}
		#fof .positioned{padding-top:150px;}
		#fof .hgroup{margin-bottom:20px;}
		#fof .hgroup h1{margin-bottom:0; font-size:80px; text-transform:uppercase;}
		#fof .hgroup h2{margin-bottom:0; font-size:60px;}
		#fof p{display:block; margin:0 0 25px 0; padding:0; font-size:16px;}
		#fof p:last-child{margin-bottom:0;}
		#fof, #fof a{color:#FFFFFF; background-color:transparent;}
		#fof a{font-weight:bold;}
	</style>
</head>
<body>
	
<div class="wrapper row2">
  <div id="container" class="clear">
    <!-- ####################################################################################################### -->
    <!-- ####################################################################################################### -->
    <!-- ####################################################################################################### -->
    <!-- ####################################################################################################### -->
    <section id="fof" class="clear">
      <div class="positioned">
        <!-- ####################################################################################################### -->
        <div class="hgroup">
          <h1>Sorry !</h1>
          <h2>404 Error</h2>
        </div>
        <p>The Page You Requested Could Not Be Found On Our Server</p>
        <p>Go Back To The <a href="javascript:history.go(-1)">Previous Page</a> OR Visit Our <a href="{{URL::to('/')}}">Homepage</a></p>
      </div>
      <!-- ####################################################################################################### -->
    </section>
    <!-- ####################################################################################################### -->
    <!-- ####################################################################################################### -->
    <!-- ####################################################################################################### -->
    <!-- ####################################################################################################### -->
  </div>
</div>
</body>
</html>