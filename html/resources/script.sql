CREATE TABLE webapp.comments (
    id int NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    usercomment varchar(255),
    shown boolean DEFAULT True,
    PRIMARY KEY (id)
);
CREATE TABLE webapp.users (
  id int,
  Username varchar(255) NOT NULL,
  Password varchar(255) NOT NULL
);
CREATE TABLE webapp.products (
  product_id int,
  name varchar(255) NOT NULL,
  price varchar(255) NOT NULL
);
INSERT INTO webapp.users (id, Username, Password)
  VALUES
  ('1', 'Rob123', 'Ilovefishing'),
  ('2', 'webadmin', '1234567!@#$%^&');
INSERT INTO webapp.products (product_id, name, price)
  VALUES
  ('1', 'Raw Denim Jeans', '$200'),
  ('2', 'Suspenders', '$50'),
  ('3', 'Raw Denim Hoodie', '$500');
INSERT INTO webapp.comments (id, name, usercomment)
  VALUES
  ('1', 'Rob123','Great stuff! The jeans are great!'),
  ('2', 'webadmin', 'test comment remove when we go to prod');
