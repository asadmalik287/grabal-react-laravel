import React from 'react';
import { Link } from 'react-router-dom';
import Footer from '../../Footer/Footer';
import Header from '../../Header/Header';
import Navbar from '../../Navbar/Navbar';
import ServiceBanner from '../../ServiceBanner/ServiceBanner';
import './CommunityEnvironmentDetails.css'

export const CommunityEnvironmentDetails = () => {
    return <React.Fragment>
        {/*=====COMMUNITY DETAILS====*/}
        <ServiceBanner title="COMMUNITY AND ENVIRONMENT Details" />
        <section className="main__padding pt-3 pb-3 community-details ">
            <div className="row">
                <div className="col-md-9">
                    <div className="comdet-card border-blue py-4 px-2 px-md-4 main-fs position-relative">
                        <p className="ofc-cmnt position-absolute">Official comment</p>
                        <div className="d-flex justify-content-between pt-3 pt-md-0">
                            <div className="d-flex align-items-center">
                                <div>
                                    <img
                                        src="./assets/img/Trade_Me_Logo_Masterbrand_Circle_Kevin_SCREEN_RGB.png"
                                        alt=""
                                    />
                                </div>
                                <div className="ps-3">
                                    <Link className="  pfw5" to='/'>
                                        Lucy
                                    </Link>
                                    <span className="lucy-span d-block d-md-inline mt-2 mt-md-0 px-2 py-1">
                                        <i className="fa fa-users user-icon" aria-hidden="true" />
                                        <span className="ps-2">Community team</span>{" "}
                                    </span>
                                    <p className="pt-2 m-0 clrP f-smfw5">15 days ago</p>
                                </div>
                            </div>
                            <div>
                                <i className="fa fa-cog clrP" aria-hidden="true" />
                                {/* <p>official comment</p> */}
                            </div>
                        </div>
                        <p className="pt-4">
                            Hi everyone, thanks for your comments. These templates have been in
                            the works for a while now, and have slowly been ramping up over the
                            last few months as we tested and learnt to ensure we’re offering you
                            the best product possible.
                        </p>
                        <p>
                            We appreciate that yesterday’s ramp up might have come a little out
                            of the blue for some of you though so apologies if there was any
                            confusion!
                        </p>
                        <p>
                            We know that buyers are wanting clarity over shipping costs and
                            timeframes, so we’ve introduced these templates so sellers can offer
                            just that throughout the buying process. With complex changes like
                            these we know that sometimes there can be a few gremlins or things
                            that we have just missed, so please give us your feedback by{" "}
                            <Link to='/'>contacting us directly.</Link>
                        </p>
                        <p>
                            Make sure to check out the <Link to='/'>‘how to’</Link> guide for a bunch
                            of extra info, but here are a few quick fire FAQs for you as well…
                        </p>
                        <p>
                            <strong>
                                {" "}
                                Can we not have an area that we can add comment or instruction in
                                please?{" "}
                            </strong>
                        </p>
                        <p>
                            Because of the way that the shipping info is shown in the results,
                            free text is not currently possible. This is because buyers specify
                            what area they’re in when searching so we can show the applicable
                            cost, tailored to their location.
                        </p>
                        <p>
                            <strong>
                                I wouldn't want to promise a buyer the parcel will be delivered in
                                1-2 days
                            </strong>
                        </p>
                        <p>
                            As you’ll see from the template form, we don’t ask for a promise of
                            time for delivery, only an estimate. We just need you to confirm
                            your handling time from when they buy the item until you send it,
                            and select the carrier option. Shipping transparency will then use
                            this to display shipping costs and expected delivery times to a
                            buyer’s preferred shipping location in search results, but these are
                            always estimates.
                        </p>
                        <p>
                            <strong>
                                If we don't use the new templates, are we going to be somehow
                                disadvantaged in search results?
                            </strong>
                        </p>
                        <p>
                            The template enables us to show potential buyers shipping costs and
                            estimates in search and we know that this is a better experience for
                            them. Sellers who are offering good shipping options will be boosted
                            within relevant searches for using the new templates. We’re working
                            to make these shipping templates available to as many listing
                            channels as possible, so more and more sellers can be rewarded in
                            this way for using them. The intention is for this functionality to
                            be available to all in-trade sellers in time. Any promotional extras
                            you purchase will still work as normal and won’t be negatively
                            impacted.
                        </p>
                        <p>
                            <strong>
                                {" "}
                                Will search results finally be showing the cost including
                                delivery? Is this somehow viewable now, or is this a new feature
                                which is yet to be rolled out?
                            </strong>
                        </p>
                        <p>
                            The results will be showing the Buy Now cost and the shipping cost,
                            together with estimated delivery time. It is now viewable across
                            each of the apps and currently out to 50% of new look Grobal
                            users. We hope to ave it out to 100% very soon.
                        </p>
                        <p>
                            <strong>And why is it only In Trade sellers?</strong>{" "}
                        </p>
                        <p>
                            This is something we’re trialing for our in-trade sellers. Right now
                            it’s not available to casual traders but we’ll let you know if this
                            changes.
                        </p>
                        <p>
                            <strong>Why does it apply only to Buy Now listings?</strong>
                        </p>
                        <p>
                            Right now it’s only available for Buy Now only and MQLs. We’ll let
                            you know if this changes in future.
                        </p>
                        <p>
                            <strong>Are relists working? </strong>
                        </p>
                        <p>
                            Yes, they should be going ahead just fine. Let us know of any
                            difficulties.
                        </p>
                        <div>
                            <button className="pp-btn w-100 w-md-px comdet-btn" type="button">
                                <i className="fa fa-thumbs-o-up iconclr pe-2" />
                            </button>
                            <button
                                className="pp-btn w-100 w-md-px mt-3 mt-md-0 comdet-btn"
                                type="button"
                            >
                                <i className="fa iconclr fa-thumbs-o-down " />
                            </button>
                            <span className="btn-span ps-2 pt-2 d-inline-block">1</span>
                        </div>
                    </div>
                    <div className="border-line pt-4" />
                    <div className="comdet-card py-5 main-fs">
                        <div className="d-flex justify-content-between">
                            <div className="d-flex">
                                <div>
                                    <img
                                        src="./assets/img/Trade_Me_Logo_Masterbrand_Circle_Kevin_SCREEN_RGB.png"
                                        alt=""
                                    />
                                </div>
                                <div className="ps-3">
                                    <Link className="pfw5" to='/'>
                                        Robyn
                                    </Link>
                                    <p className="pt-1 m-0 clrP f-smfw5">18 days ago</p>
                                </div>
                            </div>
                            <div>
                                <i className="fa fa-cog clrP" aria-hidden="true" />
                                {/* <p>official comment</p> */}
                            </div>
                        </div>
                        <p className="pt-4">
                            I have just attempted to use the new template as well. All ok for
                            the standard shipping stuff but I want to continue offering a $0.00
                            with the wording: Combined, postage must be paid on one auction
                            only. If I use the area in the template I will have all customers
                            selecting the 0.00 and not paying postage at all. Can we not have a
                            area that we can add comment or instruction in please. Cheers
                        </p>
                        <div>
                            <button className="pp-btn w-100 w-md-px comdet-btn" type="button">
                                <i className="fa fa-thumbs-o-up iconclr pe-2" />
                            </button>
                            <button
                                className="pp-btn w-100 w-md-px mt-3 mt-md-0 comdet-btn"
                                type="button"
                            >
                                <i className="fa iconclr fa-thumbs-o-down " />
                            </button>
                            <span className="btn-span ps-2 pt-2 d-inline-block">4</span>
                        </div>
                        <div className="border-line pt-4" />
                    </div>
                    <div className="comdet-card main-fs">
                        <div className="d-flex justify-content-between">
                            <div className="d-flex">
                                <div>
                                    <img src="./assets/img/default_avatar.png" alt="" />
                                </div>
                                <div className="ps-3">
                                    <Link className="  pfw5" to='/'>
                                        Arthur
                                    </Link>
                                    <p className="pt-1 m-0 clrP f-smfw5">18 days ago</p>
                                </div>
                            </div>
                            <div>
                                <i className="fa fa-cog clrP" aria-hidden="true" />
                                {/* <p>official comment</p> */}
                            </div>
                        </div>
                        <p className="pt-4">
                            OMG, didn't realise they have made such a drastic change to shipping
                            template. IMHO it's not increasing "transparency" for the buyers,
                            but increasing "traps" for the sellers, so much details have to be
                            included in the shipping options now. I wouldn't want to promise a
                            buyer the parcel will be delivered in 1-2 days, give the state of
                            the courier network now, I'm not even sure whether it's going to get
                            delivered in 4-5 days. Cut off time is also making no sense, we
                            can't decide when a parcel gets picked up anyway.
                        </p>
                        <p>
                            Oh well, I guess there's no going back now, I might just use "to be
                            arranged" for a while...haha
                        </p>
                        <div>
                            <button className="pp-btn w-100 w-md-px comdet-btn" type="button">
                                <i className="fa fa-thumbs-o-up iconclr pe-2" />
                            </button>
                            <button
                                className="pp-btn w-100 w-md-px mt-3 mt-md-0 comdet-btn"
                                type="button"
                            >
                                <i className="fa iconclr fa-thumbs-o-down " />
                            </button>
                            <span className="btn-span ps-2 pt-2 d-inline-block">4</span>
                        </div>
                        <div className="border-line pt-4" />
                    </div>
                </div>
            </div>
        </section>

    </React.Fragment>;
};
export default CommunityEnvironmentDetails;