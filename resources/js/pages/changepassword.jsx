import React from 'react';
import { Link } from 'react-router-dom';


export const Changepassword = () => {
    return <React.Fragment>
        <section className='main__padding mt-5'>
            <div className="col-md-7 p-0">
                <div>
                    <h3 className="fw-bold fs-5">Change your password</h3>
                    <div className="mt-3 ">
                        Required fields are shown with a star{" "}
                        <span className="text-danger">*</span>
                    </div>
                </div>
                <div className="row my-3 bg-f6f5f3  p-4">
                <div className="col-md-12  d-flex flex-wrap">
                  <p className="pt-1 col-md-5 col-12">
                    Old password <span className="text-danger"> * </span>
                  </p>
                  <div className="col-12 col-md-7">
                    <input type="password" name="email" className="input1 form-control w-100" />
                  </div>
                  <p className="pt-1 col-12 col-md-5">
                    New password <span className="text-danger"> * </span>
                  </p>
                  <div className=" col-12 col-md-7">
                    <input type="password" name="email" className="input1 form-control w-100" />
                  </div>
                  <p className="pt-1 col-12 col-md-5">
                    Confirm New password <span className="text-danger"> * </span>
                  </p>
                  <div className=" col-12 col-md-7">
                    <input type="password" name="email" className="input1 form-control w-100" />
                  </div>
                  <div className="col-12 col-md-5">
                    <p className="para">
                      Password strength We recommend you use a strong, unique password.
                      <Link  to="">Find out more</Link>
                    </p>
                  </div>
                </div>
                <div className="text-center py-4 btn-size">
                  <button className="px-2  search-btn text-white">Change Password</button>
                </div>
              </div>
              
            </div>
        </section>
    </React.Fragment>;
};
export default Changepassword;