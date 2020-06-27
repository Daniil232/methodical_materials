<?php
    //Подключение шапки
    require_once("header.php");
?>

<!-- Код JavaScript -->
<script type="text/javascript">
    $(document).ready(function () {
        "use strict";
        //================ Проверка email ==================

        //регулярное выражение для проверки email
        var pattern = /^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i;
        var mail = $('input[name=email]');

        mail.blur(function () {
            if (mail.val() != '') {

                // Проверяем, если email соответствует регулярному выражению
                if (mail.val().search(pattern) == 0) {
                    // Убираем сообщение об ошибке
                    $('#valid_email_message').text('');

                    //Активируем кнопку отправки
                    $('input[type=submit]').attr('disabled', false);
                } else {
                    //Выводим сообщение об ошибке
                    $('#valid_email_message').text('Не правильный Email');

                    // Дезактивируем кнопку отправки
                    $('input[type=submit]').attr('disabled', true);
                }
            } else {
                $('#valid_email_message').text('Введите Ваш email');
            }
        });

        //================ Прооверка паролей ==================
        var password = $('input[name=password]');
        var confirm_password = $('input[name=confirm_password]');

        password.blur(function () {
            if (password.val() != '') {

                //Если длина введённого пароля меньше шести символов, то выводим сообщение об ошибке
                if (password.val().length < 6) {
                    //Выводим сообщение об ошибке
                    $('#valid_password_message').text('Минимальная длина пароля 6 символов');

                    //проверяем, если пароли не совпадают, то выводим сообщение об ошибке
                    if (password.val() !== confirm_password.val()) {
                        //Выводим сообщение об ошибке
                        $('#valid_confirm_password_message').text('Пароли не совпадают');
                    }

                    // Дезактивируем кнопку отправки
                    $('input[type=submit]').attr('disabled', true);

                } else {
                    //Иначе, если длина первого пароля больше шести символов, то мы также проверяем, если они  совпадают. 
                    if (password.val() !== confirm_password.val()) {
                        //Выводим сообщение об ошибке
                        $('#valid_confirm_password_message').text('Пароли не совпадают');

                        // Дезактивируем кнопку отправки
                        $('input[type=submit]').attr('disabled', true);
                    } else {
                        // Убираем сообщение об ошибке у поля для ввода повторного пароля
                        $('#valid_confirm_password_message').text('');

                        //Активируем кнопку отправки
                        $('input[type=submit]').attr('disabled', false);
                    }

                    // Убираем сообщение об ошибке у поля для ввода пароля
                    $('#valid_password_message').text('');
                }

            } else {
                $('#valid_password_message').text('Введите пароль');
            }
        });

        //(1) — Место для следующего куска кода

        confirm_password.blur(function () {
            //Если пароли не совпадают
            if (password.val() !== confirm_password.val()) {
                //Выводим сообщение об ошибке
                $('#valid_confirm_password_message').text('Пароли не совпадают');

                // Дезактивируем кнопку отправки
                $('input[type=submit]').attr('disabled', true);
            } else {
                //Иначе, проверяем длину пароля
                if (password.val().length > 6) {

                    // Убираем сообщение об ошибке у поля для ввода пароля
                    $('#valid_password_message').text('');

                    //Активируем кнопку отправки
                    $('input[type=submit]').attr('disabled', false);
                }

                // Убираем сообщение об ошибке у поля для ввода повторного пароля
                $('#valid_confirm_password_message').text('');
            }

        });
    });
</script>
<section class="registration bg">
<!-- Блок для вывода сообщений -->
<div class="block_for_messages">
    <?php
        //Если в сессии существуют сообщения об ошибках, то выводим их
        if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
            echo $_SESSION["error_messages"];

            //Уничтожаем ячейку error_messages, чтобы сообщения об ошибках не появились заново при обновлении страницы
            unset($_SESSION["error_messages"]);
        }

        //Если в сессии существуют радостные сообщения, то выводим их
        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
            echo $_SESSION["success_messages"];
            
            //Уничтожаем ячейку success_messages,  чтобы сообщения не появились заново при обновлении страницы
            unset($_SESSION["success_messages"]);
        }
    ?>
</div>

<?php 
    //Проверяем, если пользователь не авторизован, то выводим форму регистрации, 
    //иначе выводим сообщение о том, что он уже зарегистрирован
    if((!isset($_SESSION["email"]) && !isset($_SESSION["password"]))) {

        if(!isset($_GET["hidden_form"])){
?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="registration__title">Форма регистрации</h2>
                <div class="registration__form" id="form_register" >
                    <form action="register.php" method="post" name="GetFreeTrial" enctype="multipart/form-data">
                    
                        <div class="registration__form-item">
                            Введите имя
                            <p>
                                <input type="text" name="first_name" required="required" value="Daniil" />
                            </p>
                        </div>
                        <div class="registration__form-item">
                            Введите фамилию
                            <p>
                                <input type="text" name="last_name" required="required" value="Baranov" />
                            </p>
                        </div>
                        <div class="registration__form-item">
                            Введите почту
                            <p>
                                <input type="email" name="email" maxlength="100" required="required"
                                    value="baranov2392@gmail.com" />
                                <span id="valid_email_message" class="mesage_error"></span>
                            </p>
                        </div>
                        <div class="registration__form-item">
                            Введите пароль
                            <p>
                                <input type="password" name="password" placeholder="минимум 6 символов"
                                    required="required" value="qwerqwer" /><br />
                                <span id="valid_password_message" class="mesage_error"></span>
                            </p>
                        </div>
                        <div class="registration__form-item">
                            Введите повторный пароль
                            <p>
                                <input type="password" name="confirm_password" placeholder="минимум 6 символов"
                                    required="required" value="qwerqwer" /><br />
                                <span id="valid_confirm_password_message" class="mesage_error"></span>
                            </p>
                        </div>
                        <div class="registration__form-item">
                            Загрузить фотографию
                            <p>
                                <input type="file" name="img_upload"><br />
                                <span id="valid_confirm_password_message" class="mesage_error"></span>
                            </p>
                        </div>
                        <div class="registration__form-item">
                            Введите капчу
                            <p>
                                <img src="captcha.php" alt="Капча" /> <br /> <br />
                                <input type="text" name="captcha" placeholder="Проверочный код" required="required" />
                            </p>
                        </div>
                        <div class="registration__form-item button">
                            <p>
                                <input type="submit" name="btn_submit_register" value="Зарегистрироваться!" />
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
        }//закрываем условие hidden_form

    }else{ 
        //Иначе, если пользователь уже авторизирован, то выводим этот блок
?>
<div class="already-authorized" id="authorized">
    <h2>Вы уже зарегистрированы</h2>
</div>

<?php
    }
    
    //Подключение подвала
    require_once("footer.php");
?>