import React from 'react';
import { Link } from 'react-router-dom';

export const Footer = () => {
    return <React.Fragment>
        <footer className="bg-white main__padding shadow  pb-3 removeHeaderFooterClass">
            <div className="content  ">
                <div className="link-boxes">
                    <ul className="box footerChild__1 padding__left__1rem">
                        <li className="link_name">Customer Services</li>
                        <li>
                            <Link to="Faqs">
                                Faq's
                            </Link>
                        </li>
                        <li>
                            <Link to="ContactUs">
                                Contact us
                            </Link>
                        </li>
                        <li>
                            <Link to="AboutUs">
                                About us
                            </Link>
                        </li>
                    </ul>
                    <ul className="box">
                        <li className="link_name">About Grobal</li>
                        <li>
                            <Link to="CommunityEnvironment">
                                Community &amp; environment
                            </Link>
                        </li>
                        <li>
                            <Link to="Careers">
                                Careers
                            </Link>
                        </li>
                        <li>
                            <Link to="PricvacyPolicy">
                                Privacy policy
                            </Link>
                        </li>
                    </ul>
                    <ul className="box padding__left__1rem">
                        <li className="link_name">Featured</li>
                        <li>
                            <Link to="/">
                                Covid19 info
                            </Link>
                        </li>
                        <li>
                            <Link to="/">
                                Facebook
                            </Link>
                        </li>
                    </ul>
                 
                </div>
            </div>
        </footer>

    </React.Fragment>;
};
export default Footer;
