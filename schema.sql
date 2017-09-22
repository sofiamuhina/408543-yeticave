CREATE DATABASE yeti;
USE yeti;
CREATE TABLE categories (
    id TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name_cat CHAR(32) UNIQUE,
    class CHAR(32) UNIQUE
);

CREATE INDEX category ON categories(id);

CREATE TABLE lots (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name_lot CHAR(128),
    time_create DATETIME,
    time_close DATE,
    description TEXT,
    img CHAR(128),
    price_start INT UNSIGNED,
    price_cur INT UNSIGNED,
    bet_step INT UNSIGNED,
    count_fav INT UNSIGNED,
    id_creator INT UNSIGNED,
    id_winner INT UNSIGNED,
    id_category TINYINT UNSIGNED
);

CREATE INDEX lot_id ON lots(id);
CREATE INDEX lot_creator ON lots(id_creator);
CREATE INDEX lot_winner ON lots(id_winner);
CREATE INDEX lot_category ON lots(id_category);
CREATE INDEX lot_name ON lots(name_lot);


CREATE TABLE bets (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    time_set DATETIME,
    price INT UNSIGNED,
    id_user INT UNSIGNED,
    id_lot INT UNSIGNED
);

CREATE INDEX bet_id ON bets(id);
CREATE INDEX bet_user ON bets(id_user);
CREATE INDEX bet_lot ON bets(id_lot);

CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    time_add DATETIME,
    mail CHAR(128) UNIQUE,
    name CHAR(255),
    pass_hash CHAR(64),
    avatar CHAR(128),
    contacts TEXT
);

CREATE INDEX user_id ON users(id);
CREATE INDEX user_mail ON users(mail);
CREATE INDEX user_pass ON users(pass_hash);