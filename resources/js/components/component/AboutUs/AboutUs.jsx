import React from 'react';
import Header from '../Header/Header';
import Navbar from '../Navbar/Navbar';
import ServiceBanner from '../ServiceBanner/ServiceBanner';
import AboutsUSCard from './AboutsUSCard/AboutsUSCard';
import imageSrc from '../../assets/images/TRADEME001-Trade-Me-story.jpg'
import Footer from '../Footer/Footer';
const AboutUs = () => {
    return <React.Fragment>
        <ServiceBanner title="About Us" />
        <div className='row mx-0 main__padding bg-f6f5f3 pt-5'>
            <AboutsUSCard title="Our Story" time="10 min read" desc=" Find out about Grobal’s history and the most popular listings of all time." imageSrc={imageSrc} />
            <AboutsUSCard title=" Vision & values " time="10 min read" desc=" Thousands of Kiwis visit Grobal every day. These are our vision and values we use to guide the work we do." imageSrc={imageSrc} />
            <AboutsUSCard title=" Careers " time="10 min read" desc=" We're always on the hunt for smart, adaptable and positive people to join our team." imageSrc={imageSrc} />
            <AboutsUSCard title=" Community partnerships " time="10 min read" desc="We’re proud to be a Kiwi business, and love to find ways our people, and our platform, can help." imageSrc={imageSrc} />
            <AboutsUSCard title=" Sustainability " time="10 min read" desc=" At Grobal, we’re committed to business sustainability and helping our members make a difference." imageSrc={imageSrc} />
            <AboutsUSCard title=" Our apps " time="10 min read" desc=" No matter what you use Grobal for and what device you have, we’ll have the app for you." imageSrc={imageSrc} />
        </div>
    </React.Fragment>;
};
export default AboutUs;