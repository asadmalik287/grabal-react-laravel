import React from 'react';
import featureCate from '../../../assets/images/featureCate.png'
import './TrendingCategories.css'
import { Link } from 'react-router-dom';
export const TrendingCategories = () => {
    return <React.Fragment>
        <div className="row py-4 ">
            <Link to='SingleServicePage' className="col-12 col-md-10 tc-img  d-flex flex-wrap flex-md-nowrap">
                <div className="col-md-4 col-12">
                    <img
                        className="w-100 h-100"
                        src={featureCate}
                        alt=""
                    />
                </div>
                <div className="tc-text ps-md-4 pt-4 pt-md-0">
                    <h2 className="cl-4CAF50">Trending Categories</h2>
                    <p className="m-0 py-3" style={{ color: '#444444' }}>
                        Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry. <br /> Lorem Ipsum has been the industry's standard dummy text
                        ever since the 1500s,
                    </p>
                    <Link to='watchlist' type="button" className="tc-btn text-white">
                        Watchlist
                    </Link>
                </div>
            </Link>
            <div className="col-12 col-md-2 align-self-end">
                <div className="tc-icon align-self-end pt-4">
                    <i className="fa fa-thumbs-up fs20" aria-hidden="true" />
                    <span className="fw-bold ps-2">100%</span>
                    <p className="m-0">1214 reviews</p>
                </div>
            </div>
        </div>
    </React.Fragment>
};
export default TrendingCategories;
