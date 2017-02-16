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
# NOTE: The team's home page does not link to any of the individual ssh account urls.
(for example, clicking on Ajinkya's link DOES NOT direct the browser to the site contained in the sfsuse.com/~achalke/ url)
This is how the links work:
 - In the src/Template/Pages/home.ctp file, the links are made with the following format: 
#  $this->Html->link('link name', ['controller' => 'Pages', 'action' => 'display', 'ctp\_file\_name'] )
     - when clicked, the ctp file specified by the 'ctp\_file\_name' is rendered on the page, and this ctp file
       contains the contents of the corresponding about-me page.
- The group home page's contents are specified by the home.ctp file. 
- the config/routes.php file is configured in such a way that when the group home page is visited, the home.ctp file is rendered
  on the browser.
- a .htaccess file is added on the root directory of this project to allow the links to work properly.
