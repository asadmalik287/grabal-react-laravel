import React from 'react';
import { Link } from 'react-router-dom';

export const ServiceProvider = (props) => {
    return <React.Fragment>
        <Link to='ServiceListDetails' className='text-white '>
            <div className='px-3 py-5 h-100' style={{ padding: '24px', backgroundColor: " #d93a3f", borderRadius: '8px' }}>
             {props.desc}
            </div>
        </Link>
    </React.Fragment>
};
export default ServiceProvider;