<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <router-link class="nav-item"
                             tag="li"
                             to="/home"
                             active-class="active">
                    <a class="nav-link">Home</a>
                </router-link>
            </ul>
            <ul class="navbar-nav">
                <router-link class="nav-item"
                             tag="li"
                             to="/about"
                             active-class="active">
                    <a class="nav-link">About</a>
                </router-link>
            </ul>
        </div>
    </nav>
</template>
