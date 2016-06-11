<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="css/form.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="js/maska.js"></script>
        <script src="js/form.js"></script>
    </head>
    <body>
        <button class="body__form" id="but">Открыть форму</button>
        <form action="" method=post id='form'>
            <div class="form__select">
                <label for="">Выберите количество секций :</label>
                <select name="sections" id="sections">
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                </select>
            </div>
            <div class="form__select">
                <label for="">Выберите способ открытия :</label>
                <select name="open_method" id="open_method">
                    <option value="">Простое </option>
                    <option value="">На Проветривание</option>
                </select>
            </div>
            <div class="form__select">
                <label for="">Выберите ширину :</label>
                <select name="width" id="width">
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                </select>
            </div>
            <div class="form__select">
                <label for="">Выберите высоту :</label>
                <select name="height" id="height">
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                </select>
            </div>
            <div class="form__select">
                <label>Общая сумма </label>
                <input name='result' id="result" type="text" class="form-control">
            </div>
            <div class="form__select">
                <label>Введите Контактный номер</label>
                <input  name='phone' id="phone1" type="text" class="form-control" required>
            </div>
            <div class="form__select">
                <label for="">Введите Email</label>
                <input name='email' type="email" placeholder="marketing@mail.ru" class="input__email" required>
            </div>
            <div class="fotm__send">
                <input type="submit" name="submit" value="ОТПРАВИТЬ ФОРМУ" class="form__submit">
            </div>
        </form>
        <?php
        require 'phpmailer.php';
        require 'smtp.php';

        if ($_POST['submit']) {
            $from = $_POST['email'];
            $result = $_POST['result'];
            $phone = $_POST['phone'];
            $message = "Общая сумма: $result Контактный номер: $phone. Email: $from";
            
            $mail = new PHPMailer;
            $mail->isSMTP();

            $mail->Host = 'smtp.mail.ru';
            $mail->SMTPAuth = true;
            $mail->Username = 'and-krk12';
            $mail->Password = '291095anton';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = '465';

            $mail->CharSet = 'UTF-8';
            $mail->setFrom('and-krk12@mail.ru', 'Anton Pochapsky');
            $mail->addAddress('my_information@inbox.ru');

            $mail->isHTML(true);

            $mail->Subject = 'Test task';
            $mail->Body = $message;

            if ($mail->send()) {
                echo 'Письмо отправлено';
            } else {
                echo 'Письмо не может быть отправлено. ';
                echo 'Ошибка: ' . $mail->ErrorInfo;
            }
        }
        ?>
    </body>
</html>