<template>
    <input type="text"
           class="form-control"
           placeholder="Type a word here"
           @keyup.enter="fetchAnagramsFromApi([getWord, getRating])"
           @keyup="sanitizeInput" />
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'

    export default {
        computed: {
            ...mapGetters(['getWord', 'getRating'])
        },
        methods: {
            sanitizeInput(event) {
                let input = event.target.value
                let regex = new RegExp(/[^A-Za-z]/g)
                input = (regex.test(input)) ? input.replace(regex, '') : input
                this.$store.dispatch('setWord', input)
            },
            ...mapActions(['fetchAnagramsFromApi'])
        }
    }
</script>
