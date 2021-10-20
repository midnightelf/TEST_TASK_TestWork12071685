import axios from 'axios'

export default {
    state: {
        token: '',
        user: {},
    },
    getters: {
        token: state => state.token,
        user: state => state.user,
        isAuth: state => Boolean(state.token)
    },
    mutations: {
        setToken(state, {data}) {
            axios.defaults.headers.common = {
                'Authorization': 'Bearer ' + data.token
            }

            state.token = data.token
        },
        dropToken(state) {
            axios.defaults.headers.common = {
                'Authorization': ''
            }

            state.token = ''
        }
    },
    actions: {
        async login({commit}, login) {
            commit('setToken', await axios.post('login', login))
        },
        async logout({commit}) {
            commit('dropToken', await axios.post('logout'));
        }
    },
}
