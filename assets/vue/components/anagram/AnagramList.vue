<template>
    <div class="container">
        <div v-for="anagram in anagrams" class="row">
            <anagram :anagram="anagram"></anagram>
        </div>
    </div>
</template>

<script>
    import Anagram from './Anagram'

    export default {
        components: {
            'anagram': Anagram
        },
        props: ['anagrams'],
    }
</script>
