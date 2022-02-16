import React from 'react';
import { Link } from 'react-router-dom';

export const CommunityEnvironmentCard = (props) => {
    return <React.Fragment>
        <div className="col-md-4">
            <Link to='CommunityEnvironmentDetails'>
                <div className="com-card border h-100 rounded py-4 px-3 px-lg-4 px-md-3">
                    <h3 className="c-card-heading">{props.title}</h3>
                    <div className="d-flex align-items-center pt-4">
                        <div>
                            <img
                                className=""
                                src={props.src}
                                alt=""
                            />
                        </div>
                        <div className="ps-3">
                            <p className="mb-0 ">
                                <span className=" clrP pfw5" >
                                    {props.name}
                                </span>
                            </p>
                            <p className="pt-1 m-0 ">
                                <span className="clrP f-smfw5" >
                                    {props.date}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </Link>
        </div>
    </React.Fragment>;
};
export default CommunityEnvironmentCard;