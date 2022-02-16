import React from 'react';
import './css/PricvacyPolicy.css'
import ServiceBanner from '../component/ServiceBanner/ServiceBanner';
import { Link } from 'react-router-dom';

export const PricvacyPolicy = () => {
    return <React.Fragment>
        <ServiceBanner title="Privacy Policy" />
        <section className="main__padding pt-3 pb-3 privacy-policy ">
            <div className="row">
                <div className="col-md-10 col-12">
                    <p className="py-3">
                        We want Grobal to be a safe and trusted place. We do this via the
                        products and services we build, and our commitment to your privacy. It’s
                        important to us that you trust Grobal and the things we do with your
                        personal information.
                    </p>
                    <p>
                        This policy is straight up about how we collect, use, disclose and
                        protect your personal information. We bring diverse people together in
                        our Grobal community, and we take our responsibility to protect your
                        personal information very seriously. We collect and use your personal
                        information to deliver our vision of making life better for Kiwis
                        through online experiences you’ll love. We’re committed to following
                        four principles in relation to your information:
                    </p>
                    <ul className="py-3 ps-3">
                        <li>
                            <p>
                                We will respect your privacy—our brand is built on trust and
                                integrity.
                            </p>
                        </li>
                        <li>
                            <p>
                                We’re committed to being transparent and honest, so you know what we
                                do with your personal information (including if something goes
                                wrong).
                            </p>
                        </li>
                        <li>
                            <p>We use personal information to add value to your life.</p>
                        </li>
                        <li>
                            <p>
                                We avoid getting involved in anything creepy that could breach your
                                trust.
                            </p>
                        </li>
                    </ul>
                    <p>
                        If you have any questions about your privacy or this policy,
                        <Link to="/"> please contact us.</Link>
                        You can also learn more about your privacy rights by talking to the
                        Office of the Privacy Commissioner.
                    </p>
                    <Link to="/">Read our full privacy policy.</Link>
                    <div className="border-line pt-5" />
                    <div>
                        <label className="pp-label d-block pt-4 pb-3 f1halfrem fw9">
                            Was this article helpful?
                        </label>
                        <button className="pp-btn w-100 w-md-px" type="button">
                            <i className="fa fa-thumbs-o-up pe-2" /> Yes, thanks!
                        </button>
                        <button className="pp-btn w-100 w-md-px mt-3 mt-md-0" type="button">
                            <i className="fa fa-thumbs-o-down pe-2" />
                            Not really
                        </button>
                    </div>
                    <div className="py-3 " >
                        <label className="d-block pb-3">
                            How can we make this article better?
                        </label>
                        <textarea name="" id="tArea" cols="" rows="" />
                    </div>
                    <p>
                        This form is for anonymous article feedback and we aren't able to reply.
                        If you need help, please
                        <Link to="/"> contact us. </Link>
                    </p>
                    <button type="button" id="subBtn">
                        Submit feedback
                    </button>
                </div>
            </div>
        </section>
    </React.Fragment>;
};
export default PricvacyPolicy;