import React, {useEffect,useState} from 'react';
import ReactDOM from 'react-dom';
import './assets/css/app.css'
import './assets/css/index.css'
import { BrowserRouter as Router, Route, Switch, useLocation, withRouter} from 'react-router-dom'
import { BrowserRouter } from 'react-router-dom'
import {Provider} from 'react-redux';
import HomeSection from './pages/HomeSection';
import servicePageList from './pages/servicePageList'
import SingleServicePage from './pages/SingleServicePage';
import Login from './pages/Login';
import Register from './pages/Register';
import ForgotPassword from './pages/ForgotPassword';
import ServiceListDetails from './pages/ServiceListDetails';
import Careers from './pages/Careers';
import AboutUs from './pages/AboutUs';
import AboutsUsDetails from './pages/AboutsUsDetails';
import PricvacyPolicy from './pages/PricvacyPolicy';
import CommunityEnvironment from './pages/CommunityEnvironment';
import CommunityEnvironmentDetails from './pages/CommunityEnvironmentDetails'
import Faqs from './pages/Faqs';
import ContactUs from './pages/ContactUs'
import WatchList from './pages/Watchlist';
import Navbar from './pages/Navbar';
import Footer from './pages/Footer';
import Header from './pages/Header';
import WatchListAccountDetails from './pages/watchListAccountDetails';
import ChangeEmailAddress from './pages/changeEmailAddress'
import Changepassword from './pages/changepassword';
import Editdelieveryaddress from './pages/editdelieveryaddress'
import EditAddressForm from './pages/EditAddressForm';
import store from './store/store'



function User() {
    const [newPath, setNewPath] = useState('/')
    const [displayVisible, setDisplayVisible] = useState('d-block')

    useEffect(() => {
        newPath && (newPath ==='/Login' || newPath ==='/Register' || newPath ==='/ForgotPassword') ? setDisplayVisible('d-none') : setDisplayVisible('d-block');
    }, [newPath]);

    function _ScrollToTop(props) {
        const { pathname } = useLocation();
        useEffect(() => {
            window.scrollTo(0, 0);
            setNewPath(pathname)
        }, [pathname]);

        return props.children
    }
    const ScrollToTop = withRouter(_ScrollToTop)



    return (
        <Provider store = {store}>
            <BrowserRouter>
                <Router>
                    <div className={displayVisible}>
                        <Header/>
                        <Navbar />
                    </div>
                    <ScrollToTop>
                        <Switch>
                            <Route path="/" exact component={HomeSection} />
                            <Route path="/SingleServicePage" component={SingleServicePage} />
                            <Route path="/servicePageList" component={servicePageList} />
                            <Route path="/Login" component={Login} />
                            <Route path="/Register" component={Register} />
                            <Route path="/ForgotPassword" component={ForgotPassword} />
                            <Route path="/ServiceListDetails" component={ServiceListDetails} />
                            <Route path="/Careers" component={Careers} />
                            <Route path="/AboutUs" component={AboutUs} />
                            <Route path="/AboutsUsDetails" component={AboutsUsDetails} />
                            <Route path="/PricvacyPolicy" component={PricvacyPolicy} />
                            <Route path="/CommunityEnvironment" component={CommunityEnvironment} />
                            <Route path="/CommunityEnvironmentDetails" component={CommunityEnvironmentDetails} />
                            <Route path="/Faqs" component={Faqs} />
                            <Route path="/ContactUs" component={ContactUs} />
                            <Route path="/watchlist" component={WatchList} />
                            <Route path="/WatchListAccountDetails" component={WatchListAccountDetails} />
                            <Route path="/ChangeEmailAddress" component={ChangeEmailAddress} />
                            <Route path="/Changepassword" component={Changepassword} />
                            <Route path="/Editdelieveryaddress" component={Editdelieveryaddress} />
                            <Route path="/EditAddressForm" component={EditAddressForm} />
                        </Switch>
                    </ScrollToTop>

                    <div className={displayVisible}>
                        <Footer/>
                    </div>

                </Router>
            </BrowserRouter>
        </Provider>
    );
}



export default User;
// DOM element
if (document.getElementById('user')) {
    ReactDOM.render(<User />, document.getElementById('user'));
}
