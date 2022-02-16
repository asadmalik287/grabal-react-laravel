import React from 'react';
import { Link } from 'react-router-dom';

export const Header = () => {
    return <React.Fragment>
        <header className="bg-f6f5f3 py-2 main__padding removeHeaderFooterClass">
            <div className="d-flex align-items-center justify-content-end">
                <Link to="Register" className="cl-707070 f-14">
                    Register
                </Link>
                <span className="mx-1">/</span>
                <Link to="Login" className="cl-707070 f-14">
                    Login
                </Link>
            </div>
        </header>
    </React.Fragment>;
};
export default Header