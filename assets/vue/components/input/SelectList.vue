<template>
    <div class="input-group-append mx-3">
        <label class="label label-primary mt-1"
               for="ratingSelect">
            Rating
        </label>

        <select class="form-control"
                id="ratingSelect"
                :value="getRating"
                @change="setRating([getWord, $event.target.value])">
            <option value="Y">Y</option>
            <option value="G">G</option>
            <option value="PG">PG</option>
            <option value="PG-13">PG-13</option>
            <option value="R">R</option>
        </select>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'

    export default {
        computed: {
            ...mapGetters(['getWord', 'getRating'])
        },
        methods: {
            ...mapActions(['setRating'])
        }
    }
</script>
