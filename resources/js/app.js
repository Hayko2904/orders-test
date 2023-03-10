import './bootstrap';
import { createApp } from 'vue'
import App from './App.vue'
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import store from './store/index'

const vuetify = createVuetify({
    components,
    directives,
})

createApp(App).use(vuetify).use(store).mount('#app')