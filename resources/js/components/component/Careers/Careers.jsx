import React from 'react';
import Careers1 from '../../../images/TRADEME003-staff.jpg'
import Careers2 from '../../../images/TRADEME002-Trade-Me-values.jpg'
import Careers3 from '../../../images/TRADEME003-careers.jpg'
import Careers4 from '../../../images/TRADEME003-teams.jpg'
import ServiceBanner from '../ServiceBanner/ServiceBanner';
import { Link } from 'react-router-dom';

export const Careers = () => {
    return <React.Fragment>
        {/*=====CAREERS====*/}
        <ServiceBanner title="Career" />
        <section className="main__padding pt-3 pb-3">
            <div className="row mx-0">
                <div className="col-12 col-lg-8">
                    <div className="career">
                        <p className="pb-2">
                            We're always on the hunt for smart, adaptable and positive people to
                            join our team.
                        </p>
                        <img
                            className="w-100"
                            src={Careers1}
                            alt=""
                        />
                        <p className="pt-4">
                            Grobal is one of New Zealand’s most popular websites. We have over
                            four million members and thousands of Kiwis visit Grobal every day
                            to get things done. They use us for everything from searching for
                            their next home, car, or career to running their own business or
                            hunting for a bargain.
                        </p>
                        <p className="py-2 ">
                            We're always on the hunt for smart, adaptable and positive people
                            who’ll help us work towards our vision of making Grobal the place
                            ‘where Kiwis look first’.
                        </p>
                    </div>
                    <div className="working">
                        <h1 className="f1halfrem fw9">Working at Grobal</h1>
                        <p>
                            This is a unique, vibrant and fast-moving place to work. Our office
                            culture reflects our values, and encourages our informal but serious
                            work ethic.
                        </p>
                    </div>
                    <div className="values">
                        <h1 className="f1halfrem fw5">Our values</h1>
                        <p className="py-2">
                            We have four values that guide our behaviour and sum up what’s
                            important to us. Find out more about our values, and meet our Values
                            Squad here.
                        </p>
                        <img
                            className="w-100"
                            src={Careers2}
                            alt=""
                        />
                        <p className="p-small pt-2">
                            The Grobal values – what’s important to us.
                        </p>
                    </div>
                    <div className="people py-4">
                        <h1 className="f1halfrem fw9 py-3">Our people</h1>
                        <p>
                            Our people make Grobal a special place to work. We cherish
                            individuality, treat people with respect and focus on helping our
                            people grow. We’ve got offices in Wellington (Grobal HQ), Auckland
                            and Christchurch and we’re always looking for great people to join
                            our team.
                        </p>
                        <p className="py-2">
                            We work hard to hire the right people. We value energy, optimism,
                            flexibility and creativity. We’re much more interested in attitudes
                            and ideas than the clothes people wear.
                        </p>
                        <p className="pb-2">
                            Our talented people work as analysts, developers, database
                            engineers, and testers as well as account managers, accountants,
                            designers, HR experts, customer service people, lawyers, marketers
                            and salespeople.
                        </p>
                        <img
                            className="w-100"
                            src={Careers3}
                            alt=""
                        />
                        <p className="p-small pt-2">
                            We value different experiences and opinions and work together to
                            help solve problems for our members. Working for Kiwis
                        </p>
                    </div>
                    <div className="kiwis">
                        <h1 className="f1halfrem fw9 py-3">Working for Kiwis</h1>
                        <p>
                            Working at Grobal gives you the opportunity to impact Kiwis’
                            lives. We’re not afraid to take risks. We inspire and challenge each
                            other, and get excited about the interesting and hard problems we
                            get to solve risks and learn from failure.
                        </p>
                    </div>
                    <div className="inclusive py-3">
                        <h1 className="f1halfrem fw9 py-3">Inclusive work environment</h1>
                        <p>
                            Grobal is an equal opportunity employer. We truly value diversity
                            and embrace a flexible and inclusive workplace where people are
                            encouraged to achieve their potential.
                        </p>
                        <p>
                            We offer our staff an additional five days of Wellness Leave each
                            year to take time off work to contribute to activities that keep
                            them well. This might be to run a marathon, spend time at a
                            religious retreat, go on a kindy field trip, volunteer at a
                            favourite charity, or just time to decompress at home.
                        </p>
                        <p className="py-2">
                            We have been committed to paying all our employees the Living Wage
                            in 2018.
                        </p>
                        <img
                            className="w-100"
                            src={Careers4}
                            alt=""
                        />
                        <p className="p-small pt-2">Want to join the Grobal whanau?</p>
                    </div>
                    <div className="border-line" />
                    <div className="social pt-4 d-flex align-items-center">
                        <span>Share:</span>
                        <Link className="ps-4" to="/">
                            <i className="fa fa-facebook" aria-hidden="true" />
                        </Link>
                        <Link  className="ps-4" to="/">
                            <i className="fa fa-envelope-o" aria-hidden="true" />
                        </Link>
                        <Link className="ps-4" to="">
                            <i className="fa fa-twitter" aria-hidden="true" />
                        </Link>
                        <Link className="ps-4" to="/">
                            <i className="fa fa-linkedin-square" aria-hidden="true" />
                        </Link>
                    </div>
                </div>
            </div>
        </section>

    </React.Fragment>;
};
export default Careers;
