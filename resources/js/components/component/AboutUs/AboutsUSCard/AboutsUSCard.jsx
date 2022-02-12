import React from 'react';
import '../AboutUs.css';
import { Link } from 'react-router-dom';


export const AboutsUSCard = (props) => {
    return <React.Fragment>
        <div className="col-12 col-md-4 mb-4">
            <div className="about-card border-0  bg-white">
                <Link to='AboutsUsDetails'>
                    <img
                        className="w-100"
                        src={props.imageSrc}
                        alt="TRADEME001" />
                    <div className='card-body py-4'>
                        <Link to="/">About us</Link>
                        <span className="span-border px-1">|</span>
                        <span className="span-border">{props.time}</span>
                        <h3 className="pt-2" style={{ color: '#44413d' }}>{props.title}</h3>
                        <p style={{ color: '#65605D', height: '50px' }}>
                            {props.desc}
                        </p>
                    </div>
                </Link>
            </div>
        </div>
    </React.Fragment>;
};
export default AboutsUSCard;