import React from 'react';

export const ServiceListReviews = () => {
    return <React.Fragment>
        <div className="row m-0 reviews-card rc-2 my-3 ">
            <div className="rc-header d-flex justify-content-between pt-3">
                <div>
                    <h6 className="m-0">Alexandar.i</h6>
                    <p className>Sat 05 Jun</p>
                </div>
                <div className="align-self-center">
                    <i className="fa fa-star star-1" aria-hidden="true" />
                    <i className="fa fa-star star-2" aria-hidden="true" />
                    <i className="fa fa-star star-3" aria-hidden="true" />
                    <i className="fa fa-star star-4" aria-hidden="true" />
                    <i className="fa fa-star star-5" aria-hidden="true" />
                </div>
            </div>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the
                1500s, Lorem Ipsm is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has bee n the industry's standard dummy text ever
                since the 1500s,
            </p>
        </div>

    </React.Fragment>
};
export default ServiceListReviews