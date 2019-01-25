<template>
    <div id="page-top" class="page-top">
        <nav class="main-nav navbar navbar-expand-lg navbar-dark fixed-top" ref="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"><img class="logo" src="../../../img/logo.png" alt="PC-BUILDER"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="/backend/users">UŻYTKOWNICY</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="/backend/components">KOMPONENTY</a>
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
                                    <a class="dropdown-item" href="/">Przejdź na Frontend</a>
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
    }
</script>
