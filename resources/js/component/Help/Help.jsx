import React from 'react';
import ServiceBanner from '../ServiceBanner/ServiceBanner';
import { HelpCard } from './HelpCard/HelpCard';
import HelpImageOne from '../../../images/812fcd50cf7d909541e8fc4e91b758f5c93c6d52.png'
import HelpImageTwo from '../../../images/3a5288d917415ba6bb9a92187de10ea917529d1f.png'
import HelpImageThree from '../../../images/660b50074c26149891933bfed1e84b43d7654774.png'
import HelpImageFour from '../../../images/46b0c7ce4701966f5de150faf50e85645dcb9d52.png'
import HelpImageFive from '../../../images/224a1f6b789f579d520aab0f2caf3a965134a839.png'
import HelpImageSix from '../../../images/c8d855eab29147c756dd5ee7886d4e8f60fb024f.png'
import './Help.css'
export const Help = () => {
    const HelpObj = [
        { image: HelpImageOne, title: "Account", desc: " The ins and outs of using your account." },
        { image: HelpImageTwo, title: "Buying", desc: " Having issues with buying, completing a trade, or bidding? We can help." },
        { image: HelpImageThree, title: "Selling & fees", desc: " The lowdown on fees, listing policies, managing a listing, and info for professional sellers." },
        { image: HelpImageFour, title: "Payments & money", desc: " Need a hand with payments, ways to pay, or your accounts and balances?" },
        { image: HelpImageFive, title: "Staying safe & site security", desc: "  From site security to scams and reporting inappropriate things – learn how to stay safe online." },
        { image: HelpImageSix, title: "Policies, terms & conditions", desc: "  You’ll find all our terms and conditions, policies, and code of conduct here." },
    ]
    return <React.Fragment>
        <ServiceBanner title="Help" />
        <section className='main__padding_COl bg-f6f5f3 pt-3'>
            <h2 className='py-3 ps-3'>We can help with everything </h2>
            <div className='row mx-0  '>
                {
                    HelpObj.map((e, index) => (
                        <HelpCard key={index + 1} title={e.title} desc={e.desc} imgSrc={e.image} />
                    ))
                }
            </div>
        </section>

    </React.Fragment>;
};
export default Help;
