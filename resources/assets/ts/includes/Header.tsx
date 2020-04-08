import React, { useEffect, useRef, useState } from "react";
import { InertiaLink, usePage } from "@inertiajs/inertia-react";

import AccountDropdown from "@/components/AccountDropdown";
import Notifications from "@/components/Notifications";

export default () => {
  const [isOpen, setIsOpen] = useState(false);
  const { auth } = usePage();
  const input = useRef<HTMLInputElement>(null);

  const onKeyDown = (e: KeyboardEvent) => {
    if (e.code === "Backslash") {
      e.preventDefault();
      if (input.current) {
        const element = input.current;
        element.focus();
      }
    }
  };

  useEffect(() => {
    document.body.addEventListener("keydown", onKeyDown);
  }, []);

  return (
    <>
      <header className="flex bg-white border-t-4 border-brand-primary fixed top-0 z-100 inset-x-0 shadow-smooth h-18 items-center">
        <div className="w-full max-w-screen-xl relative mx-auto px-6">
          <div className="flex items-center -mx-6">
            <div className="lg:w-1/2 pl-6 pr-6 lg:pr-8">
              <div className="flex flex-grow items-center">
                <InertiaLink href="/">
                  <svg
                    className="text-brand-primary"
                    width="59"
                    height="38"
                    viewBox="0 0 59 38"
                    fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path d="M58.9657 18.1341C58.9301 18.0216 58.8708 17.9092 58.7995 17.808L51.5568 9.25229C51.3312 8.9937 50.975 8.88128 50.6426 8.94873L42.2719 10.815C41.9751 10.8825 41.7376 11.0849 41.6307 11.3434C41.5239 11.6133 41.5595 11.9168 41.7376 12.1417L47.7099 20.1128L35.8009 23.1821L29.8287 24.7336L28.4276 22.5075L14.429 0.415485C14.239 0.123173 13.8947 -0.0454672 13.5266 0.0107466L0.786606 1.6297C0.489773 1.66343 0.240434 1.84332 0.0979547 2.09066C-0.0326516 2.338 -0.0326516 2.64155 0.0979547 2.88889L5.74964 12.9624L15.0939 29.6129C15.2958 29.9727 15.7232 30.1413 16.1388 30.0401L28.9738 26.7348L35.8484 37.584C36.0147 37.8538 36.3115 38 36.6321 38C36.7271 38 36.8339 37.9888 36.9289 37.955L56.9117 31.3331C57.1847 31.2431 57.3866 31.0407 57.4816 30.7822C57.5647 30.5236 57.5172 30.2425 57.3628 30.0176L50.8919 21.3945L50.7019 21.1471L54.7032 20.1128L58.3246 19.1796C58.6214 19.1009 58.8589 18.8873 58.9539 18.6175C59.0132 18.4601 59.0132 18.2915 58.9657 18.1341ZM16.3644 28.1963L9.20477 15.4358L2.31826 3.16996L13.1823 1.7871L26.0292 22.0803L28.0002 25.2058L16.3644 28.1963ZM55.1663 30.0851L37.0239 36.1L30.8023 26.2626L44.6465 22.6986L48.8259 21.6193L49.0159 21.8667L55.1663 30.0851ZM49.5858 19.6406L44.0054 12.1979L50.5001 10.7476L56.5198 17.8642L49.5858 19.6406Z" />
                  </svg>
                </InertiaLink>
                <nav className="hidden lg:block flex pl-15 space-x-4">
                  <InertiaLink href="/blog" className="text-gray-800 hover:text-gray-600">Blog</InertiaLink>
                  <InertiaLink href="/tutorials" className="text-gray-800 hover:text-gray-600">Tutoriels</InertiaLink>
                  <InertiaLink href="/forum" className="text-gray-800 hover:text-gray-600">Forum</InertiaLink>
                  <InertiaLink href="/jobs" className="text-gray-800 hover:text-gray-600">
                    <span className="mr-1">Jobs</span>
                    <span className="inline-flex items-center px-1.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-brand-100 text-brand-primary">
                      Soon
                    </span>
                  </InertiaLink>
                </nav>
              </div>
            </div>
            <div className="lg:w-1/2 flex flex-grow lg:pr-6 items-center">
              <div className="w-full">
                <div className="relative">
                  <span className="relative block" style={{ direction: "ltr" }}>
                    <input
                      className="transition font-light focus:outline-none border border-transparent focus:bg-gray-100 placeholder-gray-600 rounded-md bg-gray-200 py-2 pr-4 pl-10 block w-full appearance-none leading-normal ds-input"
                      type="text"
                      placeholder='Recherche (Press "\" to focus)'
                      autoComplete="off"
                      style={{ position: "relative", verticalAlign: "top" }}
                      ref={input}
                    />
                  </span>
                  <div className="pointer-events-none absolute inset-y-0 left-0 pl-4 flex items-center">
                    <svg
                      className="fill-current pointer-events-none text-gray-600 w-4 h-4"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20"
                    >
                      <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z" />
                    </svg>
                  </div>
                </div>
              </div>
              <button
                type="button"
                className="flex px-6 items-center lg:hidden text-gray-500 focus:outline-none focus:text-gray-700"
                onClick={() => setIsOpen(!isOpen)}
              >
                <svg
                  className="fill-current w-5 h-5"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                >
                  {isOpen && (
                    <path d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z" />
                  )}
                  {!isOpen && (
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                  )}
                </svg>
              </button>
              {!auth.user && (
                <div className="hidden lg:flex items-center pl-4">
                  <InertiaLink href="/login" className="text-brand-primary mr-4 hover:text-brand-900">Connexion</InertiaLink>
                  <InertiaLink href="/register" className="btn btn-primary">M'inscrire</InertiaLink>
                </div>
              )}
              {auth.user && (
                <div className="hidden lg:flex items-center ml-4 space-x-4">
                  <Notifications />
                  <AccountDropdown />
                </div>
              )}
            </div>
          </div>
        </div>
      </header>
      <div
        className={`fixed inset-0 h-full w-full pt-18 z-80 bg-white lg:hidden ${
          isOpen ? "block" : "hidden"
        }`}
      >
        <div className="block h-full w-full overflow-y-auto bg-white">
          <div className="pt-2 pb-3 space-y-1">
            <a href="/blog" className="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-brand-200 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-brand-200 transition duration-150 ease-in-out">Blog</a>
            <a href="/tutorials" className="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-brand-200 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-brand-200 transition duration-150 ease-in-out">Tutoriels</a>
            <a href="/forum" className="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-brand-200 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-brand-200 transition duration-150 ease-in-out">Forum</a>
            <a href="/jobs" className="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-brand-200 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-brand-200 transition duration-150 ease-in-out">Jobs</a>
          </div>
          {!auth.user && (
            <div className="space-y-1 pt-4 pb-3 border-t border-gray-200">
              <InertiaLink href="/login" className="block pl-3 pr-4 py-2 text-base font-medium text-brand-primary hover:text-brand-900 transition duration-150 ease-in-out">Connexion</InertiaLink>
              <InertiaLink href="/register" className="block pl-3 pr-4 py-2 text-base font-medium text-gray-600 hover:text-brand-900 transition duration-150 ease-in-out">M'inscrire</InertiaLink>
            </div>
          )}
          {auth.user && (
            <div className="pt-4 pb-3 border-t border-gray-200">
              <div className="flex items-center px-4">
                <div className="flex-shrink-0">
                  <img className="h-10 w-10 rounded-full" src={auth.user.picture} alt={auth.user.full_name} />
                </div>
                <div className="ml-3">
                  <div className="text-base font-medium leading-6 text-gray-800">{auth.user.full_name}</div>
                  <div className="text-sm font-medium leading-5 text-gray-500">{auth.user.email}</div>
                </div>
              </div>
              <div className="mt-3" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                <a href="/dashboard" className="mt-1 block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out" role="menuitem">
                  Dashboard
                </a>
                <a href={`/u/@${auth.user.username}`} className="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out" role="menuitem">
                  Mon Profil
                </a>
                <InertiaLink href="/logout" className="mt-1 block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out" role="menuitem">
                  Se déconnecter
                </InertiaLink>
              </div>
            </div>
          )}
        </div>
      </div>
    </>
  );
};
