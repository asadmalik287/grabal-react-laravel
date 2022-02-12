import React from 'react';
import ServiceButton from '../../Button/ServiceButton/ServiceButton';
import SelectSearch from 'react-select-search';
import fuzzySearch from 'react-select-search/dist/cjs/fuzzySearch';
import { Link } from 'react-router-dom';
export const HomeTop = () => {
    return <React.Fragment>
        <section className="main__padding pt-3 pb-3 text-white bg-f8af2e ">
            <div className="row m-0">
                <div className="col-lg-10 p-0">
                    <h2 className="text__sm__center font-weight-bolder">
                        Kia ora,what can we help you find ?
                    </h2>
                    <div className="row m-0 pt-3">
                        <div className="col-lg-5 col-md-5 mb-lg-0 mb-md-0 mb-3 mb-sm-3 pe-0 pe-lg-2 pe-md-2 pe-sm-0 ps-0">
                            <SelectSearch
                                className="form-control border-0 costumInput f-14 searchAbleSelectMain"
                                options={[
                                    { value: 'Animals & pets', name: ' Animals & pets ' },
                                    { value: 'Architecture & design', name: 'Architecture & design' },
                                    { value: 'Cleaning', name: 'Cleaning' },
                                ]}
                                search
                                filterOptions={fuzzySearch}
                                emptyMessage="Not found"
                                placeholder="Select Service"
                            />
                            {/* <select name >
                                <option value>Select Service</option>
                                <option value>1</option>
                            </select> */}
                        </div>
                        <div className="col-lg-5 col-md-5 mb-lg-0 mb-md-0 mb-3 mb-sm-3  px-0 px-lg-2 px-md-2 px-sm-0">
                            <input
                                type="number"
                                placeholder="Postcode"
                                className="form-control border-0 costumInput f-14"
                            />
                        </div>
                        <div className="col-lg-2 col-md-2 px-lg-3 px-md-3 px-sm-0 px-0 mb-lg-0 mb-md-0 mb-3 mb-sm-3">
                            <button type="button" className="btn btn-primary f-14 costumInput pr-3 w-sm-100 w-100 w-lg-75 w-md-75 text-center bg-2a7a1">
                                Search
                            </button>
                        </div>
                    </div>
                    <div className="row m-0 relative__btns">
                        <div className="col-lg-10 pe-lg-2 pe-md-2 pe-sm-0 pe-0 ps-0">
                            <div className="row m-0">
                                <div className="col-lg-4 col-md-4 mb-lg-0 mb-md-0 mb-3 mb-sm-3 p-0">
                                    <Link to='servicePageList'><ServiceButton btnGroupClass="btnGroup1" btnServicesClass="btn-danger" btnText="Residential Services" /></Link>
                                </div>
                                <div className="col-lg-4 col-md-4 mb-lg-0 mb-md-0 mb-3 mb-sm-3 p-0">
                                    <Link to='servicePageList'>  <ServiceButton btnGroupClass="btnGroup2" btnServicesClass="btn-warning" btnText="Commercial Services" /></Link>
                                </div>
                                <div className="col-lg-4 col-md-4 mb-lg-0 mb-md-0 mb-3 mb-sm-3 p-0">
                                    <Link to='servicePageList'><ServiceButton btnGroupClass="btnGroup3" btnServicesClass="btn-primary" btnText="Trade Services" /></Link>
                                </div>
                            </div>
                        </div>
                        <div className="col-lg-2 p-x-2"> </div>
                    </div>
                </div>
            </div>
        </section>

    </React.Fragment>;
};
export default HomeTop;