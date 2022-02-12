import React, { useRef, useState } from 'react';
import ServicesCardsMain from '../../ServicesCardsMain/ServicesCardsMain';
import Adds from '../../../../images/11651651507964915389.png'
import serviceImageOne from '../../../../images/3.png'
export const ServiceListDetails = () => {
    const listGridSerList = useRef();
    const galleryGridSerList = useRef();
    const [listGalleryGrid, setlistGalleryGrid] = useState('listCard')
    const [colNineGrid, setcolNineGrid] = useState('col-lg-9')
    const [threeCol, setthreeCol] = useState('col-lg-3')
    const listGalleryGridFun = (e, section) => {
        if (section === 'list') {
            setlistGalleryGrid('listCard')
            setcolNineGrid('col-lg-9')
            setthreeCol('col-lg-3')
        }
        if (section === 'gallery') {
            setlistGalleryGrid('col-lg-3');
            setcolNineGrid('col-lg-12')
            setthreeCol('d-none')
        }
    }
    return <React.Fragment>
        <section className='main_padding bg-f6f5f3 py-3 main__padding'>
            <div className='row mx-0'>
                <div className='col-lg-4 px-0'>
                </div>
                <div className='col-lg-8 px-0 d-flex justify-content-end'>
                    <select className="r2-inp border o_form_height text-left  cp pe-5 ps-2  py-2">
                        <option value="">Sort Featured First</option>
                        <option value="">Alphabetical </option>
                        <option value=""> Most reviews </option>
                        <option value=""> Latest listings  </option>
                    </select>
                    &nbsp;
                    <button ref={listGridSerList} onClick={(e) => listGalleryGridFun(e, 'list')} className={`btn listActive o_form_height border border-end-0 h-100 px-4 bg-white py-2`}>
                        <svg fill='#6560 5d' width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-labelledby="tg-d9ed06cb-0bb5-769d-7a79-414faf18f3a9"><path d="M2 19a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V5a3 3 0 0 0-3-3H5a3 3 0 0 0-3 3v14zM4 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5zm6.5 8H17a1 1 0 0 0 0-2h-6.5a1 1 0 0 0 0 2zm0-4H17a1 1 0 0 0 0-2h-6.5a1 1 0 1 0 0 2zm0 8H17a1 1 0 0 0 0-2h-6.5a1 1 0 0 0 0 2zM7 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"></path></svg>
                        <span className='ps-1'>List</span></button>
                    <button ref={galleryGridSerList} onClick={(e) => listGalleryGridFun(e, 'gallery')} className='border-start-0  o_form_height listGalleryGrid btn border h-100 px-4 bg-white py-2'>
                        <svg fill='#65605d' width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-labelledby="tg-021b1b63-6159-ad77-27b5-aef1c5d71a9c"><path d="M19 2H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V5a3 3 0 0 0-3-3zm1 17a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14zM6 7v3c0 .556.448 1 1 1h3c.556 0 1-.448 1-1V7c0-.556-.448-1-1-1H7c-.556 0-1 .448-1 1zm7 0v3c0 .556.448 1 1 1h3c.556 0 1-.448 1-1V7c0-.556-.448-1-1-1h-3c-.556 0-1 .448-1 1zm-7 7v3c0 .556.448 1 1 1h3c.556 0 1-.448 1-1v-3c0-.556-.448-1-1-1H7c-.556 0-1 .448-1 1zm7 0v3c0 .556.448 1 1 1h3c.556 0 1-.448 1-1v-3c0-.556-.448-1-1-1h-3c-.556 0-1 .448-1 1z"></path></svg>
                        <span className='ps-1'>Gallery</span>
                    </button>
                </div>
            </div>

            <div className='row mx-0 pt-4'>
                <div className={`px-0 ${colNineGrid}`}>
                    <div className='row mx-0 '>
                        <ServicesCardsMain class="commmonlistCardService" updateClass={listGalleryGrid} imageSrc={serviceImageOne} date='Thu, 9 Dec' title="Clean Rite Cleaning Service's" desc="Description of the services" />
                        <ServicesCardsMain class="commmonlistCardService" updateClass={listGalleryGrid} imageSrc={serviceImageOne} date='Thu, 9 Dec' title="Clean Rite Cleaning Service's" desc="Description of the services" />
                        <ServicesCardsMain class="commmonlistCardService" updateClass={listGalleryGrid} imageSrc={serviceImageOne} date='Thu, 9 Dec' title="Clean Rite Cleaning Service's" desc="Description of the services" />
                        <ServicesCardsMain class="commmonlistCardService" updateClass={listGalleryGrid} imageSrc={serviceImageOne} date='Thu, 9 Dec' title="Clean Rite Cleaning Service's" desc="Description of the services" />
                        <ServicesCardsMain class="commmonlistCardService" updateClass={listGalleryGrid} imageSrc={serviceImageOne} date='Thu, 9 Dec' title="Clean Rite Cleaning Service's" desc="Description of the services" />
                    </div>
                </div>
                <div className={`text-right ${threeCol}`}><img alt='' className='sticky-top' style={{ top: '20px' }} src={Adds} /></div>
            </div>
        </section>
    </React.Fragment>;
};
export default ServiceListDetails
