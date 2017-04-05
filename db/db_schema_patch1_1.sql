/*
 * Instructions:
 *
 * In MySQL, execute the following:
 *   source /path/to/db_schema_patch1_1.sql
 *
 * List of changes:
 *
 * -New table 'images' to store multiple images for a single listing.
 * -The 'image' column of 'listings' is only for a thumbnail.  All of a
 *  listing's images are now stored in the 'images' table.
 */


CREATE TABLE images (
    image_num INTEGER AUTO_INCREMENT,
    listing_id INTEGER,
    image LONGBLOB,
    PRIMARY KEY (image_num),
    FOREIGN KEY (listing_id) REFERENCES listings (listing_num) ON DELETE CASCADE
);
