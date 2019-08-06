Nova.booting((Vue, router, store) => {
    Vue.component('index-depend-fill', require('./components/IndexField'))
    Vue.component('detail-depend-fill', require('./components/DetailField'))
    Vue.component('form-depend-fill', require('./components/FormField'))
})
