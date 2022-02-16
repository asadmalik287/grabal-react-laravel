import React from 'react';
import Header from '../../Header/Header';
import Navbar from '../../Navbar/Navbar';
import HelpDetailsBanner from './HelpDetailsBanner/HelpDetailsBanner';
import './HelpDetails.css'

export const HelpDetails = () => {
    return <React.Fragment>
        <HelpDetailsBanner title="Help Centre" />
    </React.Fragment>
};
export default HelpDetails;