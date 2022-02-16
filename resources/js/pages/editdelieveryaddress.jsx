import React from 'react';
import { Link } from 'react-router-dom';
import './css/editdelieveryaddress.css'

export const Editdelieveryaddress = () => {
    return <React.Fragment>
        <section className='main__padding'>

            <div className="col-md-7 py-5 mb-5">
                <div className="pt-5 pt-md-0">
                    <h2 className="fs16 fw6">My delivery addresses</h2>
                    <p className="fs14 py-2">
                        You can choose one of these delivery addresses to send to the seller
                        whenever you purchase an item. We will never give a seller your address
                        without your permission.
                    </p>
                </div>
                <div className="row">
                    <div className="col-md-6 pt-4 py-md-0">
                        <h3 className="fs16 fw6">Murtaza Tashrifwala</h3>
                        <p className="m-0 fs14">285 Great North Road</p>
                        <p className="m-0 fs14">Henderson, Auckland</p>
                        <p className="m-0 fs14">Auckland 0612</p>
                        <p className="m-0 fs14">New Zealand</p>
                        <div>
                            <Link className="fs14" to="EditAddressForm">
                                Edit
                            </Link>{" "}
                            <span>|</span>{" "}
                            <Link className="fs14" to="">
                                Delete
                            </Link>
                        </div>
                    </div>
                </div>
                <div className="col-md-2" />
            </div>

        </section>
    </React.Fragment>;
};
export default Editdelieveryaddress;