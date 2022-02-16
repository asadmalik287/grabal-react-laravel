import React, { useEffect } from 'react';
import NavbarLogo from '../images/Logo.png'
import { useForm } from "react-hook-form";

export const ForgotPassword = () => {

    const { register, setValue, handleSubmit, formState: { errors } } = useForm();
    const forgtoPasswordSubmit = handleSubmit(data => console.log(data));
    return <React.Fragment>
        <div className="row mx-0 pt-3 h-100" style={{ background: '#f6f5f4' }}>
            <div className="col-sm-7 px-0  col-md-6 col-lg-4 m-auto">
                <div className="logo text-center mb-2">
                    <img className="w-50 " src={NavbarLogo} alt="" />
                </div>
                <div className='shadow bg-white login-form '>
                    <h1 className='ttu  pt-3 px-3 text-center titleBlue'>Forgot your password?</h1>
                    <p className='px-3 mb-0 py-3 text-center'>Enter your email address and we'll send you password reset instructions.</p>
                    <form action="" className='p-3' onSubmit={handleSubmit(forgtoPasswordSubmit)}>
                        <div className="position-relative">
                            <label htmlFor="">Email</label>
                            <input
                                type="email"
                                id="email"
                                placeholder="Enter email"
                                className={`my-2 px-2 h__46 form-control ${errors.email ? 'is-invalid' : ''}`} {...register("email", { required: true })}
                            />
                            <p className='text-danger mb-0'>  {errors.email && "Email is required"}</p>
                            <span className="position-absolute icon">
                                <i className="fa fa-envelope-o" aria-hidden="true" />
                            </span>
                        </div>
                        <button type="submit" id="nextBtn" className="w-100 my-4 ttu">
                            Send instructions
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </React.Fragment>;
};
export default ForgotPassword;
