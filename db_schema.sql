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
    PRIMARY KEY (category_name)
);

CREATE TABLE courses (
    course_name CHAR(6),
    PRIMARY KEY (course_name)
);

CREATE TABLE listings (
    listing_num INTEGER AUTO_INCREMENT,
    date_created DATETIME NOT NULL,
    is_sold BOOLEAN NOT NULL,
    price VARCHAR(64) NOT NULL,
    location VARCHAR(128) NOT NULL,
    item_desc VARCHAR(256) NOT NULL,
    title VARCHAR(64) NOT NULL,
    category_id VARCHAR(64) NOT NULL,
    registered_user_id VARCHAR(64) NOT NULL,
    course_id CHAR(6),
    image LONGBLOB,
    PRIMARY KEY (listing_num),
    FOREIGN KEY category_key (category_id)
        REFERENCES categories (category_name),
    FOREIGN KEY course_key (course_id) REFERENCES courses (course_name),
    FOREIGN KEY registered_user_key (registered_user_id)
        REFERENCES registered_users (username)
);

CREATE TABLE tags (
    listing_id INTEGER,
    tag_name VARCHAR(32),
    PRIMARY KEY (listing_id, tag_name),
    FOREIGN KEY listing_key (listing_id) REFERENCES listings (listing_num)
);

CREATE TABLE conversations (
    conversation_num INTEGER NOT NULL,
    date_created DATETIME NOT NULL,
    message VARCHAR(256) NOT NULL,
    sender_id VARCHAR(64) NOT NULL,
    recipient_id VARCHAR(64) NOT NULL,
    PRIMARY KEY (conversation_num, date_created, sender_id, recipient_id),
    FOREIGN KEY registered_user_key (sender_id)
       REFERENCES registered_users (username),
    FOREIGN KEY registered_user_key (recipient_id)
       REFERENCES registered_users (username),
    FOREIGN KEY recipient_key (recipient_id)
        REFERENCES registered_users (username)
);

CREATE TABLE private_messages (
    subject VARCHAR(64) NOT NULL,
    sender_id VARCHAR(64) NOT NULL,
    recipient_id VARCHAR(64) NOT NULL,
    conversation_id INTEGER NOT NULL,
    is_read BOOLEAN NOT NULL,
    PRIMARY KEY (recipient_id, sender_id, conversation_id),
    FOREIGN KEY conversation_key (conversation_id)
        REFERENCES conversations (conversation_num),
    FOREIGN KEY registered_user_key (sender_id)
        REFERENCES registered_users (username),
    FOREIGN KEY registered_user_key (recipient_id)
            REFERENCES registered_users (username)
);

CREATE TABLE watching_lists (
    registered_user_id VARCHAR(64) NOT NULL,
    listing_id INTEGER NOT NULL,
    PRIMARY KEY (registered_user_id, listing_id),
    FOREIGN KEY listing_key (listing_id)
        REFERENCES listings (listing_num),
    FOREIGN KEY registered_user_key (registered_user_id)
        REFERENCES registered_users (username)
);

CREATE TABLE selling_lists (
    registered_user_id VARCHAR(64) NOT NULL,
    listing_id INTEGER NOT NULL,
    PRIMARY KEY (registered_user_id, listing_id),
    FOREIGN KEY listing_key (listing_id)
        REFERENCES listings (listing_num),
    FOREIGN KEY registered_user_key (registered_user_id)
        REFERENCES registered_users (username)
);

CREATE TABLE sold_lists (
    registered_user_id VARCHAR(64) NOT NULL,
    listing_id INTEGER NOT NULL,
    PRIMARY KEY (registered_user_id, listing_id),
    FOREIGN KEY listing_key (listing_id)
        REFERENCES listings (listing_num),
    FOREIGN KEY registered_user_key (registered_user_id)
        REFERENCES registered_users (username)
);

CREATE TABLE wish_lists (
    registered_user_id VARCHAR(64) NOT NULL,
    listing_id INTEGER NOT NULL,
    PRIMARY KEY (registered_user_id, listing_id),
    FOREIGN KEY listing_key (listing_id)
        REFERENCES listings (listing_num),
    FOREIGN KEY registered_user_key (registered_user_id)
        REFERENCES registered_users (username)
);

CREATE TABLE purchased_lists (
    registered_user_id VARCHAR(64) NOT NULL,
    listing_id INTEGER NOT NULL,
    PRIMARY KEY (registered_user_id, listing_id),
    FOREIGN KEY listing_key (listing_id)
        REFERENCES listings (listing_num),
    FOREIGN KEY registered_user_key (registered_user_id)
        REFERENCES registered_users (username)
);
