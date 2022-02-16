import React from 'react';
import { Link } from 'react-router-dom';
import './HelpDetailsTabContent.css'
export const HelpDetailsTabContent = (props) => {
    return <React.Fragment>
        {/* ======HELP========= */}
        <section className='py-2 row mx-0 px-0'>
            <div className="col-12 col-md-4   py-md-4 py-2">
                <Link to="/">{props.title}</Link>
                <p>{props.desc}</p>
            </div>
            <div className="col-12 col-md-4 px-0  py-md-4 py-2">
                <Link to="/">{props.title2}</Link>
                <p>{props.desc2}</p>
            </div>
            <div className="col-12 col-md-4 px-0  py-md-4 py-2">
                <Link to="/">{props.title3}</Link>
                <p>{props.desc3}</p>
            </div>
            <div className="col-12 col-md-4 px-0  py-md-4 py-2">
                <Link to="/">{props.title4}</Link>
                <p>{props.desc4}</p>
            </div>
            <div className="col-12 col-md-4 px-0  py-md-4 py-2">
                <Link to="/">{props.title5}</Link>
                <p>{props.desc5}</p>
            </div>
        </section>
    </React.Fragment>
};
export default HelpDetailsTabContent;