<?php
session_start();
require './includes/modulos.php';

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: login.php'); // Redireciona para a página de login se não estiver logado
    exit; // Garante que o script pare de executar após o redirecionamento
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mySocial - Responsive Social Media Website Using HTML, CSS, & JavaScript</title>
    <!-- IconScout CDN -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="./issets/css/style.css">
</head>
<body>
    <nav>
        <div class="container">
            <img class="img-logo" src="./issets/images/SOGA.png">
            <div class="search-bar">
                <i class="uil uil-search"></i>
                <input type="search" placeholder="Procure amigos, grupos e eventos">
            </div>
            <div class="create">
                <label class="btn btn-primary" for="create-post">Criar</label>
                <div class="profile-photo">
                    <img src="./issets/images/TAVARES.jpg" alt="">
                </div>
            </div>
        </div>
    </nav>

    <!-------------------------------- MAIN ----------------------------------->
    <main>
        <div class="container">
            <!----------------- LEFT -------------------->
            <div class="left">
                <a class="profile">
                    <div class="profile-photo">
                        <img src="./issets/images/TAVARES.jpg">
                    </div>
                    <div class="handle">
                        <h4>António Tavares</h4>
                        <p class="text-muted">
                            @Tavares
                        </p>
                    </div>
                </a>

                <!----------------- SIDEBAR -------------------->
                <div class="sidebar">
                    <a class="menu-item active">
                        <span><i class="uil uil-home"></i></span>
                        <h3>Home</h3>   
                    </a>
                    <a class="menu-item"  id="notifications">
                        <span><i class="uil uil-bell"><small class="notification-count">9+</small></i></span>
                        <h3>Notificações</h3>
                        <!--------------- NOTIFICATION POPUP --------------->
                        <div class="notifications-popup">
                            <div>
                                <div class="profile-photo">
                                    <img src="./issets/images/profile-2.jpg">
                                </div>
                                <div class="notification-body">
                                    <b>Keke Benjamin</b> Aceitared your friend request
                                    <small class="text-muted">2 Days Ago</small>
                                </div>
                            </div>
                            <div>
                                <div class="profile-photo">
                                    <img src="./issets/images/profile-3.jpg">
                                </div>
                                <div class="notification-body">
                                    <b>John Doe</b> commented on your post
                                    <small class="text-muted">1 Hour Ago</small>
                                </div>
                            </div>
                            <div>
                                <div class="profile-photo">
                                    <img src="./issets/images/profile-4.jpg">
                                </div>
                                <div class="notification-body">
                                    <b>Marry Oppong</b> and <b>283 Others</b> liked your post
                                    <small class="text-muted">4 Minutes Ago</small>
                                </div>
                            </div>
                            <div>
                                <div class="profile-photo">
                                    <img src="./issets/images/profile-5.jpg">
                                </div>
                                <div class="notification-body">
                                    <b>Doris Y. Lartey</b> commented on a post you are tagged in
                                    <small class="text-muted">2 Days Ago</small>
                                </div>
                            </div>
                            <div>
                                <div class="profile-photo">
                                    <img src="./issets/images/profile-6.jpg">
                                </div>
                                <div class="notification-body">
                                    <b>Keyley Jenner</b> commented on a post you are tagged in
                                    <small class="text-muted">1 Hour Ago</small>
                                </div>
                            </div>
                            <div>
                                <div class="profile-photo">
                                    <img src="./issets/images/profile-7.jpg">
                                </div>
                                <div class="notification-body">
                                    <b>Jane Doe</b> commented on your post
                                    <small class="text-muted">1 Hour Ago</small>
                                </div>
                            </div>
                        </div>
                        <!--------------- END NOTIFICATION POPUP --------------->
                    </a>
                    <a class="menu-item" id="messages-notifications">
                        <span><i class="uil uil-envelope-alt"><small class="notification-count">6</small></i></span>
                        <h3>Mensagens</h3>
                    </a>
                    <a class="menu-item">
                        <span><i class="uil uil-bookmark"></i></span>
                        <h3>Eventos</h3>
                    </a>
                    <a class="menu-item">
                        <span><i class="uil uil-chart-line"></i></span>
                        <h3>Grupos</h3>
                    </a>
                    <a class="menu-item" id="theme">
                        <span><i class="uil uil-palette"></i></span>
                        <h3>Theme</h3>
                    </a>
                    <a class="menu-item">
                        <span><i class="uil uil-setting"></i></span>
                        <h3>Definições</h3>
                    </a>
                </div>
                <!----------------- END OF SIDEBAR -------------------->
                <label class="btn btn-primary" for="create-post">Criar Publicação</label>
            </div>

            <!----------------- MIDDLE -------------------->
            <div class="middle">
               
                <form action="./includes/save_post.php" method="POST" class="create-post">
                    <div class="profile-photo">
                        <img src="./issets/images/TAVARES.jpg">
                    </div>
                    <input type="text" name="postContent" placeholder="O que você está pensando, Tavares?" id="create-post">
                    <input type="submit" value="Publicar" class="btn btn-primary">
                </form>
                <!----------------- FEEDS -------------------->
                <div class="feeds">
                    <!----------------- FEED 1 -------------------->
                    <?php 
                    include './includes/fetch_posts.php';?>
                    <div class="feed">
                        <div class="head">
                            <div class="user">
                                <div class="profile-photo">
                                    <img src="./issets/images/profile-13.jpg">
                                </div>
                                <div class="info">
                                    <h3>Lana Rose</h3>
                                    <small>Dubai, 15 Minutes Ago</small>
                                </div>
                            </div>
                            <span class="edit">
                                <i class="uil uil-ellipsis-h"></i>
                            </span>
                        </div>

                        <div class="photo">
                            <img src="./issets/images/feed-1.jpg">
                        </div>

                        <div class="action-buttons">
                            <div class="interaction-buttons">
                                <span><i class="uil uil-heart"></i></span>
                                <span><i class="uil uil-comment-dots"></i></span>
                                <span><i class="uil uil-share-alt"></i></span>
                            </div>
                            <div class="bookmark">
                                <span><i class="uil uil-bookmark-full"></i></span>
                            </div>
                        </div>

                        <div class="liked-by">
                            <span><img src="./issets/images/profile-10.jpg"></span>
                            <span><img src="./issets/images/profile-4.jpg"></span>
                            <span><img src="./issets/images/profile-15.jpg"></span>
                            <p>Liked by <b>Ernest Achiever</b> and <b>2, 323 others</b></p>
                        </div>

                        <div class="caption">
                            <p><b>Lana Rose</b> Lorem ipsum dolor sit quisquam eius. 
                            <span class="harsh-tag">#lifestyle</span></p>
                        </div>

                        <div class="comments text-muted">
                            View all 277 comments
                        </div>
                    </div>
                    <!----------------- END OF FEED 1 -------------------->

                    <!----------------- FEED 2 -------------------->
                    <div class="feed">
                        <div class="head">
                            <div class="user">
                                <div class="profile-photo">
                                    <img src="./issets/images/profile-10.jpg">
                                </div>
                                <div class="info">
                                    <h3>Clara Dwayne</h3>
                                    <small>Miami, 2 Hours Ago</small>
                                </div>
                            </div>
                            <span class="edit">
                                <i class="uil uil-ellipsis-h"></i>
                            </span>
                        </div>

                        <div class="photo">
                            <img src="./issets/images/feed-3.jpg">
                        </div>

                        <div class="action-buttons">
                            <div class="interaction-buttons">
                                <span><i class="uil uil-heart"></i></span>
                                <span><i class="uil uil-comment-dots"></i></span>
                                <span><i class="uil uil-share-alt"></i></span>
                            </div>
                            <div class="bookmark">
                                <span><i class="uil uil-bookmark-full"></i></span>
                            </div>
                        </div>

                        <div class="liked-by">
                            <span><img src="./issets/images/profile-11.jpg"></span>
                            <span><img src="./issets/images/profile-5.jpg"></span>
                            <span><img src="./issets/images/profile-16.jpg"></span>
                            <p>Liked by <b>Diana Rose</b> and <b>2, 323 others</b></p>
                        </div>

                        <div class="caption">
                            <p><b>Clara Dwayne</b> Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, fugiat? Ipsam voluptatibus beatae facere eos harum voluptas distinctio, officia, facilis sed quisquam esse, assumenda minima ut. Excepturi sit quis reiciendis! 
                            <span class="harsh-tag">#lifestyle</span></p>
                        </div>

                        <div class="comments text-muted">
                            View all 100 comments
                        </div>
                    </div>
                    <!----------------- END OF FEED 2 -------------------->

                    <!----------------- FEED 3 -------------------->
                    <div class="feed">
                        <div class="head">
                            <div class="user">
                                <div class="profile-photo">
                                    <img src="./issets/images/profile-4.jpg">
                                </div>
                                <div class="info">
                                    <h3>Rosalinda Clark</h3>
                                    <small>New York, 50 Minutes Ago</small>
                                </div>
                            </div>
                            <span class="edit">
                                <i class="uil uil-ellipsis-h"></i>
                            </span>
                        </div>

                        <div class="photo">
                            <img src="./issets/images/feed-4.jpg">
                        </div>

                        <div class="action-buttons">
                            <div class="interaction-buttons">
                                <span><i class="uil uil-heart"></i></span>
                                <span><i class="uil uil-comment-dots"></i></span>
                                <span><i class="uil uil-share-alt"></i></span>
                            </div>
                            <div class="bookmark">
                                <span><i class="uil uil-bookmark-full"></i></span>
                            </div>
                        </div>

                        <div class="liked-by">
                            <span><img src="./issets/images/profile-12.jpg"></span>
                            <span><img src="./issets/images/profile-13.jpg"></span>
                            <span><img src="./issets/images/profile-14.jpg"></span>
                            <p>Liked by <b>Clara Dwayne</b> and <b>2, 323 others</b></p>
                        </div>

                        <div class="caption">
                            <p><b>Rosalinda Clark</b> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quo ullam, quam voluptatibus natus ex corporis ea atque quisquam, necessitatibus, cumque eligendi aliquam nulla soluta hic. Obcaecati, tempore dignissimos! Esse cupiditate laborum ullam, quae necessitatibus, officiis, quaerat aspernatur illo voluptatum repellat perferendis voluptatem similique. Assumenda nostrum, eius sit laborum nesciunt deserunt!
                            <span class="harsh-tag">#lifestyle</span></p>
                        </div>

                        <div class="comments text-muted">
                            View all 50 comments
                        </div>
                    </div>
                    <!----------------- END OF FEED 3 -------------------->

                    <!----------------- FEED 4 -------------------->
                    <div class="feed">
                        <div class="head">
                            <div class="user">
                                <div class="profile-photo">
                                    <img src="./issets/images/profile-5.jpg">
                                </div>
                                <div class="info">
                                    <h3>Alexandria Riana</h3>
                                    <small>Dubai, 1 Hour Ago</small>
                                </div>
                            </div>
                            <span class="edit">
                                <i class="uil uil-ellipsis-h"></i>
                            </span>
                        </div>

                        <div class="photo">
                            <img src="./issets/images/feed-5.jpg">
                        </div>

                        <div class="action-buttons">
                            <div class="interaction-buttons">
                                <span><i class="uil uil-heart"></i></span>
                                <span><i class="uil uil-comment-dots"></i></span>
                                <span><i class="uil uil-share-alt"></i></span>
                            </div>
                            <div class="bookmark">
                                <span><i class="uil uil-bookmark-full"></i></span>
                            </div>
                        </div>

                        <div class="liked-by">
                            <span><img src="./issets/images/profile-10.jpg"></span>
                            <span><img src="./issets/images/profile-4.jpg"></span>
                            <span><img src="./issets/images/profile-15.jpg"></span>
                            <p>Liked by <b>Lana Rose</b> and <b>5, 323 others</b></p>
                        </div>

                        <div class="caption">
                            <p><b>Alexandria Riana</b> Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi architecto sunt itaque, in, enim non doloremque velit unde nihil vitae impedit dolorum, distinctio ab deleniti! 
                            <span class="harsh-tag">#lifestyle</span></p>
                        </div>

                        <div class="comments text-muted">
                            View all 540 comments
                        </div>
                    </div>
                    <!----------------- END OF FEED 4 -------------------->

                    <!----------------- FEED 5 -------------------->
                    <div class="feed">
                        <div class="head">
                            <div class="user">
                                <div class="profile-photo">
                                    <img src="./issets/images/profile-7.jpg">
                                </div>
                                <div class="info">
                                    <h3>Keylie Hadid</h3>
                                    <small>Dubai, 3 Hours Ago</small>
                                </div>
                            </div>
                            <span class="edit">
                                <i class="uil uil-ellipsis-h"></i>
                            </span>
                        </div>

                        <div class="photo">
                            <img src="./issets/images/feed-7.jpg">
                        </div>

                        <div class="action-buttons">
                            <div class="interaction-buttons">
                                <span><i class="uil uil-heart"></i></span>
                                <span><i class="uil uil-comment-dots"></i></span>
                                <span><i class="uil uil-share-alt"></i></span>
                            </div>
                            <div class="bookmark">
                                <span><i class="uil uil-bookmark-full"></i></span>
                            </div>
                        </div>

                        <div class="liked-by">
                            <span><img src="./issets/images/profile-10.jpg"></span>
                            <span><img src="./issets/images/profile-4.jpg"></span>
                            <span><img src="./issets/images/profile-15.jpg"></span>
                            <p>Liked by <b>Riana Rose</b> and <b>1, 226 others</b></p>
                        </div>

                        <div class="caption">
                            <p><b>Keylie Hadid</b> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem obcaecati nisi veritatis quisquam eius accusantium rem quo repellat facilis neque.
                            <span class="harsh-tag">#lifestyle</span></p>
                        </div>

                        <div class="comments text-muted">
                            View all 199 comments
                        </div>
                    </div>
                    <!----------------- END OF FEED 5 -------------------->

                    <!----------------- FEED 6 -------------------->
                    <div class="feed">
                        <div class="head">
                            <div class="user">
                                <div class="profile-photo">
                                    <img src="./issets/images/profile-15.jpg">
                                </div>
                                <div class="info">
                                    <h3>Benjamin Dwayne</h3>
                                    <small>New York, 5 Hours Ago</small>
                                </div>
                            </div>
                            <span class="edit">
                                <i class="uil uil-ellipsis-h"></i>
                            </span>
                        </div>

                        <div class="photo">
                            <img src="./issets/images/feed-2.jpg">
                        </div>

                        <div class="action-buttons">
                            <div class="interaction-buttons">
                                <span><i class="uil uil-heart"></i></span>
                                <span><i class="uil uil-comment-dots"></i></span>
                                <span><i class="uil uil-share-alt"></i></span>
                            </div>
                            <div class="bookmark">
                                <span><i class="uil uil-bookmark-full"></i></span>
                            </div>
                        </div>

                        <div class="liked-by">
                            <span><img src="./issets/images/profile-10.jpg"></span>
                            <span><img src="./issets/images/profile-4.jpg"></span>
                            <span><img src="./issets/images/profile-15.jpg"></span>
                            <p>Liked by <b>Ernest Achiever</b> and <b>2, 323 others</b></p>
                        </div>

                        <div class="caption">
                            <p><b>Benjamin Dwayne</b> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum, consequuntur!
                            <span class="harsh-tag">#lifestyle</span></p>
                        </div>

                        <div class="comments text-muted">
                            View all 277 comments
                        </div>
                    </div>
                    <!----------------- END OF FEED 6 -------------------->

                    <!----------------- FEED 7 -------------------->
                    <div class="feed">
                        <div class="head">
                            <div class="user">
                                <div class="profile-photo">
                                    <img src="./issets/images/profile-3.jpg">
                                </div>
                                <div class="info">
                                    <h3>Indiana Ellison</h3>
                                    <small>Qatar, 8 Hours Ago</small>
                                </div>
                            </div>
                            <span class="edit">
                                <i class="uil uil-ellipsis-h"></i>
                            </span>
                        </div>

                        <div class="photo">
                            <img src="./issets/images/feed-6.jpg">
                        </div>

                        <div class="action-buttons">
                            <div class="interaction-buttons">
                                <span><i class="uil uil-heart"></i></span>
                                <span><i class="uil uil-comment-dots"></i></span>
                                <span><i class="uil uil-share-alt"></i></span>
                            </div>
                            <div class="bookmark">
                                <span><i class="uil uil-bookmark-full"></i></span>
                            </div>
                        </div>

                        <div class="liked-by">
                            <span><img src="./issets/images/profile-10.jpg"></span>
                            <span><img src="./issets/images/profile-4.jpg"></span>
                            <span><img src="./issets/images/profile-15.jpg"></span>
                            <p>Liked by <b>Benjamin Dwayne</b> and <b>2, 323 others</b></p>
                        </div>

                        <div class="caption">
                            <p><b>Indiana Ellison</b> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur itaque quasi autem pariatur ducimus eligendi, qui odio molestias at molestiae. 
                            <span class="harsh-tag">#lifestyle</span></p>
                        </div>

                        <div class="comments text-muted">
                            View all 277 comments
                        </div>
                    </div>
                    <!----------------- END OF FEED 7 -------------------->
                </div>
                <!----------------- END OF FEEDS -------------------->
            </div>
             <!----------------- END OF MIDDLE -------------------->

            <!----------------- RIGHT -------------------->
            <div class="right">
                <!------- MESSAGES ------->
                <div class="messages">
                    <div class="heading">
                        <h4>Messages</h4>
                        <i class="uil uil-edit"></i>
                    </div>
                    <!------- SEARCH BAR ------->
                    <div class="search-bar">
                        <i class="uil uil-search"></i>
                        <input type="search" placeholder="Procurar mensagens" id="message-search">
                    </div>
                    <!------- MESSAGES CATEGORY ------->
                    <div class="category">
                        <h6 class="active">Primary</h6>
                        <h6>General</h6>
                        <h6 class="message-requests">Requests (7)</h6>
                    </div>
                    <!------- MESSAGES ------->
                    <div class="message">
                        <div class="profile-photo">
                            <img src="./issets/images/profile-17.jpg">
                        </div>
                        <div class="message-body">
                            <h5>Edem Quist</h5>
                            <p class="text-muted">Just woke up bruh</p>
                        </div>
                    </div>
                    <!------- MESSAGES ------->
                    <div class="message">
                        <div class="profile-photo">
                            <img src="./issets/images/profile-6.jpg">
                        </div>
                        <div class="message-body">
                            <h5>Daniella Jackson</h5>
                            <p class="text-bold">2 new messages</p>
                        </div>
                    </div>
                    <!------- MESSAGES ------->
                    <div class="message">
                        <div class="profile-photo">
                            <img src="./issets/images/profile-8.jpg">
                            <div class="active"></div>
                        </div>
                        <div class="message-body">
                            <h5>Chantel Msiza</h5>
                            <p class="text-muted">lol u right</p>
                        </div>
                    </div>
                    <!------- MESSAGES ------->
                    <div class="message">
                        <div class="profile-photo">
                            <img src="./issets/images/profile-10.jpg">
                        </div>
                        <div class="message-body">
                            <h5>Juliet Makarey</h5>
                            <p class="text-muted">Birtday Tomorrow</p>
                        </div>
                    </div>
                    <!------- MESSAGES ------->
                    <div class="message">
                        <div class="profile-photo">
                            <img src="./issets/images/profile-3.jpg">
                            <div class="active"></div>
                        </div>
                        <div class="message-body">
                            <h5>Keylie Hadid</h5>
                            <p class="text-bold">5 new messages</p>
                        </div>
                    </div>
                    <!------- MESSAGES ------->
                    <div class="message">
                        <div class="profile-photo">
                            <img src="./issets/images/profile-15.jpg">
                        </div>
                        <div class="message-body">
                            <h5>Benjamin Dwayne</h5>
                            <p class="text-muted">haha got that!</p>
                        </div>
                    </div>
                </div>
                <!------- END OF MESSAGES ------->

                <!------- FRIEND REQUEST ------->
                <div class="friend-requests">
                    <h4>Requests</h4>
                    <div class="request">
                        <div class="info">
                            <div class="profile-photo">
                                <img src="./issets/images/profile-20.jpg">
                            </div>
                            <div>
                                <h5>Hajia Bintu</h5>
                                <p class="text-muted">8 mutual friends</p>
                            </div>
                        </div>
                        <div class="action">
                            <button class="btn btn-primary">
                                Aceitar
                            </button>
                            <button class="btn">
                                Remover
                            </button>
                        </div>
                    </div>
                    <div class="request">
                        <div class="info">
                            <div class="profile-photo">
                                <img src="./issets/images/profile-18.jpg">
                            </div>
                            <div>
                                <h5>Edelson Mandela</h5>
                                <p class="text-muted">2 mutual friends</p>
                            </div>
                        </div>
                        <div class="action">
                            <button class="btn btn-primary">
                                Aceitar
                            </button>
                            <button class="btn">
                                Remover
                            </button>
                        </div>
                    </div>
                    <div class="request">
                        <div class="info">
                            <div class="profile-photo">
                                <img src="./issets/images/profile-17.jpg">
                            </div>
                            <div>
                                <h5>Megan Baldwin</h5>
                                <p class="text-muted">5 mutual friends</p>
                            </div>
                        </div>
                        <div class="action">
                            <button class="btn btn-primary">
                                Aceitar
                            </button>
                            <button class="btn">
                                Remover
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!----------------- END OF RIGHT -------------------->
        </div>
    </main>

    <!----------------- THEME CUSTOMIZATION -------------------->
    <div class="customize-theme">
        <div class="card">
            <h2>Customize your view</h2>
            <p class="text-muted">Manage your font size, color, and background</p>

            <!----------- FONT SIZE ----------->
            <div class="font-size">
                <h4>Font Size</h4>
                <div>
                    <h6>Aa</h6>
                    <div class="choose-size">
                        <span class="font-size-1"></span>
                        <span class="font-size-2 active"></span>
                        <span class="font-size-3"></span>
                        <span class="font-size-4"></span>
                        <span class="font-size-5"></span>
                    </div>
                    <h3>Aa</h3>
                </div>
            </div>

            <!----------- PRIMARY COLORS ----------->
            <div class="color">
                <h4>Color</h4>
                <div class="choose-color">
                    <span class="color-1 active"></span>
                    <span class="color-2"></span>
                    <span class="color-3"></span>
                    <span class="color-4"></span>
                    <span class="color-5"></span>
                </div>
            </div>

            <!----------- BACKGROUND COLORS ----------->
            <div class="background">
                <h4>Background</h4>
                <div class="choose-bg">
                    <div class="bg-1 active">
                        <span></span>
                        <h5 for="bg-1">Light</h5>
                    </div>
                    <div class="bg-2">
                        <span></span>
                        <h5 for="bg-2">Dim</h5>
                    </div>
                    <div class="bg-3">
                        <span></span>
                        <h5 for="bg-3">Dark</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="./issets/js/index.js"></script>
</body>
</html>