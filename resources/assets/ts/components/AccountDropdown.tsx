import React, { useState, useRef } from "react";
import { InertiaLink, usePage } from "@inertiajs/inertia-react";
import { useClickAway } from "react-use";

import { User } from "@/utils/types";
import Transition from "@/components/Transition";

export default () => {
  const [isOpen, setIsOpen] = useState(false);
  const { auth: { user } } = usePage();
  const ref = useRef(null);
  const closeDropdown = () => {
    setIsOpen(false);
  };

  useClickAway(ref, closeDropdown);
  const {
    picture,
    email,
    full_name,
    is_admin,
    username,
  }: User = user;

  return (
    <div className="relative">
      <button
        onClick={() => setIsOpen(!isOpen)}
        className="block h-10 w-10 rounded-full border-2 border-gray-200 overflow-hidden relative z-10"
      >
        <img
          src={picture}
          alt="profile"
          className="h-full w-full object-cover"
        />
      </button>
      <Transition
        enter="transition ease-out duration-100"
        enterFrom="transform opacity-0 scale-95"
        enterTo="transform opacity-100 scale-100"
        leave="transition ease-in duration-75"
        leaveFrom="transform opacity-100 scale-100"
        leaveTo="transform opacity-0 scale-95"
        show={isOpen}
      >
        <div
          className={`absolute rounded bg-white w-60 shadow-lg overflow-hidden mt-2 ${
            isOpen ? "" : "hidden"
          }`}
          style={{ right: "-12px" }}
          ref={ref}
        >
          <div className="flex items-center bg-gray-50 p-4">
            <div className="truncate">
              <span className="block text-gray-800 font-medium truncate">{full_name}</span>
              <span className="text-xs text-gray-500">{email}</span>
            </div>
          </div>
          <div className="py-2">
            {
              is_admin && (
                <a
                  href="/console/dashboard"
                  className="text-sm flex items-center px-4 py-2 hover:text-brand-primary hover:bg-gray-100"
                  target="_blank"
                >
                  <svg className="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path
                      strokeLinecap="round"
                      strokeLinejoin="round"
                      strokeWidth="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                    />
                  </svg>
                  Administration
                </a>
              )
            }
            <InertiaLink href="/dashboard" className="text-sm flex items-center px-4 py-2 hover:text-brand-primary hover:bg-gray-100">
              <svg className="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  strokeWidth="2"
                  d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"
                />
              </svg>
              Dashboard
            </InertiaLink>
            <a href="#" className="text-sm flex items-center px-4 py-2 hover:text-brand-primary hover:bg-gray-100">
              <svg className="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  strokeWidth="2"
                  d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                />
              </svg>
              Espace Entreprise
              <span className="inline-flex items-center ml-2 px-1.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-brand-100 text-brand-primary">
                Soon
              </span>
            </a>
            <InertiaLink href={`/u/@${username}`} className="text-sm flex items-center px-4 py-2 hover:text-brand-primary hover:bg-gray-100">
              <svg className="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  strokeWidth="2"
                  d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                />
              </svg>
              Mon Profil
            </InertiaLink>
            <div className="py-3 px-4 mt-1 border-t border-gray-200">
              <InertiaLink
                href="/logout"
                className="text-sm py-2 px-3 inline-flex bg-brand-100 rounded text-brand-primary hover:text-white hover:bg-brand-primary"
              >
                Se déconnecter
              </InertiaLink>
            </div>
          </div>
        </div>
      </Transition>
    </div>
  );
};
