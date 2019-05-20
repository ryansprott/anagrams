<template>
    <div class="container">
        <app-header></app-header>
        <router-view></router-view>
    </div>
</template>

<script>
    import Header from './components/layout/Header.vue'

    export default {
        components: {
            "app-header": Header
        }
    }
</script>
