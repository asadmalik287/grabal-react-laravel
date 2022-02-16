import React from 'react';
import watchlist from "../../../images/watchlist.jpg";

export const ModalWatchList = () => {
    return <React.Fragment>
        <div className="row g-0 border">
            <div className="col-md-4">
                <img src={watchlist} className="w-100" alt="... " />
            </div>
            <div className="col-md-8">
                <div className="px-3 py-2">
                    <p>
                        <small className="wf75">
                            Auckland City, Auckland | <span> Closes: 12:00am, Sun, 6 Feb </span>
                        </small>
                    </p>
                    <h6 className="fw-bold wf85 text-start">HP Workstation Z200 Quad Coree i7 870 (2.93GHz) 16G memory 1TB HDD win 10 PRO</h6>
                    <div className="pt-4 text-start">
                        <a href className="d-block wf75 clr-light">
                            {" "}
                            Reserve met{" "}
                        </a>
                        <a href className="d-block text-black fw-bold">
                            {" "}
                            $71.00{" "}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <form className="pt-5">
            <div className="mb-3">
                <label htmlFor="message-text" className="col-form-label d-block text-start">
                    Note
                </label>
                <textarea className="form-control py-2" id="message-text" rows={5} defaultValue={""} />
            </div>
        </form>
    </React.Fragment>;
};
export default ModalWatchList;
