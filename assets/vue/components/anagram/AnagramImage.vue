<template>
    <div class="mb-4">
        <img :src="image" class="anagram-img" />
    </div>
</template>

<script>
    export default {
        props: ['image'],
    }
</script>
