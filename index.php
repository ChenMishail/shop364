<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/module/last_user.php';
// Подключаемся к базе данных
require_once $_SERVER['DOCUMENT_ROOT'] . '/connection-bd/connection-bd.php';
$user_id = $_SESSION['user_id_session'];

// Запрашиваем никнейм из базы
$sql = "SELECT name FROM authorization WHERE id = $user_id";
$result = mysqli_query($conn_main, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Ошибка: пользователь не найден");
}

$row = mysqli_fetch_assoc($result);
$nickname = htmlspecialchars($row['name'] ?? 'Гость'); // Защита от XSS
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Site</title>
    <!--link CSS-->
    <link rel="stylesheet" type="text/css" href="css/home_styles.css" media="all">
    <!--box icons-->
    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!--remix icon-->
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
    rel="stylesheet"
    />
    <!--google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Goblin+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Link Swiper's CSS -->
    <link
    rel="stylesheet"
    href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
</head>
<body>
    <!--Navbar-->
    <header>
        <a href="#" class="logo"><i class='bx bx-basket' ></i> ОНЛАЙН МАГАЗИН 364 ДНЯ</a>
        <!--Menu icon-->
        <div class="bx bx-menu" id="menu-icon"></div>
        <!--Nav list-->
        <ul class="navbar">
            <li><a href="#home" class="home-active">Домой</a></li>
            <li><a href="#categories">Категории</a></li>
            <li><a href="#products">Продукты</a></li>
            <li><a href="#about">О Нас</a></li>
            <li><a href="#customers">Отзывы</a></li>
        </ul>
        <!--profile-->
                <div class="profile">
            <img src="home_img/user.png" alt="">
            <span><?php echo htmlspecialchars($nickname); ?>
                <ul>
                    <li><a href="#"> <i class='bx bxs-right-arrow-alt' ></i> Изменить</a></li>
                    <li><a href="#"> <i class='bx bxs-right-arrow-alt' ></i> Выйти</a></li>
                </ul>
            </span>
            <i class='bx bx-caret-down'></i>
        </div>

    </header>
    <!--Home-->
    <section class="home swiper" id="home">
        <div class="swiper-wrapper">
            <!--Slide 1-->
            <div class="swiper-slide container">
                <div class="home-text">
                    <span>We are delicacy</span>
                    <h1><br>Для прекрасного вечера в компании! <br></h1>
                    <a href="#" class="btn">КУПИТЬ СЕЙЧАС<i class='bx bxs-right-arrow-alt' ></i></a>
                </div>
                <img src="home_img/products/shashlik.jpg" alt="">
                <img src="home_img/products/cake.jpg" alt="">
                <img src="home_img/products/lipton.jpg" alt="">
                <img src="home_img/products/litenergy.jpg" alt="">
            </div>
            <!--Slide 2-->
            <div class="swiper-slide container">
                <div class="home-text">
                    <span>We are delicacy</span>
                    <h1><br> Лучший выбор чтобы охладиться!<br></h1>
                    <a href="#" class="btn">КУПИТЬ СЕЙЧАС<i class='bx bxs-right-arrow-alt' ></i></a>
                </div>
                <img src="home_img/products/ice_cream.jpg" alt="">
                <img src="home_img/products/water.jpg" alt="">
                <img src="home_img/products/vodka.jpg" alt="">
                <img src="home_img/products/ogurchik.jpg" alt="">
            </div>
            <!--Slide 3-->
            <div class="swiper-slide container">
                <div class="home-text">
                    <span>We are delicacy</span>
                    <h1><br> Зарядись энергией лета! <br></h1>

                    <a href="#" class="btn">КУПИТЬ СЕЙЧАС<i class='bx bxs-right-arrow-alt bx-rotate-90' ></i></a>
                </div>
                <img src="home_img/products/grape.jpg" alt="">
                <img src="home_img/products/watermelon.jpg" alt="">
                <img src="home_img/products/lipton.jpg" alt="">
                <img src="home_img/products/water.jpg" alt="">
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

      
    </section>
    <!--Categories-->
    <section class="categories" id="categories">
        <div class="heading">
            <h1>Посмотрите <br><span>Категории</span></h1>
            <a href="#" class="btn">Посмотреть всё<i class='bx bxs-right-arrow-alt bx-rotate-90' ></i></a>
        </div>
        <!--Container Content-->
        <div class="categories-conatiner">
            <!--Box 1-->
            <div class="box box1" onclick="openPage('#')">
                <img src="home_img/vegetables.png" alt="">
                <h2>Фрукты и овощи</h2>
                <span>Только самая свежая продукция!</span>
                <i class='bx bxs-right-arrow-alt bx-rotate-90' ></i>
            </div>
            <!--Box 2-->
            <div class="box box2" onclick="openPage('#')">
                <img src="home_img/sweet.png" alt="">
                <h2>Сладости</h2>
                <span>Чтобы жизнь была сладка</span>
                <i class='bx bxs-right-arrow-alt bx-rotate-90'></i>
            </div>
            <!--Box 3-->
            <div class="box box3" onclick="openPage('#')">
                <img src="home_img/meat.png" alt="">
                <h2>Мясная продукция</h2>
                <span>Полностью натуральная!</span>
                <i class='bx bxs-right-arrow-alt bx-rotate-90' ></i>
            </div> 
            <!--Box 4-->
            <div class="box box4" onclick="openPage('#')">
                <img src="home_img/drink.png" alt="">
                <h2>Напитки</h2>
                <span>Для удалении жажды в любое время суток</span>
                <i class='bx bxs-right-arrow-alt bx-rotate-90' ></i>
            </div>   
            <!--Box 5-->
            <div class="box box5" onclick="openPage('#')">
                <img src="home_img/pure2.jpg" alt="">
                <h2>Готовая подукция</h2>
                <span>Сделано с любовью!</span>
                <i class='bx bxs-right-arrow-alt bx-rotate-90' ></i>
            </div>   
            <script>
                function openPage(page) {
                    window.location.href = page; 
                }
            </script>                
        </div>
    </section>
    <!--Products-->
    <section class="products" id="products">
        <div class="heading">
            <h1>ТОПЫ ЗА СВОИ ДЕНЬГИ <br><span>Продукты</span></h1>
            <a href="#" class="btn">КУПИТЬ<i class='bx bxs-right-arrow-alt bx-rotate-90' ></i></a>
        </div>
        <!--Products Content-->
        <div class="products-conatiner">
            <!--Box 1-->
            <div class="box">
                <img src="home_img/products/watermelon.jpg" alt="">
                <h2>Арбуз</h2>
                <h3 class="price">69,99 <span> руб</span></h3>
                <i class='bx bx-cart-alt' ></i>
                <i class='bx bx-heart' ></i>
                <span class="discount">-46%</span>
            </div>
            <!--Box 2-->
            <div class="box">
                <img src="home_img/products/chicken.jpg" alt="">
                <h2>Цыпленок-бройлер <br></h2>
                <h3 class="price">239,99<span> руб</span></h3>
                <i class='bx bx-cart-alt' ></i>
                <i class='bx bx-heart' ></i>
                <span class="discount">-13%</span>
            </div>
            <!--Box 3-->
            <div class="box">
                <img src="home_img/products/lipton.jpg" alt="">
                <h2>Напиток холодный черный чай Липтон Лимон</h2>
                <h3 class="price">109,99<span> руб</span></h3>

                <i class='bx bx-cart-alt' ></i>
                <i class='bx bx-heart' ></i>
                <span class="discount">-27%</span>
            </div>
            <!--Box 4-->
            <div class="box">
                <img src="home_img/products/shashlik.jpg" alt="">
                <h2>Шашлык свиной<br></h2>
                <h3 class="price">399,99<span> руб</span></h3>
                <i class='bx bx-cart-alt' ></i>
                <i class='bx bx-heart' ></i>
                <span class="discount">NEW!</span>
            </div>
            <!--Box 5-->
            <div class="box">
                <img src="home_img/products/chocolate.jpg" alt="">
                <h2>Белый шоколад с сушенной вишней</h2>
                <h3 class="price">179,99<span> руб</span></h3>
                <i class='bx bx-cart-alt' ></i>
                <i class='bx bx-heart' ></i>
                <span class="discount">-18%</span>
            </div>
            <!--Box 6-->
            <div class="box">
                <img src="home_img/products/cake.jpg" alt="">
                <h2>Торт Ореховый<br></h2>
                <h3 class="price">399,99<span> руб</span></h3>
                <i class='bx bx-cart-alt' ></i>
                <i class='bx bx-heart' ></i>
                <span class="discount">-10%</span>
            </div>
        </div>
    </section>
    <!--About-->
    <section class="about" id="about">
        <img src="home_img/logo.jpg" alt="">
        <div class="about-text">
            <span>О НАШЕМ МАГАЗИНЕ</span>
            <p>"Свежесть. Скорость. Надёжность. Вот что для нас важно."</p>
            <p>Попробуйте — и убедитесь, что покупать продукты онлайн может быть даже приятнее, чем в обычном магазине! Ваше доверие для нас главная награда.</p>
            <a href="#" class="btn">Перейти к покупкам<i class='bx bxs-right-arrow-alt bx-rotate-90' ></i></a>

        </div>
    </section>
    <!--Customers-->
    <section class="customers" id="customers">
        <h2>Почему именно наш магазин??</h2>
            <!--Customer Content-->
            <div class="customers-container">
                <!--Review 1-->
                <div class="box">
                    <div class="review-profile">
                        <img src="home_img/comments/tarachkov.jpg" alt="">
                        <h3>Михаил Тарачков</h3>
                    </div>
                    <div class="stars">
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                    </div>
                    <i class='bx bxs-quote-alt-left' ></i>
                    <p>Блин все реально классно, классный ассортимент, вообще все классно!</p>
                

                <!--Review 2-->
                <div class="box">
                    <div class="review-profile">
                        <img src="home_img/comments/vereshagin2.jpg" alt="">
                        <h3>Михаил Верещагин</h3>
                    </div>
                    <div class="stars">
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star-half' ></i>
                    </div>
                    <i class='bx bxs-quote-alt-left' ></i>
                    <p>Студенты порадовали.</p>
 
                <!--Review 3-->
                <div class="box">
                    <div class="review-profile">
                        <img src="home_img/comments/stavickaya.jpg" alt="">
                        <h3>Екатерина Ставицкая</h3>
                    </div>
                    <div class="stars">
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                    </div>
                
                    <i class='bx bxs-quote-alt-left' ></i>
                    <p>ПРЕКРАСНЫЙ МАГАЗИН!!!</p>
                <!--Review 4-->
                <div class="box">
                    <div class="review-profile">
                        <img src="home_img/comments/Khudenko.jpg" alt="">
                        <h3>Владимир Худенко</h3>
                    </div>
                    <div class="stars">
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                    </div>
                    <i class='bx bxs-quote-alt-left' ></i>
                    <p>Люблю котиков</p>
                </div>

            </div>
    </section>
    <!--Footer-->
    <section>
        <div class="footer" id="footer">
                <div class="footer-box">
                    <a href="#" class="logo"><i class='bx bx-basket' ></i>ОНЛАЙН МАГАЗИН 364</a>
                    <p>ул. Невского дом 14а,<br>Россия, Калининград</p>
                    <div class="social">
                        <a href="#"><i class='bx bxl-discord-alt' ></i></a>
                        <a href="#"><i class='bx bxl-facebook' ></i></a>
                        <a href="#"><i class='bx bxl-twitter' ></i></a>
                        <a href="#"><i class='bx bxl-instagram' ></i></a>
                        <a href="#"><i class='bx bxl-youtube' ></i></a>
                    </div>
                </div>
            <div class="footer-box">
                <h2>Категории</h2>
                <a href="#">Фрукты и овощи</a>
                <a href="#">Сладости</a>
                <a href="#">Мясная продукция</a>
                <a href="#">Напитки</a>
                <a href="#">Готовая продукция</a>
            </div>
            <div class="footer-box">
                <h2>Другие ссылки
                </h2>
                <a href="#">Подарки</a>
                <a href="#">Акции</a>
                <a href="#">Частые вопросы</a>
                <a href="#">Поддержка и возврат</a>
            </div>
            <div class="footer-box">
                <h2>ПОДАРОК</h2>
                <p>Напиши свою почту чтобы получить скидку 25% на следующий онлайн заказ!</p>
                <form action="">
                    <i class='bx bxs-envelope' ></i>
                    <input type="email" name="" id="" placeholder="введите почту">
                    <i class='bx bx-arrow-back bx-rotate-180' ></i>
                </form>


            </div>
        </div>
    </section>
    
    <div class="coopyright">
        <p> &#169 magazin_364 2025</p>
    </div>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!--link js-->
    <script src="js/home.js" ></script>

    
</body>
</html>
