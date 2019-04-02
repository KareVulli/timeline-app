import Axios from 'axios'

export default function (store) {
    console.log('Axios interceptors created.');
    Axios.interceptors.response.use(
        response => response,
        error => {
            console.log('Axios error interceptor called.');
            if (401 === error.response.status) {
                store.commit('logout');
            }
            return Promise.reject(error);
        }
    );

    Axios.interceptors.request.use(
        config => {
            console.log('Axios request interceptor called.');
            if (store.state.auth !== null) {
                const token = store.state.auth.token;
                config.headers.Authorization = `Bearer ${token}`;
            }
            return config;
        },
        error => Promise.reject(error)
    );

    store.watch(
        state => state.auth,
        auth => {
            console.log('auth api: The watcher callback is called')
            if (auth) {
                localStorage.setItem('token', auth.token);
            } else {
                localStorage.removeItem('token');
            }
        }
    )
}