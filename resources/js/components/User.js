import React from 'react';
import ReactDOM from 'react-dom';
import Header from '../components/component/Header/Header'
import Navbar from '../components/component/Navbar/Navbar'
import '../app.css'
import {
    BrowserRouter as Router, Route, Switch, useLocation,
    withRouter
} from 'react-router-dom'
function User() {
    return (
        <Router>
            <Header />
            <Navbar />
        </Router>
    );
}
export default User;
// DOM element
if (document.getElementById('user')) {
    ReactDOM.render(<User />, document.getElementById('user'));
}