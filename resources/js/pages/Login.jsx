import React, { useEffect } from "react";
import { Link, useHistory } from "react-router-dom";
import NavbarLogo from '../assets/images/Logo.png'
import './css/login.css'
import { useForm } from "react-hook-form";
import axios from "axios";
import Swal from "sweetalert2";
import store from '../store/store';
import {connect} from 'react-redux';

export const Login = () => {
    const { register, handleSubmit, formState: { errors }, } = useForm();
    // const loginSubmit = handleSubmit((data) => console.log(data));
    let history = useHistory();

    useEffect(() => {
        if(localStorage.getItem('user')){
            history.push('/')
        }
    }, [])



    const loginSubmit = async (formData) => {
        let resp = await axios.post('/api/login', formData);

        try {
          if (resp.data.status === 1) {

            // Sending Data to store
               store.dispatch({
                type: "USER_LOGIN",
                payload: resp.data.result
              })


            // Alert Message code Start
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
              })

              Toast.fire({
                icon: 'success',
                title: 'Login Successfully'
            })
            // Alert Message code

            localStorage.setItem('user', JSON.stringify(resp.data.result))
            history.push('/');

          } else {
            Swal.fire({
                icon: 'error',
                title: 'Failed to login',
                text: resp.data.message
              })


          }

        } catch (error) {

          console.log(error.message);
        }

    }


    return (
        <React.Fragment>
            <section className="login h-100" style={{ background: "#f6f5f4" }}>
                <div className="row mx-0 pt-5 h-100 justify-content-center align-items-center">
                    <div className="col-12 col-sm-7 col-lg-4 col-md-5  m-auto ">
                        <div>
                            <div className="logo text-center mb-2">
                                <img className="w-50 " src={NavbarLogo} alt="" />
                            </div>
                            <div className="login-form shadow bg-white px-4 pt-3 pt-4 pb-5">
                                <h1 className="ttu text-center titleBlue">Login</h1>
                                <p className="login-text py-2 text-center">
                                    New to Grobal? <Link to="Register"> Register now</Link>
                                </p>
                                <form action="" onSubmit={handleSubmit(loginSubmit)}>
                                    <label htmlFor="">Email</label>
                                    <input className={`my-2 h__46 form-control ${errors.email ? "is-invalid" : ""}`} {...register("name", { required: true })} type="email" />
                                    <p className="text-danger mb-0"> {errors.email && "Email is required"}</p>
                                    <label className="pt-3" htmlFor="">
                                        Password
                                    </label>
                                    <input className={`my-2  h__46 form-control ${errors.password ? "is-invalid" : ""}`} {...register("password", { required: true })} type="password" />
                                    <p className="text-danger mb-0"> {errors.password && "Password  required"}</p>
                                    <p className="pt-3 ">
                                        <Link to="ForgotPassword">Forgotten password?</Link>
                                    </p>
                                    <input type="checkbox" id="rememberMe" className="box" />
                                    <label className="mb-0 d-inline-block ps-2" htmlFor="rememberMe">
                                        Remember me
                                    </label>
                                    <div className="buttons pt-4">
                                        <button type="submit" className="btn w-100 ttu" id="btn-1">
                                            Log in
                                        </button>
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
        </React.Fragment>
    );
};


export default connect((store)=>{ return store; })(Login);
