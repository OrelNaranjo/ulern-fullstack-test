import './assets/main.scss'
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import {
  faLock,
  faUser,
  faEnvelope,
  faUserPlus,
  faPhone,
  faUserPen,
  faTachometerAlt,
  faSignOutAlt,
  faBars,
  faChevronLeft,
  faChevronRight,
  faTimes,
} from '@fortawesome/free-solid-svg-icons'
import { faLinkedin, faGithub } from '@fortawesome/free-brands-svg-icons'

import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'
import { authInterceptor } from './interceptors/authInterceptors'
import axios from 'axios'

library.add(
  faPhone,
  faLock,
  faUser,
  faEnvelope,
  faUserPlus,
  faLinkedin,
  faGithub,
  faUserPen,
  faTachometerAlt,
  faSignOutAlt,
  faBars,
  faChevronLeft,
  faChevronRight,
  faTimes,
)

const app = createApp(App)

app.component('font-awesome-icon', FontAwesomeIcon)
app.use(createPinia())
app.use(router)

axios.interceptors.request.use(authInterceptor)

app.mount('#app')
