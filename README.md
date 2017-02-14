# CSC 648 Section 1, Group 2 M0
# Group 2's home page can found at: www.sfsuse.com/~sp17g02/

# Members and links to About-Me page:
 - Ivan Yu (www.sfsuse.com/~ivnyu/)
 - Ajinkya Chalke (www.sfsuse.com/~achalke/)
 - Bradley Ng (www.sfsuse.com/~bkng/)
 - Thao Luu (www.sfsuse.com/~tluu4/)
 - Jerry Auyeung (www.sfsuse.com/~jerrya/)
 - David Rodriguez (www.sfsuse.com/~drodri11/)

# Project Overview
This project uses the CakePHP Framework to create the group's home page, which contains links to
the group member's about-me pages.
The contents displayed in each of the member's about-me page, and the group's home page, are created
by the .ctp files contained in the /src/Template/Pages directory.
Each of the member's ssh accounts, the group ssh account and the github repository all contain the same
project. The routes.php file contained in the config directory determines which .ctp file is rendered on
a given site. The routes.php file checks for the URL and renders the corresponding page.
The images used in this project are contained in the webroot/img directory. 
