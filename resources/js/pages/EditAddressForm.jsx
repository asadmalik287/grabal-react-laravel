import React from 'react'
export const EditAddressForm = () => {
    return (
        <React.Fragment>
            <section className='main__padding mt-5'>
                <div className="col-md-7 p-0">
                    <div>
                        <h3 className="fw-bold fs-5">Edit address</h3>
                        <div className="mt-3 ">
                            Required fields are shown with a star{" "}
                            <span className="text-danger">*</span>
                        </div>
                    </div>
                    <div className="row my-3">
                        <div className="bgfe9 fs14  mb-3">Address details</div>
                        <div className="col-md-12 ps-2 p-0 ">
                            <div className="d-flex flex-wrap">
                                <p className="m-0 pt-1 col-md-5 col-12 fs14">
                                    Name <span className="text-danger"></span>
                                </p>
                                <div className="col-12 col-md-7">
                                    <input
                                        type="text"
                                        placeholder="Murtuza Tashrifwala"
                                        name="email"
                                        className="ps-2 bordermain fs14 input1 form-control w-100"
                                    />
                                </div>
                            </div>
                            <div className="d-flex flex-wrap pt-3">
                                <p className="m-0 pt-1 col-12 col-md-5 fs14">
                                    Country <span className="text-danger"> * </span>
                                </p>
                                <div className=" col-12 col-md-7">
                                    <input
                                        className="form-check-input ps-2"
                                        type="radio"
                                        name="flexRadioDefault"
                                        id="flexRadioDefault1"
                                    />
                                    <label className="form-check-label fs14 ps-2 " htmlFor="flexRadioDefault1">
                                        New Zealand
                                    </label>
                                    <div className="d-inline ps-3">
                                        <input
                                            className="form-check-input "
                                            type="radio"
                                            name="flexRadioDefault"
                                            id="flexRadioDefault1"
                                        />
                                        <label
                                            className="form-check-label fs14 ps-2"
                                            htmlFor="flexRadioDefault2"
                                        >
                                            Australia
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div className="d-flex flex-wrap pt-3">
                                <p className="m-0 pt-1 col-12 col-md-5 fs14">Address finder</p>
                                <div className=" col-12 col-md-7">
                                    <input
                                        type="text"
                                        placeholder="Start typing your address..."
                                        name="email"
                                        className="input1 form-control w-100 fs14 bordermain ps-2"
                                    />
                                </div>
                            </div>
                            <div className="d-flex flex-wrap pt-3">
                                <p className="m-0 pt-1 col-12 col-md-5 fs14">
                                    Address <span className="text-danger"> * </span>
                                </p>
                                <div className=" col-12 col-md-7">
                                    <input
                                        type="text"
                                        placeholder="Additional details (unit, company, floor, etc)"
                                        name="email"
                                        className="input1 form-control addr w-100 fs14 bordermain ps-2"
                                    />
                                    <input
                                        type="text"
                                        placeholder="285 Great North Road"
                                        name="email"
                                        className="input1 form-control w-100 mt-2 fs14 bordermain ps-2"
                                    />
                                </div>
                            </div>
                            <div className="d-flex flex-wrap pt-3 ">
                                <p className="m-0 pt-1 col-12 col-md-5 fs14">Suburb</p>
                                <div className=" col-12 col-md-7">
                                    <input
                                        type="text"
                                        placeholder="Henderson, Auckland"
                                        name="email"
                                        className="ps-2 bordermain fs14 input1 form-control w-100"
                                    />
                                </div>
                            </div>
                            <div className="d-flex flex-wrap pt-3">
                                <p className="m-0 pt-1 col-12 col-md-5 fs14">
                                    City <span className="text-danger"> * </span>
                                </p>
                                <div className=" col-12 col-md-7">
                                    <input
                                        type="text"
                                        placeholder="Henderson, Auckland"
                                        name="email"
                                        className="ps-2 bordermain fs14 input1 form-control w-100"
                                    />
                                </div>
                            </div>
                            <div className="d-flex flex-wrap pt-3">
                                <p className="m-0 pt-1 col-12 col-md-5 fs14">
                                    Postcode <span className="text-danger"> * </span>
                                </p>
                                <div className=" col-12 col-md-7">
                                    <input
                                        type="text"
                                        placeholder='0612'
                                        name="email"
                                        className="w-25 ps-2 bordermain input1 form-control fs14"
                                    />
                                    <a className="f-14" href="">
                                        Find your postcode
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div className="text-center py-4 btn-size">
                            <button className="px-4 search-btn  search-button text-white fs14">
                                Cancel
                            </button>
                            <button className="px-4 ms-2 search-btn  search-button text-white fs14">
                                Update
                            </button>
                        </div>
                        {/*  <div class="col-md-6 bg-f6f5f3">
                        <div class="my-1">
                            <p class="pt-1 ">
                                Old password <span class="text-danger"> * </span></p>
                            <p class="para">New password <span class="text-danger"> * </span></p>
      
      
                            <p class="para">Confirm new password <span class="text-danger"> *  </span> </p>
      
                            <p class="para">Password strength We recommend you use a strong, unique password.
                                <a href="">Find out more</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 bg-f8af2e">
      
                        <div class="my-1"> <input type="text" name="email" class="input1 form-control">
                            <input type="text" class="my-3 input1 form-control form-control" name="email2">
                            <input type="text" size="20" maxlength="50" name="email3" class="input1 form-control">
                        </div>
                    </div>
                    <div class="text-center py-4 btn-size">
                        <button class="px-2  search-button text-white">Change Password</button>
                    </div>
       */}
                    </div>
                </div>
            </section>

        </React.Fragment>
    )
}
export default EditAddressForm;