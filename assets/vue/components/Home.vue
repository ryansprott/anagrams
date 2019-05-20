<template>
    <div>
        <section class="jumbotron text-center">
            <h1 class="jumbotron-heading">CCIT Anagram Finder</h1>
            <h5>with bonus GIF action</h5>
            <div class="input-group mb-3">
                <text-input></text-input>
                <select-list></select-list>
                <button-input></button-input>
            </div>
        </section>
        <anagram-list :anagrams="getGifs"></anagram-list>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex'
    import AnagramList from './anagram/AnagramList'
    import SelectList from './input/SelectList'
    import TextInput from './input/TextInput'
    import ButtonInput from './input/ButtonInput'

    export default {
        components: {
            'button-input': ButtonInput,
            'text-input': TextInput,
            'select-list': SelectList,
            'anagram-list': AnagramList
        },
        computed: {
            ...mapGetters(['getGifs'])
        },
    }
</script>
