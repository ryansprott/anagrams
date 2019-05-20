<template>
    <div class="col-sm-12 bg-light mb-4 px-4 py-2">
        <h3>{{ anagram.word }}</h3>
        <div class="row">
            <div v-for="image in anagram.gifs"
                 class="col-sm-4"
                 align="center">
                <anagram-image :image="image"></anagram-image>
            </div>
        </div>
    </div>
</template>

<script>
    import AnagramImage from './AnagramImage'

    export default {
        components: {
            'anagram-image': AnagramImage
        },
        props: ['anagram'],
    }
</script>
