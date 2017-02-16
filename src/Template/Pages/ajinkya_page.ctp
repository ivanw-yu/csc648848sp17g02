<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ajinkya Chalke</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      font: 400 15px Lato, sans-serif;
      line-height: 1.8;
      color: #818181;
  }
  h2 {
      font-size: 24px;
      text-transform: uppercase;
      color: #303030;
      font-weight: 600;
      margin-bottom: 30px;
  }
  h4 {
      font-size: 19px;
      line-height: 1.375em;
      color: #303030;
      font-weight: 400;
      margin-bottom: 30px;
  }
  .jumbotron {
      /*background-color: #f4511e;*/
    background-image: url(<?php if(strpos(dirname($_SERVER['PHP_SELF']), 'sp17g02') !== false){echo '..';}else{ echo 'webroot';} ?>/img/ajinkyawp.jpeg);

    background-attachment: fixed;
    background-position: top;
    background-repeat: no-repeat;
    background-size: cover;

    color: #fff;
    padding: 100px 25px;
    font-family: Montserrat, sans-serif;
  }
  .container-fluid {
      padding: 60px 50px;
  }
  .bg-grey {
      background-color: #f6f6f6;
  }
  .logo-small {
      color: #f4511e;
      font-size: 50px;
  }
  .logo {
      color: #f4511e;
      font-size: 200px;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail img {
      width: 100%;
      height: 100%;
      margin-bottom: 10px;
  }
  .carousel-control.right, .carousel-control.left {
      background-image: none;
      color: #f4511e;
  }
  .carousel-indicators li {
      border-color: #f4511e;
  }
  .carousel-indicators li.active {
      background-color: #f4511e;
  }
  .item h4 {
      font-size: 19px;
      line-height: 1.375em;
      font-weight: 400;
      font-style: italic;
      margin: 70px 0;
  }
  .item span {
      font-style: normal;
  }
  .panel {
      border: 1px solid #f4511e;
      border-radius:0 !important;
      transition: box-shadow 0.5s;
  }
  .panel:hover {
      box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
      border: 1px solid #f4511e;
      background-color: #fff !important;
      color: #f4511e;
  }
  .panel-heading {
      color: #fff !important;
      background-color: #f4511e !important;
      padding: 25px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 0px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
  }
  .panel-footer {
      background-color: white !important;
  }
  .panel-footer h3 {
      font-size: 32px;
  }
  .panel-footer h4 {
      color: #aaa;
      font-size: 14px;
  }
  .panel-footer .btn {
      margin: 15px 0;
      background-color: #f4511e;
      color: #fff;
  }
  .navbar {
      margin-bottom: 0;
      background-color: #f4511e;
      z-index: 9999;
      border: 0;
      font-size: 12px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
      font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #f4511e !important;
      background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
  }
  footer .glyphicon {
      font-size: 20px;
      margin-bottom: 20px;
      color: #f4511e;
  }
  .slideanim {visibility:hidden;}
  .slide {
      animation-name: slide;
      -webkit-animation-name: slide;
      animation-duration: 1s;
      -webkit-animation-duration: 1s;
      visibility: visible;
  }
  @keyframes slide {
    0% {
      opacity: 0;
      transform: translateY(70%);
    }
    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    }
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
  .profile-pic{
    	border-radius: 50%;
    	margin-left: 60px;

    }
    .right-side{
    	float : right;
    }
    .left-side{
    	float : left;
    }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
        width: 100%;
        margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
        font-size: 150px;
    }
  }
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header" >
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about">ABOUT</a></li>
        <li><a href="#experience">EXPERIENCE</a></li>
        <li><a href="#projects">PROJECTS</a></li>
        <li><a href="#education">EDUCATION</a></li>
        <li><a href="#contact">CONTACT</a></li>
      </ul>
    </div>
</div>
</nav>
<div class="jumbotron text-center">
  <h1>Ajinkya Chalke</h1>
  <p>Developer</p>
</div>

<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2>About me</h2><br>
      <h4>Computer Science Graduate student with two years of professional experience in the software development industry</h4>
      <p>I am passionate about learning new technologies, solving challenges and helping others. I have won numerous competitions and automated tonnes of tasks. I am always interested in giving back to the society.</p>
    </div>
  </div>
</div>

<div class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon logo slideanim">
		<img class="profile-pic" src="<?php if(strpos(dirname($_SERVER['PHP_SELF']), 'sp17g02') !== false){echo '..';}else{ echo 'webroot';} ?>/img/ajinkyadp.jpeg" width="200" height="200">
      </span>
    </div>
    <div class="col-sm-8">
      <h2>Present</h2><br>
      <h4><strong>Work:</strong> <br>
      	Teaching Assistant | San Francisco State University <span class="right-side">Feb. 2017 - Present</span> <br>
      	•	Teaching Assistant for two courses at the university.<br>
		•	CSC 600 Programming Languages Design, this course deals with design concepts for high-level programming languages.<br>
		•	CSC 415 Operating Systems Principles, this course deals with the study of Operating System concepts.<br></h4>
      <p><strong>Courses:</strong><br>
      	•	Data Mining<br>
      	•	Advanced Operating System<br>
      	•	Software Engineering<br>
      </p>
    </div>
  </div>
</div>


<div id="experience" class="container-fluid text-center">
  <h2>EXPERIENCE</h2>
  <h4><span class="left-side"><strong>Systems Engineer | Infosys Ltd. </strong></span>
  		<span class="right-side">Pune, India | Oct. 2014 - Jun. 2016</span><br>
      	<span class="left-side">•	Developed software backend in .Net framework using C#.</span><br>
		<span class="left-side">•	Developed database in Microsoft SQL, performed database optimization and performance tuning.</span><br>
		<span class="left-side">•	Developed Web API in Web services.</span><br>
		<span class="left-side">•	Developed web applications using JavaScript and JQuery.</span><br>
  		<span class="left-side">•	Worked together with client to complete the empirical feedback loop and in developing new features and resolving user issues. Our project implemented Scrum.</span><br>
  		<span class="left-side">•	Built numerous automation projects to completely automate mundane tasks.</span><br>
  		<br>
  		<br>
  		<span class="left-side"><strong>Systems Engineer Trainee| Infosys Ltd. </strong></span>
  		<span class="right-side">Mysore, India | Jun. 2014 - Oct. 2014</span><br>
      	<span class="left-side">•	Developed a mid-sized scalable billing and invoicing application.</span><br>
		<span class="left-side">•	Secured place in the top 1% out of the 1000 training candidates.</span><br>
  	<h4>

</div>


<div id="projects" class="container-fluid text-center bg-grey">
  <h2>Projects</h2><br>
  <div class="row text-center slideanim">
    <h4><span class="left-side"><strong>Train Operating Sytem</strong></span>
  		<span class="right-side">San Francisco State University | Spring 2017 </span><br>
      	<span class="left-side">Objective: To build an operating system for Intel x86, IBM PC architecture.</span><br>
		<span class="left-side">•	The operating system is developed in C programming language along with assembly language to some extent.</span><br>
		<span class="left-side">•	Developed Web API in Web services.</span><br>
		<span class="left-side">•	The OS will support multitasking (up-to 20 process) and will also have a shell built over it.</span><br>
		<br>
		<br>
		<span class="left-side"><strong>Event Browser</strong></span>
  		<span class="right-side">San Francisco State University | Fall 2017 </span><br>
      	<span class="left-side">Objective: To build an android application for browsing nearby events.</span><br>
		<span class="left-side">•	The application extracts information for concerts, meetups and other such events from numerous sources and provides it in one single application.</span><br>
		<span class="left-side">•	The application has a beautiful interface which also integrates real-time search and google maps features.</span><br>
		<br>
		<br>
		<span class="left-side"><strong>Bike Suspension System</strong></span>
  		<span class="right-side">K.K.W.I.E.E.R (University of Pune)  | Spring 2014 </span><br>
      	<span class="left-side">Objective: To innovate the existing bike suspension system.</span><br>
		<span class="left-side">•	Developed an adaptive bike suspension system which can provide specific suspension requirements for both mountain and street biking.</span><br>
		<span class="left-side">•	Used Solid Works for simulation and modelling.</span><br>
		<span class="left-side">•	Achieved 1st place in a Google and Siemens conducted national level product innovation competition.</span><br>
  </div><br>

  <h2>Some Achievements</h2>
  <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <h4>Outstanding overall performer award, 2013<br><span style="font-style:normal;">Infosys Ltd, India</span></h4>
      </div>
      <div class="item">
        <h4>Achieved 1st position in National Level Innovative Design Competition<br><span style="font-style:normal;">GTT Full Throttle, sponsored by Google and Siemens</span></h4>
      </div>
      <div class="item">
        <h4>Achieved 2nd position in a Hackathon<br><span style="font-style:normal;">Developer Week Hackathon, Neura Sponsor Challenge</span></h4>
      </div>
    </div>

    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<div id="education" class="container-fluid">
  <div class="text-center">
    <h2>Education</h2>
  </div>
  <span class="left-side"><strong>San Francisco State University | M. S. Computer Science (CGPA 4.0)</strong></span>
  		<span class="right-side">Aug. 2016 - Present</span><br>
  <br>
  <br>
  <span class="left-side"><strong>K.K.W.I.E.E.R (University of Pune), India | B.S. Mechanical Engineering with Honors </strong></span>
  		<span class="right-side">Aug. 2010 – Aug. 2014</span><br>
  <br>
</div>

<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Address: -</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> San Francisco, US</p>
      <p><span class="glyphicon glyphicon-phone"></span> +1-415-966-5759</p>
      <p><span class="glyphicon glyphicon-envelope"></span> achalke@sfsu.edu</p>
    </div>

    <div class="text-right">
    	<br>
    	<br>
    	<br>
    	<br>
    	<span class="right-side"><a href="http://www.github.com/ajinkyachalke" title="GitHub">GitHub</a>
    	&nbsp
    	&nbsp
    	&nbsp
    	&nbsp
    	<a href="http://www.linkedin.com/in/ajinkya-chalke" title="LinkedIn">LinkedIn</a>
    	</span>
    </div>
  </div>
  <div class="text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  </div>
</div>

<script>
$(document).ready(function(){
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    if (this.hash !== "") {
      event.preventDefault();
      var hash = this.hash;
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
        window.location.hash = hash;
      });
    }
  });
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>
</body>
</html>
