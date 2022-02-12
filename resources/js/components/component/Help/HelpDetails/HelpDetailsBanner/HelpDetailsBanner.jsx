import React from 'react';
import Footer from '../../../Footer/Footer';
import HelpDetailsTabContent from '../HelpDetailsTabContent/HelpDetailsTabContent';
export const HelpDetailsBanner = (props) => {
    const tabs = [
        {
            tabsName: "Account", mainTitle: "Account", activeTab: 'active',
            mainDesc: "The ins and outs of using your account.",
            title: "Registering", desc: "Register a personal or business Grobal account.",
            title2: "Managing your account", desc2: "Update your details and learn more about your account.",
            title3: "Problems with your account", desc3: "Troubleshoot logging in issues and missing emails.",
            title4: "Charities & cool auctions", desc4: "Learn how we can help registered charities, highlight awesome auctions, and general cool-ness.",
            title5: "Privacy and advertising", desc5: "Find out what your privacy and advertising options are.",
        },
        {
            tabsName: "Buying", mainTitle: "Buying",
            mainDesc: "The ins and outs of using your account.",
            title: "Registering", desc: "Register a personal or business Grobal account.",
            title2: "Managing your account", desc2: "Update your details and learn more about your account.",
            title3: "Problems with your account", desc3: "Troubleshoot logging in issues and missing emails.",
            title4: "Charities & cool auctions", desc4: "Learn how we can help registered charities, highlight awesome auctions, and general cool-ness.",
            title5: "Privacy and advertising", desc5: "Find out what your privacy and advertising options are.",
        },
        {
            tabsName: "Selling & fees", mainTitle: "Selling & fees",
            mainDesc: "The ins and outs of using your account.",
            title: "Registering", desc: "Register a personal or business Grobal account.",
            title2: "Managing your account", desc2: "Update your details and learn more about your account.",
            title3: "Problems with your account", desc3: "Troubleshoot logging in issues and missing emails.",
            title4: "Charities & cool auctions", desc4: "Learn how we can help registered charities, highlight awesome auctions, and general cool-ness.",
            title5: "Privacy and advertising", desc5: "Find out what your privacy and advertising options are.",
        },
        {
            tabsName: "Payments & money", mainTitle: "Payments & money",
            mainDesc: "The ins and outs of using your account.",
            title: "Registering", desc: "Register a personal or business Grobal account.",
            title2: "Managing your account", desc2: "Update your details and learn more about your account.",
            title3: "Problems with your account", desc3: "Troubleshoot logging in issues and missing emails.",
            title4: "Charities & cool auctions", desc4: "Learn how we can help registered charities, highlight awesome auctions, and general cool-ness.",
            title5: "Privacy and advertising", desc5: "Find out what your privacy and advertising options are.",
        },
        {
            tabsName: "Staying safe & site security", mainTitle: "Staying safe & site security",
            mainDesc: "The ins and outs of using your account.",
            title: "Registering", desc: "Register a personal or business Grobal account.",
            title2: "Managing your account", desc2: "Update your details and learn more about your account.",
            title3: "Problems with your account", desc3: "Troubleshoot logging in issues and missing emails.",
            title4: "Charities & cool auctions", desc4: "Learn how we can help registered charities, highlight awesome auctions, and general cool-ness.",
            title5: "Privacy and advertising", desc5: "Find out what your privacy and advertising options are.",
        },
        {
            tabsName: "Policies, terms & conditions", mainTitle: "Policies, terms & conditions",
            mainDesc: "The ins and outs of using your account.",
            title: "Registering", desc: "Register a personal or business Grobal account.",
            title2: "Managing your account", desc2: "Update your details and learn more about your account.",
            title3: "Problems with your account", desc3: "Troubleshoot logging in issues and missing emails.",
            title4: "Charities & cool auctions", desc4: "Learn how we can help registered charities, highlight awesome auctions, and general cool-ness.",
            title5: "Privacy and advertising", desc5: "Find out what your privacy and advertising options are.",
        },
    ]
    return <React.Fragment>
        <section className="main__padding py-5 text-white  bg-3171b9 ">
            <div className="row m-0 ">
                <div className="col-lg-12 p-0">
                    <h2 className="text__sm__center ttu font-weight-bolder">
                        {props.title}
                    </h2>
                    <ul className="nav nav-pills mt-3" id="pills-tab" role="tablist">
                        {
                            tabs.map((e, index) => (
                                <li className="nav-item" role="presentation">
                                    <button
                                        className={`nav-link ${e.activeTab}`}
                                        id={`pills-tab-${index + 1} `}
                                        data-bs-toggle="pill"
                                        data-bs-target={`#pills-${index + 1} `}
                                        type="button"
                                        role="tab"
                                        aria-controls="pills-home"
                                        aria-selected="true"
                                    >
                                        {e.tabsName}
                                    </button>
                                </li>
                            ))
                        }
                    </ul>
                </div>
            </div>
        </section>
        <div className="tab-content main__padding" id="pills-tabContent">
            {
                tabs.map((e, index) => (
                    <div
                        className={`tab-pane fade show ${e.activeTab} `}
                        id={`pills-${index + 1}`}
                        role="tabpanel"
                        aria-labelledby={`pills-tab-${index + 1}`}
                    >
                        <section className='py-4'>
                            <h2>{e.mainTitle}</h2>
                            <p>{e.mainDesc}</p>
                            <div className='row mx-0'>
                                <HelpDetailsTabContent key={index + 1}
                                    title={e.title} title2={e.title2} desc={e.desc} desc2={e.desc2}
                                    title3={e.title3} title4={e.title4} title5={e.title5} desc3={e.desc3} desc4={e.desc4}
                                    desc5={e.desc5}
                                />
                            </div>
                        </section>
                    </div>
                ))
            }
        </div>
    </React.Fragment>;
};
export default HelpDetailsBanner;