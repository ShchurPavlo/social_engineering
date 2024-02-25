<?php
require_once "recaptchalib.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список працівників IT-компанії</title>
    <style>
        body {
            text-align: center;
        }
        main {
            display: flex;
            justify-content: center;
        }
        section {
            text-align: left;
            margin: 20px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-right: 10px;
            vertical-align: middle;
        }
        a {
            text-decoration: none;
            color: #000;
        }
        strong {
            font-weight: bold;
        }
		.company-description {
            font-size: 24px; 
            line-height: 1.6;
        }
		.services-link {
            text-decoration: none;
            color: blue;
        }
		.feedback-form {
            margin-top: 50px;
        }
		.feedback-form input[type="text"],
		.feedback-form textarea {
            width: 300px;
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
		.feedback-form textarea {
            height: 150px;
        }
		.feedback-form input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
		.feedback-form input[type="submit"]:hover {
            background-color: #0056b3;
        }
		
		.g-recaptcha {
			margin: 0 auto; /* Центруємо капчу по горизонталі */
		}
    </style>
</head>
<body>
	<?php
	$secret = "6LeeQ38pAAAAAENoDRVllyUg_QPaE7_UU5uaU7is";
	//ответ
	$response = null;
	//перевірка секретного ключа
	$reCaptcha = new ReCaptcha($secret);
 
	if (!empty($_POST)) {
 
    if ($_POST["g-recaptcha-response"]) {
        $response = $reCaptcha->verifyResponse(
            $_SERVER["REMOTE_ADDR"],
            $_POST["g-recaptcha-response"]
        );
    }
 
    if ($response != null && $response->success) {
       header("Location: pages\contact.html");
    } else {
        echo "<script>alert('Ви не пройшли перевірку reCAPTCHA. Будь ласка, спробуйте ще раз.');</script>";
    }
 	}
	?>
	
    <header>
        <h1>IT-компанія</h1>
		<p class="company-description">Наша компанія спеціалізується на розробці програмного забезпечення, веб-розробці та технічній підтримці. Ми забезпечуємо нашим клієнтам високоякісні рішення в галузі ІТ та надаємо широкий спектр послуг для покращення їх бізнесу.</p>
		<a class="services-link" href="pages\services.html"><strong>Докладніше про наші послуги</strong></a>
		<h1>Наша команда:</h1>
    </header>
    <main>
        <section>
            <h2>Відділ розробки</h2>
            <ul>
                <li><a href="pages\kj.html"><img src="img\1.png" alt="Фото Король Джуліан"><strong>Король Джуліан</strong> - Розробник програмного забезпечення</a></li>
                <li><a href="pages\sh.html"><img src="img\2.jpeg" alt="Фото Шкіпер"><strong>Шкіпер</strong> - Веб-розробник</a></li>
                <li><a href="pages\mr.html"><img src="img\3.jpg" alt="Фото Моріс"><strong>Моріс</strong> - Тестувальник</a></li>
            </ul>
        </section>
        <section>
            <h2>Відділ технічної підтримки</h2>
            <ul>
                <li><a href="pages\mort.html"><img src="img\4.jpg" alt="Фото Морт"><strong>Морт</strong> - Системний адміністратор</a></li>
                <li><a href="pages\alex.html"><img src="img\5.jpeg" alt="Фото Алекс"><strong>Алекс</strong> - Спеціаліст з технічної підтримки</a></li>
            </ul>
        </section>
    </main>
    
	<div class="feedback-form">
        <h2>Зворотній зв'язок</h2>
        <form method="post">
            <input type="text" name="name" placeholder="Ваше ім'я" required><br>
            <input type="text" name="email" placeholder="Ваш email" required><br>
            <textarea name="message" placeholder="Ваше повідомлення" required></textarea><br>
			<div class="g-recaptcha" data-sitekey="6LeeQ38pAAAAAHywt26FBZtPqFL5Q8hsXY-aHAyL" style="display: inline-block; margin: 20px auto;">></div><br>
            <input type="submit" value="Надіслати">
        </form>
    </div>
	<footer>
        <p>&copy; 2024 IT-компанія. Усі права захищені.</p>
    </footer>
<script src='https://www.google.com/recaptcha/api.js'></script>
</body>
</html>
