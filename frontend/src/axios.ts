// filepath: /c:/Akira/ulern/frontend/src/axios.ts
import axios from 'axios'
import { authInterceptor } from './interceptors/authInterceptors'

const instance = axios.create({
  baseURL: 'http://localhost:8000/api',
  headers: {
    'Content-Type': 'application/json',
  },
})

instance.interceptors.request.use(authInterceptor)

export default instance
