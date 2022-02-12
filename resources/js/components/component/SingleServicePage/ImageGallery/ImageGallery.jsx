import React from 'react';
import Carousel from 'react-gallery-carousel';
import 'react-gallery-carousel/dist/index.css';
import image1 from '../../../../images/imagegallery1.jpg';
import image2 from '../../../../images/imagegallery2.jpg';
import image3 from '../../../../images/imagegallery3.jpg';
import image4 from '../../../../images/imagegallery4.jpg';
import image5 from '../../../../images/imagegallery5.jpg';
import image6 from '../../../../images/imagegallery6.jpg';
import image7 from '../../../../images/imagegallery7.jpg';
import image8 from '../../../../images/imagegallery8.jpg';
import image9 from '../../../../images/imagegallery9.jpg';
import image10 from '../../../../images/imagegallery10.jpg';


export const ImageGallery = () => {

    const images = [image1, image2, image3, image4, image5, image6, image7, image8, image9, image10].map((number) => ({
        src: number
    }));
    return <React.Fragment>
        <Carousel images={images} style={{ height: 500 }} />
    </React.Fragment>;
};
export default ImageGallery;
