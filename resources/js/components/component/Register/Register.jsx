import React, { useEffect } from 'react';
import './Register.css'
import NavbarLogo from '../../../images/Logo.png'
import StepOne from './stepOne';
import StepTwo from './stepTwo';
import { Link } from 'react-router-dom';

export const Register = () => {
    // useEffect(() => {
    //     console.log('ahsad');
    //     let linkCode = window.location.href.split('/');
    //    let removedHeaderFooter = document.querySelectorAll('.removeHeaderFooterClass');
    //    if(linkCode[linkCode.length - 1] === "Login" || linkCode[linkCode.length - 1] === "Register" || linkCode[linkCode.length - 1] === "ForgotPassword"){
    //      for(let i of removedHeaderFooter){
    //        i.classList.add('d-none')
    //      }
    //    }else{
    //       for(let i of removedHeaderFooter){
    //         i.classList.remove('d-none')
    //       }
    //    }
    //   }, []);


    return <React.Fragment>
        <section style={{ background: '#f6f5f4' }}>
            <section className="register-1" >
                <div className="row mx-0 py-3">
                    <div className="col-sm-7 px-0  col-md-6 col-lg-4 m-auto">
                        <div className="logo text-center mb-2">
                            <img className="w-50 " src={NavbarLogo} alt="" />
                        </div>
                        <div className='shadoow login-form bg-white px-4'>
                <StepOne/>
                <StepTwo/>
                            <div className="border-line" />
                            <p className="pt-2">
                                Already have an account? <Link to='Login'>Log in</Link>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </section>

    </React.Fragment>;
};
export default Register;
