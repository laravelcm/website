import React, { useState, useEffect } from "react";
import { usePage } from "@inertiajs/inertia-react";
import { CSSTransition } from "react-transition-group";

import Layout from "@/includes/Layout";
import Seo from "@/includes/Seo";

import Menu from "@/pages/user/Menu";
import Deactivate from "@/pages/user/Forms/Deactivate";
import PersonalData from "@/pages/user/Forms/PersonalData";
import Profile from "@/pages/user/Forms/Profile";

const Account = () => {
  const { flash } = usePage();
  const [show, setShow] = useState(false);
  const [message, setMessage] = useState('');

  useEffect(() => {
    if (flash.success !== null || flash.error !== null) {
      setShow(true);
      setMessage(flash.success ?? flash.error);
    }
  }, [flash]);

  return (
    <>
      <Seo title="Mon compte" />
      <Menu current="account" />
      <CSSTransition
        in={show}
        timeout={300}
        classNames="notification"
        unmountOnExit
      >
        <div className="fixed inset-0 z-100 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end">
          <div className="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto">
            <div className="rounded-lg shadow-xs overflow-hidden">
              <div className="p-4">
                <div className="flex items-start">
                  <div className="flex-shrink-0">
                    <svg className="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </div>
                  <div className="ml-3 w-0 flex-1 pt-0.5">
                    <p className="text-sm leading-5 font-medium text-gray-900">{flash.success ? 'Succès!' : 'Erreur!'}</p>
                    <p className="mt-1 text-sm leading-5 text-gray-500">{message}</p>
                  </div>
                  <div className="ml-4 flex-shrink-0 flex">
                    <button onClick={() => setShow(false)} className="inline-flex text-gray-400 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150">
                      <svg className="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fillRule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clipRule="evenodd" />
                      </svg>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </CSSTransition>

      <div className="container md:px-4 mt-12">
        <Profile />

        <div className="hidden sm:block">
          <div className="py-5"><div className="border-t border-gray-300" /></div>
        </div>

        <PersonalData />

        <div className="hidden sm:block">
          <div className="py-5"><div className="border-t border-gray-300" /></div>
        </div>

        <Deactivate />
      </div>
    </>
  );
};

Account.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Account;
