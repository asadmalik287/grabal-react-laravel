// import Sdata from '../Sdata'
import { combineReducers, createStore } from 'redux';

let intitialDAta = [];

let initialUserData = {user:null};

function userReducer(state = initialUserData, action) {

    state = { ...state };
    switch (action.type) {

        case 'USER_LOGIN':
            state.user = action.payload;
            break;

        case 'USER_LOGOUT':
            state.user = null;
            break;

        }

    console.log(state.user,'state');
    return state;
}


let allReducer = combineReducers({  userReducer });
let store = createStore(allReducer);
export default store;
