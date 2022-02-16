import React, { useEffect } from 'react';
import { Link } from 'react-router-dom';
import NavbarLogo from '../assets/images/Logo.png'
import './css/login.css'
import { useForm } from "react-hook-form";
export const Login = () => {
    const { register, handleSubmit, formState: { errors } } = useForm();
    const loginSubmit = handleSubmit(data => console.log(data));
    return <React.Fragment>
        <section className="login h-100" style={{ background: '#f6f5f4' }}>
            <div className="row mx-0 pt-5 h-100 justify-content-center align-items-center">
                <div className="col-12 col-sm-7 col-lg-4 col-md-5  m-auto ">
                    <div>
                        <div className="logo text-center mb-2">
                            <img className="w-50 " src={NavbarLogo} alt="" />
                        </div>
                        <div className="login-form shadow bg-white px-4 pt-3 pt-4 pb-5">
                            <h1 className='ttu text-center titleBlue'>Login</h1>
                            <p className="login-text py-2 text-center">
                                New to Grobal? <Link to="Register"> Register now</Link>
                            </p>
                            <form action="" onSubmit={handleSubmit(loginSubmit)}>
                                <label htmlFor="">Email</label>
                                <input className={`my-2 h__46 form-control ${errors.email ? 'is-invalid' : ''}`}  {...register("email", { required: true })} type="email" />
                                <p className='text-danger mb-0'>  {errors.email && "Email is required"}</p>
                                <label className="pt-3" htmlFor="">
                                    Password
                                </label>
                                <input className={`my-2  h__46 form-control ${errors.password ? 'is-invalid' : ''}`} {...register("password", { required: true })} type="password" />
                                <p className='text-danger mb-0'>  {errors.password && "Password  required"}</p>
                                <p className="pt-3 ">
                                    <Link to="ForgotPassword">Forgotten password?</Link>
                                </p>
                                <input type="checkbox" id='rememberMe' className="box" />
                                <label className="mb-0 d-inline-block ps-2" htmlFor="rememberMe">
                                    Remember me
                                </label>
                                <div className="buttons pt-4">
                                    <Link to='/'>

                                        <button type="submit" className="btn w-100 ttu" id="btn-1">
                                            Log in
                                        </button>
                                    </Link>
                                </div>
                            </form>
                        </div>
                        <p className=" ftr-text px-4 py-3">
                            This site is protected by reCAPTCHA and the Google
                            <Link to="#">Privacy Policy</Link> and <Link to="#"> Terms of Service</Link> apply
                        </p>
                    </div>
                </div>
            </div>
        </section>

    </React.Fragment>;
};
export default Login
