# CSC 648 Section 1, Group 2 M0
# Group 2's home page can found at: www.sfsuse.com/~sp17g02/

# Members:
 - Ivan Yu
 - Ajinkya Chalke
 - Bradley Ng
 - Thao Luu
 - Jerry Auyeung
 - David Rodriguez

# Project Overview
This project uses the CakePHP Framework to create the group's home page, which contains links to
the group member's about-me pages. When the user clicks the link, the corresponding about-me page is displayed,
and the URL will look something like: sfsuse.com/~sp17g02/pages/brad\_page for example.
This is how the links work:
 - In the src/Template/Pages/home.ctp file, the links are made with the following format: 
#  $this->Html->link('link name', ['controller' => 'Pages', 'action' => 'display', 'ctp\_file\_name'] )
- when clicked, the ctp file specified by the 'ctp\_file\_name' is rendered on the page.
- a .htaccess file is added on the root directory of this project to allow the links to work properly.

# Project Overview
This project uses the CakePHP Framework to create the group's home page, which contains links to
the group member's about-me pages.
The contents displayed in each of the member's about-me page, and the group's home page, are created
by the .ctp files contained in the /src/Template/Pages directory.
Each of the member's ssh accounts, the group ssh account and the github repository all contain the same
project. The routes.php file contained in the config directory determines which .ctp file is rendered on
The images used in this project are contained in the webroot/img directory. 
