import React from 'react';
import { Link } from 'react-router-dom';

export const HelpCard = (props) => {
    return <React.Fragment>
        {/* ======HELPMain========= */}
        <div className="col-12 col-md-4 mb-3  ">
            <Link to='HelpDetails'>
                <div className="help-card shadow bg-white d-flex  align-items-start py-3  px-3">
                    <div className="w-img">
                        <img className="w-100" src={props.imgSrc} alt={11} />{" "}
                    </div>
                    <div className="ps-3">
                   {props.title}
                        <p className="help-p f-14"> {props.desc}</p>
                    </div>
                </div>
            </Link>
        </div>

    </React.Fragment>;
};
