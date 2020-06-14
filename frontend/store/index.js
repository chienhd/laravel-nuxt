export const getters = {
  isAuthenticated(state) {
  	console.log('state.auth');
  	console.log(state.auth);
    return state.auth.loggedIn
  },

  loggedInUser(state) {
  	console.log('state');
  	console.log(state);
    return state.auth.user
  }
}