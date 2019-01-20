<template>
    <div id="page-top" class="page-top">
        <nav class="main-nav navbar navbar-expand-lg navbar-dark fixed-top" ref="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"><img class="logo" src="../../img/logo.png" alt="PC-BUILDER"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#configuration">KONFIGURACJA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#customize">DOSTOSUJ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#about">O NAS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#contact">KONTAKT</a>
                        </li>
                        <li class="nav-item"  v-if="user == undefined">
                            <a class="nav-link js-scroll-trigger" href="#login" data-toggle="modal" data-target="#modalLoginForm">LOGIN</a>
                        </li>
                        <li class="nav-item"  v-if="user != undefined">
                            <div class="dropdown show">
                                <a class="dropdown-toggle nav-link js-scroll-trigger" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ user.login }}
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" v-bind:href="logout">Wyloguj</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>

<style scoped>
    .logo {
        height: 35px;
        width: 200px;
    }
</style>
<script>
    export default {
        props: ['user', 'logout'],
        mounted() {
            const nav = this.$refs.mainNav;
            window.onscroll = function () {
                if (window.pageYOffset > 200) {
                    nav.style.background = "#000";
                } else {
                    nav.style.background = "transparent";
                }
            };
        }
    }
</script>
