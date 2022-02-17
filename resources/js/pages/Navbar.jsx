import React from 'react';
import { Link } from 'react-router-dom';
import NavbarLogo from '../assets/images/logo.png'

export const Navbar = () => {
  return <React.Fragment>
    <nav className="mt-1  main__padding d-flex align-items-center justify-content-between removeHeaderFooterClass">
      <div>
        <Link to='/'>
          <img
            src={NavbarLogo}
            width={150}
            className="logoNav my-lg-1"
            alt=""
          />
        </Link>
      </div>
      <div className='d-flex'>
        <Link className='anchorNavHover' to="watchlist" style={{ color: '#65605d' }}>
          <svg fill="#65605d" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMinYMid meet" focusable="false" role="img" aria-labelledby="tg-c19215b7-7661-56af-6f74-0da8a6d2d9d7"><path d="M7 13.9a1 1 0 0 0-1-1H5a1 1 0 0 0 0 2h1a1 1 0 0 0 1-1zm4 1a1 1 0 0 0 0-2h-1a1 1 0 0 0 0 2h1zm-8.44-4.74A2.88 2.88 0 0 0 5.26 12h5.47a2.88 2.88 0 0 0 2.7-1.84l1.09-2.77A6.87 6.87 0 0 0 15 4.87V2.4A1.4 1.4 0 0 0 13.6 1h-3.2A1.4 1.4 0 0 0 9 2.4V5a1 1 0 0 1-1 1.21A1 1 0 0 1 7 5V2.4A1.4 1.4 0 0 0 5.6 1H2.4A1.4 1.4 0 0 0 1 2.4v2.47c0 .863.163 1.718.48 2.52l1.08 2.77zM13.2 2.8v1.4h-2.4V2.8h2.4zM8 8a2.75 2.75 0 0 0 2.66-2h2.41a5.05 5.05 0 0 1-.21.73l-1.1 2.77a1.11 1.11 0 0 1-1 .7H9a1 1 0 1 0-2 0H5.26a1.11 1.11 0 0 1-1-.7L3.15 6.73A5 5 0 0 1 2.94 6h2.41A2.73 2.73 0 0 0 8 8zM5.2 2.8v1.4H2.8V2.8h2.4z"></path></svg>
          <span className='me-2 anchorNavHover f-14'> Watchlist </span>
        </Link>
        <Link className='anchorNavHover fdreverse d-flex align-items-center' to="Login" style={{ color: '#65605d' }}>
          <span className='me-2  f-14'> My Grobal </span>
          <svg className="smallIcon" fill="#65605d" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMinYMid meet" focusable="false" role="img" aria-labelledby="tg-18990132-4a8b-a7dd-15cf-9db76a750971"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12C23.993 5.376 18.624.007 12 0zM5.236 19.344A16.273 16.273 0 0 1 12 18a16.28 16.28 0 0 1 6.764 1.344 9.94 9.94 0 0 1-13.528 0zm14.9-1.553A17.843 17.843 0 0 0 12 16a17.843 17.843 0 0 0-8.137 1.791A9.995 9.995 0 1 1 22 12a9.934 9.934 0 0 1-1.863 5.791h-.001zM12 4a5.5 5.5 0 1 0 5.5 5.5A5.507 5.507 0 0 0 12 4zm0 9a3.5 3.5 0 1 1 0-7 3.5 3.5 0 0 1 0 7z"></path></svg>
              <div className='profileName'>T</div>
        </Link>
      </div>
    </nav>
  </React.Fragment>;
};
export default Navbar;