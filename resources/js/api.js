import axios from 'axios'
import router from "./router";


const api = axios.create();

//start request
api.interceptors.request.use(config => {
        if (localStorage.getItem('access_token')) {
            config.headers.authorization = `Bearer ${localStorage.getItem('access_token')}`
        }
        return config
    },
    error => {
    })
//end request

//start response
api.interceptors.response.use({},
    error => {
        if (error.response) {
            if (error.response.data.message === 'Token has expired') {
                return axios.post('/api/auth/refresh', {}, {
                    headers: {
                        'authorization': `Bearer ${localStorage.getItem('access_token')}`
                    }
                }).then(res => {
                    localStorage.access_token = res.data.access_token
                    error.config.headers.authorization = `Bearer ${res.data.access_token}`
                    return api.request(error.config)
                })
            }
        }

        if (!localStorage.getItem('access_token')) {
            router.push({ name: 'login' })
        }
    })
//end response

export default api
