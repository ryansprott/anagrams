import Vue from 'vue'
import Vuex from 'vuex'
import appService from './appService'

Vue.use(Vuex)

const state = {
    currentWord: '',
    rating: 'G',
    anagrams: [],
    gifs: []
}

const store = new Vuex.Store({
    state,
    getters: {
        getWord: () => {
            return state.currentWord
        },
        getRating: () => {
            return state.rating
        },
        getGifs: () => {
            return state.gifs
        }
    },
    mutations: {
        setWord: (state, payload) => {
            state.currentWord = payload
        },
        setAnagrams: (state, payload) => {
            state.anagrams = payload
        },
        setGif: (state, payload) => {
            state.gifs.push(payload)
        },
        setRating: (state, payload) => {
            state.rating = payload
        }
    },
    actions: {
        setWord: (context, payload) => {
            context.commit('setWord', payload)
        },
        setRating: (context, payload) => {
            let word   = payload[0]
            let rating = payload[1]
            context.commit('setRating', rating)
            context.dispatch('fetchAnagramsFromApi', [word, rating])
        },
        fetchAnagramsFromApi: (context, payload) => {
            let word   = payload[0]
            let rating = payload[1]
            state.anagrams = []
            appService.getAnagrams(word).then(data => {
                context.commit('setAnagrams', data)
                context.dispatch('fetchGifsFromApi', [data, rating])
            })
        },
        fetchGifsFromApi: (context, payload) => {
            let words  = payload[0]
            let rating = payload[1]
            let promises = []
            state.gifs = []
            words.map(word => { promises.push(appService.getGifs(word, rating)) })
            Promise.all(promises).then(results => {
                results.map(result => { context.commit('setGif', result) })
            }).then(() => {
                document.body.classList.remove('loading-indicator');
            })
        }
    }
})

export default store
