import React from 'react';
import { Link } from "react-router-dom";
import WatchlistSidebar from "../component/WatchList/WatchlistSidebar/WatchlistSidebar";
import ServiceBanner from '../component/ServiceBanner/ServiceBanner'
import watchlistAdd from "../assets/images/2099323960490510824.png";
import './css/watchListAccountDetails.css'
export const WatchListAccountDetails = () => {
  return <React.Fragment>
    <ServiceBanner title="WATCHLIST" />
    <section className="main__padding py-5 pb-3 pb-md-0 watchlist bg-f6f5f3 ">
      {/*=====WATCHLIST====*/}
      <div className="row mx-0 pb-4">
        <div className="col-md-2 bg-white p-3 sidebar">
          <WatchlistSidebar />
        </div>
        <div className="col-md-8">
          <div className=" pb-1">
            <h2 className=" fw-bold wf-24">Account details</h2>
          </div>
          <div className="card mb-3 my-4 py-4 px-md-3 px-2 fs14">
            <div className="d-flex flex-wrap justify-content-between py-3">
              <div className="col-md-6 fw6">Member number</div>
              <div className="col-md-6 text-end">2794905</div>
            </div>
            <div className="border-line" />
            <div className="d-flex flex-wrap justify-content-between py-3">
              <div className="col-md-6 fw6">Name</div>
              <div className="col-md-6 text-end">Murtaza</div>
            </div>
            <div className="border-line" />
            <div className="d-flex flex-wrap justify-content-between py-3">
              <div className="col-md-6 fw6">Email</div>
              <div className="col-md-6 text-end">tashrifmurtuza@gmail.com</div>
            </div>
            <div className="border-line" />
            <div className="d-flex flex-wrap justify-content-between py-3">
              <div className="col-md-6 fw6">Location</div>
              <div className="col-md-6 text-end"> Auckland</div>
            </div>
            <div className="border-line" />
            <div className="d-flex flex-wrap justify-content-between py-3">
              <div className="col-md-6 fw6">Member since</div>
              <div className="col-md-6 text-end">December 2008</div>
            </div>
            <div className="border-line" />
            <div className="d-flex flex-wrap justify-content-between py-3">
              <div className="col-md-6 flex-wrap fw6">Authenticated</div>
              <div className="col-md-6 flex-wrap text-end">Yes</div>
            </div>
            <div className="border-line" />
          </div>
          <div className="pt-3">
            <h2 className=" fw-bold wf-24">Update my details</h2>
          </div>
          <div className="card  mb-3 my-4 py-2 px-md-3 px-2 fs14">
            <div className="d-flex justify-content-between py-2 flex-wrap">
              <div className="col-12 py-2">
                <div>
                  <Link to="/" className="d-flex align-items-center accDetails">
                    <svg
                      className="clrBlue"
                      width={16}
                      height={16}
                      viewBox="0 0 16 16"
                      xmlns="http://www.w3.org/2000/svg"
                      preserveAspectRatio="xMinYMid meet"
                      focusable="false"
                      role="img"
                      aria-labelledby="tg-b9265d85-037e-d172-5fae-79151156c7a6"
                    >
                      <path d="M13.6 3H2.4A1.4 1.4 0 0 0 1 4.4v7.2A1.4 1.4 0 0 0 2.4 13h11.2a1.4 1.4 0 0 0 1.4-1.4V4.4A1.4 1.4 0 0 0 13.6 3zm-1.8 1.8L8.7 7.24a1.11 1.11 0 0 1-1.43 0L4.2 4.8h7.6zm-9 6.4V6l3.34 2.62A2.91 2.91 0 0 0 8 9.3a2.86 2.86 0 0 0 1.83-.66L13.2 6v5.2H2.8z"></path>
                      <title id="tg-b9265d85-037e-d172-5fae-79151156c7a6" />
                    </svg>
                    <Link to='ChangeEmailAddress' className="ps-2">Change email address</Link>
                  </Link>
                </div>
              </div>
              <div className="col-12 py-2">
                <div>
                  <Link to="/" className="d-flex align-items-center accDetails">
                    <svg
                      className="clrBlue"
                      width={16}
                      height={16}
                      viewBox="0 0 16 16"
                      xmlns="http://www.w3.org/2000/svg"
                      preserveAspectRatio="xMinYMid meet"
                      focusable="false"
                      role="img"
                      aria-labelledby="tg-3630bd02-3730-995b-ac46-bc3aa5502e6b"
                    >
                      <circle cx={5} cy={5} r={1} />
                      <path d="M6 11a5.93 5.93 0 0 0 1.48-.15L11.63 15H15v-3.37l-4.15-4.15A5.93 5.93 0 0 0 11 6a5 5 0 1 0-5 5zm0-8.2A3.2 3.2 0 0 1 9.2 6 3.27 3.27 0 0 1 9 7.34l-.26.57 4.47 4.47v.82h-.84L7.91 8.73 7.34 9A3.27 3.27 0 0 1 6 9.2a3.2 3.2 0 0 1 0-6.4z"></path>
                      <title id="tg-3630bd02-3730-995b-ac46-bc3aa5502e6b" />
                    </svg>
                    <Link to='Changepassword' className="ps-2">Change password</Link>
                  </Link>
                </div>
              </div>
              <div className="col-12 py-2">
                <div>
                  <Link to="/" className="d-flex align-items-center accDetails">
                    <svg
                      className="clrBlue"
                      width={16}
                      height={16}
                      viewBox="0 0 16 16"
                      xmlns="http://www.w3.org/2000/svg"
                      preserveAspectRatio="xMinYMid meet"
                      focusable="false"
                      role="img"
                      aria-labelledby="tg-1efa4035-4e8f-145f-1c95-230d788503f8"
                    >
                      <path d="M11.5 15.41a3.38 3.38 0 0 0 2.4-1c.23-.23.73-.8 1.12-1.3a1.9 1.9 0 0 0-.57-2.83l-2.6-1.45a1.9 1.9 0 0 0-2.3.35l-.92 1-.13.12a4.68 4.68 0 0 1-.68-.65l-.45-.51-.48-.46-.66-.63a.56.56 0 0 1 .13-.16l1-.92a1.9 1.9 0 0 0 .34-2.32L6.18 2.06a1.9 1.9 0 0 0-2.83-.54c-.49.39-1 .87-1.25 1.09A3.41 3.41 0 0 0 1.1 5a10.39 10.39 0 0 0 10.37 10.41h.03zM2.9 5.07a1.58 1.58 0 0 1 .47-1.2c.16-.16.64-.59 1.1-1l-.56-.65.71.78L6.1 5.54a.1.1 0 0 1 0 .12l-1 .94A2 2 0 0 0 4.43 8a2.93 2.93 0 0 0 1.23 2l.44.41.41.43a2.93 2.93 0 0 0 2 1.23 2.05 2.05 0 0 0 1.45-.68l.93-1a.1.1 0 0 1 .12 0l2.6 1.45v.15c-.36.47-.81 1-1 1.13a1.64 1.64 0 0 1-1.15.47A8.59 8.59 0 0 1 2.9 5.07z"></path>
                      <title id="tg-1efa4035-4e8f-145f-1c95-230d788503f8" />
                    </svg>
                    <Link to='/' className="ps-2">Edit contact details</Link>
                  </Link>
                </div>
              </div>
              <div className="col-12 py-2">
                <div>
                  <Link to="/" className="d-flex align-items-center accDetails">
                    <svg
                      className="clrBlue"
                      width={16}
                      height={16}
                      viewBox="0 0 16 16"
                      xmlns="http://www.w3.org/2000/svg"
                      preserveAspectRatio="xMinYMid meet"
                      focusable="false"
                      role="img"
                      aria-labelledby="tg-7cd6c5d7-29e3-c6fb-47b8-ffdd61a4f518"
                    >
                      <path d="M8 15s5-4 5-8A5 5 0 0 0 3 7c0 4 5 8 5 8zM8 3.8A3.2 3.2 0 0 1 11.2 7c0 1.94-1.81 4.19-3.2 5.57C6.62 11.2 4.8 8.94 4.8 7A3.2 3.2 0 0 1 8 3.8z"></path>
                      <circle cx={8} cy={7} r={2} />
                      <title id="tg-7cd6c5d7-29e3-c6fb-47b8-ffdd61a4f518" />
                    </svg>
                    <Link to='Editdelieveryaddress' className="ps-2">Edit delivery address</Link>
                  </Link>
                </div>
              </div>
            </div>
          </div>
          <div className="col-md-2" />
        </div>

        <div className="col-md-2">
          <img src={watchlistAdd} alt="" />
        </div>
      </div>
    </section>
  </React.Fragment>;
};
export default WatchListAccountDetails
