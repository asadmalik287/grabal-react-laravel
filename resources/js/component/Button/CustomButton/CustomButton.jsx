import React from 'react';

export const CustomButton = (props) => {
    return <React.Fragment>
        <button type="button" className="cch-btn text-white mob-center">{props.text}</button>
    </React.Fragment>
};
export default CustomButton