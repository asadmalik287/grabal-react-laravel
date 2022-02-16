import React from 'react';
import { Link } from 'react-router-dom';
import mShape from '../../images/m.png'
import logo from '../../images/Logo.png'
import icon1 from '../../images/iconCard2.png'
import icon2 from '../../images/iconCard1.png'

export const ServicesCardsMain = ({ imageSrc, date, title, desc, updateClass }) => {
    return <React.Fragment>
        <Link to="/SingleServicePage" className={` cardMainAnchor ${updateClass}`}>
            <div className={`card border-0  `} >
                <img
                    src={imageSrc}
                    className="card-img-top mainImageCard radiusTopRight"
                    alt=""
                />
                <div className="card-body">
                    <div className='d-flex justify-content-between pb-3'>
                    <div>
                    <img src={icon1} width='26' />
                    <img className='ms-2' width='26' src={icon2} />
                        </div>
                        <p className="card-text text-end mb-2">
                            <small className="text-muted">Listed: {date}</small>
                        </p>
                    </div>
                    <div className={updateClass === 'listCard' ? 'd-flex justify-content-between align-items-center':''}>
                        <div>
                            <h5 className="f-14 color__000">{title}</h5>
                            <p className="card-text f-14 color__000">
                                {desc}
                            </p>
                            <div className={updateClass === 'col-lg-3' ? 'd-flex justify-content-between align-items-center':''}>
                                <div className="align-self-center"><i className="fa fa-star star-1" aria-hidden="true"></i><i className="fa fa-star star-2" aria-hidden="true"></i><i className="fa fa-star star-3" aria-hidden="true"></i><i className="fa fa-star star-4" aria-hidden="true"></i><i className="fa fa-star star-5" aria-hidden="true"></i></div>
                                {
                                    updateClass === 'col-lg-3' &&
                                    <Link to='Login' className='fa fa-heart-o'></Link>
                                }
                                {
                                    updateClass === 'listCard' &&
                                    <svg fill="#65605d" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMinYMid meet" focusable="false" role="img" aria-labelledby="tg-c19215b7-7661-56af-6f74-0da8a6d2d9d7"><path d="M7 13.9a1 1 0 0 0-1-1H5a1 1 0 0 0 0 2h1a1 1 0 0 0 1-1zm4 1a1 1 0 0 0 0-2h-1a1 1 0 0 0 0 2h1zm-8.44-4.74A2.88 2.88 0 0 0 5.26 12h5.47a2.88 2.88 0 0 0 2.7-1.84l1.09-2.77A6.87 6.87 0 0 0 15 4.87V2.4A1.4 1.4 0 0 0 13.6 1h-3.2A1.4 1.4 0 0 0 9 2.4V5a1 1 0 0 1-1 1.21A1 1 0 0 1 7 5V2.4A1.4 1.4 0 0 0 5.6 1H2.4A1.4 1.4 0 0 0 1 2.4v2.47c0 .863.163 1.718.48 2.52l1.08 2.77zM13.2 2.8v1.4h-2.4V2.8h2.4zM8 8a2.75 2.75 0 0 0 2.66-2h2.41a5.05 5.05 0 0 1-.21.73l-1.1 2.77a1.11 1.11 0 0 1-1 .7H9a1 1 0 1 0-2 0H5.26a1.11 1.11 0 0 1-1-.7L3.15 6.73A5 5 0 0 1 2.94 6h2.41A2.73 2.73 0 0 0 8 8zM5.2 2.8v1.4H2.8V2.8h2.4z"></path></svg>
                                }

                            </div>
                        </div>

                        <div className={updateClass === 'col-lg-3' ? 'd-none':''}>
                            <img src={logo} alt='' width={170} />
                        </div>

                    </div>

                </div>
                <div className="cardTopImg">
                    <img src={mShape} alt='' />
                </div>
            </div>
        </Link>
    </React.Fragment>;
};
export default ServicesCardsMain
