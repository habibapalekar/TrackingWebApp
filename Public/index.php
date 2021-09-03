<?php

require "../config.php";
include "templates/header.php"; ?>

<h3> Rationale </h3>
<p> For this project I decided to design a web application that assists users with tracking their calorie intake called Your Calorie Tracker. As this web page is only in its initial stage, at this point it allows registered users to add food entries to their online diary and edit and delete entries associated under their user profile. </p>

<p> Majority of the php coding used for creating this website has been derived from the tutorials given in class. However, there have been minor adjustments to alter the look of the website such as the display of data entered by users. Instead of displaying the results on the ‘View diary’ and ‘Edit a food entry’ page in rows, I have changed the code to display results in a table form. </p>

<p> As there was minimal CSS used on this web page, instead of adding in a CSS library, I have included a straightforward external CSS file that applies to all pages. The colour scheme used for the web application is fairly simple at this stage and mainly uses only two colours to maintain the minimal theme used throughout.</p>
<p> An issue that I faced with this project was towards the end regarding getting it live and online. I was able to overcome this challenge by simply resetting my SQL password and updating it on my config.php file. </p>

<p> Additionally, given the limited time I had to work on this project I was unable to add a few features that would have benefitted the design. I would like to have included a homepage on index.php which showed the user who was currently logged in their calorie intake overview. I would also have set out the diary to display results by day and show the user their overall calorie intake for that day. </p>
    
<?php include "templates/footer.php"; ?>