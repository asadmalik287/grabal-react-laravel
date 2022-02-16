import React from 'react';
import ServiceBanner from '../component/ServiceBanner/ServiceBanner';
import AboutService from '../component/SingleServicePage/AboutService/AboutService';
import Group70 from '../images/Group-70.png'
import CustomButton from '../component/Button/CustomButton/CustomButton';
import Group68 from '../images/Group-68.png'
import SocialServices from '../component/SingleServicePage/SocialServices/SocialServices';
import Group26 from '../images/Group-26.png'
import ServiceListReviews from '../component/SingleServicePage/ServiceListReviews/ServiceListReviews';
import ImageGallery from '../component/SingleServicePage/ImageGallery/ImageGallery';
import AddSideBar from '../images/12029152936087521460.png'
import ReactStars from "react-rating-stars-component";
import { Link } from 'react-router-dom';
import modalImage from '../images/watchlist.jpg'
import { useForm } from "react-hook-form";

const secondExample = {
    size: 20,
    count: 5,
    color: "#c0c0c0",
    activeColor: "#3171b9",
    value: 5,
    a11y: true,
    emptyIcon: <i className="fa fa-star" />,
    filledIcon: <i className="fa fa-star" />,
    onChange: newValue => {
        console.log(`Example 2: new value is ${newValue}`);
    }
};

export const SingleServicePage = () => {
    const { register, handleSubmit, formState: { errors } } = useForm();
    const loginSubmit = handleSubmit(data => console.log(data));
    return <React.Fragment>
        <ServiceBanner title="Service Details" />
        <section className='carpet-cleaning main__padding py-4'>
            <h2 className="mob-center titleBlue">Carpet Cleaning Auckland</h2>
            <div className="row cc-heading align-items-center">
                <div className="col-sm-6">
                    <button type="button" className="btn btn-primary f-14 costumInput pr-3 w-50 text-center bg-2a7a1 my-3" data-bs-toggle="modal" data-bs-target="#emailSeller">
                        Email to Seller
                    </button>
                    <p className="m-0 mob-center">Read Reviews</p>
                </div>
                <div className="col-sm-6 text-sm-end">
                    <div className="d-flex justify-content-between align-items-center">
                        <Link to='Login' type="button" className="cch-btn buttonRed text-white mob-center">
                            Add to Watchlist
                        </Link>
                        <p className="mob-center mb-0">Listing # 2315473</p>
                    </div>
                </div>
            </div>
            <div className='row cc-services py-4'>
                <div className="col-md-6">
                    <AboutService imageSrc={Group70} />
                    <AboutService imageSrc={Group70} />
                    <AboutService imageSrc={Group68} />
                    <div className='enquireButton my-3' data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><CustomButton text="Enquire Now" /></div>
                    <SocialServices />
                </div>
                <div className='col-md-6'>
                    <ImageGallery />
                </div>
            </div>
        </section>
        <section className="paragraph main__padding row mx-0 justify-content-between">
            <div className='col-lg-9'>
                <div>
                    <p className="p">Enjoy professional carpet cleaning at an affordable cost.</p>
                    <p className="p">Are you looking for the best carpet cleaning Auckland?</p>
                    <p className="p">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the
                        1500s, Lorem Ipsm is simply dummy text of the printing and typesetting
                        industry. Lorem Ipsum has been the industry's standard dummy text ever since
                        the 1500s,
                    </p>
                    <h6>FIVE REASON WHY CHOOSE ME:</h6>
                    <ul className="p-list">
                        <li>
                            Lorem Ipsm is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the
                            1500s,
                        </li>
                        <li>
                            Lorem Ipsm is simply dummy text of the printing and typesetting industry.
                        </li>
                        <li>Simply dummy text of the printing and typesetting industry.</li>
                        <li>Text of the printing and typesetting industry.</li>
                        <li>
                            Lorem Ipsm is simply dummy text of the printing and typesetting industry.
                        </li>
                    </ul>
                </div>

                {/* Add Review Section */}
                <div className="review-submission">
                    <h3 className="tab-title">Submit your review</h3>
                    <ReactStars {...secondExample} classNames='my-3' />
                    <div className="review-submit">
                        <form action="#" className="row g-3">
                            <div className="col-12">
                                <textarea name="review" id="review" rows={10} className="form-control" placeholder="Message" defaultValue={""} />
                            </div>
                            <div className="col-12">
                                <button type="submit" className="cch-btn buttonRed text-white ">
                                    Sumbit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                {/* Add Review Section */}

            </div>
            <div className='col-lg-3 text-lg-right pe-0 text-center mt-lg-0 mt-sm-3 mt-3' >
                <img alt='' src={AddSideBar} />
            </div>
        </section>

        <section className="reviews main__padding">
            <div className="r-img py-4 d-flex align-items-center">
                <img alt='' src={Group26} />
                <span
                    style={{ paddingTop: "0.4rem", display: "block", paddingLeft: "0.5rem" }}
                >
                    100% From 1214 reviews
                </span>
            </div>
            <ServiceListReviews />
            <ServiceListReviews />
            <ServiceListReviews />
        </section>
        <div className="modal fade" id="emailSeller" tabIndex="{-1}" aria-labelledby="emailSellerLabel" aria-hidden="true">
            <div className="modal-dialog modal-dialog-centered modal-lg">
                <div className="modal-content">
                    <div className="modal-header border-0">
                        <div className="modal-title fw-bold h4" id="emailSellerLabel">
                            Email the seller
                        </div>
                        <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close" />
                    </div>
                    <div className="modal-body">
                        <form action="" onSubmit={handleSubmit(loginSubmit)}> 
                            <label htmlFor="sellerMessage" className='mb-2 fw-bold'>Message</label>
                            <textarea name="message" className={`form-control ${errors.textareaMessage ? 'is-invalid' : ''}`} {...register("textareaMessage", { required: true })} id='sellerMessage' cols="10" rows="3"></textarea>
                            <p className='text-danger mb-0 pt-2'>  {errors.textareaMessage && "Email is required"}</p>
                            <div className="modal-footer px-0 border-0 justify-content-start">
                                <button type="submit" className="btn btn-primary px-4">
                                    Send
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div
            className="modal fade"
            id="exampleModal"
            tabIndex={-1}
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div className="modal-dialog watchModal serviceModal">
                <div className="modal-content">
                    <div className="modal-header border-0">
                        <h5 className="modal-title" id="exampleModalLabel">
                            Create a private note for this listing
                        </h5>
                        <button
                            type="button"
                            className="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        />
                    </div>
                    <div className="modal-body" style={{ height: '545px', overflowY: 'scroll' }}>
                        <div className="row g-0 border">
                            <div className="col-md-4 ">
                                <img
                                    src={modalImage}
                                    className=" w-100 "
                                    alt="... "
                                />
                            </div>
                            <div className="col-md-8 ">
                                <div className="px-3 py-2 ">
                                    <p>
                                        <small className="wf75 ">
                                            Auckland City, Auckland |{" "}
                                            <span> Closes: 12:00am, Sun, 6 Feb </span>
                                        </small>
                                    </p>
                                    <h6 className="fw-bold wf85 text-start">
                                        {" "}
                                        HP Workstation Z200 Quad Coree i7 870 (2.93GHz) 16G memory 1TB
                                        HDD win 10 PRO
                                    </h6>
                                    <div className="pt-4 text-start">
                                        <Link to="/" className="d-block wf75 clr-light">
                                            {" "}
                                            Reserve met{" "}
                                        </Link>
                                        <Link to="/" className="d-block text-black fw-bold">
                                            {" "}
                                            $71.00{" "}
                                        </Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form className="pt-3">
                            <div className="row align-items-center">
                                <div className="mb-3 position-relative col-md-6">
                                    <label htmlFor="message-text" className="iconclr fw6 py-1 f-14">
                                        Your bid
                                    </label>
                                    <span className="position-absolute wmAbs">$</span>{" "}
                                    <input
                                        type="number"
                                        className="wmInp w-100"
                                        placeholder="1,010.00"
                                    />
                                </div>
                                <div className="col-md-6 pt-md-4">
                                    <div className="form-check form-switch d-flex align-items-center">
                                        <div className="">
                                            <input
                                                className="form-check-input wmSwitch"
                                                type="checkbox"
                                                id="flexSwitchCheckDefault"
                                            />
                                            <label
                                                className="form-check-label fw6 ps-1 f-14"
                                                htmlFor="flexSwitchCheckDefault"
                                            >
                                                Auto-bid
                                            </label>
                                        </div>
                                        <div className="dropdown">
                                            <button
                                                className="btn  bg-transparent border-0 btn-secondary text-primary wmBtn fs14  dropdown-toggle"
                                                type="button"
                                                id="dropdownMenuButton1 "
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false"
                                            >
                                                More info
                                            </button>
                                            <ul
                                                className="dropdown-menu wmdMenu"
                                                aria-labelledby="dropdownMenuButton1"
                                            >
                                                <p>
                                                    Auto-bid keeps you in the lead by placing a bid whenever
                                                    you’re outbid, up to the maximum you set.
                                                </p>
                                                <Link to='/'> Learn more about auto-bid</Link>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form action="" className="pt-3">
                            <label htmlFor="" className='f-14'>Choose a shipping option</label>
                            <div className="row py-0 justify-content-between">
                                <div className="form-check col-md-8 d-flex align-items-center py-2">
                                    <input
                                        className="wmRadio form-check-input m-0"
                                        type="radio"
                                        name="flexRadioDefault"
                                        id="flexRadioDefault1"
                                    />
                                    <label
                                        className="form-check-label ps-2 f-14"
                                        htmlFor="flexRadioDefault1"
                                    >
                                        Courier - Auckland (Signature)
                                    </label>
                                </div>
                                <div className="col text-end">$8.00</div>
                                <div className="" />
                            </div>
                            <div className="row py-0 justify-content-between">
                                <div className="form-check col-md-8 d-flex align-items-center py-2">
                                    <input
                                        className="wmRadio form-check-input m-0"
                                        type="radio"
                                        name="flexRadioDefault"
                                        id="flexRadioDefault2"
                                    />
                                    <label
                                        className="form-check-label ps-2 f-14"
                                        htmlFor="flexRadioDefault2"
                                    >
                                        Courier - Auckland &gt; Rural (Signature)
                                    </label>
                                </div>
                                <div className="col text-end">$12.30</div>
                                <div className="" />
                            </div>
                            <div className="row py-0 justify-content-between">
                                <div className="form-check col-md-8 d-flex align-items-center py-2">
                                    <input
                                        className="wmRadio form-check-input m-0"
                                        type="radio"
                                        name="flexRadioDefault"
                                        id="flexRadioDefault3"
                                    />
                                    <label
                                        className="form-check-label ps-2 f-14"
                                        htmlFor="flexRadioDefault3"
                                    >
                                        Courier - Rest of North Island (Signature)
                                    </label>
                                </div>
                                <div className="col text-end">$20.40</div>
                                <div className="" />
                            </div>
                            <div className="row py-0 justify-content-between">
                                <div className="form-check col-md-8 d-flex align-items-center py-2">
                                    <input
                                        className="wmRadio form-check-input m-0"
                                        type="radio"
                                        name="flexRadioDefault"
                                        id="flexRadioDefault4"
                                    />
                                    <label
                                        className="form-check-label ps-2 f-14"
                                        htmlFor="flexRadioDefault4"
                                    >
                                        Courier - Rest of North Island &gt; Rural (Signature)
                                    </label>
                                </div>
                                <div className="col text-end">$24.70</div>
                                <div className="" />
                            </div>
                            <div className="row py-0 justify-content-between">
                                <div className="form-check col-md-8 d-flex align-items-center py-2">
                                    <input
                                        className="wmRadio form-check-input m-0"
                                        type="radio"
                                        name="flexRadioDefault"
                                        id="flexRadioDefault5"
                                    />
                                    <label
                                        className="form-check-label ps-2 f-14"
                                        htmlFor="flexRadioDefault5"
                                    >
                                        Courier - South Island (Signature)
                                    </label>
                                </div>
                                <div className="col text-end">$30.80</div>
                                <div className="" />
                            </div>
                            <div className="row py-0 justify-content-between">
                                <div className="form-check col-md-8 d-flex align-items-center py-2">
                                    <input
                                        className="wmRadio form-check-input m-0"
                                        type="radio"
                                        name="flexRadioDefault"
                                        id="flexRadioDefault6"
                                    />
                                    <label
                                        className="form-check-label ps-2 f-14"
                                        htmlFor="flexRadioDefault6"
                                    >
                                        Courier - South Island &gt; Rural (Signature)
                                    </label>
                                </div>
                                <div className="col text-end">$35.10</div>
                                <div className="" />
                            </div>
                            <div className="row py-0 justify-content-between">
                                <div className="form-check col-md-8 d-flex align-items-center py-2">
                                    <input
                                        className="wmRadio form-check-input m-0"
                                        type="radio"
                                        name="flexRadioDefault"
                                        id="flexRadioDefault7"
                                    />
                                    <label
                                        className="form-check-label ps-2 fw6 f-14"
                                        htmlFor="flexRadioDefault7"
                                    >
                                        I intend to pick-up
                                        <span className="d-block p-small">
                                            Seller is located in Waitakere, Auckland
                                        </span>
                                    </label>
                                </div>
                                <div className="" />
                            </div>
                            <div>
                                <p className="m-0 py-2 fw6">Seller accepts payment by </p>
                                <p className="m-0">Ping, Cash, NZ Bank Deposit</p>
                                <p className="p-small">
                                    If you win, you are legally obligated to complete your purchase{" "}
                                </p>
                            </div>
                            <div>
                                <label htmlFor="" className="fw6 f-14">
                                    Reminders
                                </label>
                                <div className="form-check ps-2 py-3 d-flex align-items-center ">
                                    <input
                                        className="form-check-input wmInpFtr m-0"
                                        type="checkbox"
                                        defaultValue=""
                                        id="flexCheckDefault"
                                    />
                                    <label
                                        className="form-check-label iconclr ps-2 f-14"
                                        htmlFor="flexCheckDefault"
                                    >
                                        Email me if I'm outbid
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div className="modal-footer justify-content-start border-0 flex-wrap">
                        <button type="button" className="btn btn-primary wmfBtn">
                            {" "}
                            Place bid
                        </button>
                        <button
                            type="button"
                            className="btn btn-secondary wmfBtn border-0 bg-transparent text-primary"
                            data-bs-dismiss="modal"
                        >
                            Go back to listing
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </React.Fragment>
};
export default SingleServicePage;
