DROP TABLE images;
DROP TABLE purchased_lists;
DROP TABLE wish_lists;
DROP TABLE watching_lists;
DROP TABLE selling_lists;
DROP TABLE sold_lists;
DROP TABLE private_messages;
DROP TABLE conversations;
DROP TABLE tags;
DROP TABLE listings;
DROP TABLE courses;
DROP TABLE conditions;
DROP TABLE registered_users;
DROP TABLE categories;


CREATE TABLE registered_users (
    username VARCHAR(64),
    password VARCHAR(64) NOT NULL,
    is_admin BOOLEAN DEFAULT 0,
    is_active BOOLEAN DEFAULT 1,
    email VARCHAR(64),
    date_created DATETIME,
    PRIMARY KEY (username)
);

CREATE TABLE categories (
    category_name VARCHAR(64),
    image LONGBLOB,
    PRIMARY KEY (category_name)
);

CREATE TABLE courses (
    course_name CHAR(6),
    PRIMARY KEY (course_name)
);

CREATE TABLE conditions (
    condition_name VARCHAR(16),
    PRIMARY KEY (condition_name)
);

CREATE TABLE listings (
    listing_num INTEGER AUTO_INCREMENT,
    date_created DATETIME NOT NULL,
    is_sold BOOLEAN NOT NULL,
    price FLOAT NOT NULL,
    location VARCHAR(128) NOT NULL,
    item_desc VARCHAR(256) NOT NULL,
    title VARCHAR(64) NOT NULL,
    category_id VARCHAR(64) NOT NULL,
    registered_user_id VARCHAR(64) NOT NULL,
    course_id CHAR(6),
    image LONGBLOB,
    condition_id VARCHAR(16),
    PRIMARY KEY (listing_num),
    FOREIGN KEY category_key (category_id)
        REFERENCES categories (category_name),
    FOREIGN KEY condition_id_fk (condition_id) REFERENCES conditions (condition_name),
    FOREIGN KEY course_key (course_id) REFERENCES courses (course_name),
    FOREIGN KEY registered_user_key (registered_user_id)
        REFERENCES registered_users (username) ON DELETE CASCADE
);

CREATE TABLE tags (
    listing_id INTEGER,
    tag_name VARCHAR(32),
    PRIMARY KEY (listing_id, tag_name),
    FOREIGN KEY listing_key (listing_id) REFERENCES listings (listing_num) ON DELETE CASCADE
);

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

CREATE TABLE watching_lists (
    registered_user_id VARCHAR(64) NOT NULL,
    listing_id INTEGER NOT NULL,
    PRIMARY KEY (registered_user_id, listing_id),
    FOREIGN KEY listing_key (listing_id)
        REFERENCES listings (listing_num) ON DELETE CASCADE,
    FOREIGN KEY registered_user_key (registered_user_id)
        REFERENCES registered_users (username) ON DELETE CASCADE
);

CREATE TABLE selling_lists (
    registered_user_id VARCHAR(64) NOT NULL,
    listing_id INTEGER NOT NULL,
    PRIMARY KEY (registered_user_id, listing_id),
    FOREIGN KEY listing_key (listing_id)
        REFERENCES listings (listing_num) ON DELETE CASCADE,
    FOREIGN KEY registered_user_key (registered_user_id)
        REFERENCES registered_users (username) ON DELETE CASCADE
);

CREATE TABLE sold_lists (
    registered_user_id VARCHAR(64) NOT NULL,
    listing_id INTEGER NOT NULL,
    PRIMARY KEY (registered_user_id, listing_id),
    FOREIGN KEY listing_key (listing_id)
        REFERENCES listings (listing_num) ON DELETE CASCADE,
    FOREIGN KEY registered_user_key (registered_user_id)
        REFERENCES registered_users (username) ON DELETE CASCADE
);

CREATE TABLE wish_lists (
    registered_user_id VARCHAR(64) NOT NULL,
    listing_id INTEGER NOT NULL,
    PRIMARY KEY (registered_user_id, listing_id),
    FOREIGN KEY listing_key (listing_id)
        REFERENCES listings (listing_num) ON DELETE CASCADE,
    FOREIGN KEY registered_user_key (registered_user_id)
        REFERENCES registered_users (username) ON DELETE CASCADE
);

CREATE TABLE purchased_lists (
    registered_user_id VARCHAR(64) NOT NULL,
    listing_id INTEGER NOT NULL,
    PRIMARY KEY (registered_user_id, listing_id),
    FOREIGN KEY listing_key (listing_id)
        REFERENCES listings (listing_num) ON DELETE CASCADE,
    FOREIGN KEY registered_user_key (registered_user_id)
        REFERENCES registered_users (username) ON DELETE CASCADE
);

CREATE TABLE images (
    image_num INTEGER AUTO_INCREMENT,
    listing_id INTEGER,
    image LONGBLOB,
    PRIMARY KEY (image_num),
    FOREIGN KEY (listing_id) REFERENCES listings (listing_num) ON DELETE CASCADE
);

INSERT INTO categories (category_name) VALUES ('books');
INSERT INTO categories (category_name) VALUES ('clothes');
INSERT INTO categories (category_name) VALUES ('electronics');
INSERT INTO categories (category_name) VALUES ('others');

INSERT INTO courses (course_name) VALUES ('csc600');
INSERT INTO courses (course_name) VALUES ('csc648');
INSERT INTO courses (course_name) VALUES ('csc667');

INSERT INTO conditions (condition_name) VALUES ('good');
INSERT INTO conditions (condition_name) VALUES ('new');
INSERT INTO conditions (condition_name) VALUES ('fair');
INSERT INTO conditions (condition_name) VALUES ('poor');


