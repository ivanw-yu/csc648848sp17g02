# CSC 648 Section 1, Group 2 M2
# Group 2's home page can found at: www.sfsuse.com/~sp17g02/

# Members:
 - Ajinkya Chalke (Team Lead)
 - Ivan Yu (Technical Lead)
 - Bradley Ng (Backend/Database)
 - David Rodriguez (Quality Control, Backend/Database)
 - Thao Luu (Frontend/Design)
 - Jerry Auyeung (Backend/Frontend)

# Project Overview
# Vertical Prototype
The implementation, functionalities, set up and testing of the Vertical Prototype are described in the
VerticalPrototypeDocumentation.pdf file.
The homepage is found at www.sfsuse.com/~sp17g02/. The following summarizes how the database can be accessed:
- By first clicking on the 'browse' button in the homepage,the visitor is redirected to the page containing
  all valid categories contained in the Categories table. This page displaying all valid categories is found at http://sfsuse.com/~sp17g02/pages/browse.
- In http://sfsuse.com/~sp17g02/pages/browse, the valid categories are displayed as links which will take the visitor to a page containing all items
  belonging to that specific category. This is the first example of how the database is accessed in this page, because the categories listed
  will be the categories specified in the Categories table.
- Then, another example of how the database is accessed in this Vertical Prototype is shown when the visitor clicks on any of the categories.
  Clicking on any of the category links will take the visitor to a page containing all of the items belonging to that specific category, and the
  items are accessed from the Listings category. Images of items will be shown. For instance, clicking on the 'books' link in the page containing the
  categories will take the visitor to a page containing 5 items acquired from the database, all of which belong to the books category.
