INSERT INTO categories (name, class) VALUES 
('Доски и лыжи', 'boards' ),
("Крепления", 'attachment'),
("Ботинки", 'boots'),
("Одежда", 'clothing'),
("Инструменты", 'tools'),
("Разное", 'other');

INSERT INTO users (mail, name, pass_hash) VALUES 
('ignat.v@gmail.com', 'Игнат', '$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka'),
('kitty_93@li.ru', 'Леночка', '$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa'),
('warrior07@mail.ru', 'Руслан', '$2y$10$2OxpEH7narYpkOT1H5cApezuzh10tZEEQ2axgFOaKW.55LxIJBgWW');

INSERT INTO lots (name, id_category, price_start, img, id_creator, time_close) VALUES 
('2014 Rossignol District Snowboard', 1, 10999, 'img/lot-1.jpg', 2, '2018-09-11'),
('DC Ply Mens 2016/2017 Snowboard', 1, 159999, 'img/lot-2.jpg', 1, '2016-09-11'),
('Крепления Union Contact Pro 2015 года размер L/XL', 2, 8000, 'img/lot-3.jpg', 1, '2017-09-11'),
('Ботинки для сноуборда DC Mutiny Charocal', 3, 10999, 'img/lot-4.jpg', 1, '2017-01-01'),
('Куртка для сноуборда DC Mutiny Charocal', 4, 7500, 'img/lot-5.jpg', 2, '2018-09-01'),
('Маска Oakley Canopy', 6, 5400, 'img/lot-6.jpg', 3, '2016-09-11');

INSERT INTO bets (time_set, price, id_user, id_lot) VALUES
('2017-09-12 01:02:03', 9000, 2, 3),
('2017-08-12 00:00:00', 10000, 1, 3);


SELECT name FROM categories;
SELECT l.name, price_start, price_cur, img, c.name  FROM lots l JOIN categories c ON l.id_category = c.id WHERE time_close >  STR_TO_DATE(now(), '%Y-%m-%d');
SELECT l.name, price_start, price_cur, img, c.name FROM lots l JOIN categories c ON l.id_category = c.id WHERE l.name = 'DC Ply Mens 2016/2017 Snowboard';
UPDATE lots SET name = 'Куртка для сноуборда' WHERE id = 5;
SELECT time_set, price, id_lot FROM bets b JOIN lots l ON l.id = b.id_lot WHERE b.id_lot = 3 ORDER BY time_set DESC;