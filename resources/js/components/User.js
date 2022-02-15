import React, {useEffect} from 'react';
import ReactDOM from 'react-dom';
import '../app.css'
import '../index.css'
import { BrowserRouter as Router, Route, Switch, useLocation, withRouter} from 'react-router-dom'
import { BrowserRouter } from 'react-router-dom'

import HomeSection from './component/HomeSection/HomeSection';
import servicePageList from './component/servicePageList/servicePageList'
import SingleServicePage from './component/SingleServicePage/SingleServicePage';
import Login from './component/Login/Login';
import Register from './component/Register/Register';
import ForgotPassword from './component/ForgotPassword/ForgotPassword';
import ServiceListDetails from './component/servicePageList/ServiceListDetails/ServiceListDetails';
import Careers from './component/Careers/Careers';
import AboutUs from './component/AboutUs/AboutUs';
import AboutsUsDetails from './component/AboutUs/AboutsUsDetails/AboutsUsDetails';
import PricvacyPolicy from './component/PricvacyPolicy/PricvacyPolicy';
import Help from './component/Help/Help';
import HelpDetails from './component/Help/HelpDetails/HelpDetails'
import CommunityEnvironment from './component/CommunityEnvironment/CommunityEnvironment';
import CommunityEnvironmentDetails from './component/CommunityEnvironment/CommunityEnvironmentDetails/CommunityEnvironmentDetails'
import Faqs from './component/Faqs/Faqs';
import ContactUs from './component/ContactUs/ContactUs'
import WatchList from './component/WatchList/Watchlist';
import Navbar from './component/Navbar/Navbar';
import Footer from './component/Footer/Footer';
import Header from './component/Header/Header';
import WatchListAccountDetails from './component/WatchList/watchListAccountDetails/watchListAccountDetails';
import ChangeEmailAddress from './component/WatchList/changeEmailAddress/changeEmailAddress'
import Changepassword from './component/WatchList/changepassword/changepassword';
import Editdelieveryaddress from './component/WatchList/editdelieveryaddress/editdelieveryaddress'
import EditAddressForm from './component/WatchList/editAddressForm/EditAddressForm';



function User() {

    function _ScrollToTop(props) {
        const { pathname } = useLocation();
        useEffect(() => {
          window.scrollTo(0, 0);
        }, [pathname]);
        return props.children
      }
      const ScrollToTop = withRouter(_ScrollToTop)



    return (
        <BrowserRouter>
        <Router>
            <Header />
            <Navbar />
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
                    <Route path="/Help" component={Help} />
                    <Route path="/HelpDetails" component={HelpDetails} />
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
            <Footer/>
        </Router>
        </BrowserRouter>
    );
}
export default User;
// DOM element
if (document.getElementById('user')) {
    ReactDOM.render(<User />, document.getElementById('user'));
}
