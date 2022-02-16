import React from 'react';
import { Link } from 'react-router-dom';

export const ServiceLinksSectionList = ({heading}) => {
    return <React.Fragment>
        <h2 className="titleBlue">{heading}</h2>
        <Link to="/ServiceListDetails">Building Wash (13)</Link>
        <Link to="/ServiceListDetails">Commercial Cleaning (4)</Link>
        <Link to="/ServiceListDetails">Carpet Cleaning (56)</Link>
        <Link to="/ServiceListDetails">Commercial Cleaning - One-off (34)</Link>
        <Link to="/ServiceListDetails">Commercial Cleaning - Regular</Link>
        <Link to="/ServiceListDetails">Commercial Cleaning - Periodic</Link>
        <Link to="/ServiceListDetails">Building Wash</Link>
        <Link to="/ServiceListDetails">Commercial Cleaning</Link>
        <Link to="/ServiceListDetails">Carpet Cleaning</Link>
        <Link to="/ServiceListDetails">Commercial Cleaning - One-off</Link>
        <Link to="/ServiceListDetails">Commercial Cleaning - Regular</Link>
        <Link to="/ServiceListDetails">Commercial Cleaning - Periodic</Link>
        <Link to="/ServiceListDetails">Tile Cleaning</Link>
        <Link to="/ServiceListDetails">Exterior Cleaning</Link>
    </React.Fragment>
};
export default ServiceLinksSectionList;