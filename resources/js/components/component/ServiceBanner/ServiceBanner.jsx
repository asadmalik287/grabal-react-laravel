import React from 'react';

export const ServiceBanner = (props) => {
    return <React.Fragment>
        <section className="main__padding py-5 text-white  bg-3171b9 ">
            <div className="row m-0">
                <div className="col-lg-8 p-0">
                    <h2 className="text__sm__center ttu font-weight-bolder">
                        {props.title}
                    </h2>
                </div>
            </div>
        </section>
    </React.Fragment>;
};
export default ServiceBanner