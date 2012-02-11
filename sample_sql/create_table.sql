CREATE TABLE test_table (id INT NOT NULL AUTO_INCREMENT,
                         name VARCHAR(8) NOT NULL,
                         score INT NOT NULL,
                         rank INT NOT NULL UNIQUE,
                         PRIMARY KEY (id)) ENGINE=NDB;
