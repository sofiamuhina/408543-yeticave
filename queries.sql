
SELECT name_cat FROM categories;
SELECT name_lot, price_start, price_cur, img, name_cat  FROM lots l JOIN categories c ON l.id_category = c.id WHERE time_close >  STR_TO_DATE(now(), '%Y-%m-%d');
SELECT name_lot, price_start, price_cur, img, name_cat FROM lots l JOIN categories c ON l.id_category = c.id WHERE name_lot = 'DC Ply Mens 2016/2017 Snowboard';
SELECT time_set, price, id_lot FROM bets b JOIN lots l ON l.id = b.id_lot WHERE b.id_lot = 3 ORDER BY time_set DESC;