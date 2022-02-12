import react from 'react';

export const ChangeEmailAddress = () => {
    return <react.Fragment>
        <section className='main__padding mt-5'>
            <div className="col-md-7  p-0 col-12 col-sm-12">
                <div>
                    <h3 className="fw-bold fs-5">Change your email address</h3>
                    <div className="mt-3 ">
                        We will send you an email to confirm your new email address.
                    </div>
                    <div className="mt-1">
                        Continue to use your current email address to log in until you confirm the
                        change.
                    </div>
                    <div className="mt-2">
                        Required fields are shown with a star{" "}
                        <span className="text-danger"> * </span>
                    </div>
                </div>
                <div className="row my-3 bg-f6f5f3  p-4">
                    <div className="col-md-12  d-flex flex-wrap align-items-center">
                        <p className="pt-1 col-md-5 col-12">

                            Current email address
                        </p>
                        <div className="col-12 col-md-7">
                        tashrifmurtuza@gmail.com
                        </div>
                        <p className="pt-1 col-md-5 col-12">
                        New email address<span className="text-danger"> * </span>
                        </p>
                        <div className="col-12 col-md-7">
                            <input type="email" name="email" className="input1 form-control w-100" />
                        </div>
                        <p className="pt-1 col-12 col-md-5">
                        Confirm new email address<span className="text-danger"> * </span>
                        </p>
                        <div className=" col-12 col-md-7">
                            <input type="password" name="email" className="input1 form-control w-100" />
                        </div>
                        <p className="pt-1 col-12 col-md-5">
                        Grobal password <span className="text-danger"> * </span>
                        </p>
                        <div className=" col-12 col-md-7">
                            <input type="password" name="email" className="input1 form-control w-100" />
                        </div>
                    </div>
                    <div className="text-center py-4 btn-size">
                        <button className="px-2  search-btn text-white">Update Email Address</button>
                    </div>
                </div>
            </div>
        </section>

    </react.Fragment>


};
export default ChangeEmailAddress;