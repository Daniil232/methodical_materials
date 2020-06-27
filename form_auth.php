<?php
    //Подключение шапки
    require_once("header.php");
?>

<script type="text/javascript">
    $(document).ready(function(){
        "use strict";
        //================ Проверка email ==================

        //регулярное выражение для проверки email
        var pattern = /^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i;
        var mail = $('input[name=email]');
        
        mail.blur(function(){
            if(mail.val() != ''){

                // Проверяем, если email соответствует регулярному выражению
                if(mail.val().search(pattern) == 0){
                    // Убираем сообщение об ошибке
                    $('#valid_email_message').text('');

                    //Активируем кнопку отправки
                    $('input[type=submit]').attr('disabled', false);
                }else{
                    //Выводим сообщение об ошибке
                    $('#valid_email_message').text('Не правильный Email');

                    // Дезактивируем кнопку отправки
                    $('input[type=submit]').attr('disabled', true);
                }
            }else{
                $('#valid_email_message').text('Введите Ваш email');
            }
        });

        //================ Проверка длины пароля ==================
        var password = $('input[name=password]');
        
        password.blur(function(){
            if(password.val() != ''){

                //Если длина введенного пароля меньше шести символов, то выводим сообщение об ошибке
                if(password.val().length < 6){
                    //Выводим сообщение об ошибке
                    $('#valid_password_message').text('Минимальная длина пароля 6 символов');

                    // Дезактивируем кнопку отправки
                    $('input[type=submit]').attr('disabled', true);
                    
                }else{
                    // Убираем сообщение об ошибке
                    $('#valid_password_message').text('');

                    //Активируем кнопку отправки
                    $('input[type=submit]').attr('disabled', false);
                }
            }else{
                $('#valid_password_message').text('Введите пароль');
            }
        });
    });
</script>

<section class="auth bg"> 
<div class="container">
<!-- Блок для вывода сообщений -->
<div class="block_for_messages">
    <?php

        if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
            echo $_SESSION["error_messages"];

             //Уничтожаем ячейку error_messages, чтобы сообщения об ошибках не появились заново при обновлении страницы
            unset($_SESSION["error_messages"]);
        }

        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
            echo $_SESSION["success_messages"];
            
            //Уничтожаем ячейку success_messages,  чтобы сообщения не появились заново при обновлении страницы
            unset($_SESSION["success_messages"]);
        }
    ?>
</div>

<?php
    //Проверяем, если пользователь не авторизован, то выводим форму авторизации, 
    //иначе выводим сообщение о том, что он уже авторизован
    if(!isset($_SESSION["email"]) && !isset($_SESSION["password"])){
?>
   
        <div class="row">
            <div class="col">
                <h2 class="auth__title">Форма авторизации</h2>
                <div class="auth__form" id="form_auth"> 
                    <form action="auth.php" method="post" name="GetFreeTrial">
                        <div class="auth__form-item">
                            Введите Email
                            <p>
                                <input type="email" name="email" required="required" value="baranov2392@gmail.com"/><br />
                                <span id="valid_email_message" class="mesage_error"></span>
                            </p>
                        </div>
                        <div class="auth__form-item">
                            Введите пароль
                            <p>
                            <input type="password" name="password" placeholder="минимум 6 символов" required="required" value="qwerqwer"/><br />
                            <span id="valid_password_message" class="mesage_error"></span>
                            </p>
                        </div>
                        <div class="auth__form-item">
                            Введите капчу
                            <p>
                                <img src="captcha.php" alt="Капча" /> <br /> <br />
                                 <input type="text" name="captcha" placeholder="Проверочный код" />
                            </p>
                        </div>
                        <div class="auth__form-item button">
                            <p>
                                <input type="submit" name="btn_submit_auth" value="Войти" />
                            </p>
                        </div>
                        <div class="auth__form-item">
                            <a href="form_register.php" class="not-registration__link">Создать аккаунт</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
    }else{
?>
    <div class="already-authorized" id="authorized">
        <h2>Вы уже авторизованы</h2>
    </div>
        
<?php
    }
?>

<?php 
    
    //Подключение подвала
    require_once("footer.php");
?>