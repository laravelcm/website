import React, { useEffect, useRef, useState } from "react";
import { InertiaLink, usePage } from "@inertiajs/inertia-react";
import { useClickAway } from "react-use";
import axios from "axios";

import AccountDropdown from "@/components/AccountDropdown";
import Notifications from "@/components/Notifications";
import Transition from "@/components/Transition";

import { groupBy } from "@/utils/helpers";

type Result = {
  title: string;
  url: string;
  type: string;
}

export default () => {
  const [isOpen, setIsOpen] = useState(false);
  const [show, setShow] = useState(false);
  const [loader, setLoader] = useState(false);
  const [query, setQuery] = useState('');
  const [results, setResults] = useState([]);
  const { auth } = usePage();
  const input = useRef<HTMLInputElement>(null);
  const ref = useRef(null);
  const closeDropdown = () => {
    setShow(false);
  };
  useClickAway(ref, closeDropdown);

  const onKeyDown = (e: KeyboardEvent) => {
    if (e.code === "Backslash") {
      e.preventDefault();
      if (input.current) {
        const element = input.current;
        element.focus();
      }
    }
  };

  function handleChange(e: React.ChangeEvent<HTMLInputElement>) {
    const { value } = e.target;
    setQuery(e.target.value);

    if (value && value.length > 3) {
      if (value.length % 2 === 0) {
        setShow(true);
        setLoader(true);
        search();
      }
    } else {
      setLoader(false);
    }
  }

  function search() {
    axios.get(`/api/search?search=${query}`)
      .then((response) => {
        setLoader(false);
        setResults(response.data);
      });
  }

  function renderTutorials(searchResults: Array<any>) {
    const values = groupBy(searchResults, 'type');

    if (values.Tutoriels && values.Tutoriels.length > 0) {
      const items = values.Tutoriels;
      return (
        <div className="pt-4">
          <h3 className="text-xs font-semibold text-gray-900 mb-2 leading-5 px-4 sm:px-6">Tutoriels</h3>
          <div>
            {
              items.map((item: Result) => (
                <a key={item.title} href={item.url} className="text-sm text-gray-600 hover:text-gray-500 focus:text-gray-800 leading-5 flex items-start hover:bg-gray-50 px-4 py-4 sm:px-6">
                  <span className="font-medium text-brand-primary text-base mr-2">#</span>
                  {item.title}
                </a>
              ))
            }
          </div>
        </div>
      );
    }

    return null;
  }

  function renderArticles(searchResults: Array<any>) {
    const values = groupBy(searchResults, 'type');

    if (values.Articles && values.Articles.length > 0) {
      const items = values.Articles;
      return (
        <div className="pt-4">
          <h3 className="text-xs font-semibold text-gray-900 mb-2 leading-5 px-4 sm:px-6">Articles</h3>
          <div>
            {
              items.map((item: Result) => (
                <a key={item.title} href={item.url} className="text-sm text-gray-600 hover:text-gray-500 focus:text-gray-800 leading-5 flex items-start hover:bg-gray-50 px-4 py-4 sm:px-6">
                  <span className="font-medium text-brand-primary text-base mr-2">#</span>
                  {item.title}
                </a>
              ))
            }
          </div>
        </div>
      );
    }

    return null;
  }

  function renderForum(searchResults: Array<any>) {
    const values = groupBy(searchResults, 'type');

    if (values.Forum && values.Forum.length > 0) {
      const items = values.Forum;
      return (
        <div className="pt-4">
          <h3 className="text-xs font-semibold text-gray-900 mb-2 leading-5 px-4 sm:px-6">Forum</h3>
          <div>
            {
              items.map((item: Result) => (
                <a key={item.title} href={item.url} className="text-sm text-gray-600 hover:text-gray-500 focus:text-gray-800 leading-5 flex items-start hover:bg-gray-50 px-4 py-4 sm:px-6">
                  <span className="font-medium text-brand-primary text-base mr-2">#</span>
                  {item.title}
                </a>
              ))
            }
          </div>
        </div>
      );
    }

    return null;
  }

  useEffect(() => {
    document.body.addEventListener("keydown", onKeyDown);
  }, []);

  return (
    <>
      <header ref={ref} className="flex bg-white border-t-4 border-brand-primary fixed top-0 z-50 inset-x-0 shadow-smooth h-18 items-center">
        <div className="w-full max-w-screen-xl mx-auto px-6">
          <div className="flex items-center -mx-6">
            <div className="lg:w-1/2 pl-6 pr-6 lg:pr-8">
              <div className="flex flex-grow items-center">
                <InertiaLink href="/">
                  <svg className="text-brand-primary" width="59" height="38" viewBox="0 0 59 38" fill="currentColor">
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
                  <div className="relative h-full flex items-center">
                    <div className="relative w-full text-gray-400 focus-within:text-gray-600">
                      <div className="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg className="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                          <path fillRule="evenodd" clipRule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                        </svg>
                      </div>
                      <input
                        className="block w-full h-full pl-10 pr-3 py-2 rounded-md text-gray-900 placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 sm:text-sm bg-gray-100 focus:bg-white border border-transparent focus:border-gray-200 leading-normal"
                        type="search"
                        ref={input}
                        value={query}
                        onChange={handleChange}
                        placeholder="Rechercher"
                        autoComplete="off"
                      />
                    </div>
                    {!loader && (
                      <div className="absolute right-0 hidden md:block h-auto mr-2 text-xs px-2 py-1 border border-gray-300 rounded-md text-gray-500">
                        <span>Press \ to focus</span>
                      </div>
                    )}
                    {loader && <span className="spinner top-0 right-6 mt-5 mr-6" />}
                  </div>
                  <Transition
                    show={show}
                    enter="transition ease-out duration-100"
                    enterFrom="transform opacity-0 scale-95"
                    enterTo="transform opacity-100 scale-100"
                    leave="transition ease-in duration-75"
                    leaveFrom="transform opacity-100 scale-100"
                    leaveTo="transform opacity-0 scale-95"
                  >
                    <div>
                      <div className="w-full divide-y divide-gray-100 flex flex-col bg-white absolute z-70 mt-3 text-sm border border-gray-100 rounded-md shadow-lg max-h-sm overflow-auto">
                        {results.length === 0 && (
                          <div className="flex flex-col items-center justify-center p-8">
                            <span className="h-12 w-12 flex-shrink-0">
                              <svg className="w-full h-full text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                  strokeLinecap="round"
                                  strokeLinejoin="round"
                                  strokeWidth="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                />
                              </svg>
                            </span>
                            <p className="text-sm font-medium text-gray-600 leading-5 mt-1">Aucun resultat trouvé.</p>
                          </div>
                        )}

                        {results.length > 0 && (
                          <div className="divide-y divide-gray-100">
                            {renderTutorials(results)}
                            {renderForum(results)}
                            {renderArticles(results)}
                          </div>
                        )}
                      </div>
                    </div>
                  </Transition>
                </div>
              </div>
              <div className="mx-4 lg:hidden">
                <button
                  type="button"
                  className="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                  onClick={() => setIsOpen(true)}
                >
                  <svg className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 6h16M4 12h16M4 18h16" />
                  </svg>
                </button>
              </div>
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
          <Transition
            show={isOpen}
            enter="transition ease-out duration-200"
            enterFrom="transform opacity-0 scale-95"
            enterTo="transform opacity-100 scale-100"
            leave="transition ease-in duration-75"
            leaveFrom="transform opacity-100 scale-100"
            leaveTo="transform opacity-0 scale-95"
          >
            <div className="absolute top-0 inset-x-0 p-2 transition transform origin-top-right lg:hidden">
              <div className="rounded-lg shadow-lg">
                <div className="rounded-lg shadow-xs bg-white divide-y-2 divide-gray-50">
                  <div className="pt-5 pb-6 px-5 space-y-6">
                    <div className="flex items-center justify-between">
                      <div>
                        <svg className="text-brand-primary" width="59" height="38" viewBox="0 0 59 38" fill="currentColor">
                          <path d="M58.9657 18.1341C58.9301 18.0216 58.8708 17.9092 58.7995 17.808L51.5568 9.25229C51.3312 8.9937 50.975 8.88128 50.6426 8.94873L42.2719 10.815C41.9751 10.8825 41.7376 11.0849 41.6307 11.3434C41.5239 11.6133 41.5595 11.9168 41.7376 12.1417L47.7099 20.1128L35.8009 23.1821L29.8287 24.7336L28.4276 22.5075L14.429 0.415485C14.239 0.123173 13.8947 -0.0454672 13.5266 0.0107466L0.786606 1.6297C0.489773 1.66343 0.240434 1.84332 0.0979547 2.09066C-0.0326516 2.338 -0.0326516 2.64155 0.0979547 2.88889L5.74964 12.9624L15.0939 29.6129C15.2958 29.9727 15.7232 30.1413 16.1388 30.0401L28.9738 26.7348L35.8484 37.584C36.0147 37.8538 36.3115 38 36.6321 38C36.7271 38 36.8339 37.9888 36.9289 37.955L56.9117 31.3331C57.1847 31.2431 57.3866 31.0407 57.4816 30.7822C57.5647 30.5236 57.5172 30.2425 57.3628 30.0176L50.8919 21.3945L50.7019 21.1471L54.7032 20.1128L58.3246 19.1796C58.6214 19.1009 58.8589 18.8873 58.9539 18.6175C59.0132 18.4601 59.0132 18.2915 58.9657 18.1341ZM16.3644 28.1963L9.20477 15.4358L2.31826 3.16996L13.1823 1.7871L26.0292 22.0803L28.0002 25.2058L16.3644 28.1963ZM55.1663 30.0851L37.0239 36.1L30.8023 26.2626L44.6465 22.6986L48.8259 21.6193L49.0159 21.8667L55.1663 30.0851ZM49.5858 19.6406L44.0054 12.1979L50.5001 10.7476L56.5198 17.8642L49.5858 19.6406Z" />
                        </svg>
                      </div>
                      <div className="-mr-2">
                        <button onClick={() => setIsOpen(false)} type="button" className="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                          <svg className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M6 18L18 6M6 6l12 12" />
                          </svg>
                        </button>
                      </div>
                    </div>
                    <div>
                      <nav className="grid row-gap-6">
                        <a href="/blog" className="-m-3 p-3 flex items-center space-x-3 rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                          <span className="text-base leading-6 font-medium text-gray-900">
                            Blog
                          </span>
                        </a>
                        <a href="/tutorials" className="-m-3 p-3 flex items-center space-x-3 rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                          <span className="text-base leading-6 font-medium text-gray-900">
                            Tutoriels
                          </span>
                        </a>
                        <a href="/forum" className="-m-3 p-3 flex items-center space-x-3 rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                          <span className="text-base leading-6 font-medium text-gray-900">
                            Forum
                          </span>
                        </a>
                        <a href="/jobs" className="-m-3 p-3 flex items-center space-x-3 rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                          <span className="text-base leading-6 font-medium text-gray-900">Jobs</span>
                          <span className="inline-flex items-center px-1.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-brand-100 text-brand-primary">
                            Soon
                          </span>
                        </a>
                      </nav>
                    </div>
                  </div>
                  <div className="py-6 px-5 space-y-6">
                    <div className="space-y-6">
                      {!auth.user && (
                        <>
                          <span className="w-full flex rounded-md shadow-sm">
                            <InertiaLink href="/register" className="w-full flex items-center justify-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-brand-primary hover:bg-brand-900 focus:outline-none focus:border-brand-200 focus:shadow-outline-brand active:bg-brand-900 transition ease-in-out duration-150">
                              Créer un compte
                            </InertiaLink>
                          </span>
                          <p className="text-center text-base leading-6 text-gray-600">
                            Vous avez déjà un compte?
                            <InertiaLink href="/login" className="ml-1 text-brand-primary hover:text-brand-900 transition ease-in-out duration-150">
                              Connectez-vous
                            </InertiaLink>
                          </p>
                        </>
                      )}
                      {auth.user && (
                        <>
                          <div className="flex items-center -m-3 p-3">
                            <div className="flex-shrink-0">
                              <img className="h-10 w-10 rounded-full" src={auth.user.picture} alt={auth.user.full_name} />
                            </div>
                            <div className="ml-3">
                              <div className="text-base font-medium leading-6 text-gray-800">{auth.user.full_name}</div>
                              <div className="text-sm font-medium leading-5 text-gray-500">{auth.user.email}</div>
                            </div>
                          </div>
                          <nav className="grid row-gap-6">
                            <a href="/dashboard" className="flex -m-3 p-3 text-base text-gray-500 hover:text-gray-800 rounded-md hover:bg-gray-50 transition duration-150 ease-in-out" role="menuitem">
                              Dashboard
                            </a>
                            <a href="/jobs" className="flex -m-3 p-3 text-base text-gray-500 hover:text-gray-800 rounded-md hover:bg-gray-50 transition duration-150 ease-in-out" role="menuitem">
                              Espace Entreprise
                              <span className="inline-flex ml-2 items-center px-1.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-brand-100 text-brand-primary">
                                Soon
                              </span>
                            </a>
                            <InertiaLink href="/logout" className="flex -m-3 p-3 text-base text-gray-500 hover:text-gray-800 rounded-md hover:bg-gray-50 transition duration-150 ease-in-out" role="menuitem">
                              Se déconnecter
                            </InertiaLink>
                          </nav>
                        </>
                      )}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </Transition>
        </div>
      </header>
    </>
  );
};
