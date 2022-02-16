import React from 'react';
import ServiceBanner from '../component/ServiceBanner/ServiceBanner';
import './css/contactUs.css'
import { useForm } from "react-hook-form";

export const ContactUs = () => {
    const { register, handleSubmit, formState: { errors } } = useForm();
    const loginSubmit = handleSubmit(data => console.log(data));

    return <React.Fragment>
        <ServiceBanner title="Contact us" />
        {/*=====CONTACT US====*/}
        <section className="main__padding py-4  ">
            <form className='col-6 m-auto' onSubmit={handleSubmit(loginSubmit)}>
                <div className="form-row">
                    <div className="form-group ">
                        <label className="f-font pb-1">
                            FIRST NAME
                        </label>
                        <input placeholder='Enter  Name' type="text" {...register("name", { required: true })} className={`h__46 form-control   ${errors.name ? 'is-invalid' : ''}`} id="inputEmail4" />
                        <p className='text-danger mb-0'>  {errors.name && "Name is required"}</p>
                    </div>
                </div>
                <div className="form-group  pt-3">
                    <label className="f-font pb-1">
                        EMAIL
                    </label>
                    <input type="email" placeholder='Enter Email'  {...register("email", { required: true })} className={`h__46 form-control ${errors.email ? 'is-invalid' : ''}`} id="inputAddress" />
                    <p className='text-danger mb-0'>  {errors.name && "Email is required"}</p>
                </div>
                <div className="form-group  pt-3">
                    <label className="d-block f-font pb-1" htmlFor="inputtext">
                        MESSAGE
                    </label>
                    <textarea
                        name="inputAddress inp"  {...register("Message", { required: true })}
                        id=""
                        placeholder='Enter Message...'
                        cols=""
                        rows="3"
                        className={`w-100 py-3  form-control ${errors.Message ? 'is-invalid' : ''}`}
                        defaultValue={""}
                    />
                    <p className='text-danger mb-0'>  {errors.Message && "Message is required"}</p>
                </div>
                <div className="pt-3 ">
                    <button className="btn  bg-back w-100 text-white" type="submit">
                        {" "}
                        Send message{" "}
                    </button>
                </div>
            </form>
        </section>


    </React.Fragment>;
};
export default ContactUs;