import React, { useRef } from "react";
import { Link } from "react-router-dom";
const StepTwo = () => {
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

    return (
        <React.Fragment>
            <div className="register-1">
                <h1 className="titleBlue">Tell us about yourself</h1>
            </div>
            <div className="">
                <div className="">
                    <label>First Name</label>
                    <input type="text" ref={fname} name="f_name" placeholder="" className="inp my-2 px-2" />
                    <p className="after-inp">50 characters remaining</p>
                </div>
                <div className="">
                    <label>Last Name</label>
                    <input type="text" ref={lname} name="l_name" placeholder="" className="inp my-2 px-2" />
                    <p className="after-inp">50 characters remaining</p>
                </div>
                <div className="d-flex flex-wrap mx-0 align-items-end justify-content-between">
                    <div className="gridCol3">
                        <label className="d-block">Date of Birth</label>
                        <input type="text" ref={day} placeholder="Day" name="date" className="r2-inp w-100  ps-2 my-3 my-sm-0" />
                    </div>
                    <div className="gridCol3">
                        <select name="month" ref={month} className="r2-inp w-100  my-3 my-sm-0">
                            <option value="" selected="">
                                Select month
                            </option>
                            <option value="">January</option>
                            <option value="">Febraury</option>
                            <option value="">March</option>
                            <option value="">April</option>
                            <option value="">May</option>
                            <option value="">Jne</option>
                            <option value="">July</option>
                            <option value="">August</option>
                            <option value="">September</option>
                            <option value="">October</option>
                            <option value="">November</option>
                            <option value="">December</option>
                        </select>
                    </div>
                    <div className="gridCol3">
                        <input type="text" ref={year} name="year" placeholder="Year(YYYY)" className="r2-inp w-100 ps-2 my-3 my-sm-0" />
                    </div>
                </div>
                <div className="py-4">
                    <label className="d-block">Phone number</label>
                    <div className="row justify-content-between">
                        <div className="col-4">
                            <select name="countryCode" ref={countryCode} className="w-100  my-3 my-sm-0 ps-2">
                                <option value="" selected="">
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
                            <input type="text" ref={phoneNumber} name="number" placeholder="1234567" className="r2-inp w-100 ps-2 h-100" />
                        </div>
                    </div>
                </div>
                <div className="py-1" style={{ display: "none" }} ref={addMorephoneNumberId}>
                    <label className="d-block">Phone number</label>
                    <div className="row justify-content-between">
                        <div className="col-4">
                            <select name="number" id="num" className="w-100  my-3 my-sm-0 ps-2">
                                <option value="" selected="">
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
                        <input ref={gerderMan} type="radio" name="gender" value="man" />
                        <label for="gerderman" className=" ps-2">
                            Man
                        </label>
                        <br />
                    </div>
                    <div className="ps-2 py-2">
                        <input ref={gerderWoman} type="radio" name="gender" value="woman" />
                        <label for="gerderWoman" className=" ps-2" id="aus">
                            Woman
                        </label>
                        <br />
                    </div>
                    <div className="ps-2 py-2">
                        <input type="radio" ref={genderDiverse} name="gender" value="gender diverse" />
                        <label for="genderDiverse" className=" ps-2">
                            Gender Diverse
                        </label>
                        <br />
                    </div>
                </div>
                <h4 className="pt-3">New Zealand</h4>
                <div className="position-relative">
                    <label>Address</label>
                    <input type="text" ref={address} name="address" placeholder="Start typing your address" className="inp my-2" />
                    <span className="position-absolute s-icon">
                        <i className="fa fa-search" />
                    </span>
                </div>
                <div className="py-4">
                    <label>Closest Town</label>
                    <select name="town" ref={town} className="d-block">
                        <option value="" hidden="" />
                        <option value=""> Northland - Dargaville </option>
                        <option value=""> Northland - Kaikohe </option>
                        <option value=""> Northland - Kaikohe </option>
                        <option value=""> Northland - Kawakawa </option>
                        <option value=""> Northland - Kerikeri </option>
                        <option value=""> Northland - Mangawhai </option>
                        <option value=""> Northland - Maungaturoto </option>
                        <option value=""> Northland - Paihia </option>
                        <option value=""> Northland - Whangarei </option>
                        <option value=""> Auckland - Albany </option>
                        <option value=""> Auckland - Auckland City </option>
                        <option value=""> Auckland - Botany Downs </option>
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
                    Create account
                </button>
            </div>
        </React.Fragment>
    );
};

export default StepTwo;
