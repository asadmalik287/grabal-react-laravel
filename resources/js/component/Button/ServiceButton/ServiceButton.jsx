import React from 'react';

export const ServiceButton = ({ btnText, btnServicesClass, btnGroupClass }) => {
    return <React.Fragment>
        <button
            type="button"
            className={`btn btn-primary f-14 ${btnServicesClass} ${btnGroupClass} w-100  ps-4 rounded-0 text-center  py-2 text-white`}
        >
            {btnText}
        </button>
    </React.Fragment>;
};
export default ServiceButton