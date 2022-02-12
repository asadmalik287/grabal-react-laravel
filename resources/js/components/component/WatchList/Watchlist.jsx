import React, { useRef, useState } from "react";
import "./Watchlist.css";
import watchlistAdd from "../../../images/2099323960490510824.png";
import WatchlistSidebar from "./WatchlistSidebar/WatchlistSidebar";
import WatchListCard from "./watchListCard/watchListCard";
import ModalWatchList from "./modalWatchList/modalWatchList";
import ServiceBanner from '../ServiceBanner/ServiceBanner'


const Watchlist = () => {
    const watchListCard = 'watchListCard';
    const editButtonwatchList = useRef()
    const [updateText, setupdateText] = useState('Edit')
    const [blockState, setblockState] = useState('none')
    const [watchlistBlock, setwatchlistBlock] = useState('block')
    const [checkboxBlock, setcheckboxBlock] = useState('d-none')
    const [lengthCard, setLengthCard] = useState()

    const deleteWatchList = () => {
        setLengthCard(document.querySelectorAll('.watchListCard').length)
        if (editButtonwatchList.current.style.display === 'none') {
            setupdateText('Cancel')
            setblockState('block')
            setwatchlistBlock('none')
            setcheckboxBlock('d-block')
        }
        else {
            setupdateText('Edit')
            setblockState('none')
            setwatchlistBlock('block')
            setcheckboxBlock('d-none')
        }
    }
    const [checkbox, setCheckBox] = useState(false)
    const [mainCheckBox, setMainCheckBox] = useState(false)
    const [selectedNum, setSelectedNum] = useState(0)
    const toogleCheckBox = (event) => {
        let checkBox = document.querySelectorAll('.cardWatchListCard')
        let num = 0;
        for (let chckItems of checkBox) {
            if (event.target.checked === true) {
                setCheckBox(chckItems.checked = true)
                setSelectedNum(++num);
                setMainCheckBox(true)
            }
            else {
                setCheckBox(chckItems.checked = false)
                setSelectedNum(0);
                setMainCheckBox(false)
            }
        }
    }
    const singleChecked = (e) => {
        if (e.target.checked == true) {
            e.target.setAttribute('checked', checkbox)
            setSelectedNum(selectedNum + 1);
        }else{
            setSelectedNum(selectedNum - 1);
        }
    }
    const removeCardsSelected = (event) => {

        let checkBox = document.querySelectorAll('.cardWatchListCard')
        let num = 0;
        for (let chckItems of checkBox) {
            if (chckItems.checked === true) {
                chckItems.parentNode.parentNode.parentNode.remove()
                ++num;
                setSelectedNum(num - selectedNum);
                setMainCheckBox(false)
            }
        }

    }




    return (
        <React.Fragment>
            <ServiceBanner title="WATCHLIST" />
            <section className="main__padding py-5 pb-3 pb-md-0 watchlist bg-f6f5f3 ">
                {/*=====WATCHLIST====*/}
                <div className="row mx-0 pb-4">
                    <div className="col-md-2 bg-white p-3 sidebar">
                        <WatchlistSidebar />
                    </div>
                    <div className="col-md-8 px-3">
                        <div className="d-none">
                            <a href className="anchor-text"> Home</a>/<a href className="anchor-text"> My Grobal</a>
                            <span className="px-1">/ Watchlist</span>
                        </div>
                        <div className="d-flex justify-content-between py-3">
                            <div className="d-flex align-items-baseline">
                                <div>
                                    <h2 className="fw-bold wf-24">Watchlist {lengthCard} listing</h2>
                                </div>
                            </div>
                            <button className="border-0 px-3 fw-bold text-primary" onClick={deleteWatchList} id="editButtonwatchList">{updateText}</button>
                        </div>
                        <div style={{ display: watchlistBlock }}>
                            <div className="d-flex">
                                <div className="dropdown">
                                    <select
                                        className="btn btn-secondary11  dropdown-toggle"
                                        to="/"
                                        role="button"
                                        id="dropdownMenuLink"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false"
                                    >
                                        All Ctegories
                                        <option>All Ctegories</option>
                                        <option>Services (1)</option>
                                    </select>
                                </div>
                                <div className="dropdown px-2">
                                    <select
                                        className="btn btn-secondary11  dropdown-toggle"
                                        role="button"
                                        id="dropdownMenuLink"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false"
                                    >
                                        All current listing
                                        <option>All current listing</option>
                                        <option>Closing Today</option>
                                        <option>Leading Bids</option>
                                        <option>Reserve met</option>
                                        <option>Reserve not met</option>
                                        <option>Open Homes</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div style={{ display: blockState }} ref={editButtonwatchList}>
                            <div className="d-flex justify-content-between py-3" >
                                <div className="d-flex align-items-baseline">
                                    <div>
                                        <input type='checkbox' onChange={toogleCheckBox} className="checkBoxWatchList" id="muchSelected" checked={mainCheckBox} /> <label for='muchSelected' className="muchSelected mb-0 ps-2"> <span>{selectedNum}</span> selected</label>
                                    </div>
                                    <div className="ps-3">
                                        <button className="border-0 bg-transparent" onClick={removeCardsSelected}>
                                            <svg width="16" fill='gray' height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMinYMid meet" focusable="false" role="img" aria-labelledby="tg-99a6f713-0735-447a-3b58-e9875286dfe3"><path d="M13 4h-2v-.1A3 3 0 0 0 8 1a3 3 0 0 0-3 2.9V4H3a.9.9 0 0 0 0 1.8.85.85 0 0 0 0 .2l.44 7.26A1.93 1.93 0 0 0 5.37 15h5.27a1.94 1.94 0 0 0 1.92-1.8L13 6a.86.86 0 0 0 0-.16A.92.92 0 1 0 13 4zm-6.2-.1A1.15 1.15 0 0 1 8 2.8a1.15 1.15 0 0 1 1.2 1.1V4H6.8v-.1zm4.4 1.94l-.45 7.24a.13.13 0 0 1-.12.12H5.37a.12.12 0 0 1-.12-.11L4.8 5.85h6.43s-.02-.02-.02-.01h-.01z"></path><path d="M8 7.1a.9.9 0 0 0-.9.9v3a.9.9 0 1 0 1.8 0V8a.9.9 0 0 0-.9-.9z"></path></svg>
                                            Delete
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <WatchListCard functionChecbox={singleChecked} scrClassWatchListCard={watchListCard} checboxBlock={checkboxBlock} />
                        <WatchListCard functionChecbox={singleChecked} scrClassWatchListCard={watchListCard} checboxBlock={checkboxBlock} />
                        <WatchListCard functionChecbox={singleChecked} scrClassWatchListCard={watchListCard} checboxBlock={checkboxBlock} />
                        <WatchListCard functionChecbox={singleChecked} scrClassWatchListCard={watchListCard} checboxBlock={checkboxBlock} />
                    </div>
                    <div className="col-md-2">
                        <div className="sticky-top" >
                            <img src={watchlistAdd} className="w-100" alt="" />

                        </div>
                    </div>
                </div>
            </section>
            <div className="modal fade" id="exampleModal" tabIndex={-1} aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div className="modal-dialog watchModal">
                    <div className="modal-content">
                        <div className="modal-header border-0">
                            <h5 className="modal-title" id="exampleModalLabel">
                                Create a private note for this listing
                            </h5>
                            <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close" />
                        </div>
                        <div className="modal-body">
                            <ModalWatchList />
                        </div>
                        <div className="modal-footer border-0 flex-nowrap">
                            <button type="button" className="btn btn-secondary w-50 border-0 bg-transparent text-primary" data-bs-dismiss="modal">
                                Cancel
                            </button>
                            <button type="button" className="btn btn-primary w-50">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </React.Fragment>
    );
};
export default Watchlist;
