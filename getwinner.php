<?php

$lot_without_winner = db_select($connect, 'SELECT id, time_close, id_winner, name_lot FROM lots WHERE id_winner = ? AND time_close < ?', ['id_winner' => 0, 'time_close' => date('Y-m-d', time())]); 
if (isset($lot_without_winner)) {
    foreach ($lot_without_winner as $lot => $value) {
        $winner_bet = db_select($connect, 'SELECT price, id_user, id_lot, mail, name FROM bets JOIN users ON id_user = users.id WHERE id_lot = ? ORDER BY price DESC LIMIT 1', ['id_lot' => $value['id']]); 
        if (!empty($winner_bet)) {
            $winner_bet = $winner_bet[0];
            $set_winner = db_query($connect, 'UPDATE lots SET id_winner = ? WHERE id = ?', ['id_winner' => $winner_bet['id_user'], 'id' => $winner_bet['id_lot']]);
            
            if ($set_winner) {
                $send_mail = get_template ('email', ['value' => $value, 'winner_bet' => $winner_bet ]);
                $transport = (new Swift_SmtpTransport('smtp.mail.ru', 465, 'ssl'))
                ->setUsername('doingsdone@mail.ru')
                ->setPassword('rds7BgcL');
                $message = (new Swift_Message())
                  ->setFrom(['doingsdone@mail.ru' => 'HTMLAcademy'])
                  ->setTo([ $winner_bet['mail'] => $winner_bet['name']])
                  ->setSubject("Ваша ставка победила")
                  ->setContentType("text/html")
                  ->setBody($send_mail);
                $mailer = new Swift_Mailer($transport);
                $mailer->send($message);
            };
        };
    };
};
?>