export default {
    install(Vue, { router, store, api, sessionCheckInterval, afterLoginRoute = 'dashboard', afterLogoutRoute = 'login', loginOtpRoute = 'loginOtp' }) {
        let session = {
            /**
             * Tries to login with provided credentials
             * @param {string} username
             * @param {string} password
             * @param {string} sessionname
             * @returns {Promise}
             */
            login(username, password) { console.log('test');return false;
                return new Promise((resolve, reject) => {
                    api.post('/login', {"username": username, "password": password}).then((response) => {
						
                            store.dispatch('global/userLoginData', response)
                            //router.push({name: loginOtpRoute, params: {type: response.otpTransport}})
							
                            return resolve(response.data.user)
                    }).catch((err) => {
                        return reject(err)
                    })
                })
            },
            /**
             * Logs the currently logged in user out
             * @returns {Promise}
             */
            logout() {
                return new Promise((resolve, reject) => {
                    return api.authEngine.logout().then(() => {
                        store.global.isLoggedIn = false
                        router.push({name: afterLogoutRoute})
                        return resolve()
                    }).catch((err) => {
                        if (err.result.errorCodeExt == 10003) {
                            store.global.isLoggedIn = false
                            router.push({name: afterLogoutRoute})
                            return resolve(err)
                        }
                        log.error('Failed to logout', err)
                        return reject(err)
                    })
                })
            },
            /**
             * Checks if the session has expired and if so calls the logout function
             * @returns Promise
             */
            check() {
                if (store.global.isLoggedIn && store.global.sessionExpirationTimestamp < new Date().getTime()) {
                    return this.logout()
                }
                return Promise.resolve()
            },
            
        }
        // Sets an interval for checking if the session has expired
        /*if (sessionCheckInterval) {
            setInterval(session.check.bind(session), sessionCheckInterval)
        }*/
        Vue.prototype.$session = session
        this.__proto__ = session
    }
}
