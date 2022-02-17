// import Sdata from '../Sdata'
import { combineReducers, createStore } from 'redux';

let intitialDAta = [];

let initialUserData = {user:null};

function userReducer(state = initialUserData, action) {

    state = { ...state };
    switch (action.type) {

        // getting data from localStorage
        case 'USER_LOGIN':
            state.user = action.payload;
            break;

        case 'USER_LOGOUT':
            state.user = null;
            break;

        }
    return state;
}


let allReducer = combineReducers({  userReducer });
let store = createStore(allReducer);
export default store;
