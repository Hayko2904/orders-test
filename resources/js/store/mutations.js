let mutations = {
    CREATE_ORDER(state, order) {
        state.orders.data.unshift(order)
    },
    EDIT_ORDER(state, order) {
        let index = state.orders.data.findIndex(item => item.id === order.id)

        if (~index) {
            state.orders.data[index] = order;
        }
    },
    FETCH_ORDERS(state, orders) {
        return state.orders = orders
    },
    DELETE_ORDER(state, order) {
        let index = state.orders.data.findIndex(item => item.id === order.id)
        state.orders.data.splice(index, 1)
    }

}
export default mutations