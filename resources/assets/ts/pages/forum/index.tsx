import React from "react";

import Layout from "@/includes/layout";
import SEO from "@/includes/seo";

import Category from "@/components/category";
import Sidebar from "@/components/sidebar";
import Topic from "@/components/topic";

const Forum = () => {
  return (
    <>
      <SEO title="Forum" description="Les forums communautaires sont un endroit pour discuter de tout ce qui concerne le développement / le design (UI et UX)." />
      <div className="bg-gradient-white py-6">
        <div className="container">
          <div className="w-full">
            <h1 className="text-brand-primary text-xl mb-3">Forum</h1>
            <p className="text-sm text-gray-600 lg:w-116">Les forums communautaires sont un endroit pour discuter de tout ce qui concerne le développement / le design.</p>
          </div>
        </div>
      </div>
      <div className="container mt-12 md:px-4">
        <div className="hidden lg:flex justify-between mb-12">
          <Category slug="laravel" name="Laravel" />
          <Category slug="react" name="React" />
          <Category slug="vue" name="Vue" />
          <Category slug="javascript" name="Javascript" />
          <Category slug="html-css" name="HTML/CSS" />
          <Category slug="php" name="PHP" />
          <Category slug="design" name="Design" />
          <Category slug="feedback" name="Feedback" />
        </div>
        <div className="flex w-full">
          <Sidebar />
          <div className="w-full lg:pl-12 lg:w-9/12">
            <div className="flex items-center">
              <div className="w-full lg:w-2/3 items-center">
                <div className="hidden lg:inline-flex bg-gray-300 text-gray-700 text-sm font-medium py-2 px-4 mr-4 rounded-full">Toutes les discussions</div>
                <div className="hidden lg:inline-flex bg-gray-300 text-gray-700 text-sm font-medium py-2 px-4 mr-4 rounded-full items-center">
                  <span className="block h-3 w-3 rounded-full bg-brand-laravel mr-2" />
                  Laravel
                </div>
                <div className="inline-block relative lg:hidden mr-4">
                  <select className="block appearance-none w-full text-sm bg-gray-100 border border-gray-300 pl-4 py-3 pr-6 rounded-full leading-tight focus:outline-none">
                    <option value="Sujets récents">Sujets récents</option>
                    <option>Populaire cette semaine</option>
                    <option>Populaire en tout temps</option>
                    <option>Résolus</option>
                    <option>Non résolus</option>
                    <option>Aucune réponse</option>
                  </select>
                  <div className="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg className="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                      <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                    </svg>
                  </div>
                </div>
                <div className="inline-block relative lg:hidden">
                  <select className="block appearance-none w-full text-sm bg-gray-100 border border-gray-300 px-4 py-3 pr-8 rounded-full leading-tight focus:outline-none">
                    <option value="tous">Tous</option>
                    <option>Laravel</option>
                    <option>PHP</option>
                    <option>React</option>
                    <option>JavaScript</option>
                    <option>Feedback</option>
                  </select>
                  <div className="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg className="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                      <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                    </svg>
                  </div>
                </div>
              </div>
              <div className="w-full hidden lg:flex lg:w-1/3">
                <div className="w-full">
                  <div className="relative">
                    <span className="relative block" style={{ direction: "ltr" }}>
                      <input
                        className="transition font-light focus:outline-none border border-gray-400 focus:bg-gray-100 placeholder-gray-600 rounded-md bg-gray-300 py-2 pr-4 pl-10 block w-full appearance-none leading-normal ds-input"
                        type="text"
                        placeholder="Search (Press &quot;/&quot; to focus)"
                        autoComplete="off"
                        style={{ position: "relative", verticalAlign: "top" }}
                      />
                    </span>
                    <div className="pointer-events-none absolute inset-y-0 left-0 pl-4 flex items-center">
                      <svg className="fill-current pointer-events-none text-gray-600 w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z" />
                      </svg>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div className="mt-10">
              <Topic title='problème lié au dossier " public " de laravel' />
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

Forum.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Forum;
