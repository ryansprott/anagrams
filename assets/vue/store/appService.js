import axios from 'axios'
import { cacheAdapterEnhancer } from 'axios-extensions'

const http = axios.create({
    baseURL: '/',
    headers: { 'Cache-Control': 'no-cache' },
    adapter: cacheAdapterEnhancer(axios.defaults.adapter)
})

http.interceptors.request.use(config => {
    document.body.classList.add('loading-indicator');
    return config
})

const appService = {
    getAnagrams (word) {
        if (word) return doAjax(`/anagrams/${word}`)
    },
    getGifs (word, rating) {
        if (word && rating) return doAjax(`/gifs/${word}/rating/${rating}`)
    }
}

const doAjax = url => {
    return new Promise((resolve) => {
        http.get(url)
        .then(response => {
            resolve(response.data)
        }).catch(err => {
            console.error(err)
        })
    })
}

export default appService
