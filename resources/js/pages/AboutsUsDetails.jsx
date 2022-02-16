import React from 'react';
import imageSrc from '../images/TRADEME001-Trade-Me-story.jpg'
import ServiceBanner from '../component/ServiceBanner/ServiceBanner';
const AboutsUsDetails = () => {
    return <React.Fragment>
        <ServiceBanner title="About Us Details" />
        <section className='main__padding'>
            <div className="col-12 col-lg-8 my-4">
                <div className='aboutUs_Details'>
                    <div> <img className='w-100' alt='' src={imageSrc} /> </div>
                    <h1 className="f1halfrem fw9 pt-4 pb-4">Working at Grobal</h1>
                    <p className="">Grobal is one of New Zealand’s most popular websites. We have over four million members and thousands of Kiwis visit Grobal every day to get things done. They use us for everything from searching for their next home, car, or career to running their own business or hunting for a bargain.</p>
                </div>
            </div>
        </section>
    </React.Fragment>
};
export default AboutsUsDetails
