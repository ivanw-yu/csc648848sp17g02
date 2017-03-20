/* 
 * Instructions:
 * 
 * In MySQL, execute the following:
 *   source /path/to/db_schema_patch1.sql
 * 
 * List of changes:
 * 
 * -New table 'conditions' to store valid conditions for a listing.
 * -New foreign key 'condition_id' in table 'listings' to denote the condition
 *  of the listing.
 * -The table 'private_messages' has been extended with the foreign key
 *  'recipient_id' to denote the reciever.  The primary now consists of only
 *  the column 'conversation_id'.
 * -The table 'conversations' has had its 'sender_id' field renamed to
 *  'registered_user_id' to follow CakePHP conventions more closely.  An
 *  unecessary foreign key has been removed.
 * -New table 'images' to store multiple images for a single listing.
 *  The 'image' column of 'listings' is only for a thumbnail.  All of a
 *  listing's images are now stored in the 'images' table.
 */


CREATE TABLE conditions (
    condition_name VARCHAR(16),
    PRIMARY KEY (condition_name)
);

ALTER TABLE listings ADD condition_id VARCHAR(16);
ALTER TABLE listings ADD CONSTRAINT condition_id_fk
    FOREIGN KEY (condition_id) REFERENCES conditions (condition_name);

CREATE TABLE images (
    image_num INTEGER AUTO_INCREMENT,
    listing_id INTEGER,
    image LONGBLOB,
    PRIMARY KEY (image_num),
    FOREIGN KEY (listing_id) REFERENCES listings (listing_num)
);

/* Add recipient_id column and make primary key only conversation_id */
DROP TABLE private_messages;
DROP TABLE conversations;

CREATE TABLE conversations (
    conversation_num INTEGER NOT NULL,
    date_created DATETIME NOT NULL,
    message VARCHAR(256) NOT NULL,
    registered_user_id VARCHAR(64) NOT NULL,
    recipient_id VARCHAR(64) NOT NULL,
    PRIMARY KEY (conversation_num, date_created, registered_user_id, recipient_id),
    FOREIGN KEY registered_user_key (registered_user_id)
       REFERENCES registered_users (username),
    FOREIGN KEY recipient_key (recipient_id)
        REFERENCES registered_users (username)
);

CREATE TABLE private_messages (
    subject VARCHAR(64) NOT NULL,
    registered_user_id VARCHAR(64) NOT NULL,
    recipient_id VARCHAR(64) NOT NULL,
    conversation_id INTEGER NOT NULL,
    is_read BOOLEAN NOT NULL,
    PRIMARY KEY (conversation_id),
    FOREIGN KEY conversation_key (conversation_id)
        REFERENCES conversations (conversation_num),
    FOREIGN KEY registered_user_key (registered_user_id)
        REFERENCES registered_users (username),
    FOREIGN KEY recipient_key (recipient_id)
        REFERENCES registered_users (username)
);
