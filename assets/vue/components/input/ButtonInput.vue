<template>
    <div class="input-group-append">
        <button type="button"
                class="btn btn-outline-primary"
                @click="fetchAnagramsFromApi([getWord, getRating])">
            Click here to search
        </button>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'

    export default {
        computed: {
            ...mapGetters(['getWord', 'getRating'])
        },
        methods: {
            ...mapActions(['fetchAnagramsFromApi'])
        }
    }
</script>
