Imgur Scanner Project
=============

PHP project that scans imgur URLs for images


imgurbrowse.php
===============
This PHP Script will scan through imgur image URLs by generating the image name 
in a sequential order ( 11111.jpg, 11112.jpg... or aaaaa.jpg aaaab.jpg). 
the URL will user a GET method so you could save and resume your progress.
I accomplished this using a string with available characters to use in the image name,
and rotating through them.

randomimgur.php
===============
This PHP Script will randomly generate possible imgur URLs. 
Refreshing the page will re-generate random images


Disclaimer: This code is in no way associated or approved by imgur. Use at your own risk. 
