import React from 'react';
import ServiceBanner from '../component/ServiceBanner/ServiceBanner';
import ServiceLinksSearch from '../component/servicePageList/ServiceLinksSearch/ServiceLinksSearch'
import TrendingCategories from '../component/servicePageList/TrendingCategories/TrendingCategories';

export const servicePageList = () => {
    return <React.Fragment>
        <ServiceBanner title="Service List" />
        <ServiceLinksSearch />
        <section className='t-categories main__padding'>
            <TrendingCategories />
            <TrendingCategories />
        </section>
    </React.Fragment>
};
export default servicePageList;