import React, { useEffect, useRef, useState } from "react";
import "./Register.css";
import NavbarLogo from "../../../images/Logo.png";
import StepOne from "./stepOne";
import StepTwo from "./stepTwo";
import { Link } from "react-router-dom";
import axios from "axios";
import { useForm } from "react-hook-form";

export const Register = () => {
    const [newData, setNewData] = useState('')
    const {  register, handleSubmit, formState: { errors },} = useForm();
    const signUpForm = handleSubmit(data => setNewData(data));

    let {date,month,year,countryCode,number} = newData;
    let dob = `${date}-${month}-${year}`;

    let phone_number = `${countryCode} ${number} `;
    let changeData = newData;
    changeData = {...changeData,'dob':dob ,'phone_number':phone_number};

    useEffect(() => {
        sendingData()
    }, [changeData]);


    const sendingData = async () => {
        try {
            await axios.post('/api/signup', changeData)
        } catch (error) {
            console.log(error.message);
        }
    }


    const [step1, setstep1] = useState('d-block')
    const [step2, setstep2] = useState('d-none')

    let emailRef = useRef();
    let password = useRef();
    let confirmPassword = useRef();
    let userName = useRef();
    let country = useRef();
    let country1 = useRef();
    let fname = useRef();
    let lname = useRef();
    let day = useRef();
    let monthRef = useRef();
    let yearRef = useRef();
    let countryCodeRef = useRef();
    let phoneNumber = useRef();
    let gerderMan = useRef();
    let gerderWoman = useRef();
    let gerderDiverse = useRef();
    let address = useRef();
    let town = useRef();
    let cbox = useRef();

    const addMorephoneNumberId = useRef();
    const addNumberRemoveNumText = useRef();
    const plusCloseIcon = useRef();
    const addMorePhoneNumber = () => {
        if (addMorephoneNumberId.current.style.display === "none") {
            addMorephoneNumberId.current.style.display = "block";
            plusCloseIcon.current.classList.remove("fa-plus");
            plusCloseIcon.current.classList.add("fa-close");
            addNumberRemoveNumText.current.innerText = "Remove phone number";
        } else {
            addMorephoneNumberId.current.style.display = "none";
            plusCloseIcon.current.classList.remove("fa-close");
            plusCloseIcon.current.classList.add("fa-plus");
            addNumberRemoveNumText.current.innerText = "Add another phone number";
        }
    };

    const nextStep = () =>{
        setstep1('d-none')
        setstep2('d-block')
        // if(email.current.value != '' && password.current.value != '' && confirmPassword.current.value !='' && userName.current.value !='' && (country.current.checked != false || country1.current.checked != false)){
        // }

    }

    const previousStep = () =>{
        setstep1('d-block')
        setstep2('d-none')
    }

    // Days Array
    const days = []
    for (let i = 1; i <= 31; i++) {
        days.push(i)
    }
    // Days Array

    // Years Array
    const years = [];
    let currentYear = new Date().getFullYear();
    for (let i = 1985; i <= currentYear; i++) {
        years.push(i)
    }
    // Years Array

    return (
        <React.Fragment>
            <section style={{ background: "#f6f5f4" }}>
                <section className="register-1">
                    <div className="row mx-0 py-3">
                        <div className="col-sm-7 px-0  col-md-6 col-lg-4 m-auto">
                            <div className="logo text-center mb-2">
                                <img className="w-50 " src={NavbarLogo} alt="" />
                            </div>
                            <div className="shadoow login-form bg-white px-4 pb-2">
                                <form onSubmit={handleSubmit(signUpForm)}>

                                    {/* Step 1 start*/}
                                    <div className={step1}>
                                        <div className="d-flex py-3 align-items-center">
                                                <div className="w-25"></div>
                                                <h1 className="ttu text-center titleBlue">Create a personal account</h1>
                                                <div className="w-25 text-end text-dark-50">1/2</div>
                                            </div>
                                        <div>
                                            <div className="position-relative">
                                                <label>Email</label>
                                                <input type="email" ref={emailRef} name="email" placeholder="Enter email" {...register("email", { required: true })} className='inp my-2 px-2  h__46 form-control' />
                                                <span className="position-absolute icon">
                                                    <i className="fa fa-envelope-o" aria-hidden="true" />
                                                </span>
                                                {/* <p className='text-danger mb-0'>Email is required</p> */}
                                            </div>
                                            <div>
                                                <label className="pt-3">Password</label>
                                                <input placeholder="Enter password" name="password" type="password" ref={password} {...register("password", { required: true })} className="my-2 h__46 form-control" />
                                            </div>
                                            <div>
                                                <label className="pt-3">Confirm password</label>
                                                <input placeholder="Enter confirm password" name="confirm_password" type="password" ref={confirmPassword} {...register("confirm_password", { required: true })} className="inp my-2 h__46 form-control" />
                                            </div>
                                            <div>
                                                <label className="pt-3">Username</label>
                                                <input placeholder="Enter username" name="name" type="text" ref={userName} {...register("name", { required: true })} className="my-2 h__46 form-control" />
                                            </div>
                                            <p className="p-small pt-4"> Have a think about this one - it's how you'll be known to other members and can't be changed </p>
                                            <div className="">
                                                <label className="d-block py-2">Country</label>
                                                <div className="ps-2 py-3">
                                                    <input type="radio" ref={country} id="country" {...register("country")} defaultChecked="" name="country" value=" New Zealand " />
                                                    <label className="ps-2" htmlFor="country">
                                                        New Zealand
                                                    </label>
                                                    <br />
                                                </div>
                                                <div className="ps-2">
                                                    <input type="radio" ref={country1} id="country1" {...register("country")} name="country" value=" AUSTRALIA " />
                                                    <label className="ps-2" htmlFor="country1">
                                                        AUSTRALIA
                                                    </label>
                                                    <br />
                                                </div>
                                            </div>
                                            <button type="button" id="nextBtn" onClick={nextStep} className="w-100 my-4">
                                                Next
                                            </button>
                                        </div>
                                    </div>
                                    {/* Step 1 end*/}

                                    {/* Step 2 start*/}
                                    <div className={step2}>
                                        <div className="register-1">
                                            <div className="d-flex py-3 align-items-center">
                                                <div onClick={previousStep} className="cp w-25"><i className="fa fa-chevron-left"></i> Back</div>
                                                <h1 className="ttu text-center titleBlue w-50">Tell us about yourself</h1>
                                                <div className="w-25 text-end text-dark-50">2/2</div>
                                            </div>
                                        </div>
                                        <div className="">
                                            <div className="">
                                                <label>First Name</label>
                                                <input type="text" ref={fname} {...register("f_name", { required: true })} name="f_name" placeholder="" className="inp my-2 px-2" />
                                                <p className="after-inp">50 characters remaining</p>
                                            </div>
                                            <div className="">
                                                <label>Last Name</label>
                                                <input type="text" ref={lname} {...register("l_name", { required: true })} name="l_name" placeholder="" className="inp my-2 px-2" />
                                                <p className="after-inp">50 characters remaining</p>
                                            </div>
                                            <div className="d-flex flex-wrap mx-0 align-items-end justify-content-between">
                                                <div className="gridCol3">
                                                    <label className="d-block">Date of Birth</label>
                                                    <select name="date" ref={day} {...register("date")} className="r2-inp w-100  my-3 my-sm-0">
                                                        <option value="" disabled>
                                                            Select date
                                                        </option>
                                                        {
                                                            days.map((singleCount)=>(<option key={singleCount} value={singleCount}>{singleCount}</option>))
                                                        }
                                                    </select>
                                                </div>
                                                <div className="gridCol3">
                                                    <select name="month" ref={monthRef} {...register("month")} className="r2-inp w-100  my-3 my-sm-0">
                                                        <option value="" disabled>
                                                            Select month
                                                        </option>
                                                        <option value="01">January</option>
                                                        <option value="02">Febraury</option>
                                                        <option value="03">March</option>
                                                        <option value="04">April</option>
                                                        <option value="05">May</option>
                                                        <option value="06">June</option>
                                                        <option value="07">July</option>
                                                        <option value="08">August</option>
                                                        <option value="09">September</option>
                                                        <option value="10">October</option>
                                                        <option value="11">November</option>
                                                        <option value="12">December</option>
                                                    </select>
                                                </div>
                                                <div className="gridCol3">
                                                    <select name="year" ref={yearRef} {...register("year")} className="r2-inp w-100  my-3 my-sm-0">
                                                        <option value="" disabled>
                                                            Select year
                                                        </option>
                                                        {
                                                            years.map((singleCount)=>(<option key={singleCount} value={singleCount}>{singleCount}</option>))
                                                        }
                                                    </select>
                                                </div>
                                            </div>
                                            <div className="py-4">
                                                <label className="d-block">Phone number</label>
                                                <div className="row justify-content-between">
                                                    <div className="col-4">
                                                        <select name="countryCode" ref={countryCodeRef} {...register("countryCode")} className="r2-inp w-100 my-3 my-sm-0 ps-2">
                                                            <option value="" selected>
                                                                Country code
                                                            </option>
                                                            <option value="">03</option>
                                                            <option value="">04</option>
                                                            <option value="">05</option>
                                                            <option value="">06</option>
                                                            <option value="">07</option>
                                                            <option value="">08</option>
                                                            <option value="">20</option>
                                                            <option value="">21</option>
                                                            <option value="">22</option>
                                                            <option value="">27</option>
                                                            <option value="">28</option>
                                                            <option value="">29</option>
                                                        </select>
                                                    </div>
                                                    <div className="col-8">
                                                        <input type="number" ref={phoneNumber} {...register("number")} name="number" placeholder="1234567" className="r2-inp w-100 ps-2 h-100" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="py-1" style={{ display: "none" }} ref={addMorephoneNumberId}>
                                                <label className="d-block">Phone number</label>
                                                <div className="row justify-content-between">
                                                    <div className="col-4">
                                                        <select name="number" id="num" className="w-100  my-3 my-sm-0 ps-2">
                                                            <option value="" selected>
                                                                Country code
                                                            </option>
                                                            <option value="">03</option>
                                                            <option value="">04</option>
                                                            <option value="">05</option>
                                                            <option value="">06</option>
                                                            <option value="">07</option>
                                                            <option value="">08</option>
                                                            <option value="">20</option>
                                                            <option value="">21</option>
                                                            <option value="">22</option>
                                                            <option value="">27</option>
                                                            <option value="">28</option>
                                                            <option value="">29</option>
                                                        </select>
                                                    </div>
                                                    <div className="col-8">
                                                        <input type="text" placeholder="1234567" className="r2-inp w-100 ps-2 h-100" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="py-3 cp wfc" onClick={addMorePhoneNumber}>
                                                <span>
                                                    <i className="fa fa-plus titleBlue" ref={plusCloseIcon} aria-hidden="true" />
                                                </span>
                                                <span className="ps-2 titleBlue" ref={addNumberRemoveNumText}>
                                                    Add another phone number
                                                </span>
                                            </div>
                                            <div className="">
                                                <label className="d-block py-2">Gender</label>
                                                <div className="ps-2 py-2">
                                                    <input ref={gerderMan} id="gerderman" {...register("gender")}  type="radio" name="gender" value="man" />
                                                    <label htmlFor="gerderman" className=" ps-2">
                                                        Man
                                                    </label>
                                                    <br />
                                                </div>
                                                <div className="ps-2 py-2">
                                                    <input ref={gerderWoman} id="gerderWoman" {...register("gender")} type="radio" name="gender" value="woman" />
                                                    <label htmlFor="gerderWoman" className=" ps-2" id="aus">
                                                        Woman
                                                    </label>
                                                    <br />
                                                </div>
                                                <div className="ps-2 py-2">
                                                    <input type="radio" ref={gerderDiverse} id="genderDiverse" {...register("gender")} name="gender" value="gender diverse" />
                                                    <label htmlFor="genderDiverse" className=" ps-2">
                                                        Gender Diverse
                                                    </label>
                                                    <br />
                                                </div>
                                            </div>
                                            <h4 className="pt-3">New Zealand</h4>
                                            <div className="position-relative">
                                                <label>Address</label>
                                                <input type="text" ref={address} {...register("address", { required: true })} name="address" placeholder="Start typing your address" className="inp my-2 ps-5" />
                                                <span className="position-absolute s-icon">
                                                    <i className="fa fa-search" />
                                                </span>
                                            </div>
                                            <div className="py-4">
                                                <label>Closest Town</label>
                                                <select name="town" ref={town} {...register("town")} className="d-block r2-inp w-100  my-3 my-sm-0 ps-2">
                                                    <option value="Northland - Dargaville"> Northland - Dargaville </option>
                                                    <option value="Northland - Kaikohe"> Northland - Kaikohe </option>
                                                    <option value="Northland - Kaikohe"> Northland - Kaikohe </option>
                                                    <option value="Northland - Kawakawa"> Northland - Kawakawa </option>
                                                    <option value="Northland - Kerikeri"> Northland - Kerikeri </option>
                                                    <option value="Northland - Mangawhai"> Northland - Mangawhai </option>
                                                    <option value="Northland - Maungaturoto"> Northland - Maungaturoto </option>
                                                    <option value="Northland - Paihia"> Northland - Paihia </option>
                                                    <option value="Northland - Whangarei"> Northland - Whangarei </option>
                                                    <option value="Auckland - Albany"> Auckland - Albany </option>
                                                    <option value="Auckland - Auckland City"> Auckland - Auckland City </option>
                                                    <option value="Auckland - Botany Downs"> Auckland - Botany Downs </option>
                                                </select>
                                            </div>
                                            <p className="p-small2">This is the location we'll display to other Grobal members </p>
                                            <div>
                                                <input type="checkbox" ref={cbox} className="box" />
                                                <span>
                                                    I am over 18 and have read and accepted Grobal's <Link to="/"> terms &amp; conditions</Link> and
                                                    <Link to="/">privacy policy</Link>
                                                </span>
                                            </div>
                                            <button type="submit" id="nextBtn" className="w-100 my-4">
                                                Register
                                            </button>
                                        </div>
                                    </div>
                                    {/* Step 2 start*/}
                                </form>

                                <div className="border-line" />
                                <p className="pt-2">
                                    Already have an account? <Link to="Login">Log in</Link>
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        </React.Fragment>
    );
};
export default Register;
