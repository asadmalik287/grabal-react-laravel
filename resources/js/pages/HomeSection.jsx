import React from 'react';
import HomeTop from '../component/HomeSection/HomeTop/HomeTop';
import HomeAddsBanner from '../component/HomeSection/HomeAddsBanner/HomeAddsBanner';
import ServicesCards from '../component/ServicesCards/ServicesCards';
import ServiceProvider from '../component/HomeSection/ServiceProvider/ServiceProvider';
import adds from '../assets/images/adds.png'
import adds2 from '../assets/images/globalbanner.png'

export const HomeSection = () => {
    return <React.Fragment>
        <HomeTop />
        <HomeAddsBanner imgsrc={adds} />
        <section className="bg-f6f5f3">
            <ServicesCards heading="Most Popular Services" />
            <div className='row justify-content-between mx-0 main__padding mt-5'>
                <div className='serviceProviderCol  mb-lg-0 mb-md-0 mb-3 mb-sm-3 px-0 '>
                    <ServiceProvider desc="Carpet  Cleaning (33 Service Providers)" />
                </div>
                <div className='serviceProviderCol mb-lg-0 mb-md-0 mb-3 mb-sm-3 px-0'>
                    <ServiceProvider desc="Office  Cleaning (21 Service Providers)" />
                </div>
                <div className='serviceProviderCol mb-lg-0 mb-md-0 mb-3 mb-sm-3 px-0' >
                    <ServiceProvider desc="Mattress  Cleaning (11 Service Providers)" />
                </div>
            </div>
            <HomeAddsBanner imgsrc={adds2} />
            <ServicesCards heading="Top Services Providers" />
        </section>
    </React.Fragment>;
};
export default HomeSection;
