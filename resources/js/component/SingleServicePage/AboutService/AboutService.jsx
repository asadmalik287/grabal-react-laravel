import React from 'react';


export const AboutService = (props) => {
    return <React.Fragment>
        <div className="ccs-text d-flex align-items-center pb-3">
            <div className="cct-img">
                <img src={props.imageSrc} alt='' />
            </div>
            <div className="cct-para ps-4">
                <p className="m-0 text-justify">
                    <strong>About The Services:</strong> Lorem Ipsm is simply dummy text of
                    the printing and typesetting industry. Lorem Ipsum has been the industry's
                    standard dummy text ever since the 1500s,
                </p>
            </div>
        </div>
    </React.Fragment>;
};
export default AboutService