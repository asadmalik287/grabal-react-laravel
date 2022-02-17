import React from 'react';
import { Link } from 'react-router-dom';
import { useHistory } from 'react-router-dom';
import Swal from 'sweetalert2';

export const Header = () => {
    let history = useHistory();

    // Logout Function
    const logoutUser = () => {
        localStorage.clear()
        Swal.fire({
            icon: 'success',
            title: 'Your are logout'
        }).then(function() {
            history.push('/Login');
        });
    }


    return <React.Fragment>
        <header className="bg-f6f5f3 py-2 main__padding removeHeaderFooterClass">
            <div className="d-flex align-items-center justify-content-end">
                {
                    localStorage.getItem('user')
                    ?
                    <>
                    {/* Code when user log in */}
                        <div onClick={logoutUser} className="cl-707070 f-14 cp">
                            Logout
                        </div>

                    </>
                    :
                    <>
                    {/* Code when user is not logged in */}
                        <Link to="Register" className="cl-707070 f-14">
                            Register
                        </Link>
                        <span className="mx-1">/</span>
                        <Link to="Login" className="cl-707070 f-14">
                            Login
                        </Link>
                    </>
                }
            </div>
        </header>
    </React.Fragment>;
};
export default Header
