import React from 'react';
import { Link } from 'react-router-dom';
import { NavLink } from 'react-router-dom'

export const WatchlistSidebar = () => {
    const activeStyle = { borderLeft: '3px solid rgb(249, 175, 44)', fontWeight: 700, paddingLeft: '1rem' }
    return <React.Fragment>
        <h2 className="f-smfw5 fw9">My Grobal</h2>
        <NavLink to='WatchListAccountDetails' activeStyle={activeStyle} className="my-2 py-2">Account details</NavLink>
        <Link to='#' className='d-none'>Notifications</Link>
        <hr />
        <NavLink to='Watchlist' activeStyle={activeStyle} className="py-2 my-2">Watchlist ( 1 )</NavLink>
    </React.Fragment>;
};
export default WatchlistSidebar;