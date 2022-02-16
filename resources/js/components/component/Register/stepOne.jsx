// import React, { useEffect, useRef, useState } from "react";
// import "./Register.css";
// import NavbarLogo from "../../../images/Logo.png";
// import StepOne from "./stepOne";
// import StepTwo from "./stepTwo";
// import { Link } from "react-router-dom";
// import axios from "axios";
// import { useForm } from "react-hook-form";

// export const Register = () => {

//     const {  register, handleSubmit, formState: { errors },} = useForm();
//     const signUpForm = handleSubmit((data) => console.log(data));

//     const [step1, setstep1] = useState('d-block')
//     const [step2, setstep2] = useState('d-none')

//     let emailRef = useRef();
//     let password = useRef();
//     let confirmPassword = useRef();
//     let userName = useRef();
//     let country = useRef();
//     let country1 = useRef();
//     let fname = useRef();
//     let lname = useRef();
//     let day = useRef();
//     let month = useRef();
//     let year = useRef();
//     let countryCode = useRef();
//     let phoneNumber = useRef();
//     let gerderMan = useRef();
//     let gerderWoman = useRef();
//     let gerderDiverse = useRef();
//     let address = useRef();
//     let town = useRef();
//     let cbox = useRef();

//     const addMorephoneNumberId = useRef();
//     const addNumberRemoveNumText = useRef();
//     const plusCloseIcon = useRef();
//     const addMorePhoneNumber = () => {
//         if (addMorephoneNumberId.current.style.display === "none") {
//             addMorephoneNumberId.current.style.display = "block";
//             plusCloseIcon.current.classList.remove("fa-plus");
//             plusCloseIcon.current.classList.add("fa-close");
//             addNumberRemoveNumText.current.innerText = "Remove phone number";
//         } else {
//             addMorephoneNumberId.current.style.display = "none";
//             plusCloseIcon.current.classList.remove("fa-close");
//             plusCloseIcon.current.classList.add("fa-plus");
//             addNumberRemoveNumText.current.innerText = "Add another phone number";
//         }
//     };

//     const nextStep = () =>{
//         setstep1('d-none')
//         setstep2('d-block')
//         // if(email.current.value != '' && password.current.value != '' && confirmPassword.current.value !='' && userName.current.value !='' && (country.current.checked != false || country1.current.checked != false)){
//         // }

//     }

//     const previousStep = () =>{
//         setstep1('d-block')
//         setstep2('d-none')
//     }


//     return (
//         <React.Fragment>
//             <section style={{ background: "#f6f5f4" }}>
//                 <section className="register-1">
//                     <div className="row mx-0 py-3">
//                         <div className="col-sm-7 px-0  col-md-6 col-lg-4 m-auto">
//                             <div className="logo text-center mb-2">
//                                 <img className="w-50 " src={NavbarLogo} alt="" />
//                             </div>
//                             <div className="shadoow login-form bg-white px-4">
//                                 <form onSubmit={handleSubmit(signUpForm)}>

//                                     {/* Step 1 start*/}
//                                     <div className={step1}>
//                                         <div className="d-flex py-3 align-items-center">
//                                                 <div className="w-25"></div>
//                                                 <h1 className="ttu text-center titleBlue">Create a personal account</h1>
//                                                 <div className="w-25 text-end text-dark-50">1/2</div>
//                                             </div>
//                                         <div>
//                                             <div className="position-relative">
//                                                 <label>Email</label>
//                                                 <input type="email" ref={emailRef} name="email" placeholder="Enter email" {...register("email", { required: true })} className='inp my-2 px-2  h__46 form-control' />
//                                                 <span className="position-absolute icon">
//                                                     <i className="fa fa-envelope-o" aria-hidden="true" />
//                                                 </span>
//                                                 {/* <p className='text-danger mb-0'>Email is required</p> */}
//                                             </div>
//                                             <div>
//                                                 <label className="pt-3">Password</label>
//                                                 <input placeholder="Enter password" name="password" type="password" ref={password} {...register("password", { required: true })} className="my-2 h__46 form-control" />
//                                             </div>
//                                             <div>
//                                                 <label className="pt-3">Confirm password</label>
//                                                 <input placeholder="Enter confirm password" name="confirm_password" type="password" ref={confirmPassword} {...register("confirm_password", { required: true })} className="inp my-2 h__46 form-control" />
//                                             </div>
//                                             <div>
//                                                 <label className="pt-3">Username</label>
//                                                 <input placeholder="Enter username" name="username" type="text" ref={userName} {...register("username", { required: true })} className="my-2 h__46 form-control" />
//                                             </div>
//                                             <p className="p-small pt-4"> Have a think about this one - it's how you'll be known to other members and can't be changed </p>
//                                             <div className="">
//                                                 <label className="d-block py-2">Country</label>
//                                                 <div className="ps-2 py-3">
//                                                     <input type="radio" ref={country} id="country" {...register("country")} defaultChecked="" name="country" value=" New Zealand " />
//                                                     <label className="ps-2" htmlFor="country">
//                                                         New Zealand
//                                                     </label>
//                                                     <br />
//                                                 </div>
//                                                 <div className="ps-2">
//                                                     <input type="radio" ref={country1} id="country1" {...register("country")} name="country" value=" AUSTRALIA " />
//                                                     <label className="ps-2" htmlFor="country1">
//                                                         AUSTRALIA
//                                                     </label>
//                                                     <br />
//                                                 </div>
//                                             </div>
//                                             <button type="button" id="nextBtn" onClick={nextStep} className="w-100 my-4">
//                                                 Next
//                                             </button>
//                                         </div>
//                                     </div>
//                                     {/* Step 1 end*/}

//                                     {/* Step 2 start*/}
//                                     <div className={step2}>
//                                         <div className="register-1">
//                                             <div className="d-flex py-3 align-items-center">
//                                                 <div onClick={previousStep} className="cp w-25"><i className="fa fa-chevron-left"></i> Back</div>
//                                                 <h1 className="ttu text-center titleBlue w-50">Tell us about yourself</h1>
//                                                 <div className="w-25 text-end text-dark-50">2/2</div>
//                                             </div>
//                                         </div>
//                                         <div className="">
//                                             <div className="">
//                                                 <label>First Name</label>
//                                                 <input type="text" ref={fname} {...register("f_name", { required: true })} name="f_name" placeholder="" className="inp my-2 px-2" />
//                                                 <p className="after-inp">50 characters remaining</p>
//                                             </div>
//                                             <div className="">
//                                                 <label>Last Name</label>
//                                                 <input type="text" ref={lname} {...register("l_name", { required: true })} name="l_name" placeholder="" className="inp my-2 px-2" />
//                                                 <p className="after-inp">50 characters remaining</p>
//                                             </div>
//                                             <div className="d-flex flex-wrap mx-0 align-items-end justify-content-between">
//                                                 <div className="gridCol3">
//                                                     <label className="d-block">Date of Birth</label>
//                                                     <input type="text" ref={day} {...register("day", { required: true })} placeholder="Day" name="date" maxLength={2} max={31} className="r2-inp w-100  ps-2 my-3 my-sm-0" />
//                                                 </div>
//                                                 <div className="gridCol3">
//                                                     <select name="month" ref={month} {...register("month", { required: true })} className="r2-inp w-100  my-3 my-sm-0">
//                                                         <option value="" selected>
//                                                             Select month
//                                                         </option>
//                                                         <option value="">January</option>
//                                                         <option value="">Febraury</option>
//                                                         <option value="">March</option>
//                                                         <option value="">April</option>
//                                                         <option value="">May</option>
//                                                         <option value="">Jne</option>
//                                                         <option value="">July</option>
//                                                         <option value="">August</option>
//                                                         <option value="">September</option>
//                                                         <option value="">October</option>
//                                                         <option value="">November</option>
//                                                         <option value="">December</option>
//                                                     </select>
//                                                 </div>
//                                                 <div className="gridCol3">
//                                                     <input type="text" ref={year} {...register("year", { required: true })} maxLength={4} name="year" placeholder="Year(YYYY)" className="r2-inp w-100 ps-2 my-3 my-sm-0" />
//                                                 </div>
//                                             </div>
//                                             <div className="py-4">
//                                                 <label className="d-block">Phone number</label>
//                                                 <div className="row justify-content-between">
//                                                     <div className="col-4">
//                                                         <select name="countryCode" ref={countryCode} {...register("countryCode", { required: true })} className="r2-inp w-100 my-3 my-sm-0 ps-2">
//                                                             <option value="" selected>
//                                                                 Country code
//                                                             </option>
//                                                             <option value="">03</option>
//                                                             <option value="">04</option>
//                                                             <option value="">05</option>
//                                                             <option value="">06</option>
//                                                             <option value="">07</option>
//                                                             <option value="">08</option>
//                                                             <option value="">20</option>
//                                                             <option value="">21</option>
//                                                             <option value="">22</option>
//                                                             <option value="">27</option>
//                                                             <option value="">28</option>
//                                                             <option value="">29</option>
//                                                         </select>
//                                                     </div>
//                                                     <div className="col-8">
//                                                         <input type="text" ref={phoneNumber} {...register("number", { required: true })} name="number" placeholder="1234567" className="r2-inp w-100 ps-2 h-100" />
//                                                     </div>
//                                                 </div>
//                                             </div>
//                                             <div className="py-1" style={{ display: "none" }} ref={addMorephoneNumberId}>
//                                                 <label className="d-block">Phone number</label>
//                                                 <div className="row justify-content-between">
//                                                     <div className="col-4">
//                                                         <select name="number" id="num" className="w-100  my-3 my-sm-0 ps-2">
//                                                             <option value="" selected>
//                                                                 Country code
//                                                             </option>
//                                                             <option value="">03</option>
//                                                             <option value="">04</option>
//                                                             <option value="">05</option>
//                                                             <option value="">06</option>
//                                                             <option value="">07</option>
//                                                             <option value="">08</option>
//                                                             <option value="">20</option>
//                                                             <option value="">21</option>
//                                                             <option value="">22</option>
//                                                             <option value="">27</option>
//                                                             <option value="">28</option>
//                                                             <option value="">29</option>
//                                                         </select>
//                                                     </div>
//                                                     <div className="col-8">
//                                                         <input type="text" placeholder="1234567" className="r2-inp w-100 ps-2 h-100" />
//                                                     </div>
//                                                 </div>
//                                             </div>
//                                             <div className="py-3 cp wfc" onClick={addMorePhoneNumber}>
//                                                 <span>
//                                                     <i className="fa fa-plus titleBlue" ref={plusCloseIcon} aria-hidden="true" />
//                                                 </span>
//                                                 <span className="ps-2 titleBlue" ref={addNumberRemoveNumText}>
//                                                     Add another phone number
//                                                 </span>
//                                             </div>
//                                             <div className="">
//                                                 <label className="d-block py-2">Gender</label>
//                                                 <div className="ps-2 py-2">
//                                                     <input id="gerderman" ref={gerderMan} {...register("gender", { required: true })} type="radio" name="gender" value="man" />
//                                                     <label htmlFor="gerderman" className=" ps-2">
//                                                         Man
//                                                     </label>
//                                                     <br />
//                                                 </div>
//                                                 <div className="ps-2 py-2">
//                                                     <input id="gerderWoman" ref={gerderWoman} {...register("gender", { required: true })} type="radio" name="gender" value="woman" />
//                                                     <label htmlFor="gerderWoman" className=" ps-2" id="aus">
//                                                         Woman
//                                                     </label>
//                                                     <br />
//                                                 </div>
//                                                 <div className="ps-2 py-2">
//                                                     <input type="radio" id="genderDiverse" ref={gerderDiverse} {...register("gender", { required: true })} name="gender" value="gender diverse" />
//                                                     <label htmlFor="genderDiverse" className=" ps-2">
//                                                         Gender Diverse
//                                                     </label>
//                                                     <br />
//                                                 </div>
//                                             </div>
//                                             <h4 className="pt-3">New Zealand</h4>
//                                             <div className="position-relative">
//                                                 <label>Address</label>
//                                                 <input type="text" ref={address} {...register("address", { required: true })} name="address" placeholder="Start typing your address" className="inp my-2 ps-5" />
//                                                 <span className="position-absolute s-icon">
//                                                     <i className="fa fa-search" />
//                                                 </span>
//                                             </div>
//                                             <div className="py-4">
//                                                 <label>Closest Town</label>
//                                                 <select name="town" ref={town} {...register("town", { required: true })} className="d-block r2-inp w-100  my-3 my-sm-0 ps-2">
//                                                     <option value="" hidden="" />
//                                                     <option value=""> Northland - Dargaville </option>
//                                                     <option value=""> Northland - Kaikohe </option>
//                                                     <option value=""> Northland - Kaikohe </option>
//                                                     <option value=""> Northland - Kawakawa </option>
//                                                     <option value=""> Northland - Kerikeri </option>
//                                                     <option value=""> Northland - Mangawhai </option>
//                                                     <option value=""> Northland - Maungaturoto </option>
//                                                     <option value=""> Northland - Paihia </option>
//                                                     <option value=""> Northland - Whangarei </option>
//                                                     <option value=""> Auckland - Albany </option>
//                                                     <option value=""> Auckland - Auckland City </option>
//                                                     <option value=""> Auckland - Botany Downs </option>
//                                                 </select>
//                                             </div>
//                                             <p className="p-small2">This is the location we'll display to other Grobal members </p>
//                                             <div>
//                                                 <input type="checkbox" ref={cbox} className="box" />
//                                                 <span>
//                                                     I am over 18 and have read and accepted Grobal's <Link to="/"> terms &amp; conditions</Link> and
//                                                     <Link to="/">privacy policy</Link>
//                                                 </span>
//                                             </div>
//                                             <button type="submit" id="nextBtn" className="w-100 my-4">
//                                                 Register
//                                             </button>
//                                         </div>
//                                     </div>
//                                     {/* Step 2 start*/}
//                                 </form>

//                                 <div className="border-line" />
//                                 <p className="pt-2">
//                                     Already have an account? <Link to="Login">Log in</Link>
//                                 </p>
//                             </div>
//                         </div>
//                     </div>
//                 </section>
//             </section>
//         </React.Fragment>
//     );
// };
// export default Register;
