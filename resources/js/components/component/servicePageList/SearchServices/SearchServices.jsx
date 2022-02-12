import React from 'react';

export const SearchServices = () => {
    return <React.Fragment>
        <div className="py-3 px-3">
            <h2 className="titleBlue">Services</h2>
            <input
                type="text"
                className="my-2 py-2 px-3 form-control h__46"
                placeholder="All Regions"
            />
            <input
                type="text"
                className="my-2 py-2 px-3 form-control h__46"
                placeholder="All Districts"
            />
            <input
                type="text"
                className="my-2 py-2 px-3 form-control h__46"
                placeholder="All Categories"
            />
            <input
                type="text"
                className="my-2 py-2 px-3 form-control h__46"
                placeholder="All Sub Categoies"
            />
            <div className="os-btn d-flex justify-content-between align-items-center pt-3">
                <div>
                    <button type="button" className="search-btn text-white">
                        Search
                    </button>
                </div>
                <div>
                    <button type="button" className="reset-btn">
                        Reset
                    </button>
                </div>
            </div>
        </div>
    </React.Fragment>
};
export default SearchServices