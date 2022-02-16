import React from 'react';
import SearchServices from '../SearchServices/SearchServices';
import ServiceLinksSectionList from '../ServiceLinksSectionList/ServiceLinksSectionList'

export const ServiceLinksSearch = () => {
    return <React.Fragment>
        <section className="offers main__padding py-5">
            <div className="row">
                <div className="col-md-3 offers-services">
                    <SearchServices />
                </div>
                <div className="col-md-3 com-cleaning pt-5 pt-md-0">
                    <ServiceLinksSectionList heading="Residential" />
                </div>
                <div className="col-md-3 res-cleaning pt-5 pt-md-0">
                    <ServiceLinksSectionList heading="Commercial" />
                </div>
                <div className="col-md-3 res-cleaning pt-5 pt-md-0">
                    <ServiceLinksSectionList heading="Trade" />
                </div>
            </div>
        </section>

    </React.Fragment>;
};
export default ServiceLinksSearch