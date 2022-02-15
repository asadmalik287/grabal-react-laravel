import React from "react";
const StepOne = () => {
    return (
        <React.Fragment>
            <h1 className="ttu text-center titleBlue pt-3">Create a personal account</h1>
            <div className="p-3">
                <div className="position-relative">
                    <label>Email</label>
                    <input type="email" ref={email}  name="email" placeholder="Enter email" className="inp my-2 px-2  h__46 form-control" />
                    <span className="position-absolute icon">
                        <i className="fa fa-envelope-o" aria-hidden="true" />
                    </span>
                </div>
                <div>
                    <label className="pt-3">Password</label>
                    <input placeholder="Enter password" name="password" type="password" ref={password} className="my-2 h__46 form-control" />
                </div>
                <div>
                    <label className="pt-3">Confirm password</label>
                    <input placeholder="Enter confirm password" name="confirm_password" type="password" ref={confirmPassword} className="inp my-2 h__46 form-control" />
                </div>
                <div>
                    <label className="pt-3">Username</label>
                    <input placeholder="Enter username" name="username" type="text" ref={userName} className="my-2 h__46 form-control" />
                </div>
                <p className="p-small pt-4"> Have a think about this one - it's how you'll be known to other members and can't be changed </p>
                <div className="">
                    <label className="d-block py-2">Country</label>
                    <div className="ps-2 py-3">
                        <input type="radio" ref={country} defaultChecked="" name="country" value=" New Zealand " />
                        <label className="ps-2" htmlFor="newZealand">
                            New Zealand
                        </label>
                        <br />
                    </div>
                    <div className="ps-2">
                        <input type="radio" ref={country1} name="country" value=" AUSTRALIA " />
                        <label className="ps-2" htmlFor="aus">
                            AUSTRALIA
                        </label>
                        <br />
                    </div>
                </div>
                <button type="button" id="nextBtn" className="w-100 my-4">
                    REGISTER
                </button>
            </div>
        </React.Fragment>
    );
};

export default StepOne;
