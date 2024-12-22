<?php
    session_start();
    if(!isset($_SESSION["email"])) {
        header("Location: /ativ-som/php/login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>おいしい cafe</title>

    <link rel="stylesheet" href="/ativ-som/css/style.css">
</head>
    <body>
        <header>
            <a class="home" href="home.php" formtarget="_top" value="おいしい cafe">おいしい cafe</a>
            <nav>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="form.php">Work with us</a></li>
                    <li><a href="/ativ-som/php/userData.php">Account</a></li>
                </ul>
            </nav>
        </header>

        <section id="about">
            <h2 class="about-title">About us</h2>

            <div class="content-about">
                <!-- About us -->
                <div class="who-we-are">
                    <h3>Who we Are?</h3>

                    <p>Welcome to our café, where Japanese tradition meets the art of coffee! We offer a unique experience that goes beyond a simple cup. Our cozy space combines minimalist design and works by local artists, creating an atmosphere perfect for relaxing and savoring. 
                    <br>
                    <br>
                    Our baristas, passionate about what they do, use traditional techniques and carefully selected beans to create exceptional beverages. In addition to coffee, we serve delights inspired by Japanese cuisine, offering a true sensory journey.
                    <br>
                    <br>
                    We also host events and workshops that celebrate Japanese culture. Come visit us and discover a different way to enjoy coffee!</p>

                    <!-- Botão que leva para o forms -->
                    <div class="call-to-action">
                        <a href="form.php"><button>Work with us!</button></a>

                        <span>(500+ stores in the world!)</span>
                    </div>
                </div>

                <div class="painel">
                    <img src="/ativ-som//assets/ABC COFFEE ROASTERS.jpg" alt="painel de café">
                </div>
            </div>
        </section>

        <section class="nossas-bebidas">
            <h2>Our Coffees</h2>
            <div class="cardapio">
                <div class="bebida">
                    <span>Latte Coffee</span>
                    <img src="/ativ-som//assets/coffee latte cup.jpeg" alt="imagem café">
                    <p class="drink-description"> The Latte Coffee it's a coffee where the ingredients are coffee and milk, simple but delicious</p>
                </div>

                <div class="bebida">
                    <span>Mocha</span>
                    <img src="/ativ-som//assets/Mocha coffee cafe latte art cute aesthetic mug.jpeg" alt="imagem café">
                    <p class="drink-description"> The Mocha it's a coffee where the ingredients are coffee, milk and dark chocolate, just a bit of sweetness for the life.</p>
                </div>

                <div class="bebida">
                    <span>Espresso</span>
                    <img src="/ativ-som//assets/Iced Americano.jpeg" alt="imagem café">
                    <p class="drink-description"> The Espresso it's a coffee where the extraction is made at a high pressure, resulting in an intense shot of coffee.</p>
                </div>

                <div class="bebida">
                    <span>Iced Americano</span>
                    <img src="/ativ-som//assets/How to Make an Iced Americano better than Starbucks.jpeg" alt="imagem café">
                    <p class="drink-description"> The Iced Americano it's a shot of espresso diluted in water, some ice and it's refreshing. </p>
                </div>

                <div class="bebida">
                    <span>Iced Latte Coffee</span>                   
                    <img src="/ativ-som//assets/Iced Vanilla Latte Recipe (Starbucks Copycat) - One Sweet Appetite.jpeg" alt="imagem café">
                    <p class="drink-description"> The Iced Latte Coffee it's a beverage where the ingredients are simply coffee, milk and ice. </p>
                </div>
            </div>
        </section>

        <script>
            document.querySelectorAll(".bebida").forEach(bebida =>
            bebida.addEventListener("mouseenter" , function() {
                const bebidaPos = this.getBoundingClientRect();

                window.scrollTo({
                    top: bebidaPos.top + window.scrollY - 100,
                }); 
            }))
        </script>
    </body>
</html>