INSERT INTO courses (course_name) VALUES ('csc648');
INSERT INTO courses (course_name) VALUES ('csc600');
INSERT INTO courses (course_name) VALUES ('csc675');

INSERT INTO categories (category_name) VALUES ('books');
INSERT INTO categories (category_name) VALUES ('electronics');
INSERT INTO categories (category_name) VALUES ('clothes');
INSERT INTO categories (category_name) VALUES ('others');

INSERT INTO registered_users (
    username,
    password,
    is_admin
)
VALUES (
    'user_1',
    '123',
    0
);
INSERT INTO registered_users (
    username,
    password,
    is_admin
)
VALUES (
    'user_2',
    '123',
    0
);
INSERT INTO registered_users (
    username,
    password,
    is_admin
)
VALUES (
    'user_3',
    '123',
    0
);
INSERT INTO registered_users (
    username,
    password,
    is_admin,
    email
)
VALUES (
    'user_4',
    '123',
    0,
    'test1@mail.com'
);
INSERT INTO registered_users (
    username,
    password,
    is_admin,
    email
)
VALUES (
    'user_5',
    '123',
    0,
    'test2@mail.com'
);

INSERT INTO listings (
    date_created,
    is_sold,
    price,
    location,
    item_desc,
    title,
    category_id,
    registered_user_id,
    course_id,
    image
)
VALUES (
    '2017-03-01 12:21:33',
    0,
    '12.00',
    '1600 Holloway Ave, San Francisco, CA 94132',
    'Something for sale',
    'A Title',
    'books',
    'user_1',
    null,
    null
);

INSERT INTO tags (
    listing_id,
    tag_name
)
SELECT
    MAX(listing_num),
    'fiction,novel,fantasy'
FROM listings;
INSERT INTO conversations (
    conversation_num,
    date_created,
    message,
    sender_id,
    recipient_id
)
VALUES (
    1,
    '2017-03-01 12:21:33',
    'Hey',
    'user_1',
    'user_2'
);

INSERT INTO conversations (
    conversation_num,
    date_created,
    message,
    sender_id,
    recipient_id
)
VALUES (
    1,
    '2017-03-01 12:21:33',
    'Sup',
    'user_2',
    'user_3'
);

INSERT INTO private_messages (
    subject,
    sender_id,
    recipient_id,
    conversation_id,
    is_read
)
VALUES (
    'A subject',
    'user_1',
    'user_2',
    1,
    1
);
INSERT INTO private_messages (
    subject,
    sender_id,
    recipient_id,
    conversation_id,
    is_read
)
VALUES (
    'A subject',
    'user_2',
    'user_3',
    1,
    0
);

INSERT INTO watching_lists (
    registered_user_id,
    listing_id
)
SELECT 'user_2', MAX(listing_num) FROM listings;
