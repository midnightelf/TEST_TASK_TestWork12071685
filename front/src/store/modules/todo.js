import axios from 'axios'

export default {
    state: {
        items: []
    },
    getters: {
        allItems: state => state.items
    },
    mutations: {
        updateItems(state, items) {
            state.items = items.data
        }
    },
    actions: {
        async fetchItems({commit}) {
            commit('updateItems', await axios.get('todo'))
        },
    },
}
