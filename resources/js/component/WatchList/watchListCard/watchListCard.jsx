import React from 'react';
import watchlist from "../../../assets/images/watchlist.jpg";
import mShape from '../../../assets/images/m.png'
import { Link } from 'react-router-dom';

export const WatchListCard = (props) => {
    return <React.Fragment>
        <div className={`card mb-3 my-4 shadow ${props.scrClassWatchListCard} `}>
            <div className="row g-0 border-bottom">
                <div className="col-md-4">
                    <img src={watchlist} className="w-100" alt="... " />
                    <input onChange={props.functionChecbox} type="checkbox" className={`checkBoxWatchList cardWatchListCard ${props.checboxBlock}`} name="check" value="check1" />
                </div>
                <div className="col-md-8">
                    <div className="px-3 py-2">
                        <p>
                            <small className="wf75">
                                Auckland City, Auckland | <span> Closes: 12:00am, Sun, 6 Feb </span>
                            </small>
                        </p>
                        <h6 className="fw-bold wf85">HP Workstation Z200 Quad Coree i7 870 (2.93GHz) 16G memory 1TB HDD win 10 PRO</h6>
                        <div className="pt-4">
                            <Link to="" className="d-block wf75 clr-light">
                                Reserve met
                            </Link>
                            <Link to="" className="d-block text-black fw-bold">
                                $71.00
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
            <div className="text-center py-3">
                <button type="button" className="btn text-primary bg-transparent wf-14" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                    <i className="fa fa-file-text-o" aria-hidden="true" />
                    <span className="ps-2"> Add note</span>
                </button>
            </div>
            <div className="cardTopImg">
                <img src={mShape} alt='' />
            </div>
        </div>
    </React.Fragment>;
};
export default WatchListCard;
