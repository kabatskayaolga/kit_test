<?php
if((isset($_POST['name'])&&$_POST['name']!="")&&(isset($_POST['phone'])&&$_POST['phone']!="")){ //Проверка отправилось ли наше поля name и не пустые ли они
        $to = $_POST['email']; //Почта получателя, через запятую можно указать сколько угодно адресов
        $subject = $_POST['formAction']; //Загаловок сообщения
        $message = '
                <html>
                    <head>
                        <title>[KIT] '.$subject.'</title>
                    </head>
                     <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
                    <div id="wrapper" dir="ltr" style="background-color: #f7f7f7; margin: 0; padding: 15px 0 15px 0; -webkit-text-size-adjust: none !important; width: 100%;">
                    <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%"><tr>
                    <td align="center" valign="top">
                    <div id="template_header_image">
                    </div>
                    <table border="0" cellpadding="0" cellspacing="0" width="600" id="template_container" style="box-shadow: 0 1px 4px rgba(0,0,0,0.1) !important; background-color: #ffffff; border: 1px solid #dedede; border-radius: 3px !important;">
                    <tr>
                    <td align="center" valign="top">

                    <table border="0" cellpadding="0" cellspacing="0" width="600" id="template_header" style="background-color: #7ecd69; border-radius: 3px 3px 0 0 !important; color: #202020; border-bottom: 0; font-weight: bold; line-height: 100%; vertical-align: middle; font-family: Helvetica Neue, Helvetica, Roboto, Arial, sans-serif;"><tr>
                    <td id="header_wrapper" style="padding: 36px 48px; display: block;">
                    <h1 style="color: #202020; font-family: Helvetica Neue, Helvetica, Roboto, Arial, sans-serif; font-size: 30px; font-weight: 300; line-height: 150%; margin: 0; text-align: left; text-shadow: 0 1px 0 #98d787;">Спасибо за заявку!</h1>
                    </td>
                    </tr></table>

                    </td>
                    </tr>
                    <tr>
                    <td align="center" valign="top">

                    <table border="0" cellpadding="0" cellspacing="0" width="600" id="template_body"><tr>
                    <td valign="top" id="body_content" style="background-color: #ffffff;">

                    <table border="0" cellpadding="20" cellspacing="0" width="100%"><tr>
                    <td valign="top" style="padding: 48px 48px 48px;">
                    <div id="body_content_inner" style="color: #636363; font-family: Helvetica Neue, Helvetica, Roboto, Arial, sans-serif; font-size: 14px; line-height: 150%; text-align: left;">';

                    if($subject == 'Обратный звонок'){
                        $message .= '<p>Вы заказали обратный звонок. Наши менеджеры свяжутся с вами в ближайшее время </p><hr><br>';
                    } elseif($subject == 'Быстрая покупка'){
                        $message .= '<p>Ваш заказ: <strong>'.$_POST['product'].'</strong>. </p> 
                        <p>Наши менеджеры свяжутся с вами в ближайшее время</p><hr><br>';
                    }
                    
                    // if((isset($_POST['product'])&&$_POST['product']!="")){

                    //     $message .= '<p style="margin: 0 0 16px;">Товар: '.$_POST['product'].'</p><hr><br>';
                    // };

                    $message .= '

                    <p style="margin: 0 0 16px;">Ваше имя: '.$_POST['name'].'</p>
                    <p style="margin: 0 0 16px;">Ваш телефон: '.$_POST['phone'].'</p>';

                    if((isset($_POST['email'])&&$_POST['email']!="")){
                        $message .= '   <p style="margin: 0 0 16px;">Ваш email: '.$_POST['email'].'</p>';
                    };
                   
                    $message .= '                         

                    </div>
                    </td>
                    </tr></table>

                    </td>
                    </tr></table>

                    </td>
                    </tr>
                    <tr>
                    <td align="center" valign="top">

                    <table border="0" cellpadding="10" cellspacing="0" width="600" id="template_footer"><tr>
                    <td valign="top" style="padding: 0; -webkit-border-radius: 6px;">
                    <table border="0" cellpadding="10" cellspacing="0" width="100%"><tr>
                    <td colspan="2" valign="middle" id="credit" style="padding: 0 48px 48px 48px; -webkit-border-radius: 6px; border: 0; color: #b2e1a5; font-family: Arial; font-size: 12px; line-height: 125%; ">
                    <p>Компания KIT <br> г. Одесса, 
                    ул. Базарная 63</p>
                    <p>emeil: <a style="color: #b2e1a5;" href="mailto:office@kit.biz.ua">office@kit.biz.ua</a></p>
                    <p>Телефоны: <a style="color: #b2e1a5;" href="tel:+380487155222">+38 (048) 715-52-22</a>, 
                    <a style="color: #b2e1a5;" href="tel:+380487877781">+38 (048) 787-77-81</a></p>

                    </td>
                    </tr></table>
                    </td>
                    </tr></table>

                    </td>
                    </tr>
                    </table>
                    </td>
                    </tr></table>
                    </div>
                    </body>
                </html>'; //Текст нащего сообщения можно использовать HTML теги
        $headers  = "Content-type: text/html; charset=utf-8 \r\n"; //Кодировка письма
        $headers .= "From: KIT <office@kit.biz.ua>\r\n"; //Наименование и почта отправителя
        mail($to, $subject, $message, $headers); //Отправка письма с помощью функции mail
}
?>