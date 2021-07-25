export let LocalStorage = {
    get(key) {
        try {
            return JSON.parse(localStorage.getItem(key))
        } catch (e) {
            return null
        }
    },
    set(key, value) {
        if (typeof key != 'undefined')
            localStorage.setItem(key, JSON.stringify(value))
        else
            localStorage.removeItem(key)
    }
}