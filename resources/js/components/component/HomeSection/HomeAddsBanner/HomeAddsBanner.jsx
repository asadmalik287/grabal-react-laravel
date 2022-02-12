import React from 'react';
import { Link } from 'react-router-dom';

export const HomeAddsBanner = (props) => {
    return <React.Fragment>
        <section className="bg-f6f5f3 main__padding py-3 pt-5">
            <div>
                <Link to='/'>
                    <img src={props.imgsrc} className="w-100" alt='' />
                </Link>
            </div>
        </section>
    </React.Fragment>;
};
export default HomeAddsBanner