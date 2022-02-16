import React from 'react';
import ServicesCardsMain from '../ServicesCardsMain/ServicesCardsMain';
import serviceImageOne from '../../assets/images/3.png'
import serviceImageTwo from '../../assets/images/4.png'
import serviceImageThree from '../../assets/images/5.png'
import serviceImageFour from '../../assets/images/6.png'
import Carousel from 'react-multi-carousel';
import 'react-multi-carousel/lib/styles.css';
export const ServicesCards = ({ heading }) => {
    const responsive = {
        superLargeDesktop: {
            // the naming can be any, depends on you.
            breakpoint: { max: 4000, min: 3000 },
            items: 4,
        },
        desktop: {
            breakpoint: { max: 3000, min: 1024 },
            items: 4,
        },
        tablet: {
            breakpoint: { max: 1024, min: 464 },
            items: 2
        },
        mobile: {
            breakpoint: { max: 464, min: 0 },
            items: 1
        }
    };
    return <React.Fragment>
        <div className="row main__padding g-4 mx-0 pt-3">
            <div className="col-12 ps-0">
                <h2 className="fw-bolder mb-0">{heading}</h2>
            </div>
            <Carousel responsive={responsive} className='px-0'>
                <div className="padding__Zero">
                    <ServicesCardsMain imageSrc={serviceImageOne} date='Thu, 9 Dec' title="Clean Rite Cleaning Service's" desc="Description of the services" />
                </div>
                <div className="padding__Zero">
                    <ServicesCardsMain imageSrc={serviceImageTwo} date='Thu, 9 Dec' title="Clean Rite Cleaning Service's" desc="Description of the services" />
                </div>
                <div className="padding__Zero">
                    <ServicesCardsMain imageSrc={serviceImageThree} date='Thu, 9 Dec' title="Clean Rite Cleaning Service's" desc="Description of the services" />
                </div>
                <div className="padding__Zero">
                    <ServicesCardsMain imageSrc={serviceImageFour} date='Thu, 9 Dec' title="Clean Rite Cleaning Service's" desc="Description of the services" />
                </div>
                <div className="padding__Zero">
                    <ServicesCardsMain imageSrc={serviceImageOne} date='Thu, 9 Dec' title="Clean Rite Cleaning Service's" desc="Description of the services" />
                </div>
            </Carousel>
        </div>
    </React.Fragment>;
};
export default ServicesCards;
