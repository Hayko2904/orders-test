let actions = {
    createOrder({commit}, order) {
        axios.post('/api/orders', order)
            .then(res => {
                commit('CREATE_ORDER', res.data)
            }).catch(err => {
            console.log(err)
        })

    },
    editOrder({commit}, order) {
        axios.put('/api/orders', order)
            .then(res => {
                commit('EDIT_ORDER', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    fetchOrdersFilterName({commit}, name = null) {
        axios.get('/api/orders?product_name=' + name)
            .then(res => {
                commit('FETCH_ORDERS', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    fetchOrdersFilterPrice({commit}, price = null) {
        axios.get('/api/orders?total_price=' + price)
            .then(res => {
                commit('FETCH_ORDERS', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    fetchOrders({commit}, page = 1) {
        axios.get('/api/orders?page=' + page)
            .then(res => {
                commit('FETCH_ORDERS', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    deleteOrder({commit}, order) {
        axios.delete(`/api/orders/${order.id}`)
            .then(res => {
                if (res)
                    console.log()
                    commit('DELETE_ORDER', order)
            }).catch(err => {
        })
    }
}

export default actions