import React from 'react';
import './css/CommunityEnvironment.css'
import ServiceBanner from '../component/ServiceBanner/ServiceBanner';
import CommunityEnvironmentImage from '../images/profile_image_362725142811_2129876.jpg'
import CommunityEnvironmentCard from '../component/CommunityEnvironment/CommunityEnvironmentCard/CommunityEnvironmentCard';

export const CommunityEnvironment = () => {
    return <React.Fragment>
        {/*=====COMMUNITY DETAILS====*/}
        <ServiceBanner title="COMMUNITY AND ENVIRONMENT" />
        {/*=====COMMUNITY====*/}
        <section className="main__padding pt-3 pb-3 community ">
            <div className="row">
                <h1 className="py-4">Featured Posts</h1>
                <CommunityEnvironmentCard src={CommunityEnvironmentImage} title='New Shipping Templates' name="Yvonne" date="January 11, 2022" />
                <CommunityEnvironmentCard src={CommunityEnvironmentImage} title=' Community Tip – checking for existing posts that could answer your query' name="Yvonne" date="January 11, 2022" />
                <CommunityEnvironmentCard src={CommunityEnvironmentImage} title='Finding a Grobal member ' name="Yvonne" date="January 11, 2022" />
            </div>
        </section>
    </React.Fragment>;
};
export default CommunityEnvironment;
